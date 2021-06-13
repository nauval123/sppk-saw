<?php

namespace App\Http\Controllers;

use App\Model\Penerima;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class akunController extends Controller
{
    public function index(){
        $dataakun=User::where("role","admin")->orWhere("role","sukarelawan")->get();
//        dd($dataakun);
        return view("admin.akun",['data'=>$dataakun]);
    }

    public function data(){

    }

    public function create(){
        return view("admin.tambahakun");
    }

    public function store(Request $request){
        $request->validate([
            "nama" => "required",
            "email" => "required|string|unique:users",
            "password" => "required|confirmed|min:6",
            "role"=>"required",
        ]);
        try {
            $akun = new User();
            $akun->name=$request->nama;
            $akun->password=Hash::make($request->password);
            $akun->email=$request->email;
            $akun->role=$request->role;
            $akun->save();
            return redirect()->route('data-akun')->with('pesan','akun berhasil ditambahkan');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan']);
        }

    }

    public function edit(Request $request){
        if($request->password){
            $request->validate([
                "nama" => "required",
                "email" => "required|string",
                "password" => "min:6",
                "role"=>"required",
            ]);
            try {
//                dd($request);
                $akun = User::find($request->id);
                $akun->name=$request->nama;
                $akun->password=Hash::make($request->password);
                $akun->email=$request->email;
                $akun->role=$request->role;
                $akun->save();
                return redirect()->route('data-akun')->with('pesan','akun berhasil ditambahkan');
            }
            catch (\Exception $e){
                return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan']);
            }
        }
        else{
            $request->validate([
                "nama" => "required",
                "email" => "required|string",
                "role"=>"required",
            ]);
            try {
                $akun = User::find($request->id);
                $akun->name=$request->nama;
                $akun->email=$request->email;
                $akun->role=$request->role;
                $akun->save();
                return redirect()->route('data-akun')->with('pesan','akun berhasil ditambahkan');
            }
            catch (\Exception $e){
                return redirect()->back()->withErrors(['Peringatan', 'Gagal ditambahkan']);
            }
        }
    }

    public function delete($id){
        try {
            $akun=User::where('id',$id);
            $akun->delete();
            return redirect()->route('data-akun')->with('pesan','data berhasil terhapus');
        }
        catch (\Exception $e){
            return redirect()->route("data-akun")->withErrors(['Peringatan', 'gagal di hapus!']);
        }
    }

    public function update($id){
        $akun =  User::where("id",$id)->get();
        return view("admin.editakun",["data"=>$akun]);
    }

}
