@extends('admin/layout')
@section('kontenoperator')

    <section class="section">
        <div class="section-header">
            <div class="container-fluid">
                <div></div>
                <h1>Halo {{auth()->user()->name}}! </h1>
            </div>
        </div>
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
        <div class="section-body">

            <div class="card">
                <div class="section-header">
                    <div class="container-fluid">
                        <h1>Data Pegawai</h1>
                    </div>
                </div>
                <div class="card-header">
                    <h4>
                        <a href="{{route('create')}}" class="btn btn-primary">
                            +  data baru
                        </a>
                    </h4>
                    <div class="card-header-action">
{{--                        <form method="post" action="{{route('add')}}">--}}
{{--                            @csrf--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="cari" class="form-control" placeholder="cari nama barang/id" required>--}}
{{--                                <div class="input-group-btn">--}}
{{--                                    <button class="btn btn-primary">cari</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>id </th>
                                <th>Jabatan</th>
                                <th>Nama</th>
                                <th>Kedisiplinan</th>
                                <th>Lama Kerja</th>
                                <th>Pendidikan</th>
                                <th>Keahlian</th>
                                <th>StatusPernikahan</th>
                                <th>aksi</th>

                            </tr>
                            @foreach($data as $datapegawai)

                                <tr>
                                    <td>{{$datapegawai->id}}</td>
                                    <td>{{$datapegawai->Jabatan}}</td>
                                    <td>{{$datapegawai->Nama}}</td>
                                    <td>
                                        @if($datapegawai->Kedisiplinan==0.01)
                                            95.0%-96.25%
                                        @elseif($datapegawai->Kedisiplinan==0.333)
                                            96.251% - 97.5%
                                        @elseif($datapegawai->Kedisiplinan==0.667)
                                            97.501% - 98.750%
                                        @elseif($datapegawai->Kedisiplinan==1)
                                            98.751% - 100%
                                        @endif
                                    </td>
                                    <td>
                                        @if($datapegawai->Lamakerja==0.01)
                                            0 tahun - 2tahun
                                        @elseif($datapegawai->Lamakerja==0.25)
                                            2.1 tahun - 4 tahun
                                        @elseif($datapegawai->Lamakerja==0.5)
                                            4.1 tahun - 6.49 tahun
                                        @elseif($datapegawai->Lamakerja==0.75)
                                            6.5 tahun - 8.99 tahun
                                        @elseif($datapegawai->Lamakerja==1)
                                            >= 9 tahun
                                        @endif
                                    </td>
                                    <td>
                                        @if($datapegawai->Pendidikan==0.01)
                                            SMA Sederajat
                                        @elseif($datapegawai->Pendidikan==0.25)
                                            D-III
                                        @elseif($datapegawai->Pendidikan==0.5)
                                            D-IV
                                        @elseif($datapegawai->Pendidikan==0.75)
                                            S1
                                        @elseif($datapegawai->Pendidikan==1)
                                            S2
                                        @endif
                                    </td>
                                    <td>
                                        @if($datapegawai->Keahlian==0.01)
                                            0 kali mengikuti pelatihan
                                        @elseif($datapegawai->Keahlian==0.25)
                                            1 kali mengikuti pelatihan
                                        @elseif($datapegawai->Keahlian==0.5)
                                            2 kali mengikuti pelatihan
                                        @elseif($datapegawai->Keahlian==0.75)
                                            3 kali mengikuti pelatihan
                                        @elseif($datapegawai->Keahlian==1)
                                            lebih dari 3 kali mengikuti pelatihan
                                        @endif
                                    </td>

                                    <td>@if($datapegawai->StatusPernikahan==0.5)
                                            belum
                                        @elseif($datapegawai->StatusPernikahan==1)
                                            sudah
                                        @endif
                                    </td>
                                    <td>
{{--                                        <a href="#"  class="btn btn-success">--}}
{{--                                            detail--}}
{{--                                        </a>--}}
                                        <a href="{{route('update',[$datapegawai->id])}}"  class="btn btn-success">
                                            detail
                                        </a>
{{--                                        <form action="{{route('barangmasuk.destroy',[$a->id])}}" method="POST">--}}
                                        <form action="#" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')" type="submit">hapus</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                            {{$data->links()}}
                    </div>

                </div>
            </div>
{{--            @if($cari1!=null)--}}
{{--                <div class="section-body">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>histori barang masuk---{{$hasil}}</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-0">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-striped">--}}
{{--                                    <tr>--}}
{{--                                        <th>id</th>--}}
{{--                                        <th>id barang</th>--}}
{{--                                        <th>nama</th>--}}
{{--                                        <th>jumlah</th>--}}
{{--                                        <th>harga beli</th>--}}
{{--                                        <th>CreatedAt</th>--}}
{{--                                        <th>Action</th>--}}

{{--                                    </tr>--}}
{{--                                    @if($cari1 != null)--}}
{{--                                        @foreach($cari1 as $a)--}}

{{--                                            <tr>--}}
{{--                                                <td>{{$a->id}}</td>--}}
{{--                                                <td id="idbarang">{{$a->barang_id}} </td>--}}
{{--                                                @foreach($namabarang as $b)--}}
{{--                                                    @if($a->barang_id == $b->id) <td id="namabarang"> {{$b->nama}}  </td>@endif--}}
{{--                                                @endforeach--}}
{{--                                                <td id="pemasok">{{$a->pemasok}}</td>--}}
{{--                                                <td id="hargabeli">{{$a->hargabeli}}</td>--}}
{{--                                                <td id="created_at">{{$a->created_at}}</td>--}}
{{--                                                <td>--}}
{{--                                                    <a href="{{route('barangmasuk.edit',[$a->id])}}"  class="btn btn-success">--}}
{{--                                                        detail--}}
{{--                                                    </a>--}}
{{--                                                    <form action="{{route('barangmasuk.destroy',[$a->id])}}" method="POST">--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        @csrf--}}
{{--                                                        <button class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')" type="submit">hapus</button>--}}
{{--                                                    </form>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}

{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </table>--}}

{{--                            </div>--}}
{{--                            {{$cari1->links()}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

        </div>
    </section>
@endsection
