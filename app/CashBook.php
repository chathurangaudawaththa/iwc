<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class CashBook extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'amount', 'date_create', 'transaction_type_id', 'cashable_type', 'cashable_id');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    /*
    public function cashable(){
        return $this->morphTo('cashable', 'cashable_type', 'cashable_id');
    }
    */
    
    //one to many (inverse)
    public function transactionType(){
        return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id');
    }
    
    //one to many (polymorphic) (inverse)
    public function cashable(){
        //return $this->morphTo();
        return $this->morphTo('cashable', 'cashable_type', 'cashable_id');
    }
    
}
