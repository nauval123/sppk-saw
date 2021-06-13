<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table = "penduduk_periode";

    protected $fillable=["periode_id","penduduk_id","status"];

    public function penduduk()
    {
        return $this->belongsToMany("App\Model\Penduduk");
    }
}
