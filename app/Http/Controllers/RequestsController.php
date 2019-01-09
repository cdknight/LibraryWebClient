<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App;

class RequestsController extends Controller
{


    public function deleteRequest(Request $request) {

        // First, we'll retrieve variables and get the request variable.

        $request_id = $request->input("request_id");

        $request_to_delete = App\Request::find($request_id);


        // Now, we delete the request.

        $deleteStatus = $request_to_delete->deleteRequest();

        // Finally, we'll generate a report and send it as JSON.

        $report = array();

        $report['msg'] = "The request was not deleted successfully!";
        $report['status'] = $deleteStatus;

        if ( $deleteStatus ) {

            $report['msg'] = "The request was deleted successfully.";

        }

        return response()->json($report);

    }

    public function createRequest(Request $request) {
        // Function to create a request.

        // Create a report array.

        $report = array();
                
        // Step 1: Retrieve variables from request.

        $bookID = $request->input("bookid");
        $userID = $request->input("userid");

        // Step 2: Set other values that need to be inserted into the database.

        $dateDue = date("Y-m-d");

        // Step 3: Create the request that we are going to save to the database.

        $new_request = new App\Request;

        // Step 4: Set values for that new request.

        $new_request->bookid = $bookID;
        $new_request->userid = $userID;
        $new_request->date_due = $dateDue;

        // Step 5: Save the request, get the status of that saving.

        $status = $new_request->save();

        // Step 6: Return a successful or failing report.

        if ($status == true) {
            $report['msg'] = "The request was created successfully.";
            $report['status'] = true;            
        }

        else {
            $report['msg'] = "The request could not be created.";
            $report['status'] = false;
        }

        return response()->json($report);
    }
}
