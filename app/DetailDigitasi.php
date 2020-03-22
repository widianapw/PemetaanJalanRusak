<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailDigitasi extends Model
{
    protected $table = "tb_detail_digitasi";
    protected $fillable = ["id_digitasi","latitude","longitude"];

}
