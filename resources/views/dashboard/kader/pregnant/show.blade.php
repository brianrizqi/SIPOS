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
                            <div class="col-md-2 float-right">
                                <a href="{{ route('dashboard.kader.pregnant.detail.create',['id' => $mother->id]) }}"
                                   class="btn btn-primary"
                                   style="margin-left: 1em">Tambah Data</a>
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
                                        <th>TB</th>
                                        <th>BB</th>
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
                                                $gestational_age = $hpht->diffInDays($now);
                                                $year = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $hpht)->year;
                                                $month = $hpht->month;
                                                $day = $hpht->day;
                                                $hpl = mktime(0, 0, 0, $month + 9, $day + 7, $year);
                                            @endphp
                                            <td>{{ $detail->hpht->format('d M Y') }}</td>
                                            <td>{{ $gestational_age }} Hari</td>
                                            <td>{{ date("d M Y", $hpl) }}</td>
                                            <td>{{ $detail->tb }}</td>
                                            <td>{{ $detail->bb }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.kader.pregnant.risk.index',['id' => $detail->id]) }}"
                                                   class="btn btn-primary">Detail</a>
                                                <a href="{{ route('dashboard.kader.pregnant.detail.edit',['id' => $detail->id]) }}"
                                                   class="btn btn-primary">Edit</a>
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
