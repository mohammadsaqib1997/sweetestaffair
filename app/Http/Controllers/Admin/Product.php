<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Product extends Controller
{

    public function add()
    {
        return view('admin.add-product');
    }
}
