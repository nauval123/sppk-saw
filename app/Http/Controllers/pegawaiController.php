<?php

namespace App\Http\Controllers;

use App\Model\Pegawai;
use http\Params;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\Parameter;
use mysql_xdevapi\Exception;

class pegawaiController extends Controller
{
    public function index(){
        $data= Pegawai::paginate(10);
        return view('admin.homepage',['data'=>$data]);
    }

    public function createpage(){
        return view('admin.tambahdata');
    }


    public function store(Request $request){
        try {
            $temp_kedisiplinan=floatval($request->kedisiplinan);
            $temp_lamakerja= floatval($request->lamakerja);
            $temp_pendidikan=floatval($request->pendidikan);
            $temp_keahlian= floatval($request->keahlian);
            $temp_statuspernikahan= floatval($request->statuspernikahan);
//            var_dump($temp_lamakerja);
            $pegawai = new Pegawai();
            $pegawai->Jabatan = $request->jabatan;
            $pegawai->Nama = $request->nama;
            $pegawai->Kedisiplinan = $temp_kedisiplinan;
            $pegawai->Lamakerja = $temp_lamakerja;
            $pegawai->Pendidikan = $temp_pendidikan;
            $pegawai->Keahlian = $temp_keahlian;
            $pegawai->StatusPernikahan = $temp_statuspernikahan;
            $pegawai->save();
            return redirect()->route('dashboard')->with('pesan','data berhasil ditambahkan');

        }catch (Exception $e){
            return redirect()->route('dashboard')->withInput('pesan','barang gagal ditambahkan');
        }
    }

    public function updatepage($id){
        $data=Pegawai::where('id',$id)->get();
//        var_dump($data);
        return view('admin.ubahdata',['data'=>$data]);
    }

    public function edit(Request $request){
        try {
            $temp_kedisiplinan=floatval($request->kedisiplinan);
            $temp_lamakerja= floatval($request->lamakerja);
            $temp_pendidikan=floatval($request->pendidikan);
            $temp_keahlian= floatval($request->keahlian);
            $temp_statuspernikahan= floatval($request->statuspernikahan);
            $pegawai=Pegawai::find($request->id);
            if($pegawai){
                $pegawai->Jabatan = $request->jabatan;
                $pegawai->Nama = $request->nama;
                $pegawai->Kedisiplinan = $temp_kedisiplinan;
                $pegawai->Lamakerja = $temp_lamakerja;
                $pegawai->Pendidikan = $temp_pendidikan;
                $pegawai->Keahlian = $temp_keahlian;
                $pegawai->StatusPernikahan = $temp_statuspernikahan;
                $pegawai->save();
            }
            return redirect()->route('dashboard')->with('pesan','data berhasil diubah');
        }catch (Exception $e){
            return redirect()->route('dashboard')->withInput('pesan','barang gagal ditambahkan');
        }
    }

    public function delete(){

    }
}
