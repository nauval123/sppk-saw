<?php

namespace App\Http\Controllers;

use App\Model\Penduduk;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sawController extends Controller
{
    public function index(){
        $data= Penduduk::paginate(10);
        return view('admin.matrixnilai',['data'=>$data]);
    }

    public function normalisasi(){
        $data=$this->prosesnormalisasi();
        return view('admin.matrixnormalisasi',['data'=>$data]);
    }

    public function prosesnormalisasi(){
        $tmp = Setting::all();
        $d = [];
        foreach($tmp as $settings){
            $d[$settings->key] = $settings->value;
        }
        $kriteria =$d;
        $c1 = json_decode($kriteria['c1']);
        $c2 = json_decode($kriteria['c2']);
        $c3 = json_decode($kriteria['c3']);
        $c4 = json_decode($kriteria['c4']);
        $c5 = json_decode($kriteria['c5']);
        $data = Penduduk::all();
        $temp_penghasilan=[];
        $temp_jumlahanggota= [];
        $temp_jenislantai=[];
        $temp_jenisdinding=[];
        $temp_statusphk=[];
        foreach ($data as $datapenduduk) {
            $temp_penghasilan[] = $datapenduduk->Penghasilan;
            $temp_jumlahanggota[] = $datapenduduk->JumlahAnggota;
            $temp_jenisdinding[] = $datapenduduk->JenisDinding;
            $temp_jenislantai[] = $datapenduduk->JenisLantai;
            $temp_statusphk[] = $datapenduduk->StatusPhk;
        }
        foreach ($data as $datanormalisasi) {
            $datanormalisasi->Penghasilan = ($c1->is_cost) ? min($temp_penghasilan)/$datanormalisasi->Penghasilan:$datanormalisasi->Penghasilan/max($temp_penghasilan);
            $datanormalisasi->JenisLantai = ($c2->is_cost) ? min($temp_jenislantai)/$datanormalisasi->JenisLantai: $datanormalisasi->JenisLantai/max($temp_jenislantai);
            $datanormalisasi->JumlahAnggota= ($c3->is_cost) ? min($temp_jumlahanggota)/$datanormalisasi->JumlahAnggota: $datanormalisasi->JumlahAnggota/max($temp_jumlahanggota);
            $datanormalisasi->JenisDinding = ($c4->is_cost) ? min($temp_jenisdinding)/$datanormalisasi->JenisDinding : $datanormalisasi->JenisDinding/max($temp_jenisdinding);
            $datanormalisasi->StatusPhk= ($c5->is_cost) ? min($temp_statusphk)/$datanormalisasi->StatusPhk: $datanormalisasi->StatusPhk/max($temp_statusphk);
        }
        return $data;
    }

    function sorting($a, $b) {
        return $a['nilai_preferensi'] < $b['nilai_preferensi'];
    }

    function  prosespreferensi(){
        $tmp = Setting::all();
        $d = [];
        foreach($tmp as $option){
            $d[$option->key] = $option->value;
        }
        $tmpdata=$d;
        $c1 = json_decode($tmpdata['c1']);
        $c2 = json_decode($tmpdata['c2']);
        $c3 = json_decode($tmpdata['c3']);
        $c4 = json_decode($tmpdata['c4']);
        $c5 = json_decode($tmpdata['c5']);
        $temp_data=[];
        $datapref=[];
        $datanormalisasi = $this->prosesnormalisasi();
        foreach ($datanormalisasi as $datareferensi) {
            $datareferensi->Penghasilan = $datareferensi->Penghasilan*$c1->weight;
            $datareferensi->JenisLantai = $datareferensi->JenisLantai*$c2->weight;
            $datareferensi->JumlahAnggota = $datareferensi->JumlahAnggota*$c3->weight;
            $datareferensi->JenisDinding = $datareferensi->JenisDinding*$c4->weight;
            $datareferensi->StatusPhk = $datareferensi->StatusPhk*$c5->weight;
            $datareferensi->nilai_preferensi = $datareferensi->Penghasilan+$datareferensi->JenisLantai+$datareferensi->JumlahAnggota+$datareferensi->JenisDinding+$datareferensi->StatusPhk;
        }
        foreach($datanormalisasi as $option){
            $temp_data["id"] = $option->id;
            $temp_data["NIK"] = $option->NIK;
            $temp_data["Nama"] = $option->Nama;
            $temp_data["Penghasilan"] = $option->Penghasilan;
            $temp_data["JenisLantai"] = $option->JenisLantai;
            $temp_data["JumlahAnggota"] = $option->JumlahAnggota;
            $temp_data["JenisDinding"] = $option->JenisDinding;
            $temp_data["StatusPhk"] = $option->StatusPhk;
            $temp_data["nilai_preferensi"] = $option->nilai_preferensi;
            array_push($datapref,$temp_data);
        }
        return $datapref;
    }

    public function hasilrekomendasi(){
        $datapreferensi=$this->prosespreferensi();
        return view('admin.hasilrekomendasi',["data"=>$datapreferensi]);
    }

    public function preferensi(){
        $datapreferensi=$this->prosespreferensi();
        usort($datapreferensi,array('App\Http\Controllers\sawController',"sorting"));
        return view('admin.matrixreferensi',["data"=>$datapreferensi]);
    }

}
