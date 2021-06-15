<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\DetailPregnant;
use App\Models\Kspr;
use App\Models\RiskDetail;
use App\Models\RiskPregnant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Auth;

class RiskPregnantController extends Controller
{
    public function index($id)
    {
        $detail = DetailPregnant::find($id);
        return view('dashboard/kader/pregnant/risk/index', compact('detail'));
    }

    public function show($id)
    {

    }

    public function create($id)
    {
        $detail = DetailPregnant::find($id);
        $kspr = Kspr::all();
        return view('dashboard/kader/pregnant/risk/create', compact('detail', 'kspr'));
    }

    public function store($id, Request $request)
    {
        $check = RiskPregnant::where('detail_id', $id)
            ->where('trimester', $request->trimester)
            ->first();
        if ($check) {
            return redirect()->route('dashboard.kader.pregnant.risk.index', ['id' => $id])->with('failed', 'Trimester sudah pernah diinput');
        }
        try {
            DB::beginTransaction();
            $initial_score = 2;
            $score = 0;
            if ($request->has('answer')) {
                $kspr = Kspr::whereIn('id', $request->answer)->get();
                $score = $kspr->sum('score');
            }
            $score = $initial_score + $score;
            if ($score > 2 && $score < 12) {
                $status = 'KRT';
            } else if ($score >= 12) {
                $status = 'KRST';
            } else {
                $status = 'KRR';
            }
            $visit_at = Carbon::parse($request->visit_at);
            $risk = RiskPregnant::create([
                'kader_id' => Auth::id(),
                'detail_id' => $id,
                'trimester' => $request->trimester,
                'score' => $score,
                'status' => $status,
                'visit_at' => $visit_at
            ]);
            if ($request->has('answer')) {
                foreach ($request->answer as $answer) {
                    RiskDetail::create([
                        'kspr_id' => $answer,
                        'risk_id' => $risk->id
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dashboard.kader.pregnant.risk.index', ['id' => $id]);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    public function edit($id)
    {
        $risk = RiskPregnant::find($id);
        $detail = $risk->detail;
        $risk->answer = $risk->risks->pluck('kspr_id') ?? [];
        $kspr = Kspr::all();
        return view('dashboard/kader/pregnant/risk/edit', compact('risk', 'detail', 'kspr'));
    }

    public function update($id, Request $request)
    {
        $risk = RiskPregnant::find($id);
        try {
            DB::beginTransaction();
            $initial_score = 2;
            $score = 0;
            if ($request->has('answer')) {
                $kspr = Kspr::whereIn('id', $request->answer)->get();
                $score = $kspr->sum('score');
            }
            $score = $initial_score + $score;
            if ($score > 2 && $score < 12) {
                $status = 'KRT';
            } else if ($score >= 12) {
                $status = 'KRST';
            } else {
                $status = 'KRR';
            }
            $visit_at = Carbon::parse($request->visit_at);
            $risk->update([
                'trimester' => $request->trimester,
                'score' => $score,
                'status' => $status,
                'visit_at' => $visit_at
            ]);
            $risks = RiskDetail::where('risk_id', $risk->id)->delete();
            if ($request->has('answer')) {
                foreach ($request->answer as $answer) {
                    RiskDetail::create([
                        'kspr_id' => $answer,
                        'risk_id' => $risk->id
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dashboard.kader.pregnant.risk.index', ['id' => $risk->detail_id]);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }
}
