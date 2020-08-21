<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        // dd("in controller");
        return view('admin.dashboard');
    }
}
