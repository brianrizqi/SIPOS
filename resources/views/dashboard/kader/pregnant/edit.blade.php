@extends('layout/app')
@section('title','Ibu Hamil')
@section('breadcumb','Ibu Hamil / Edit')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Ibu Hamil</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST"
                                  action="{{ route('dashboard.kader.pregnant.update',['id' => $mother->id]) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                   placeholder="Nama" name="name" required value="{{ $mother->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Nama Suami</label>
                                            <input type="name" id="last-name-column" class="form-control"
                                                   placeholder="Nama Suami" name="husband" required
                                                   value="{{ $mother->husband }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">NIK</label>
                                            <input type="text" id="city-column" class="form-control"
                                                   placeholder="NIK" name="nik" required value="{{ $mother->nik }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">No Telepon</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="phone" placeholder="No Telepon" required
                                                   value="{{ $mother->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Alamat</label>
                                            <input type="text" id="company-column" class="form-control"
                                                   name="address" placeholder="Alamat" required
                                                   value="{{ $mother->address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Tanggal Lahir</label>
                                            <input type="date" id="company-column" class="form-control"
                                                   name="birthday_at" placeholder="Umur" required value="{{ !is_null($mother->birthday_at) ? $mother->birthday_at->format('Y-m-d') : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit
                                        </button>
                                        <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
