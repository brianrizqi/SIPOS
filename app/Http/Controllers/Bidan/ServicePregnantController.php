<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicePregnantController extends Controller
{
    public function index()
    {
        return view('dashboard/bidan/pregnant/service/index');
    }

    public function create()
    {

    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {

    }

    public function history()
    {
        return view('dashboard/bidan/pregnant/service/history');
    }
}
