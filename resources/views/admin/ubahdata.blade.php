@extends('admin/layout')
@section('kontenoperator')
    @if(isset($data))
{{--        @php--}}
{{--        var_dump($data)--}}
{{--        @endphp--}}
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
                    @foreach($data as $datas)
                    <form method="post" action="{{route("edit")}}">
                        @csrf
                        <div class="card-header text-center">
                            <h2>Data Pegawai Baru</h2>
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
                                <label>Jabatan</label>
                                <input name="jabatan" type="text" class="form-control" placeholder="masukkan jabatan" value="{{$datas->Jabatan}}" required>
                            </div>
                            <div class="form-group">
                                <label>nama</label>
                                <input name="nama" type="text"  class="form-control" placeholder="masukkan nama" value="{{$datas->Nama}}" required>
                            </div>
                            <div class="form-group">
                                <label>Kedisiplinan</label>
                                {{--                                    <input name="kedisiplinan" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                <select name="kedisiplinan"  class="form-control" required>
                                    {{--                                        <option value="1">95.0%-96.25%</option>--}}
                                    {{--                                        <option value="2">96.251% - 97.5%</option>--}}
                                    {{--                                        <option value="3" >97.501% - 98.750%</option>--}}
                                    {{--                                        <option value="4">98.751% - 100%</option>--}}
                                    <option value="0.0"  @if($datas->Kedisiplinan==0.0){{"selected"}}@endif>95.0%-96.25%</option>
                                    <option value="0.333" @if($datas->Kedisiplinan==0.333){{"selected"}}@endif>96.251% - 97.5%</option>
                                    <option value="0.667" @if($datas->Kedisiplinan==0.667){{"selected"}}@endif  >97.501% - 98.750%</option>
                                    <option value="1" @if($datas->Kedisiplinan==1){{"selected"}}@endif>98.751% - 100%</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>lamakerja</label>
                                {{--                                    <input name="lamakerja" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                <select name="lamakerja" id="email" class="form-control" required>
                                    {{--                                        <option value="1">0 tahun - 2tahun</option>--}}
                                    {{--                                        <option value="2">2.1 tahun - 4 tahun</option>--}}
                                    {{--                                        <option value="3" >4.1 tahun - 6.49 tahun</option>--}}
                                    {{--                                        <option value="4">6.5 tahun - 8.99 tahun</option>--}}
                                    {{--                                        <option value="5" > >= 9 tahun</option>--}}
                                    <option value="0.0" @if($datas->Lamakerja==0.0){{"selected"}}@endif>0tahun - 2tahun</option>
                                    <option value="0.25" @if($datas->Lamakerja==0.25){{"selected"}}@endif>2.1 tahun - 4 tahun</option>
                                    <option value="0.5" @if($datas->Lamakerja==0.5){{"selected"}}@endif >4.1 tahun - 6.49 tahun</option>
                                    <option value="0.75" @if($datas->Lamakerja==0.75){{"selected"}}@endif>6.5 tahun - 8.99 tahun</option>
                                    <option value="1" @if($datas->Lamakerja==1){{"selected"}}@endif> >= 9 tahun</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>pendidikan</label>
                                {{--                                    <input name="pendidikan" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                <select name="pendidikan" id="email" class="form-control" required>
                                    {{--                                        <option value="1">SMA Sederajat</option>--}}
                                    {{--                                        <option value="2">D-III</option>--}}
                                    {{--                                        <option value="3" >D-IV</option>--}}
                                    {{--                                        <option value="4">S1</option>--}}
                                    {{--                                        <option value="5" >S2</option>--}}
                                    <option value="0.0" @if($datas->Pendidikan==0.0){{"selected"}}@endif>SMA Sederajat</option>
                                    <option value="0.25" @if($datas->Pendidikan==0.25){{"selected"}}@endif>D-III</option>
                                    <option value="0.5" @if($datas->Pendidikan==0.5){{"selected"}}@endif>D-IV</option>
                                    <option value="0.75" @if($datas->Pendidikan==0.75){{"selected"}}@endif>S1</option>
                                    <option value="1" @if($datas->Pendidikan==1){{"selected"}}@endif>S2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>keahlian</label>
                                {{--                                    <input name="keahlian" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                <select name="keahlian" id="email" class="form-control" required>
                                    {{--                                        <option value="1">0 kali mengikuti pelatihan</option>--}}
                                    {{--                                        <option value="2">1 kali mengikuti pelatihan</option>--}}
                                    {{--                                        <option value="3" >2 kali mengikuti pelatihan</option>--}}
                                    {{--                                        <option value="4">3 kali mengikuti pelatihan</option>--}}
                                    {{--                                        <option value="5" >lebih dari 3 kali mengikuti pelatihan</option>--}}
                                    <option value="0.0" @if($datas->Keahlian==0.0){{"selected"}}@endif>0</option>
                                    <option value="0.25" @if($datas->Keahlian==0.25){{"selected"}}@endif>1</option>
                                    <option value="0.5" @if($datas->Keahlian==0.5){{"selected"}}@endif>2</option>
                                    <option value="0.75" @if($datas->Keahlian==0.75){{"selected"}}@endif>3</option>
                                    <option value="1"  @if($datas->Keahlian==1){{"selected"}}@endif>lebih dari 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>statuspernikahan</label>
                                {{--                                    <input name="kedisiplinan" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                                <select name="statuspernikahan" id="email" class="form-control" required>
                                    {{--                                        <option value="1">belum</option>--}}
                                    {{--                                        <option value="2" >sudah</option>--}}
                                    <option value="0.5" @if($datas->StatusPernikahan==0.5){{"selected"}}@endif>belum</option>
                                    <option value="1" @if($datas->StatusPernikahan==1){{"selected"}}@endif>sudah</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success">simpan</button>
                            {{--                                <a href="{{route('operator.index')}}" class="btn btn-warning">cancel</a>--}}
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
