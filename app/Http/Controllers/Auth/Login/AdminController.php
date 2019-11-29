<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use Illuminate\Http\Request;

class AdminController extends DefaultLoginController
{
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->nativeLogout($request);
        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('auth.login.admin');
    }

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
