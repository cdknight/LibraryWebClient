<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = "Requests";
    protected $dateFormat = "Y-m-d";
    public $timestamps = false;
    
    protected $attributes = [
        'status' => 0,
    ];

    public function book() {
        return $this->belongsTo("App\Book", "bookid");
    }

    public function deleteRequest() {

        // In order to delete a request, the previous amount of renewals needs to be copied to the renewals remaining for the corresponding ItemOut. If the book is not checked out then we will not do anything.


        // First we check if the book this request corresponds to is checked out.

        if (isset($this->book->itemOut)) {

            // We now copy the previous amount of available renewals to the requests remaining.

            $this->book->itemOut->renewals_remaining = $this->book->itemOut->previous_renewal;

            // Next, we'll save the corresponding model.

            $this->book->itemOut->save();

        }

       // Now, we say good bye to the request. After doing this we return the status of the delete.



        $status = $this->delete();



        return $status;







    }
}
