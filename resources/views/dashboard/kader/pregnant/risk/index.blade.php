@extends('layout/app')
@section('title','Ibu '. $detail->pregnant->name)
@section('breadcumb','Ibu Hamil / Index')
@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">Table Kehamilan ke {{ $detail->pregnancy_to }}</h4>
                            </div>
                            <div class="col-md-2 float-right">
                                <a href="{{ route('dashboard.kader.pregnant.risk.create',['id' => $detail->id]) }}"
                                   class="btn btn-primary"
                                   style="margin-left: 0.5em">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if(Session::has('failed'))
                                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                        @endif
                        <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>KADER</th>
                                        <th>TRIMESTER</th>
                                        <th>SCORE</th>
                                        <th>STATUS</th>
                                        <th>TANGGAL</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detail->risks as $risk)
                                        <tr>
                                            <td>{{ $risk->kader->name }}</td>
                                            <td>{{ $risk->trimester }}</td>
                                            <td>{{ $risk->score }}</td>
                                            <td>{{ $risk->status }}</td>
                                            <td>{{ $risk->created_at->format('d M Y') }}</td>
                                            @if(Auth::id() == $risk->kader_id)
                                                <td>
                                                    <a href="{{ route('dashboard.kader.pregnant.risk.edit',['id' => $risk->id]) }}"
                                                       class="btn btn-primary">Edit</a>
                                                </td>
                                            @endif
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
