<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\DetailPregnant;
use App\Models\RiskPregnant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

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
        return view('dashboard/kader/pregnant/risk/create', compact('detail'));
    }

    public function store($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $arr = $this->kspr($request->answer);
            if ($arr['score'] > 2 && $arr['score'] < 12) {
                $status = 'KRT';
            } else if ($arr['score'] >= 12) {
                $status = 'KRST';
            } else {
                $status = 'KRR';
            }
            RiskPregnant::create([
                'detail_id' => $id,
                'trimester' => $request->trimester,
                'answer' => count($arr['answer']) == 0 ? null : $arr['answer'],
                'score' => $arr['score'],
                'status' => $status
            ]);
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
        $risk->answer = $risk->answer ?? [];
        return view('dashboard/kader/pregnant/risk/edit', compact('risk', 'detail'));
    }

    public function update($id, Request $request)
    {
        $risk = RiskPregnant::find($id);
        try {
            DB::beginTransaction();
            $arr = $this->kspr($request->answer);
            if ($arr['score'] > 2 && $arr['score'] < 12) {
                $status = 'KRT';
            } else if ($arr['score'] >= 12) {
                $status = 'KRST';
            } else {
                $status = 'KRR';
            }
            $risk->update([
                'trimester' => $request->trimester,
                'answer' => count($arr['answer']) == 0 ? null : $arr['answer'],
                'score' => $arr['score'],
                'status' => $status
            ]);
            DB::commit();
            return redirect()->route('dashboard.kader.pregnant.risk.index', ['id' => $risk->detail_id]);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    private function kspr($items)
    {
        $list = array('an1', 'an2a', 'an2b', 'an3', 'an4', 'an5', 'an6', 'an7', 'an8',
            'an9a', 'an9b', 'an9c', 'an10', 'an11a', 'an11b', 'an11c', 'an11d', 'an11e', 'an11f',
            'an12', 'an13', 'an14', 'an15', 'an16', 'an17', 'an18', 'an19', 'an20');
        $answer_score = array();
        $answers = array();
        $initial_score = 2;
        if (!is_null($items)) {
            foreach ($list as $i => $item) {
                $temp = 0;
                if (in_array($item, $items)) {
                    if (in_array($item, ['an10', 'an17', 'an18', 'an19', 'an20'])) {
                        $temp = 8;
                    } else {
                        $temp = 4;
                    }
                    $answers[$i] = $item;
                }
                $answer_score[$i] = $temp;
            }
        }
        $total_score = array_sum($answer_score) + $initial_score;
        $answers = array_values($answers);
        return [
            'score' => $total_score,
            'answer' => $answers
        ];
    }
}
