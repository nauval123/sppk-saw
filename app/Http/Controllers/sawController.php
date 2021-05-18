<?php

namespace App\Http\Controllers;

use App\Model\Pegawai;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sawController extends Controller
{
    public function index(){
        $data= Pegawai::paginate(10);
        return view('admin.matrixnilai',['data'=>$data]);
    }

    public function normalisasi(){
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
        $data = Pegawai::all();
        $temp_kedisiplinan = [];
        $temp_lamakerja = [];
        $temp_pendidikan = [];
        $temp_keahlian= [];
        $temp_statuspernikahan = [];
        foreach ($data as $datapegawai) {
            $temp_kedisiplinan[] = $datapegawai->Kedisiplinan;
            $temp_lamakerja[] = $datapegawai->Lamakerja;
            $temp_pendidikan[] = $datapegawai->Pendidikan;
            $temp_keahlian[] = $datapegawai->Keahlian;
            $temp_statuspernikahan[] = $datapegawai->StatusPernikahan;
        }
        foreach ($data as $datanormalisasi) {
            $datanormalisasi->Kedisiplinan = ($c1->is_cost) ? min($temp_kedisiplinan)/$datanormalisasi->Kedisiplinan:$datanormalisasi->Kedisiplinan/max($temp_kedisiplinan);
            $datanormalisasi->Lamakerja = ($c2->is_cost) ? min($temp_lamakerja)/$datanormalisasi->Lamakerja: $datanormalisasi->Lamakerja/max($temp_lamakerja);
            $datanormalisasi->Pendidikan= ($c3->is_cost) ? min($temp_pendidikan)/$datanormalisasi->Pendidikan: $datanormalisasi->Pendidikan/max($temp_pendidikan);
            $datanormalisasi->Keahlian = ($c4->is_cost) ? min($temp_keahlian)/$datanormalisasi->l_Keahlian : $datanormalisasi->l_Keahlian/max($temp_keahlian);
            $datanormalisasi->StatusPernikahan= ($c5->is_cost) ? min($temp_statuspernikahan)/$datanormalisasi->StatusPernikahan: $datanormalisasi->StatusPernikahan/max($temp_statuspernikahan);
        }
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
        $data = Pegawai::all();
        $temp_kedisiplinan = [];
        $temp_lamakerja = [];
        $temp_pendidikan = [];
        $temp_keahlian= [];
        $temp_statuspernikahan = [];
        foreach ($data as $datapegawai) {
            $temp_kedisiplinan[] = $datapegawai->Kedisiplinan;
            $temp_lamakerja[] = $datapegawai->Lamakerja;
            $temp_pendidikan[] = $datapegawai->Pendidikan;
            $temp_keahlian[] = $datapegawai->Keahlian;
            $temp_statuspernikahan[] = $datapegawai->StatusPernikahan;
        }
        foreach ($data as $datanormalisasi) {
            $datanormalisasi->Kedisiplinan = ($c1->is_cost) ? min($temp_kedisiplinan)/$datanormalisasi->Kedisiplinan:$datanormalisasi->Kedisiplinan/max($temp_kedisiplinan);
            $datanormalisasi->Lamakerja = ($c2->is_cost) ? min($temp_lamakerja)/$datanormalisasi->Lamakerja: $datanormalisasi->Lamakerja/max($temp_lamakerja);
            $datanormalisasi->Pendidikan= ($c3->is_cost) ? min($temp_pendidikan)/$datanormalisasi->Pendidikan: $datanormalisasi->Pendidikan/max($temp_pendidikan);
            $datanormalisasi->Keahlian = ($c4->is_cost) ? min($temp_keahlian)/$datanormalisasi->l_Keahlian : $datanormalisasi->l_Keahlian/max($temp_keahlian);
            $datanormalisasi->StatusPernikahan= ($c5->is_cost) ? min($temp_statuspernikahan)/$datanormalisasi->StatusPernikahan: $datanormalisasi->StatusPernikahan/max($temp_statuspernikahan);
        }
        return $data;
    }

//    function sorting($a, $b) {
//        return $a['nilai_preferensi'] < $b['nilai_preferensi'];
//    }
    function sorting($data) {
        var_dump($data);
//        usort($data,function ($a,$b){
//            return $a['nilai_preferensi'] < $b['nilai_preferensi'];
//        });
    }

    public function preferensi(){
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
        $datanormalisasi = $this->prosesnormalisasi();
        foreach ($datanormalisasi as $datareferensi) {
            $datareferensi->Kedisiplinan = $datareferensi->Kedisiplinan*$c1->weight;
            $datareferensi->Lamakerja = $datareferensi->Lamakerja*$c2->weight;
            $datareferensi->Pendidikan = $datareferensi->Pendidikan*$c3->weight;
            $datareferensi->Keahlian = $datareferensi->Keahlian*$c4->weight;
            $datareferensi->StatusPernikahan = $datareferensi->StatusPernikahan*$c5->weight;
            $datareferensi->nilai_preferensi = $datareferensi->Kedisiplinan+$datareferensi->Lamakerja+$datareferensi->Pendidikan+$datareferensi->Keahlian+$datareferensi->StatusPernikahan;
        }
        foreach($datanormalisasi as $option){
            $temp_data["Kedisiplinan"] = $option->Kedisiplinan;
            $temp_data["Lamakerja"] = $option->Lamakerja;
            $temp_data["Pendidikan"] = $option->Pendidikan;
            $temp_data["Keahlian"] = $option->Keahlian;
            $temp_data["StatusPernikahan"] = $option->StatusPernikahan;
            $temp_data["nilai_preferensi"] = $option->nilai_preferensi;
        }
//        usort($temp_data,array("sawController","sorting"));
        $this->sorting($temp_data);
        var_dump($temp_data);
//        return view('admin.matrixreferensi',['data'=>$temp_data]);
    }
}
