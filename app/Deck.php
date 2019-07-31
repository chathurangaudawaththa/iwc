<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
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
    public function rackDecks(){
        return $this->hasMany('App\RackDeck', 'deck_id', 'id');
    }
    
    //one to many
    public function items(){
        return $this->hasMany('App\Item', 'deck_id', 'id');
    }
    
}
