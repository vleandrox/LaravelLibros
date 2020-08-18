<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;

class RoleUser extends Model
{
    public $table="role_user";

    public function Role()
    {
        return $this->belongsTo('App\Role')
        ;
    }

    public function User()
    {
        return $this->belongsTo('App\User');        

    }


    protected $fillable = [
        'role_id', 
        'user_id'
    ];
}
