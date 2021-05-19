<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\DetailPregnant;
use Illuminate\Http\Request;

class RiskPregnantController extends Controller
{
    public function index($id)
    {
        $detail = DetailPregnant::find($id);
        return view('dashboard/bidan/pregnant/risk/index', compact('detail'));
    }
}
