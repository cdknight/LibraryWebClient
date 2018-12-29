<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "Users";
    public $timestamps = false;

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

    // Update user information with this function

    public function updateInformation($valueToUpdate, $newValue) {

        // Assign the new value to the corresponding variable.

        switch ($valueToUpdate) {
            case "firstname":

                $this->firstname = $newValue;
                break;

            case "lastname":

                $this->lastname = $newValue;
                break;


            // We have removed the E-Mail changing. The reason is simple. The E-Mail must be a fixed value that you cannot change because it is used as the salt. Since this is an insecure practice, the root cause of the problem needs to be solved first.

            case "address":

                $this->address = $newValue;
                break;

        }

        // Save the information

        $status = $this->save();

        // Return the status of the save

        return $status;


    }



}
