<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\MotherPregnant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Auth;

class PregnantController extends Controller
{
    public function index()
    {
        $mothers = MotherPregnant::all();
        return view('dashboard/bidan/pregnant/index', compact('mothers'));
    }

    public function show($id)
    {
        $mother = MotherPregnant::findOrFail($id);
        return view('dashboard/bidan/pregnant/show', compact('mother'));
    }
}
