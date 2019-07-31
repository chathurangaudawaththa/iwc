<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    
    protected $fillable = array('is_visible', 'first_name', 'last_name', 'address', 'phone', 'nic', 'code', 'image_uri', 'image_uri_nic_front', 'image_uri_nic_back', 'user_type_id');
    //protected $hidden = array();
    //protected $casts = array();
    
    //one to many (inverse)
    public function userType(){
        return $this->belongsTo('App\UserType', 'user_type_id', 'id');
    }
    
}
