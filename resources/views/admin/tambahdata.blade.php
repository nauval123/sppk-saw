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
                        <form method="post" action="{{route("add")}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header text-center">
                                <h2>Data  Baru</h2>
                            </div>
                            <div class="card-body">
{{--                                <div class="form-group">--}}
{{--                                    <select  class="form-control" name="id" required>--}}
{{--                                        <option disabled selected value> pilih id </option>--}}
{{--                                        @foreach($barang as $b)--}}
{{--                                        <option value="{{$b->id}}">{{$b->id}}-- {{$b->nama}} </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input name="nik" type="text" class="form-control" placeholder="Masukkan NIK Kepala Keluarga" value="{{old('nik')}}" maxlength="16" required>
                                </div>
                                <div class="form-group">
                                    <label>nama</label>
                                    <input name="nama" type="text"  class="form-control" placeholder="Masukkan Nama Kepala Keluarga" value="{{old('nama')}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Penghasilan</label>
{{--                                    <input name="kedisiplinan" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                    <select name="penghasilan"  class="form-control" required>
{{--                                        <option value="1">95.0%-96.25%</option>--}}
{{--                                        <option value="2">96.251% - 97.5%</option>--}}
{{--                                        <option value="3" >97.501% - 98.750%</option>--}}
{{--                                        <option value="4">98.751% - 100%</option>--}}
                                        <option value="0.0">lebih dari 1 juta</option>
                                        <option value="0.333"> lebih dari 600 ribu - kurang dari 1 juta</option>
                                        <option value="0.667" >250 ribu - 600 ribu</option>
                                        <option value="1">dibawah 250 ribu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Lantai</label>
{{--                                    <input name="lamakerja" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                    <select name="jenislantai" id="email" class="form-control" required>
{{--                                        <option value="1">0 tahun - 2tahun</option>--}}
{{--                                        <option value="2">2.1 tahun - 4 tahun</option>--}}
{{--                                        <option value="3" >4.1 tahun - 6.49 tahun</option>--}}
{{--                                        <option value="4">6.5 tahun - 8.99 tahun</option>--}}
{{--                                        <option value="5" > >= 9 tahun</option>--}}
                                        <option value="0.0">Granit</option>
                                        <option value="0.25">Keramik</option>
                                        <option value="0.5" >Kayu Murah</option>
                                        <option value="0.75">Bambu</option>
                                        <option value="1" > tanah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Anggota Keluarga</label>
{{--                                    <input name="pendidikan" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                    <select name="jumlahanggota" id="email" class="form-control" required>
{{--                                        <option value="1">SMA Sederajat</option>--}}
{{--                                        <option value="2">D-III</option>--}}
{{--                                        <option value="3" >D-IV</option>--}}
{{--                                        <option value="4">S1</option>--}}
{{--                                        <option value="5" >S2</option>--}}
                                        <option value="0.0">1</option>
                                        <option value="0.25">2</option>
                                        <option value="0.5" >3</option>
                                        <option value="0.75">4</option>
                                        <option value="1" >lebih dari 4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Dinding</label>
{{--                                    <input name="keahlian" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                    <select name="jenisdinding" id="email" class="form-control" required>
{{--                                        <option value="1">0 kali mengikuti pelatihan</option>--}}
{{--                                        <option value="2">1 kali mengikuti pelatihan</option>--}}
{{--                                        <option value="3" >2 kali mengikuti pelatihan</option>--}}
{{--                                        <option value="4">3 kali mengikuti pelatihan</option>--}}
{{--                                        <option value="5" >lebih dari 3 kali mengikuti pelatihan</option>--}}
                                        <option value="0.0">Tembok Plester</option>
                                        <option value="0.25">Tembok</option>
                                        <option value="0.5" >Kayu Murah</option>
                                        <option value="0.75">Rubia</option>
                                        <option value="1" >bambu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Ter-PHK</label>
{{--                                    <input name="kedisiplinan" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                    <select name="statusphk" id="email" class="form-control" required>
{{--                                        <option value="1">belum</option>--}}
{{--                                        <option value="2" >sudah</option>--}}
                                        <option value="0.5">Tidak TerPHK</option>
                                        <option value="1" >PHK</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Upload File Berkas </label>
                                    <input type="file" class="form-control" name="berkas">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-success">simpan</button>
{{--                                <a href="{{route('operator.index')}}" class="btn btn-warning">cancel</a>--}}
                                <a href="{{route('dashboard')}}"   class="btn btn-primary">
                                    kembali
                                </a>
                            </div>
                        </form>
                    </div>
        </div>
        </section>

@endsection
