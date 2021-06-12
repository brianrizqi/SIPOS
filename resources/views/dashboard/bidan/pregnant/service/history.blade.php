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
                            <div class="col-md-6">
                                <h4 class="card-title">Riwayat Layanan</h4>
                            </div>
                            <div class="col-md-3 float-right">
                                <div class="form-group">
                                    <label>Dari Tanggal</label>
                                    <input type="date" id="start-date" class="form-control" id
                                           placeholder="Tanggal Kunjungan" name="visit_at" required>
                                </div>
                            </div>
                            <div class="col-md-3 float-right">
                                <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                    <input type="date" id="end-date" class="form-control"
                                           placeholder="Tanggal Kunjungan" name="visit_at" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        var current_url = '{{ route('ajax.bidan.service.history', ['row' => 10]) }}';

        function getData(url) {
            $.get({
                url: url,
                success: (response) => {
                    $('.table-responsive').html(response);

                }
            });
        }

        getData(current_url)

        function changeDate() {
            if ($('#start-date').val() !== '' && $('#end-date').val() !== '') {
                let start = new Date($('#start-date').val());
                let end = new Date($('#end-date').val());
                let convertDate = function (date) {
                    var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();

                    if (month.length < 2)
                        month = '0' + month;
                    if (day.length < 2)
                        day = '0' + day;

                    return [year, month, day].join('-');
                };
                if (start <= end) {
                    let url = new URL(current_url);
                    url.searchParams.set('start_date', convertDate($('#start-date').val()));
                    url.searchParams.set('end_date', convertDate($('#end-date').val()));
                    current_url = url.href;
                    console.log(current_url)
                    getData(current_url);
                } else {
                    console.log('!!')
                }
            }
        }

        $("#start-date").on('input', function () {
            changeDate()
        })
        $("#end-date").on('input', function () {
            changeDate()
        })
    </script>
@endsection
