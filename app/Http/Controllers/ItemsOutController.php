<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\ItemOut;

class ItemsOutController extends Controller
{



    public function renewItemOut(Request $request) {

        // Create a report array variable.

        $report = array();

        // Step 1: Retrieve request information. We should have a item_out_id ready to go.

        $itemOutID = $request->input("item_out_id");

        // Step 1a: We need to check if the variable is blank, this is not allowed.

        if (!isset($itemOutID)) {

            // The variable is not set, we will report with status false.

            $report['status'] = false;
            $report['msg'] = "The item out ID you provided was invalid!";

            return response()->json($report);

        }

        // Step 2: Continue by getting and renewing the item out.

        $itemToRenew = ItemOut::find($itemOutID);

        // Step 2a: Check if the ItemOut is invalid, report back if so.

        if (!isset($itemToRenew)) {

            // The variable is not set, we will report with status false.

            $report['status'] = false;
            $report['msg'] = "The item out ID you provided was invalid!";

            return response()->json($report);

        }

        $status = $itemToRenew->renew();


        // Step 3: Check the status and report back accordingly.

        if ( $status == false ) {

            // The operation was unsuccessful.

            $report['status'] = false;
            $report['msg'] = "The operation completed unsuccessfully!";

            return response()->json($report);

        }

        $report['status'] = true;
        $report['msg'] = "The operation completed successfully";

        return response()->json($report);


    }


}
