@extends('layout/app')
@section('title','Ibu '. $detail->pregnant->name)
@section('breadcumb','Ibu Hamil / Create')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Resiko Kehamilan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="POST"
                                      action="{{ route('dashboard.kader.pregnant.risk.store',['id' => $detail->id]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Trimester</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                       placeholder="Trimester" name="trimester" required>
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
                                            @foreach($kspr as $item)
                                                <tr>
                                                    <td>{{ $item->number  }}</td>
                                                    <td>{{ $item->factor }}</td>
                                                    @if($item->score > 0)
                                                        <td>{{ $item->score }}</td>
                                                        <td>{{ $item->group_factor }}</td>
                                                        <td>
                                                            <div class="form-check">
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox1"
                                                                           name="answer[]"
                                                                           class="form-check-input"
                                                                           value="{{ $item->id }}">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>2a</td>--}}
                                            {{--                                                <td>Terlalu lambat hamil 1, kawin >4 tahun</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an2a">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>2b</td>--}}
                                            {{--                                                <td>Terlalu tua, hamil 1 >35 tahun</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an2b">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>3</td>--}}
                                            {{--                                                <td>Terlalu cepat hamil lagi (<2 tahun)</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an3">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>Terlalu lama hamil lagi (>10 tahun)</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an4">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>5</td>--}}
                                            {{--                                                <td>Terlalu banyak anak, 4/lebih</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an5">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>6</td>--}}
                                            {{--                                                <td>Terlalu tua, umur >35 tahun</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an6">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>7</td>--}}
                                            {{--                                                <td>Terlalu pendek <145 cm</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an7">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>8</td>--}}
                                            {{--                                                <td>Pernah gagal kehamilan</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an8">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>9</td>--}}
                                            {{--                                                <td>Pernah melahirkan dengan</td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>9a</td>--}}
                                            {{--                                                <td>Tarikan tang / vakum</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an9a">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>9b</td>--}}
                                            {{--                                                <td>Uri dirogoh</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an9b">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>9c</td>--}}
                                            {{--                                                <td>Diberi infus / transfusi</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an9c">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>10</td>--}}
                                            {{--                                                <td>Pernah operasi sesar</td>--}}
                                            {{--                                                <td>8</td>--}}
                                            {{--                                                <td>I</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an10">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>11</td>--}}
                                            {{--                                                <td>Penyakit pada ibu hamil</td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>11a</td>--}}
                                            {{--                                                <td>Kurang darah</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an11a">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>11b</td>--}}
                                            {{--                                                <td>Malaria</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an11b">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>11c</td>--}}
                                            {{--                                                <td>TBC Paru</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an11c">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>11d</td>--}}
                                            {{--                                                <td>Payah jantung</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an11d">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>11e</td>--}}
                                            {{--                                                <td>Kencing manis (Diabetes)</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an11e">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>11f</td>--}}
                                            {{--                                                <td>Penyakit menular seksual</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an11f">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>12</td>--}}
                                            {{--                                                <td>Bengkak pada muka / tungkai dan tekanan darah tinggi</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an12">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>13</td>--}}
                                            {{--                                                <td>Hamil kembar 2 atau lebih</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an13">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>14</td>--}}
                                            {{--                                                <td>Hamil kembar air (hydraminon)</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an14">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>15</td>--}}
                                            {{--                                                <td>Bayi mati dalam kandungan</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an15">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>16</td>--}}
                                            {{--                                                <td>Kehamilan lebih bulan</td>--}}
                                            {{--                                                <td>4</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an16">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>17</td>--}}
                                            {{--                                                <td>Letak sungsang</td>--}}
                                            {{--                                                <td>8</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an17">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>18</td>--}}
                                            {{--                                                <td>Letak lintang</td>--}}
                                            {{--                                                <td>8</td>--}}
                                            {{--                                                <td>II</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an18">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>19</td>--}}
                                            {{--                                                <td>Pendarahan dalam kehamilan ini</td>--}}
                                            {{--                                                <td>8</td>--}}
                                            {{--                                                <td>III</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an19">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            {{--                                            <tr>--}}
                                            {{--                                                <td>20</td>--}}
                                            {{--                                                <td>Pre-eklampsia berat / kejang-kejang</td>--}}
                                            {{--                                                <td>8</td>--}}
                                            {{--                                                <td>III</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    <div class="form-check">--}}
                                            {{--                                                        <div class="checkbox">--}}
                                            {{--                                                            <input type="checkbox" id="checkbox1" name="answer[]"--}}
                                            {{--                                                                   class="form-check-input" value="an20">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
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
