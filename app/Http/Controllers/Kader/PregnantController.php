<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\MotherPregnant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PregnantController extends Controller
{
    public function index()
    {
        $mothers = MotherPregnant::where('user_id', Auth::id())->get();
        return view('dashboard/kader/pregnant/index', compact('mothers'));
    }

    public function create()
    {
        return view('dashboard/kader/pregnant/create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            MotherPregnant::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'husband' => $request->husband,
                'nik' => $request->nik,
                'phone' => $request->phone,
                'address' => $request->address,
                'age' => $request->age
            ]);

            DB::commit();

            return redirect()->route('dashboard.kader.pregnant.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    public function show($id)
    {
        $mother = MotherPregnant::findOrFail($id);
        if ($mother->user_id != Auth::id()) {
            return abort(403);
        }
        return view('dashboard/kader/pregnant/show', compact('mother'));
    }
}
