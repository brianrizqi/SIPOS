<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->isA('admin')) {
                return redirect()->route('dashboard.admin.users.index');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
