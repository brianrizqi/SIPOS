@extends('layout/app')
@section('title','Ibu Hamil')
@section('breadcumb','Ibu Hamil / Create Detail Kehamilan')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Detail Kehamilan Ibu {{ $mother->name }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST"
                                  action="{{ route('dashboard.kader.pregnant.detail.store',['id' => $id]) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Kehamilan Ke</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                   placeholder="Kehamilan Ke" name="pregnancy_to" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">HPHT</label>
                                            <input type="date" id="last-name-column" class="form-control"
                                                   placeholder="HPHT" name="hpht" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Status Kehamilan</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="status">
                                                    <option value="0">Belum Lahir</option>
                                                    <option value="1">Sudah Lahir</option>
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
