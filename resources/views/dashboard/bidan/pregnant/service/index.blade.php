@extends('layout/app')
@section('title','Ibu Hamil')
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
                                <h4 class="card-title">Table Layanan Ibu Hamil</h4>
                            </div>
                            <div class="col-md-2 float-right">
                                <a href="{{ route('dashboard.bidan.pregnant.service.create') }}"
                                   class="btn btn-primary"
                                   style="margin-left: 0.5em">Tambah Data</a>
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
                                        <th>Nama</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Kehamilan</th>
                                        <th>LILA (cm) </th>
                                        <th>BB (Kg)</th>
                                        <th>Umur Kehamilan</th>
                                        <th>Trimester</th>
                                        <th>Pil</th>
                                        <th>Imunisasi</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->created_at->format('d M Y') }}</td>
                                            <td>{{ $service->pregnancy_to }}</td>
                                            <td>{{ $service->lila }}</td>
                                            <td>{{ $service->bb }}</td>
                                            <td>{{ $service->gestational_age }}</td>
                                            <td>{{ $service->trimester }}</td>
                                            <td>{{ $service->blood_booster_pills }}</td>
                                            <td>{{ strtoupper($service->immunization) }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.bidan.pregnant.service.edit',['id' => $service->id]) }}"
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
