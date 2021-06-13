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
                <form method="post" action="{{route("edit-akun")}}">
                    @csrf
                    <div class="card-header text-center">
                        <h2>Tambah Akun Baru</h2>
                    </div>
                    @foreach($data as $dataakun)
                    <div class="card-body">
                        <input type="hidden" value="{{$dataakun->id}}" name="id">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" type="text"  class="form-control" placeholder="Masukkan Nama Kepala Keluarga" value="{{$dataakun->name}}" required>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input name="password" type="password" class="form-control" placeholder="jika tidak ada perubahan bisa dikosongkan">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Masukkan NIK Kepala Keluarga" value="{{$dataakun->email}}" maxlength="16" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            {{--                                    <input name="kedisiplinan" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>--}}
                            <select name="role" id="email" class="form-control" required>
                                {{--                                        <option value="1">belum</option>--}}
                                {{--                                        <option value="2" >sudah</option>--}}
                                <option value="admin" @if($dataakun->role == "admin") selected @endif>Admin</option>
                                <option value="sukarelawan" @if($dataakun->role == "sukarelawan") selected @endif>Sukarelawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">simpan perubahan</button>
                        <a href="{{route('data-akun')}}"   class="btn btn-primary">
                            kembali
                        </a>
                        {{--                                <a href="{{route('operator.index')}}" class="btn btn-warning">cancel</a>--}}
                        <a href="{{route('delete-akun',[$dataakun->id])}}"  onclick="return confirm('Yakin menghapus akun ini?')" class="btn btn-danger">
                            hapus
                        </a>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </section>

@endsection
