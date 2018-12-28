<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;


class UserAccountController extends Controller
{
    public function info(Request $request){
        return view('useraccount.info',
            [
                'user' => $request->session()->get("user")

            ]);
    }

    public function requests(Request $request){
        return view('useraccount.requests',
            [
                'user' => $request->session()->get("user")

            ]);
    }


    public function itemsOut(Request $request) {
        return view('useraccount.items_out',
            [
                'user' => $request->session()->get("user")
            ]);
    }


    public function updateInfo(Request $request) {
        // Step 1: read request variables.

        $userID = $request->input("user_id");
        $valueToUpdate = $request->input("field_to_update");
        $newValue = $request->input("new_value");

        // Insufficient data was provided!

        if ($userID == null || $valueToUpdate == null || $newValue == null) {

            $report = array();

            $report['status'] = false;
            $report['msg'] = "Insufficient information provided!";

            return response()->json($report);

        }

        // Step 2: retrieve the user that needs to be updated.

        $userToUpdate = User::find($userID);

        // The user does not exist!

        if ($userToUpdate == null) {

            $report = array();

            $report['status'] = false;
            $report['msg'] = "The user requested to update does not exist!";

            return response()->json($report);

        }


        // Step 3: Update the value with the function in the user model.

        $updateStatus = $userToUpdate->updateInformation($valueToUpdate, $newValue);

        // Step 4: Generate array for the status

        $report = array();
        $report['status'] = $updateStatus;



        if ($updateStatus == true) {

            $report['msg'] = "The value was updated succesfully.";

        }
        else {

            $report['msg'] = "Error: The value could not be updated!";

        }

        // Step 5: Return the status as JSON

        return response()->json($report);


    }
}
