<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Item extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'name', 'code', 'quantity_low', 'is_rentable', 'unit_price', 'image_uri', 'measuring_unit_id', 'rack_id', 'deck_id');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function rack(){
        return $this->belongsTo('App\Rack', 'rack_id', 'id');
    }
    
    //one to many (inverse)
    public function deck(){
        return $this->belongsTo('App\Deck', 'deck_id', 'id');
    }
    
    //one to many (inverse)
    public function measuringUnit(){
        return $this->belongsTo('App\MeasuringUnit', 'measuring_unit_id', 'id');
    }
    
    //one to many
    public function stocks(){
        return $this->hasMany('App\Stock', 'item_id', 'id');
    }
    
    //one to many
    public function itemIssueDatas(){
        return $this->hasMany('App\ItemIssueDatas', 'item_id', 'id');
    }
    
    //one to many
    public function itemReceiveDatas(){
        return $this->hasMany('App\ItemReceiveDatas', 'item_id', 'id');
    }
    
    //one to many
    public function stocksSum(){
        //->selectRaw('SUM(column) as sum')
        //->addSelect('SUM(column) as sum')
        //->selectRaw('SUM(column) as sum')
        return $this->hasMany('App\Stock', 'item_id', 'id')->sum('quantity');
    }
    
}
