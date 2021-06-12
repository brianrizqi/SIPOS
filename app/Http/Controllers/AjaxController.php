<?php

namespace App\Http\Controllers;

use App\Models\ServicePregnant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getServices(Request $request)
    {
        $services = ServicePregnant::query();
        if ($request->has('start_date') && $request->has('end_date')) {
            $services = $services->where(function ($q) use ($request) {
                $q->whereBetween('visit_at', [Carbon::parse($request->start_date)->toDateString(), Carbon::parse($request->end_date)->toDateString()]);
            });
        }
        $services = $services->select('visit_at')->groupBy('visit_at')
            ->orderByDesc('visit_at')->get();
        return view('dashboard.partials.service-table', compact('services'));
    }
}
