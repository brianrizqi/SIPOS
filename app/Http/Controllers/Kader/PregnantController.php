<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\MotherPregnant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Mockery\Exception;

class PregnantController extends Controller
{
    public function index()
    {
        $mothers = MotherPregnant::paginate(5);
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
                'birthday_at' => $request->birthday_at
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
//        if ($mother->user_id != Auth::id()) {
//            return abort(403);
//        }
        return view('dashboard/kader/pregnant/show', compact('mother'));
    }

    public function edit($id)
    {
        $mother = MotherPregnant::findOrFail($id);
//        if ($mother->user_id != Auth::id()) {
//            return abort(403);
//        }
        return view('dashboard/kader/pregnant/edit', compact('mother'));
    }

    public function update($id, Request $request)
    {
        $mother = MotherPregnant::find($id);
        try {
            DB::beginTransaction();

            $mother->update([
                'name' => $request->name,
                'husband' => $request->husband,
                'nik' => $request->nik,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday_at' => $request->birthday_at
            ]);

            DB::commit();
            return redirect()->route('dashboard.kader.pregnant.index');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
