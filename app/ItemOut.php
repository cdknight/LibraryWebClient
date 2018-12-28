<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOut extends Model
{
    protected $table = "ItemsOut";
    protected $dateFormat = "Y-m-d";

    public function book() {
        return $this->belongsTo("App\Book", "bookid");
    }


}
