@extends('layout/app')
@section('title','Ibu '. $detail->pregnant->name)
@section('breadcumb','Ibu Hamil / Edit')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Resiko Kehamilan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="POST"
                                      action="{{ route('dashboard.kader.pregnant.risk.update',['id' => $risk->id]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Trimester</label>
                                                <input type="number" id="first-name-column" class="form-control"
                                                       placeholder="Trimester" name="trimester"
                                                       min="1" max="3"
                                                       value="{{ $risk->trimester }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Masalah / Faktor Resiko</th>
                                                <th>Skor</th>
                                                <th>Kelompok Faktor Resiko</th>
                                                <th>Jawaban</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Terlalu muda hamil <16 tahun</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an1" {{ in_array('an1',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2a</td>
                                                <td>Terlalu lambat hamil 1, kawin >4 tahun</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an2a" {{ in_array('an2a',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2b</td>
                                                <td>Terlalu tua, hamil 1 >35 tahun</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an2b" {{ in_array('an2b',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Terlalu cepat hamil lagi (<2 tahun)</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an3" {{ in_array('an3',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Terlalu lama hamil lagi (>10 tahun)</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an4" {{ in_array('an4',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Terlalu banyak anak, 4/lebih</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an5" {{ in_array('an5',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Terlalu tua, umur >35 tahun</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an6" {{ in_array('an6',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Terlalu pendek <145 cm</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an7" {{ in_array('an7',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Pernah gagal kehamilan</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an8" {{ in_array('an8',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Pernah melahirkan dengan</td>
                                            </tr>
                                            <tr>
                                                <td>9a</td>
                                                <td>Tarikan tang / vakum</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an9a" {{ in_array('an9a',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9b</td>
                                                <td>Uri dirogoh</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an9b" {{ in_array('an9b',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9c</td>
                                                <td>Diberi infus / transfusi</td>
                                                <td>4</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an9c" {{ in_array('an9c',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Pernah operasi sesar</td>
                                                <td>8</td>
                                                <td>I</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an10" {{ in_array('an10',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Penyakit pada ibu hamil</td>
                                            </tr>
                                            <tr>
                                                <td>11a</td>
                                                <td>Kurang darah</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an11a" {{ in_array('an11a',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11b</td>
                                                <td>Malaria</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an11b" {{ in_array('an11b',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11c</td>
                                                <td>TBC Paru</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an11c" {{ in_array('an11c',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11d</td>
                                                <td>Payah jantung</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an11d" {{ in_array('an11d',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11e</td>
                                                <td>Kencing manis (Diabetes)</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an11e" {{ in_array('an11e',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11f</td>
                                                <td>Penyakit menular seksual</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an11f" {{ in_array('an11f',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Bengkak pada muka / tungkai dan tekanan darah tinggi</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an12" {{ in_array('an12',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Hamil kembar 2 atau lebih</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an13" {{ in_array('an13',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>Hamil kembar air (hydraminon)</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an14" {{ in_array('an14',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>Bayi mati dalam kandungan</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an15" {{ in_array('an15',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>Kehamilan lebih bulan</td>
                                                <td>4</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an16" {{ in_array('an16',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>Letak sungsang</td>
                                                <td>8</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an17" {{ in_array('an17',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>Letak lintang</td>
                                                <td>8</td>
                                                <td>II</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an18" {{ in_array('an18',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>Pendarahan dalam kehamilan ini</td>
                                                <td>8</td>
                                                <td>III</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an19" {{ in_array('an19',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>Pre-eklampsia berat / kejang-kejang</td>
                                                <td>8</td>
                                                <td>III</td>
                                                <td>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox1" name="answer[]"
                                                                   class="form-check-input"
                                                                   value="an20" {{ in_array('an20',$risk->answer) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
