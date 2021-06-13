<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = "periode";

//    protected $fillable=["id"];

    public function penerima(){
        return $this->hasMany(Penerima::class,'idPeriode','id');
    }

    public function penduduk()
    {
        return $this->belongsToMany("App\Model\Penduduk")->withPivot("status","penduduk_id","periode_id","id");
    }


}
