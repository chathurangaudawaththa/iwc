<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemIssueData extends Model
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
    public function itemIssue(){
        return $this->belongsTo('App\ItemIssue', 'item_issue_id', 'id');
    }
    
    //one to many (inverse)
    public function stock(){
        return $this->belongsTo('App\Stock', 'stock_id', 'id');
    }
    
}
