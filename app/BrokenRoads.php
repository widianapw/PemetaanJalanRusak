<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrokenRoads extends Model
{
    protected $table = "tb_broken_road";
    protected $fillable = ["address","picture","status","description"];
    protected $primaryKey = "id";
    // protected $foreignKey = "id_road";
    public function detailCoordinate(){
        return $this->hasMany('App\DetailCoordinate','id_road');
    }
}
