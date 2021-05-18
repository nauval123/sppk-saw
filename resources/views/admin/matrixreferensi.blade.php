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
                        <h1>Data Pegawai (Matrik Nilai)</h1>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>id </th>
                            <th>Jabatan</th>
                            <th>Alternatif</th>
                            <th>Kedisiplinan</th>
                            <th>Lama Kerja</th>
                            <th>Pendidikan</th>
                            <th>Keahlian</th>
                            <th>StatusPernikahan</th>
                            <th>Nilai total</th>
                        </tr>
                        @foreach($data as $datapegawai)
                            <tr>
                                <td>{{$datapegawai['id']}}</td>
                                <td>{{$datapegawai['Jabatan']}}</td>
                                <td>{{$datapegawai['Nama']}}</td>
                                <td>{{$datapegawai['Kedisiplinan']}}</td>
                                <td>{{$datapegawai['Lamakerja']}}</td>
                                <td>{{$datapegawai['Pendidikan']}}</td>
                                <td>{{$datapegawai['Keahlian']}}</td>
                                <td>{{$datapegawai['StatusPernikahan']}}</td>
                                <td>{{$datapegawai['nilai_preferensi']}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
