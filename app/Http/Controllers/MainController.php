<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Webribs\Safepay\Models\PaymentLog;
use Webribs\Safepay\Safepay;

class MainController extends Controller
{
    public function index()
    {
        return null;
    }

    public function shop()
    {
        $products = $this->product_catalogue();
        return view('shop', ['prds' => $products]);
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
        $order->product_options = json_encode($req->variations);
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
}
