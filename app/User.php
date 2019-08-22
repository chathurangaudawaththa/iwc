<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use Notifiable;
    
    //
    //protected $table = "table";
    //protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = false;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*
    protected $fillable = [
        'name', 'email', 'password',
    ];
    */
    protected $fillable = array('is_visible', 'first_name', 'last_name', 'address', 'phone', 'nic', 'code', 'username', 'password', 'image_uri', 'image_uri_nic_front', 'image_uri_nic_back');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //one to many
    public function itemIssues(){
        return $this->hasMany('App\ItemIssue', 'user_id_create', 'id');
    }
    
    //one to many
    public function itemReceives(){
        return $this->hasMany('App\ItemReceive', 'user_id_create', 'id');
    }
    
}
