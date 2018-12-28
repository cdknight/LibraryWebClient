<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "Books";
    protected $primaryKey= "ID";

    public $timestamps = false;

    private $foreignKeyName = 'bookid';

    public function bookInformation() {
        return $this->hasOne("\App\BookInformation", $this->foreignKeyName);
    }

    public function requests() {
        return $this->hasMany("\App\Request", $this->foreignKeyName);
    }
}
