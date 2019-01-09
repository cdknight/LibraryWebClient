<?php

// The catalog configuration.


return [

    // Library name.

    'library_name' => env("LIBRARY_NAME", "default-library"),

    'item_out' => [

        // This value is the number of days to increment the date the item is due by when the item is renewed.
        'renew_days_increment' => env("LIBRARY_ITEM_OUT_RENEW_DAYS_INCREMENT"),

        // This value is how many renewals are allowed by default when an item is checked out.
        'renewals_allowed' => env("LIBRARY_ITEM_OUT_RENEWALS_ALLOWED")
    ]

];
