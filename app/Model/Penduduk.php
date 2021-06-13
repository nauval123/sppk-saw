<?php

namespace App\Model;
//
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    protected $fillable=['NIK',"Nama","JenisLantai","Penghasilan","JumlahAnggota","JenisDinding","StatusPhk"];

    public function penerima(){
        return $this->hasMany(Penerima::class,'penduduk_id','id');
    }

    public function periode(){
        return $this->belongsToMany('App\Model\Periode')->withPivot("status");
    }

}
