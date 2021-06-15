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
        $services = ServicePregnant::whereDate('visit_at', Carbon::today())->get();
        return view('dashboard/bidan/pregnant/service/index', compact('services'));
    }

    public function create()
    {
        return view('dashboard/bidan/pregnant/service/create');
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $visit_at = Carbon::parse($request->visit_at);
        try {
            DB::beginTransaction();

            ServicePregnant::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'pregnancy_to' => $request->pregnancy_to,
                'lila' => $request->lila,
                'bb' => $request->bb,
                'gestational_age' => $request->gestational_age,
                'trimester' => $request->trimester,
                'blood_booster_pills' => $request->blood_booster_pills,
                'immunization' => $request->immunization,
                'visit_at' => $visit_at
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
        $service = ServicePregnant::find($id);
        return view('dashboard/bidan/pregnant/service/edit', compact( 'service'));
    }

    public function update($id, Request $request)
    {
        $service = ServicePregnant::find($id);
        $visit_at = Carbon::parse($request->visit_at);
        try {
            DB::beginTransaction();

            $service->update([
                'name' => $request->name,
                'pregnancy_to' => $request->pregnancy_to,
                'lila' => $request->lila,
                'bb' => $request->bb,
                'gestational_age' => $request->gestational_age,
                'trimester' => $request->trimester,
                'blood_booster_pills' => $request->blood_booster_pills,
                'immunization' => $request->immunization,
                'visit_at' => $visit_at
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
        $services = ServicePregnant::select('visit_at')->groupBy('visit_at')
            ->orderByDesc('visit_at')->get();
        return view('dashboard/bidan/pregnant/service/history', compact('services'));
    }

    public function detail($date)
    {
        $date = Carbon::createFromDate($date);
        $services = ServicePregnant::whereDate('visit_at', $date)->get();
        return view('dashboard/bidan/pregnant/service/detail-history', compact('services', 'date'));
    }
}
