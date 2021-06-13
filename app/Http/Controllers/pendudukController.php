<?php

namespace App\Http\Controllers;

use App\Model\Penduduk;
use App\Model\Penerima;
use http\Params;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\Parameter;
use mysql_xdevapi\Exception;

class pendudukController extends Controller
{
    public function index(){
        $dibawah= Penduduk::where('Penghasilan','<=','0.5')->count();
        $data=Penduduk::all();
        $jumlahpenduduk=Penduduk::all()->count();
        $phk=Penduduk::where('StatusPhk','1')->count();

        return view('admin.homepage',['data'=>$data,'jumlahpenduduk'=>$jumlahpenduduk,'phk'=>$phk,'upah'=>$dibawah]);
    }

    public function createpage(){
        return view('admin.tambahdata');
    }


    public function store(Request $request){
        try {
            if(is_numeric($request->nik) && strlen($request->nik)==16 ){
                $temp_penghasilan=floatval($request->penghasilan);
                $temp_jumlahanggota= floatval($request->jumlahanggota);
                $temp_jenislantai=floatval($request->jenislantai);
                $temp_jenisdinding= floatval($request->jenisdinding);
                $temp_statusphk= floatval($request->statusphk);
//            var_dump($temp_lamakerja);

                Penduduk::create([
                    "NIK" => $request->nik,
                "Nama" => $request->nama,
                "JumlahAnggota" => $temp_jumlahanggota,
                "JenisLantai" => $temp_jenislantai,
                "JenisDinding" => $temp_jenisdinding,
                "Penghasilan" => $temp_penghasilan,
                "StatusPhk" => $temp_statusphk,
                ]);
//                $penduduk = new Penduduk();
//                $penduduk->NIK = $request->nik;
//                $penduduk->Nama = $request->nama;
//                $penduduk->JumlahAnggota = $temp_jumlahanggota;
//                $penduduk->JenisLantai = $temp_jenislantai;
//                $penduduk->JenisDinding = $temp_jenisdinding;
//                $penduduk->Penghasilan = $temp_penghasilan;
//                $penduduk->StatusPhk = $temp_statusphk;
////                $penduduk->penerima()->status=0;
//                $penduduk->save();

                return redirect()->route('dashboard')->with('pesan','data berhasil ditambahkan');
            }
            else{
                return redirect()->back()->withErrors(['Peringatan', 'NIK hanya diisi dengan angka!']);

            }

        }catch (Exception $e){
            return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan!']);
        }
    }

    public function updatepage($id){
        $data=Penduduk::where('id',$id)->get();
//        var_dump($data);
        return view('admin.ubahdata',['data'=>$data]);
    }

    public function edit(Request $request){
        try {
            if(is_numeric($request->nik ) && strlen($request->nik)==16 ){
                $temp_penghasilan=floatval($request->penghasilan);
                $temp_jumlahanggota= floatval($request->jumlahanggota);
                $temp_jenislantai=floatval($request->jenislantai);
                $temp_jenisdinding= floatval($request->jenisdinding);
                $temp_statusphk= floatval($request->statusphk);
                $penduduk=Penduduk::find($request->id);
                if($penduduk){
                    $penduduk->NIK = $request->nik;
                    $penduduk->Nama = $request->nama;
                    $penduduk->JumlahAnggota = $temp_jumlahanggota;
                    $penduduk->JenisLantai = $temp_jenislantai;
                    $penduduk->JenisDinding = $temp_jenisdinding;
                    $penduduk->Penghasilan = $temp_penghasilan;
                    $penduduk->StatusPhk = $temp_statusphk;
                    $penduduk->save();
                }
                return redirect()->route('dashboard')->with('pesan','data berhasil diubah');
            }
            else{
//                return redirect()->back()->with('pesan','NIK hanya diisi dengan angka');
                return redirect()->back()->withErrors(['Peringatan', 'NIK hanya diisi dengan angka']);
            }

        }catch (Exception $e){
            return redirect()->back()->withErrors(['Peringatan', 'data gagal ditambahkan!']);
        }
    }

    public function delete($id){
        try {
            $penduduk=Penduduk::where('id',$id);
            $penduduk->delete();
            $penerima=Penerima::where('penduduk_id',$id);
            $penerima->delete();
//            dd($penerima);
            return redirect()->route('dashboard')->with('pesan','data berhasil terhapus');
        }catch (Exception  $e){
            return redirect()->withErrors(['Peringatan', 'gagal di hapus!']);
        }

    }


}
