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
                        <h1>Data Penduduk Desa (Matrik Nilai)</h1>
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>id </th>
                                <th>NIK</th>
                                <th>Nama KK</th>
                                <th>Penghasilan</th>
                                <th>Jenis Lantai</th>
                                <th>Jumlah Anggota Keluarga</th>
                                <th>Jenis Dinding Rumah</th>
                                <th>Status PHK</th>

                            </tr>
                            @foreach($data as $datapenduduk)
                                <tr>
                                    <td>{{$datapenduduk->id}}</td>
                                    <td>{{$datapenduduk->NIK}}</td>
                                    <td>{{$datapenduduk->Nama}}</td>
                                    <td>{{number_format($datapenduduk->Penghasilan, 2, '.', '')}}</td>
                                    {{--                                    <td>{{$datapenduduk->Penghasilan}}</td>--}}
                                    <td>{{number_format($datapenduduk->JenisLantai, 2, '.', '')}}</td>
                                    {{--                                    <td>{{$datapenduduk->JenisLantai}}</td>--}}
                                    <td>{{number_format($datapenduduk->JumlahAnggota, 2, '.', '')}}</td>
                                    {{--                                    <td>{{$datapenduduk->JumlahAnggota}}</td>--}}
                                    <td>{{number_format($datapenduduk->JenisDinding, 2, '.', '')}}</td>
                                    {{--                                    <td>{{$datapenduduk->JenisDinding}}</td>--}}
                                    <td>{{number_format($datapenduduk->StatusPhk, 2, '.', '')}}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{$data->links()}}
                    </div>
                </div>
            </div>
    </section>
@endsection
