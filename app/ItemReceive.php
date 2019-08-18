<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class ItemReceive extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'is_active', 'date_create', 'description', 'amount', 'discount', 'damage_charge', 'delivery_charge', 'user_id_create', 'item_issue_id', 'transaction_type_id');
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
    
    //one to many (inverse)
    public function itemIssue(){
        return $this->belongsTo('App\ItemIssue', 'item_issue_id', 'id');
    }
    
    //one to many
    public function itemReceiveDatasSum(){
        //->selectRaw('SUM(column) as sum')
        //->addSelect('SUM(column) as sum')
        //->selectRaw('SUM(column) as sum')
        return $this->hasMany('App\ItemReceiveData', 'item_receive_id', 'id')->sum('quantity');
    }
    
}
