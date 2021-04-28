@extends('layout/app')
@section('title','User')
@section('breadcumb','User / Index')
@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table User</h4>

                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>ALAMAT</th>
                                        <th>TELEPON</th>
                                        <th>ROLE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-bold-500">{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-bold-500">{{ $user->address }}</td>
                                            <td class="text-bold-500">{{ $user->phone }}</td>
                                            <td class="text-bold-500">{{ $user->role->title }}</td>
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
