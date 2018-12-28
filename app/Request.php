<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = "Requests";
    protected $dateFormat = "Y-m-d";

    public function book() {
        return $this->belongsTo("App\Book", "bookid");
    }
}
