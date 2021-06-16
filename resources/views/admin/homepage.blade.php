@extends('admin/layout')
@section('kontenoperator')

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
        <div class="section-body">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-tag float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Jumlah Kepala Keluarga</h6>
                        <h4 class="mb-3"><span data-plugin="counterup">{{$jumlahpenduduk}}</span></h4>
                        <span class="badge badge-primary"></span>
                    </div>
                </div>

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
                        <h4 class="mb-3"><span data-plugin="counterup">{{$upah}}</span></h4>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    @if(auth()->user()->role == "admin")
                    <h4>
                        <a href="{{route('create')}}" class="btn btn-primary">
                            +  data baru
                        </a>
                    </h4>
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

                                    <td>@if($datapegawai->StatusPhk==0.5)
                                            <span class="badge badge-primary"> Tidak TerPHK </span>
                                        @elseif($datapegawai->StatusPhk==1)
                                            <span class="badge badge-danger"> PHK </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('update',[$datapegawai->id])}}"  class="btn btn-success">
                                            detail
                                        </a>
                                        <br>
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
