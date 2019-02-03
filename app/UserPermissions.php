<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    protected $table = "UsersPermissions";
    public $timestamps = false;
    protected $defaults = array(
        'admin' => false,
        'insertbooks' => false,
    );

    
}
