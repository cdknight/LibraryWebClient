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

}
