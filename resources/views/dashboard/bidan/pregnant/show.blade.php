@extends('layout/app')
@section('title','Ibu Hamil')
@section('breadcumb','Ibu Hamil / Show')
@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">Table Kehamilan Ibu {{ $mother->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>Kehamilan Ke</th>
                                        <th>HPHT</th>
                                        <th>Usia Kehamilan</th>
                                        <th>HPL</th>
                                        <th>TB (cm) </th>
                                        <th>BB (kg) </th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mother->details as $detail)
                                        <tr>
                                            <td>{{ $detail->pregnancy_to }}</td>
                                            @php
                                                $now = \Carbon\Carbon::now()->addDay();
                                                $hpht = $detail->hpht;
                                                $year = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $hpht)->year;
                                                $month = $hpht->month;
                                                $day = $hpht->day;
                                                $hpl = mktime(0, 0, 0, $month + 9, $day + 7, $year);
                                                $hpl = date("d M Y", $hpl);
                                                $hpl = \Carbon\Carbon::create($hpl);
                                            @endphp
                                            <td>{{ $detail->hpht->format('d M Y') }}</td>
                                            <td>{{ $detail->gestational_age }} Minggu</td>
                                            <td>{{ $hpl->format('d M Y') }}</td>
                                            <td>{{ $detail->tb }}</td>
                                            <td>{{ $detail->bb }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.bidan.pregnant.risk.index',['id' => $detail->id]) }}"
                                                   class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
