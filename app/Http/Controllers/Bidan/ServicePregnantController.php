<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\MotherPregnant;
use App\Models\ServicePregnant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Auth;

class ServicePregnantController extends Controller
{
    public function index()
    {
        $services = ServicePregnant::whereDate('created_at', Carbon::today())->get();
        return view('dashboard/bidan/pregnant/service/index', compact('services'));
    }

    public function create()
    {
        $mothers = MotherPregnant::all();
        return view('dashboard/bidan/pregnant/service/create', compact('mothers'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            ServicePregnant::create([
                'user_id' => Auth::id(),
                'mother_id' => $request->mother_id,
                'pregnancy_to' => $request->pregnancy_to,
                'lila' => $request->lila,
                'bb' => $request->bb,
                'gestational_age' => $request->gestational_age,
                'trimester' => $request->trimester,
                'blood_booster_pills' => $request->blood_booster_pills,
                'immunization' => $request->immunization
            ]);

            DB::commit();
            return redirect()->route('dashboard.bidan.pregnant.service.index');
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    public function edit($id)
    {
        $mothers = MotherPregnant::all();
        $service = ServicePregnant::find($id);
        return view('dashboard/bidan/pregnant/service/edit', compact('mothers', 'service'));
    }

    public function update($id, Request $request)
    {
        $service = ServicePregnant::find($id);
        try {
            DB::beginTransaction();

            $service->update([
                'mother_id' => $request->mother_id,
                'pregnancy_to' => $request->pregnancy_to,
                'lila' => $request->lila,
                'bb' => $request->bb,
                'gestational_age' => $request->gestational_age,
                'trimester' => $request->trimester,
                'blood_booster_pills' => $request->blood_booster_pills,
                'immunization' => $request->immunization
            ]);

            DB::commit();
            return redirect()->route('dashboard.bidan.pregnant.service.index');
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    public function history()
    {
        $services = ServicePregnant::select('created_at')->groupBy('created_at')
            ->orderByDesc('created_at')->get();
        return view('dashboard/bidan/pregnant/service/history', compact('services'));
    }

    public function detail($date)
    {
        $date = Carbon::createFromDate($date);
        $services = ServicePregnant::whereDate('created_at', $date)->get();
        return view('dashboard/bidan/pregnant/service/detail-history', compact('services', 'date'));
    }
}
