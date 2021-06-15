<?php

namespace App\Http\Controllers;

use App\Model\Penduduk;
//use App\Model\Penerima;
use App\Model\Penerima;
use App\Model\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class calonpenerimaController extends Controller
{
    public function index (){
        $periode=Periode::all();
        $dibawah=Penduduk::where('Penghasilan','<=','0.5')->with("penerima")->whereHas('penerima', function ($query)  {
            return $query->where('periode_id', 1);})->count();
        $phk=Penduduk::where('StatusPhk','1')->with("penerima")->whereHas('penerima', function ($query)  {
            return $query->where('periode_id', 1);})->count();
        $diterima=Penduduk::with("penerima")->whereHas('penerima', function ($query)  {
            return $query->where([['status','=','1'],['periode_id','=',1]]);})->count();
        $belumditerima=Penduduk::with("penerima")->whereHas('penerima', function ($query)  {
            return $query->where([['status','=','0'],['periode_id','=',1]]);})->count();
//        dd($dibawah,$phk,$diterima,$belumditerima);
        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query)  {
            return $query->where('periode_id', 1);})->get();
//        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query) use ($id) {
//            return $query->where('id', $id);})->get();
//        $data=Periode::with("penerima")->get();
//        $penduduk= Penerima::whereHas("penduduk")->whereHas("periode")->get();
//        $penduduk=Penerima::where("idPeriode",1)->with(['penduduk'])->get();
//        dd($pivots);
        return view('admin.periode',["data"=>$penduduk,"dataperiode"=>$periode,"dataidperiode"=>1,'phk'=>$phk,"diterima"=>$diterima,"belumditerima"=>$belumditerima,"dibawah"=>$dibawah]);
    }

    public function periode(Request $request){
        $periode=Periode::all();
        $dibawah=Penduduk::where('Penghasilan','<=','0.5')->with("penerima")->whereHas('penerima', function ($query) use ($request) {
            return $query->where('periode_id', $request->periode);})->count();
        $phk=Penduduk::where('StatusPhk','1')->with("penerima")->whereHas('penerima', function ($query) use ($request) {
            return $query->where('periode_id', $request->periode);})->count();
        $diterima=Penduduk::with("penerima")->whereHas('penerima', function ($query) use ($request) {
            return $query->where([['status','=','1'],['periode_id','=',$request->periode]]);})->count();
        $belumditerima=Penduduk::with("penerima")->whereHas('penerima', function ($query) use ($request) {
            return $query->where([['status','=','0'],['periode_id','=',$request->periode]]);})->count();
//        dd($dibawah,$phk,$diterima,$belumditerima);
        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query) use ($request)  {
            return $query->where('periode_id', $request->periode);})->get();

        return view('admin.periode',["data"=>$penduduk,"dataperiode"=>$periode,"dataidperiode"=>$request->periode,'phk'=>$phk,"diterima"=>$diterima,"belumditerima"=>$belumditerima,"dibawah"=>$dibawah]);
    }

    public function periode2($id){
        $periode=Periode::all();
        $dibawah=Penduduk::where('Penghasilan','<=','0.5')->with("penerima")->whereHas('penerima', function ($query) use ($id) {
            return $query->where('periode_id', $id);})->count();
        $phk=Penduduk::where('StatusPhk','1')->with("penerima")->whereHas('penerima', function ($query) use ($id) {
            return $query->where('periode_id', $id);})->count();
        $diterima=Penduduk::with("penerima")->whereHas('penerima', function ($query) use ($id) {
            return $query->where([['status','=','1'],['periode_id','=',$id]]);})->count();
        $belumditerima=Penduduk::with("penerima")->whereHas('penerima', function ($query) use ($id) {
            return $query->where([['status','=','0'],['periode_id','=',$id]]);})->count();
//        dd($dibawah,$phk,$diterima,$belumditerima);
        $penduduk=Penduduk::with("periode")->whereHas('periode', function ($query) use ($id)  {
            return $query->where('periode_id', $id);})->get();

        return view('admin.periode',["data"=>$penduduk,"dataperiode"=>$periode,"dataidperiode"=>$id,'phk'=>$phk,"diterima"=>$diterima,"belumditerima"=>$belumditerima,"dibawah"=>$dibawah]);
    }

    public function create($id){
        $datapenduduk=Penduduk::all();
//        dd($datapenduduk);
        return view("admin.tambahpen",["datapenduduk"=>$datapenduduk,"idperiode"=>$id]);
    }

    public function add(Request $request){
//        dd($request);
//      $cek=Penerima::where("penduduk_id",$request->identitas)->where("periode_id",$request->idperiode);
        $cek=Penerima::where([['penduduk_id','=',$request->identitas],['periode_id','=',$request->idperiode]])->get();
//        dd(isset($cek),$cek);

        if(isset($cek)){
          try {
              $request->validate([
                  'bukti' => 'file|between:0,2048|mimes:png,jpg,jpeg',
              ]);
              $fileType = $request->file('bukti')->extension();
              $name = Str::random(4) ."-".$request->identitas.$request->idperiode.'.' . $fileType;
              Storage::putFileAs('public/bukti', $request->file('bukti'), $name);
              $pendudukperiode = new Penerima();
              $pendudukperiode->penduduk_id=$request->identitas;
              $pendudukperiode->periode_id=$request->idperiode;
              $pendudukperiode->status=$request->status;
              $pendudukperiode->bukti=$name;
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
        $bukti=Penerima::where([['penduduk_id','=',$id],['periode_id','=',$periode]])->get("bukti");
        return view('admin.editpenerima',["datapenduduk"=>$penduduk,"idperiode"=>$periode,"bukti"=>$bukti]);
    }

    public function update(Request $request){
//        dd($request);
        $request->validate([
            'bukti' => 'file|between:0,2048|mimes:png,jpg,jpeg',
        ]);
//        try {
            if ($request->has("bukti")){
                $fileType = $request->file('bukti')->extension();
                $name = Str::random(4) ."-".$request->identitas.$request->idperiode.'.' . $fileType;
                Storage::putFileAs('public/bukti', $request->file('bukti'), $name);
                $penerima= Penerima::where([['penduduk_id','=',$request->idpenduduk],['periode_id','=',$request->idperiode]])->first();
                $penerima->status = $request->status;
                $penerima->bukti = $name;
                $penerima->save();
                return redirect()->route('periode-ke',[$request->idperiode])->with('pesan','data penerima berhasil diubah');
            }
            $penerima= Penerima::where([['penduduk_id','=',$request->idpenduduk],['periode_id','=',$request->idperiode]])->first();
            $penerima->status = $request->status;
            $penerima->save();
            return redirect()->route('periode-ke',[$request->idperiode])->with('pesan','data penerima berhasil diubah');
//        }
//        catch (\Exception $e){
//            dd($e);
//            return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan,error!']);
//        }
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
