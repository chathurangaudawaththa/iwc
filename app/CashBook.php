<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashBook extends Model
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
    public function cashable(){
        return $this->morphTo('cashable', 'cashable_type', 'cashable_id');
    }
    
    //one to many (inverse)
    public function transactionType(){
        return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id');
    }
    
}
