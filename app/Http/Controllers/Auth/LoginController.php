<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return 'login';
    }

    public function login(Request $request)
    {

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
