@extends('layout/app')
@section('title','Ibu Hamil')
@section('breadcumb','Ibu Hamil / Index')
@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Layanan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.bidan.pregnant.service.history.detail',['date' => $service->created_at->format('Y-m-d')]) }}"
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
