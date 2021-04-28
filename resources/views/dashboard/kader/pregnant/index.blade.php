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
                        <h4 class="card-title">Table Ibu Hamil</h4>

                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>NAMA SUAMI</th>
                                        <th>UMUR</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mothers as $mother)
                                        <tr>
                                            <td>{{ $mother->name }}</td>
                                            <td>{{ $mother->husband }}</td>
                                            <td>{{ $mother->age }} Tahun</td>
                                            <td>
                                                <a href="{{ route('dashboard.kader.pregnant.show',['id' => $mother->id]) }}"
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
