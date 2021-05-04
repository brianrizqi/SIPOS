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
            } else if (Auth::user()->isA('kader')) {
                return redirect()->route('dashboard.kader.pregnant.index');
            } else if (Auth::user()->isA('bidan')) {
                return redirect()->route('dashboard.bidan.pregnant.service.index');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
