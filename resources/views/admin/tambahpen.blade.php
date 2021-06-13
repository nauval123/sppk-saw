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
                <form method="post" action="{{route("tambah-data-penerima")}}">
                    @csrf
                    <div class="card-header text-center">
                        <h2>Data Penerima Baru</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" value="{{$idperiode}}" name="idperiode">
                        </div>
                        <div class="form-group">
                            <label>Identitas Penerima</label>
                            <input list="statuslist" name="identitas" class="form-control" placeholder="cari berdasarkan nik / nama" required>
                            <datalist id="statuslist">
                               @foreach($datapenduduk as $penduduk)
                                    <option value="{{$penduduk->id}}">{{"NIK: ".$penduduk->NIK.",Nama: ".$penduduk->Nama}}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label>Status Diterima</label>
                            <select name="status" id="email" class="form-control" required>
                                <option value="0">belum</option>
                                <option value="1" >sudah</option>
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
