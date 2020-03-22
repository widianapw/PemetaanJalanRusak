<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigitasiJalan extends Model
{
    protected $table = "tb_digitasi_jalan";
    protected $fillable = ["nama","kecamatan","kota"];
    public function detailDigitasi(){
        return $this->hasMany('App\DetailDigitasi','id_digitasi');
    }
}
