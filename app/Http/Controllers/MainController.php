<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
