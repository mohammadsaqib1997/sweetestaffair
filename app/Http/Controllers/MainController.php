<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Webribs\Safepay\Models\PaymentLog;
use Webribs\Safepay\Safepay;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        $products =  array_reverse($this->product_catalogue());
        $our_products = [
            'the-floral-gift-box' => $products['the-floral-gift-box'],
            'the-ring-box' => $products['the-ring-box'],
            'eid-basket' => $products['eid-basket'],
            'celebration-cake' => $products['celebration-cake']
        ];

        $best_seller = [
            'eid-cake-hamper' => $products['signature-sphere'],
            'flower-bag' => $products['flower-bag'],
            'luxury-leather-box' => $products['luxury-leather-box'],
            'celebration-bundle' => $products['celebration-bundle']
        ];
        return view('main', ['our_products' => $our_products, 'best_seller' => $best_seller]);
    }

    public function shop()
    {
        $products =  array_reverse($this->product_catalogue());
        return view('shop', ['prds' => $products]);
    }

    public function eidSpecials()
    {
        $products =  array_reverse($this->product_catalogue());
        $grab = [];
        foreach ($products as $key => $prd) {
            if (isset($prd['eid-specials']) && $prd['eid-specials'] == true) {
                $grab[$key] = $prd;
            }
        }
        return view('shop', ['prds' => $grab, 'title' => "Eid Specials"]);
    }

    private function product_catalogue()
    {
        return json_decode(file_get_contents(base_path("resources/json/products.json")), true);
    }

    public function prdItem($prd_slug)
    {
        // dd($prd_slug);
        $prds = $this->product_catalogue();
        if (array_key_exists($prd_slug, $prds)) {
            // dd($prds[$prd_slug]);
            return view('prd-item', ['prd' => $prds[$prd_slug]]);
        } else {
            return abort(404);
        }
    }

    public function orderSave(Request $req)
    {
        $order = new Order;
        $order->customer_name = $req->name;
        $order->customer_phone = $req->phone;
        $order->customer_email = $req->email;
        $order->customer_address = $req->address;
        $order->customer_message = $req->message;
        $order->product_id = $req->product_id;
        $order->product_options = json_encode($req->selected_variations);
        $order->base_price = $req->pr_price;
        $order->qty = $req->qty;
        $order->total_price = $req->pr_total;
        $order->deliver_date = Carbon::parse($req->sel_date);
        $order->deliver_time = $req->sel_time;

        try {
            $order->save();
            $safepay = new Safepay;
            $link = $safepay->process_payment($order->id, $order->total_price);
            return response()->json([
                "status" => "ok",
                "link" => $link['redirect']
            ]);
        } catch (Exception $e) {
            $order->delete();
            return response()->json([
                "status" => "failed",
                "message" => "Error: " . $e
            ]);
        }
    }

    public function storePaymentLog(Request $req)
    {
        $data = $req->input();
        $safepay = new Safepay;

        if ($safepay->validate_signature($data['tracker'], $data['sig']) === false) {
            return redirect()->route('payment-failed')->with(['error' => "Oh no, your payment failed!"]);
        }

        PaymentLog::create([
            'order_id' => $data['order_id'],
            'reference_code' => $data['reference'],
            'tracker' => $data['tracker'],
            'signature' => $data['sig'],
        ]);

        //update order status
        $order = Order::find($data['order_id']);
        $order->order_status = 1;
        $order->save();

        $this->orderEmails($order);

        return redirect()->route('payment_success', $data['sig']);
    }

    public function viewPaymentSuccessPage($sig)
    {
        $data = PaymentLog::where('signature', '=', $sig)->firstOrFail();
        return view('payment-success', ["order_id" => $data->order_id]);
    }

    public function viewCancelPaymentPage()
    {
        return view('payment-error', ["title" => "Payment Cancel", "sub_heading" => "Oh no, your payment cancel!", "message" => ""]);
    }

    public function viewFailedPaymentPage()
    {
        $error = session("error");
        if ($error  != null)
            return view('payment-error', ["title" => "Payment Failed", "sub_heading" => $error, "message" => ""]);
        else
            return abort(404);
    }

    private function orderEmails($order)
    {
        // $order = Order::findOrFail($order_id);
        $prd = $this->prdById($order['product_id']);
        $details = [
            'order' => $order,
            'prd' => $prd
        ];
        try {
            Mail::send(
                'mails.client-order-email',
                $details,
                function ($message) use ($details) {
                    $message->from('order@sweetestaffair.com');
                    $message->to($details['order']['customer_email']);
                    $message->subject('Your order has been placed.');
                }
            );
            Mail::send(
                'mails.host-order-email',
                $details,
                function ($message) use ($details) {
                    $message->from('order@sweetestaffair.com');
                    $message->to('order@sweetestaffair.com');
                    $message->subject('New order received');
                }
            );
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function prdById($id)
    {
        $prds = $this->product_catalogue();
        $sel_prd = [];
        foreach ($prds as $key => $item) {
            if ($item['id'] == $id) {
                $sel_prd = $item;
                break;
            }
        }
        return $sel_prd;
    }

    public function contactMail(Request $req)
    {
        $req->merge(['name' => preg_replace('/\s+/', ' ', $req->input('name'))]);
        $req->merge(['phone' => preg_replace('/\s+/', ' ', $req->input('phone'))]);

        $validator = Validator::make($req->all(), [
            'name' => 'bail|required|min:3|max:255',
            'phone' => 'bail|required|min:8|max:20',
            'email' => 'bail|required|email',
            'message' => 'bail|required|min:3|max:255'
        ]);


        if ($validator->fails()) {
            return redirect('/contact-us#form')
                ->withErrors($validator)
                ->withInput();
        } else {
            $req_valid = [
                'name' => $req->input('name'),
                'phone' => $req->input('phone'),
                'email' => $req->input('email'),
                'content' => $req->input('message'),
            ];
            Mail::send(
                'mails.contact',
                $req_valid,
                function ($message) use ($req_valid) {
                    $message->from('info@sweetestaffair.com');
                    $message->to('info@sweetestaffair.com');
                    $message->subject('Contact Form');
                }
            );

            return redirect('/contact-us#form')->with('status', 'You have successfully sent an email!');
        }
    }

    public function searchShop(Request $req)
    {
        if ($req->get('q') != null) {
            $search = strtolower($req->get('q'));
            $prds = $this->product_catalogue();
            $s_prds = [];
            foreach ($prds as $key => $prd) {
                if (strpos(strtolower($prd['title']), $search) > -1) {
                    $s_prds[$key] = $prd;
                }
            }
            return view('search', [
                'prds' => $s_prds
            ]);
        } else {
            return abort(404);
        }
    }
}
