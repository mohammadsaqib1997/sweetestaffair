<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth.private');
    // }

    public function __invoke()
    {
        return view('admin.index');
    }
}
