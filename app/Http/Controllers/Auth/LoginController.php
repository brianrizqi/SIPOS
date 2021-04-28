<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'showLoginForm']);
    }

    public function showLoginForm()
    {
        if (Auth::user()) {
            return redirect('/');
        }
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('failed', 'Email tidak ada');
        }
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->isA('admin')) {
                return redirect()->route('dashboard.admin.users.index');
            } else if (Auth::user()->isA('kader')) {
                return redirect()->route('dashboard.kader.pregnant.index');
            }
        } else {
            return redirect()
                ->back()
                ->with('failed', 'Your password is incorrect')
                ->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
