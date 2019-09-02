<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Stock extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'quantity', 'date_create', 'item_id', 'measuring_unit_id', 'transaction_type_id', 'stockable_type', 'stockable_id');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    /*
    public function stockable(){
        return $this->morphTo('stockable', 'stockable_type', 'stockable_id');
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
    
     //one to many (inverse)
    public function transactionType(){
        return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id');
    }
    
    //one to many (polymorphic) (inverse)
    public function stockable(){
        //return $this->morphTo();
        return $this->morphTo('stockable', 'stockable_type', 'stockable_id');
    }
    
}
