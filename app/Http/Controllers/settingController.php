<?php

namespace App\Http\Controllers;

use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class settingController extends Controller
{
    public function index(){
        $tmp = Setting::all();
        $d = [];
        foreach($tmp as $option){
            $d[$option->key] = $option->value;
        }
        $data=$d;
        return view('admin.setting',$data);
    }

    public function setKriteria($key,$value,$force){
        $option = Setting::where('key',$key)->first();
        if($option){
            $option->value = $value;
            return $option->save();
        }else if($force){
            $option = new Options();
            $option->key = $key;
            $option->value = $value;
            return $option->save();
        }
    }

    public function  kriteria(Request $request){
        $c1['weight'] = $request->input('w_c1');
        $c1['is_cost'] = $request->input('cost_c1');
        $c2['weight'] = $request->input('w_c2');
        $c2['is_cost'] = $request->input('cost_c2');
        $c3['weight'] = $request->input('w_c3');
        $c3['is_cost'] = $request->input('cost_c3');
        $c4['weight'] = $request->input('w_c4');
        $c4['is_cost'] = $request->input('cost_c4');
        $c5['weight'] = $request->input('w_c5');
        $c5['is_cost'] = $request->input('cost_c5');
        $this->setKriteria('c1',json_encode($c1),true);
        $this->setKriteria('c2',json_encode($c2),true);
        $this->setKriteria('c3',json_encode($c3),true);
        $this->setKriteria('c4',json_encode($c4),true);
        $this->setKriteria('c5',json_encode($c5),true);
        return redirect()->route("setting");
    }
}
