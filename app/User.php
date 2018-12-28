<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "Users";
    private $foreignKeyName = "userid";

    /*
     * Function that checks if credentials are valid or not
     *
     *
     */

    public function auth($password) {
        // The salt is the user's email. It comes after the password.
        return $this->password == hash('sha256', "$password".$this->email);
    }


    public function fullname() {
        return $this->firstname . " " . $this->lastname;
    }

    public function userPermissions() {
        return $this->hasOne("\App\UserPermissions", $this->foreignKeyName);
    }

    public function itemsOut() {
        return $this->hasMany("\App\ItemOut", $this->foreignKeyName);
    }

    public function requests() {
        return $this->hasMany("\App\Request", $this->foreignKeyName);
    }


}
