<?php

namespace App\Http\Controllers;

use App\Model\Penduduk;
//use App\Model\Penerima;
use App\Model\Penerima;
use App\Model\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class calonpenerimaController extends Controller
{
    public function index (){
        $periode=Periode::all();
        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query)  {
            return $query->where('periode_id', 1);})->get();
//        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query) use ($id) {
//            return $query->where('id', $id);})->get();
//        $data=Periode::with("penerima")->get();
//        $penduduk= Penerima::whereHas("penduduk")->whereHas("periode")->get();
//        $penduduk=Penerima::where("idPeriode",1)->with(['penduduk'])->get();
//        dd($pivots);
        return view('admin.periode',["data"=>$penduduk,"dataperiode"=>$periode,"dataidperiode"=>1]);
    }

    public function periode(Request $request){
        $periode=Periode::all();
        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query) use ($request)  {
            return $query->where('periode_id', $request->periode);})->get();

        return view('admin.periode',["data"=>$penduduk,"dataperiode"=>$periode,"dataidperiode"=>$request->periode]);
    }

    public function periode2($id){
        $periode=Periode::all();
        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query) use ($id)  {
            return $query->where('periode_id', $id);})->get();

        return view('admin.periode',["data"=>$penduduk,"dataperiode"=>$periode,"dataidperiode"=>$id]);
    }

    public function create($id){
        $datapenduduk=Penduduk::all();
//        dd($datapenduduk);
        return view("admin.tambahpen",["datapenduduk"=>$datapenduduk,"idperiode"=>$id]);
    }

    public function add(Request $request){
//        dd($request);
//      $cek=Penerima::where("penduduk_id",$request->identitas)->where("periode_id",$request->idperiode);
        $cek=Penerima::where([['penduduk_id','=',$request->identitas],['periode_id','=',$request->idperiode]]);
//        dd($cek);

        if(isset($cek)){
          try {
              $pendudukperiode = new Penerima();
              $pendudukperiode->penduduk_id=$request->identitas;
              $pendudukperiode->periode_id=$request->idperiode;
              $pendudukperiode->status=$request->status;
              $pendudukperiode->save();
              return redirect()->route('periode-ke',[$request->idperiode])->with('pesan','data penerima berhasil ditambahkan');
          }
          catch (\Exception $e){
              return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan!']);
          }

      }
      else{
          return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan,Data sudah ada!']);
      }
    }

    public function edit($periode,$id){
//    dd($periode,$id);
        $penduduk=Penduduk::where('id',$id)->with("periode")->whereHas('periode', function ($query) use ($periode)  {
            return $query->where('periode_id', $periode);})->get();
//        dd($penduduk);
        return view('admin.editpenerima',["datapenduduk"=>$penduduk,"idperiode"=>$periode]);
    }

    public function update(Request $request){
        try {
//            dd($request);
            $penerima= Penerima::where([['penduduk_id','=',$request->idpenduduk],['periode_id','=',$request->idperiode]])->first();
//            dd($id);

//        dd($penerima);
            $penerima->status = $request->status;
            $penerima->save();
            return redirect()->route('periode-ke',[$request->idperiode])->with('pesan','data penerima berhasil diubah');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan,error!']);
        }
//        dd($request);
//        $penerima=Penerima::where('penduduk_id',$request->idpenduduk)->where('periode_id',$request->idperiode)->get();
////        dd($penerima);
//        $penerima->status=$request->status;
//        $penerima->save();
    }

    public function tambahperiode(){
        try {
            $periode  = new Periode();
            $periode->created_at=now();
            $periode->save();
            $periodebaru= DB::table('periode')->latest('created_at')->first();
//            dd($periodebaru->id);
            return redirect()->route('periode-ke',[$periodebaru->id])->with('pesan','periode');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['Peringatan', 'Periode gagal ditambahkan']);
        }
    }

}
