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
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>TRIMESTER</th>
                                        <th>SCORE</th>
                                        <th>STATUS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detail->risks as $risk)
                                        <tr>
                                            <td>{{ $risk->trimester }}</td>
                                            <td>{{ $risk->score }}</td>
                                            <td>{{ $risk->status }}</td>
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
