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
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{route('create-akun')}}" class="btn btn-primary">
                            +  data akun
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th>id </th>
                                <th>nama</th>
                                <th>email</th>
                                <th>Role</th>
                                <th>aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $datapegawai)
                                <tr>
                                    <td>{{$datapegawai->id}}</td>
                                    <td>{{$datapegawai->name}}</td>
                                    <td>{{$datapegawai->email}}</td>
                                    <td>{{$datapegawai->role}}</td>
                                    <td>
                                        <a href="{{route('update-akun',[$datapegawai->id])}}"  class="btn btn-success">
                                            detail
                                        </a>
                                        <br>
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
