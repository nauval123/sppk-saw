@extends('admin/layout')
@section('kontenoperator')
{{--@php(dd($data))--}}
    <section class="section">
        <div class="section-header">
            <div class="container-fluid">
                <div></div>
                <h1>Halo {{auth()->user()->role}} </h1>
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
            <div class="row">
{{--                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">--}}
{{--                    <div class="card-box tilebox-one">--}}
{{--                        <i class="fi-tag float-right"></i>--}}
{{--                        <h6 class="text-muted text-uppercase mb-3">Jumlah Kepala Keluarga</h6>--}}
{{--                        <h4 class="mb-3"><span data-plugin="counterup">10</span></h4>--}}
{{--                        <span class="badge badge-primary"></span>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-box float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Jumlah Orang Ter-PHK</h6>
                        <h4 class="mb-3" data-plugin="counterup">{{$phk}}</h4>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-layers float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Penghasilan dibawah 600 ribu</h6>
                        <h4 class="mb-3"><span data-plugin="counterup">{{$dibawah}}</span></h4>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-layers float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Bantuan yang diterima periode -{{$dataidperiode}}-</h6>
                        <h4 class="mb-3"><span data-plugin="counterup">{{$diterima}}</span></h4>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-layers float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Bantuan yang belum diterima periode -{{$dataidperiode}}-</h6>
                        <h4 class="mb-3"><span data-plugin="counterup">{{$belumditerima}}</span></h4>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    @if(auth()->user()->role == "admin" or auth()->user()->role == "sukarelawan" or auth()->user()->role == "superadmin")
                        <h4>
                            @if(auth()->user()->role == "admin")
                                <a href="{{route('periode-tambah')}}" class="btn btn-primary">
                                    +  periode baru
                                </a>
                            @endif
                        </h4>
                        <h4>
                            @if(auth()->user()->role == "sukarelawan")
                                <a href="{{route('tambah-penerima',[$dataidperiode])}}" class="btn btn-primary">
                                    +  data baru
                                </a>
                            @endif
                        </h4>
                        <form class="card-header-form" method="get" action="{{route("periode-id")}}">
{{--                            @csrf--}}
                            <div class="input-group">
                                <select name="periode" class="custom-select" id="inputGroupSelect04">
                                    @foreach($dataperiode as $periode)
                                        <option value="{{$periode->id}}"  @if($dataidperiode == $periode->id) {{"selected"}}@endif><a href="{{route('periode-id',[$periode->id])}}" class="btn btn-info">
                                                {{'Gelombang '.$periode->id}}
                                            </a>
                                        </option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn-info">cari</button>

                                </div>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th>id </th>
                                <th>NIK</th>
                                <th>Nama KK</th>
                                <th>Penghasilan</th>
                                <th>Jenis Lantai</th>
                                <th>Jumlah Anggota Keluarga</th>
                                <th>Jenis Dinding Rumah</th>
                                <th>Status PHK</th>
                                <th>Status Diterima</th>
                                <th>aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $datapegawai)
                                <tr>
                                    <td>{{$datapegawai->id}}</td>
                                    <td>{{$datapegawai->NIK}}</td>
                                    <td>{{$datapegawai->Nama}}</td>

                                    <td>
                                        @if($datapegawai->Penghasilan==0.0)
                                            lebih dari 1 juta
                                        @elseif($datapegawai->Penghasilan==0.333)
                                            lebih dari 600 ribu - kurang dari 1 juta
                                        @elseif($datapegawai->Penghasilan==0.667)
                                            250 ribu - 600 ribu
                                        @elseif($datapegawai->Penghasilan==1)
                                            dibawah 250 ribu
                                        @endif
                                    </td>
                                    <td>
                                        @if($datapegawai->JenisLantai==0.0)
                                            Granit
                                        @elseif($datapegawai->JenisLantai==0.25)
                                            Keramik
                                        @elseif($datapegawai->JenisLantai==0.5)
                                            Kayu Murah
                                        @elseif($datapegawai->JenisLantai==0.75)
                                            Bambu
                                        @elseif($datapegawai->JenisLantai==1)
                                            tanah
                                        @endif
                                    </td>
                                    <td>
                                        @if($datapegawai->JumlahAnggota==0.0)
                                            1
                                        @elseif($datapegawai->JumlahAnggota==0.25)
                                            2
                                        @elseif($datapegawai->JumlahAnggota==0.5)
                                            3
                                        @elseif($datapegawai->JumlahAnggota==0.75)
                                            4
                                        @elseif($datapegawai->JumlahAnggota==1)
                                            lebih dari 4
                                        @endif
                                    </td>
                                    <td>
                                        @if($datapegawai->JenisDinding==0.0)
                                            Tembok Plester
                                        @elseif($datapegawai->JenisDinding==0.25)
                                            Tembok
                                        @elseif($datapegawai->JenisDinding==0.5)
                                            Kayu Murah
                                        @elseif($datapegawai->JenisDinding==0.75)
                                            Rubia
                                        @elseif($datapegawai->JenisDinding==1)
                                            bambu
                                        @endif
                                    </td>

                                    <td>
                                        @if($datapegawai->StatusPhk==0.5)
                                            <span class="badge badge-primary"> Tidak TerPHK </span>
                                        @elseif($datapegawai->StatusPhk==1)
                                            <span class="badge badge-danger"> PHK </span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($datapegawai->periode as $pivots)
{{--                                            @php(dd($datapegawai->periode))--}}
                                            @if($pivots->id == $dataidperiode)
                                                @if($pivots->pivot->status == 1)
                                                    <span class="badge badge-primary"> Terkirim </span>
                                                @elseif($pivots->pivot->status == 0)
                                                    <span class="badge badge-danger"> Belum Terkirim </span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
{{--                                    <td></td>--}}
                                    <td>
{{--                                        @if($pivots->pivot->periode_id == $dataidperiode)--}}
                                            <a href="{{route('update-penerima',["periode"=>$dataidperiode,'id'=>$pivots->pivot->penduduk_id])}}"  onclick="return confirm('Yakin mengubah status?')" class="btn btn-info">
                                                detail
                                            </a>
{{--                                        @endif--}}

{{--                                        <a href="#"  class="btn btn-success">--}}
{{--                                            detail--}}
{{--                                        </a>--}}
{{--                                        <br>--}}
{{--                                        <form action="{{route('barangmasuk.destroy',[$a->id])}}" method="POST">--}}
{{--                                            <a href="{{route('delete',[$datapegawai->id])}}"  onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger">--}}
{{--                                                hapus--}}
{{--                                            </a>--}}
{{--                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
