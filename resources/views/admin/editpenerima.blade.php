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
                <form method="post" action="{{route("updating-penerima")}}">
                    @csrf
                    <div class="card-header text-center">
                        <h2>Ubah Data Penerima Baru</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" value="{{$idperiode}}" name="idperiode">
                        </div>
                        <div class="form-group">
                            @foreach($datapenduduk as $id)
                            <div class="form-group">
                                <input type="hidden" value="{{$id->id}}" name="idpenduduk">
                            </div>
                            @endforeach
                            <label>Identitas Penerima</label>
                            @foreach($datapenduduk as $data)


                            <input list="statuslist" name="identitas" class="form-control" placeholder="cari berdasarkan nik / nama" value="{{"NIK: ".$data->id."  ,Nama: ".$data->Nama}}" readonly>
                            <datalist id="statuslist">
                                    <option value="{{$data->id}}">{{"NIK: ".$data->id.",Nama: ".$data->Nama}}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label>Status Diterima</label>
                            <select name="status" id="email" class="form-control" required>
                                    @foreach($data->periode as $pivots)
                                        @if($pivots->id == $idperiode)
                                            <option value="0" @if($pivots->pivot->status == 0){{"selected"}}@endif>belum</option>
                                            <option value="1" @if($pivots->pivot->status == 1){{"selected"}}@endif >sudah</option>
                                        @endif
                                    @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">simpan</button>
                        {{--                                <a href="{{route('operator.index')}}" class="btn btn-warning">cancel</a>--}}
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
