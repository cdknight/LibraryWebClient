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

    public function itemOut() {
        // This might exist, this might not. Use isset() in order to check if it exists.

        return $this->hasOne("\App\ItemOut", $this->foreignKeyName);

    }
}
