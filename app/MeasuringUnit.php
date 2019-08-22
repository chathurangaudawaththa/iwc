<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class MeasuringUnit extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many
    public function items(){
        return $this->hasMany('App\Item', 'measuring_unit_id', 'id');
    }
    
    //one to many
    public function stocks(){
        return $this->hasMany('App\Stock', 'measuring_unit_id', 'id');
    }
    
}
