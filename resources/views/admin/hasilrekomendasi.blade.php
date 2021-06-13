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
                        <h1>Hasil Rekomendasi</h1>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%"
                           cellspacing="0">
                        <thead>
                            <tr>
{{--                                <th>id </th>--}}
                                <th>NIK</th>
                                <th>Nama KK</th>
                                <th>Penghasilan</th>
                                <th>Jenis Lantai</th>
                                <th>Jumlah Anggota Keluarga</th>
                                <th>Jenis Dinding Rumah</th>
                                <th>Status PHK</th>
                                <th>Nilai total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $datapegawai)
                                <tr>
{{--                                    <td>{{$datapegawai['id']}}</td>--}}
{{--                                    <td>{{number_format($num, 2, '.', '')}}</td>--}}
                                    <td>{{$datapegawai['NIK']}}</td>
                                    <td>{{$datapegawai['Nama']}}</td>
                                    <td>{{number_format($datapegawai['Penghasilan'], 2, '.', '')}}</td>
{{--                                    <td>{{$datapegawai['Penghasilan']}}</td>--}}
                                    <td>{{number_format($datapegawai['JenisLantai'], 2, '.', '')}}</td>
{{--                                    <td>{{$datapegawai['JenisLantai']}}</td>--}}
                                    <td>{{number_format($datapegawai['JumlahAnggota'], 2, '.', '')}}</td>
{{--                                    <td>{{$datapegawai['JumlahAnggota']}}</td>--}}
                                    <td>{{number_format($datapegawai['JenisDinding'], 2, '.', '')}}</td>
{{--                                    <td>{{$datapegawai['JenisDinding']}}</td>--}}
                                    <td>{{number_format($datapegawai['StatusPhk'], 2, '.', '')}}</td>
{{--                                    <td>{{$datapegawai['StatusPhk']}}</td>--}}
                                    <td>{{number_format($datapegawai['nilai_preferensi'], 2, '.', '')}}</td>
{{--                                    <td>{{$datapegawai['nilai_preferensi']}}</td>--}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
