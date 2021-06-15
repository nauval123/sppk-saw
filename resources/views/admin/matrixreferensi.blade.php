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
                        <h1>Data Penduduk (Matrik Nilai)</h1>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Ranking</th>
                            <th>NIK</th>
                            <th>Nama KK</th>
                            <th>Penghasilan</th>
                            <th>Jenis Lantai</th>
                            <th>Jumlah Anggota Keluarga</th>
                            <th>Jenis Dinding Rumah</th>
                            <th>Status PHK</th>
                            <th>Nilai total</th>
                        </tr>
                        @foreach($data as $datapegawai)
                            <tr>
                                <td>{{$datapegawai['ranking']}}</td>
                                <td>{{$datapegawai['NIK']}}</td>
                                <td>{{$datapegawai['Nama']}}</td>
                                <td>{{$datapegawai['Penghasilan']}}</td>
                                <td>{{$datapegawai['JenisLantai']}}</td>
                                <td>{{$datapegawai['JumlahAnggota']}}</td>
                                <td>{{$datapegawai['JenisDinding']}}</td>
                                <td>{{$datapegawai['StatusPhk']}}</td>
                                <td>{{$datapegawai['nilai_preferensi']}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
