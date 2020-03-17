<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailCoordinate extends Model
{
    protected $table = "tb_detail_coordinate";
    protected $fillable = ["id_road","latitude","longitude"];
    protected $primaryKey = "id";
}
