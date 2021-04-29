@extends('layout/app')
@section('title','User')
@section('breadcumb','User / Edit')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST"
                                  action="{{ route('dashboard.admin.users.update',['id' => $user->id]) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                   placeholder="Nama" name="name" required value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Email</label>
                                            <input type="email" id="last-name-column" class="form-control"
                                                   placeholder="Email" name="email" required value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Password</label>
                                            <input type="text" id="city-column" class="form-control"
                                                   placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">No Telepon</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                   name="phone" placeholder="No Telepon" required
                                                   value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Alamat</label>
                                            <input type="text" id="company-column" class="form-control"
                                                   name="address" placeholder="Alamat" required
                                                   value="{{ $user->address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Role</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="role">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->title }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
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
