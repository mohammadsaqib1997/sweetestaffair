<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    protected $redirectTo = '/_admin/';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view("admin.login");
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|min:3',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->input('remember'))) {
            return redirect()->intended(route('dashboard'));
        }
        return back()->withInput($request->only('username', 'remember'))->with("error", "Error: Invalid credentials!");
    }
}
