<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class TransactionType extends Model
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
    public function cashBooks(){
        return $this->hasMany('App\CashBook', 'transaction_type_id', 'id');
    }
    
    //one to many
    public function stocks(){
        return $this->hasMany('App\Stock', 'transaction_type_id', 'id');
    }
    
}
