@extends('layout/app')
@section('title','Ibu Hamil')
@section('breadcumb','Ibu Hamil / Edit')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Layanan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST"
                                  action="{{ route('dashboard.bidan.pregnant.service.update',['id' => $service->id]) }}">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Ibu Hamil</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="mother_id">
                                                    @foreach($mothers as $mother)
                                                        <option
                                                            value="{{ $mother->id }}" {{ $mother->id == $service->mother_id ? 'selected' : '' }}>{{ $mother->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Kehamilan ke</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                   min="1"
                                                   placeholder="Kehamilan ke" name="pregnancy_to" required
                                                   value="{{ $service->pregnancy_to }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">LILA (cm)</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                   placeholder="LILA (cm)" name="lila" required
                                                   value="{{ $service->lila }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Berat Badan</label>
                                            <input type="text" id="city-column" class="form-control"
                                                   placeholder="Berat Badan" name="bb" required
                                                   value="{{ $service->bb }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Umur Kehamilan (minggu)</label>
                                            <input type="number" id="country-floating" class="form-control"
                                                   min="1"
                                                   name="gestational_age" placeholder="Umur Kehamilan (minggu)"
                                                   value="{{ $service->gestational_age }}"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Trimester</label>
                                            <input type="number" id="company-column" class="form-control"
                                                   name="trimester" min="1" placeholder="Trimester" required
                                                   value="{{ $service->trimester }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Pil Penambah Darah (isi 0 bila tidak
                                                ada)</label>
                                            <input type="text" id="company-column" class="form-control"
                                                   name="blood_booster_pills" placeholder="Pil Penambah Darah" required
                                                   value="{{ $service->blood_booster_pills }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Imunisasi</label>
                                            <fieldset class="form-group">
                                                @php($items = ['t1','t2','t3','t4','t5'])
                                                <select class="form-select" id="basicSelect" name="immunization">
                                                    @foreach($items as $item)
                                                        <option
                                                            value="{{ $item }}" {{ $item == $service->immunization ? 'selected' : '' }}>{{ strtoupper($item) }}</option>
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
