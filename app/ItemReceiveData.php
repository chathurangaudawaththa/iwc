<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReceiveData extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    //protected $fillable = array();
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function itemReceive(){
        return $this->belongsTo('App\ItemReceive', 'item_receive_id', 'id');
    }
    
    /*
    //one to many (inverse)
    public function stock(){
        return $this->belongsTo('App\Stock', 'stock_id', 'id');
    }
    */
    
    //one to many (inverse)
    public function item(){
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }
    
    //one to many (inverse)
    public function measuringUnit(){
        return $this->belongsTo('App\MeasuringUnit', 'measuring_unit_id', 'id');
    }
    
}
