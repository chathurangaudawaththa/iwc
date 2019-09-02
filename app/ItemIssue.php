<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class ItemIssue extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'is_active', 'date_create', 'date_receive', 'description', 'user_id_create', 'customer_id_create', 'transaction_type_id');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function transactionType(){
        return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id');
    }
    
    //one to many (inverse)
    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id_create', 'id');
    }
    
    //one to many (inverse)
    public function user(){
        return $this->belongsTo('App\User', 'user_id_create', 'id');
    }
    
    //one to many
    public function itemReceives(){
        return $this->hasMany('App\ItemReceive', 'item_issue_id', 'id');
    }
    
    //one to many
    public function itemIssueDatas(){
        return $this->hasMany('App\ItemIssueData', 'item_issue_id', 'id');
    }
    
    //one to many
    public function itemIssueDatasSum(){
        //->selectRaw('SUM(column) as sum')
        //->addSelect('SUM(column) as sum')
        //->selectRaw('SUM(column) as sum')
        return $this->hasMany('App\ItemIssueData', 'item_issue_id', 'id')->sum('quantity');
    }
    
    //one to many
    public function itemReceiveDatas(){
        //->selectRaw('SUM(column) as sum')
        //->addSelect('SUM(column) as sum')
        //->selectRaw('SUM(column) as sum')
        return $this->hasManyThrough(
            'App\ItemReceiveData',
            'App\ItemReceive',
            'item_issue_id',
            'item_receive_id',
            'id',//this table's primary key
            'id'//other table's primary key
        );
    }
    
    //one to many
    public function itemReceiveDatasSum(){
        //->selectRaw('SUM(column) as sum')
        //->addSelect('SUM(column) as sum')
        //->selectRaw('SUM(column) as sum')
        return $this->hasManyThrough(
            'App\ItemReceiveData',
            'App\ItemReceive',
            'item_issue_id',
            'item_receive_id',
            'id',//this table's primary key
            'id'//other table's primary key
        )->sum('quantity');
    }
    
    //one to many (polymorphic)
    public function stocks(){
        return $this->morphMany('App\Stock', 'stockable', 'stockable_type', 'stockable_id', 'id');
    }
    
}
