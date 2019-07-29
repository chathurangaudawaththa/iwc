<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReceive extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'is_active', 'date_create', 'description', 'amount', 'discount', 'user_id_create', 'item_issue_id', 'transaction_type_id');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (morph)
    public function cashBooks(){
        return $this->morphMany('App\CashBook', 'cashable');
    }
    
    //one to many
    public function itemReceiveDatas(){
        return $this->hasMany('App\ItemReceiveData', 'item_receive_id', 'id');
    }
    
    //one to many (inverse)
    public function user(){
        return $this->belongsTo('App\User', 'user_id_create', 'id');
    }
    
}
