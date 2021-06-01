@extends('admin/layout')
@section('kontenoperator')
    <section class="section">
        <div class="section-body">
            @if ($errors->any())
                <div class="form-group">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info alert-has-icon alert-dismissible">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>x</span>
                                    </button>
                                    <p>{{$error}}</p>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card ml-xl-5 mr-xl-5">
                @if(session('pesan'))
                    <div class="form-group">
                        <div class="alert alert-info alert-has-icon alert-dismissible">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>x</span>
                                </button>
                                <p>{{session('pesan')}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                    <div class="card-header text-center">
                        <h2>Kriteria</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('kriteria')}}" method="POST" data-no-reset="true">
                            @csrf
                            @if (isset($c1))
                                @php
                                    $c11 = json_decode($c1);
                                @endphp
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Penghasilan (C1)  </label>
                                            <select name="w_c1" id="" class="form-control">
                                                <option value="0.2" @if ($c11->weight == 0.2)
                                                    {{ "selected" }} @endif >Sangat Rendah </option>
                                                <option value="0.4" @if ($c11->weight == 0.4)
                                                    {{ "selected" }} @endif>Rendah </option>
                                                <option value="0.6" @if ($c11->weight == 0.6)
                                                    {{ "selected" }} @endif>Sedang </option>
                                                <option value="0.8" @if ($c11->weight == 0.8)
                                                    {{ "selected" }} @endif>Tinggi </option>
                                                <option value="1" @if ($c11->weight == 1)
                                                    {{ "selected" }} @endif>Sangat Tinggi </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Cost/Benefit</label>
                                            <select name="cost_c1" id="" class="form-control">
                                                <option value="0" @if (!$c11->is_cost)
                                                selected
                                                    @endif>Benefit</option>
                                                <option value="1" @if ($c11->is_cost)
                                                selected
                                                    @endif>Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($c2))
                                @php
                                    $c22 = json_decode($c2);
                                @endphp
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Jenis Lantai (C2)  </label>
                                            <select name="w_c2" id="" class="form-control">
                                                <option value="0.2" @if ($c22->weight == 0.2)
                                                    {{ "selected" }} @endif >Sangat Rendah </option>
                                                <option value="0.4" @if ($c22->weight == 0.4)
                                                    {{ "selected" }} @endif>Rendah </option>
                                                <option value="0.6" @if ($c22->weight == 0.6)
                                                    {{ "selected" }} @endif>Sedang </option>
                                                <option value="0.8" @if ($c22->weight == 0.8)
                                                    {{ "selected" }} @endif>Tinggi </option>
                                                <option value="1" @if ($c22->weight == 1)
                                                    {{ "selected" }} @endif>Sangat Tinggi </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Cost/Benefit</label>
                                            <select name="cost_c2" id="" class="form-control">
                                                <option value="0" @if (!$c22->is_cost)
                                                selected
                                                    @endif>Benefit</option>
                                                <option value="1" @if ($c22->is_cost)
                                                selected
                                                    @endif>Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($c3))
                                @php
                                    $c33 = json_decode($c3);
                                @endphp
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Jumlah Anggota Keluarga (C3)  </label>
                                            <select name="w_c3" id="" class="form-control">
                                                <option value="0.2" @if ($c33->weight == 0.2)
                                                    {{ "selected" }} @endif >Sangat Rendah </option>
                                                <option value="0.4" @if ($c33->weight == 0.4)
                                                    {{ "selected" }} @endif>Rendah </option>
                                                <option value="0.6" @if ($c33->weight == 0.6)
                                                    {{ "selected" }} @endif>Sedang </option>
                                                <option value="0.8" @if ($c33->weight == 0.8)
                                                    {{ "selected" }} @endif>Tinggi </option>
                                                <option value="1" @if ($c33->weight == 1)
                                                    {{ "selected" }} @endif>Sangat Tinggi </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Cost/Benefit</label>
                                            <select name="cost_c3" id="" class="form-control">
                                                <option value="0" @if (!$c33->is_cost)
                                                selected
                                                    @endif>Benefit</option>
                                                <option value="1" @if ($c33->is_cost)
                                                selected
                                                    @endif>Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($c4))
                                @php
                                    $c44 = json_decode($c4);
                                @endphp
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Jenis Dinding (C4)  </label>
                                            <select name="w_c4" id="" class="form-control">
                                                <option value="0.2" @if ($c44->weight == 0.2)
                                                    {{ "selected" }} @endif >Sangat Rendah </option>
                                                <option value="0.4" @if ($c44->weight == 0.4)
                                                    {{ "selected" }} @endif>Rendah </option>
                                                <option value="0.6" @if ($c44->weight == 0.6)
                                                    {{ "selected" }} @endif>Sedang </option>
                                                <option value="0.8" @if ($c44->weight == 0.8)
                                                    {{ "selected" }} @endif>Tinggi </option>
                                                <option value="1" @if ($c44->weight == 1)
                                                    {{ "selected" }} @endif>Sangat Tinggi </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Cost/Benefit</label>
                                            <select name="cost_c4" id="" class="form-control">
                                                <option value="0" @if (!$c44->is_cost)
                                                selected
                                                    @endif>Benefit</option>
                                                <option value="1" @if ($c44->is_cost)
                                                selected
                                                    @endif>Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($c5))
                                @php
                                    $c55 = json_decode($c5);
                                @endphp
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Status PHK (C5)  </label>
                                            <select name="w_c5" id="" class="form-control">
                                                <option value="0.2" @if ($c55->weight == 0.2)
                                                    {{ "selected" }} @endif >Sangat Rendah </option>
                                                <option value="0.4" @if ($c55->weight == 0.4)
                                                    {{ "selected" }} @endif>Rendah </option>
                                                <option value="0.6" @if ($c55->weight == 0.6)
                                                    {{ "selected" }} @endif>Sedang </option>
                                                <option value="0.8" @if ($c55->weight == 0.8)
                                                    {{ "selected" }} @endif>Tinggi </option>
                                                <option value="1" @if ($c55->weight == 1)
                                                    {{ "selected" }} @endif>Sangat Tinggi </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Cost/Benefit</label>
                                            <select name="cost_c5" id="" class="form-control">
                                                <option value="0" @if (!$c55->is_cost)
                                                selected
                                                    @endif>Benefit</option>
                                                <option value="1" @if ($c55->is_cost)
                                                selected
                                                    @endif>Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
            </div>
        </div>
    </section>

@endsection
