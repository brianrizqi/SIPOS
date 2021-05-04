<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\DetailPregnant;
use App\Models\MotherPregnant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class DetailPregnantController extends Controller
{
    public function create($id)
    {
        $mother = MotherPregnant::findOrFail($id);
        if ($mother->user_id != Auth::id()) {
            return abort(403);
        }
        return view('dashboard/kader/pregnant/detail/create', compact('id', 'mother'));
    }

    public function store($id, Request $request)
    {
        $hpht = Carbon::parse($request->hpht);
        try {
            DB::beginTransaction();

            DetailPregnant::create([
                'mother_id' => $id,
                'pregnancy_to' => $request->pregnancy_to,
                'hpht' => $hpht,
                'status' => $request->status,
                'bb' => $request->bb,
                'tb' => $request->tb
            ]);

            DB::commit();
            return redirect()->route('dashboard.kader.pregnant.show', ['id' => $id]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function edit($id)
    {
        $detail = DetailPregnant::findOrFail($id);
        $mother = $detail->pregnant;
        return view('dashboard/kader/pregnant/detail/edit', compact('id', 'mother', 'detail'));
    }

    public function update($id, Request $request)
    {
        $hpht = Carbon::parse($request->hpht);
        try {
            DB::beginTransaction();
            $detail = DetailPregnant::find($id);
            $detail->update([
                'pregnancy_to' => $request->pregnancy_to,
                'hpht' => $hpht,
                'status' => $request->status,
                'bb' => $request->bb,
                'tb' => $request->tb
            ]);

            DB::commit();
            return redirect()->route('dashboard.kader.pregnant.show', ['id' => $detail->mother_id]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
