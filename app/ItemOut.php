<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOut extends Model
{
    protected $table = "ItemsOut";
    protected $dateFormat = "Y-m-d";
    public $timestamps = false;

    public function book() {
        return $this->belongsTo("\App\Book", "bookid");
    }

    public function user() {
        return $this->belongsTo("\App\User", "userid");
    }

    // Function that renews a book that is checked out

    public function renew() {


        // In order for a book to be renewed, the renewals_remaining must be copied to previous_renewal and renewals_remaining needs to be decremented.
        // Then, date_due must be incremented by the amount specified in the config variable library_info.item_out.renew_days_increment.

        $days_increment = config("library_info.item_out.renew_days_increment");

        // Step 1: Update previous_renewal

        $this->previous_renewal = $this->renewals_remaining;

        // Step 2: Decrement renewals_remaining.

        $this->renewals_remaining -= 1;

        // Step 3: Update the due_date column by the days_increment

        // The best way to do this is to convert the date_due into a UNIX timestamp with the strtotime function
        // Then we call strtotime again, except this time with +$days_increment days (like) strtotime("+$days_increment day")
        // Finally, we can convert this to a readable date with the standard format Y-m-d used in the database with the date function.

        // NOTE: We can also do this with the explode function by exploding with delimiter '-', although this is probably less reliable, it is more simple and would still work.

        $initial_date = strtotime($this->date_due);

        $incremented_date = strtotime("+$days_increment day", $initial_date);

        $readable_date = date("Y-m-d", $incremented_date);

        // Step 4: Update the date_due with the generated date.

        $this->date_due = $readable_date;

        // Step 5: Save our changes and report the update.

        $status = $this->save();

        return $status;










    }


}
