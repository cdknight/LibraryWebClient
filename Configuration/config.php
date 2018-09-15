<?php
// array of different config for program

$_lcc = array(
    "lc.db.provider" => "mysql",
    "lc.db.username" => "default_u",
    "lc.db.password" => "letmeinmysql",
    "lc.db.port" => 3306,
    "lc.db.lock_dbs" => true, //don't make this false in prod. Unless it doesn't work.


    "lc.db.aux.kp_db.enable" => true,
    "lc.db.aux.kp_db.provider" => "couchdb",
    "lc.db.aux.kp_db.username" => "default_u",
    "lc.db.aux.kp_db.password" => "letmeinmysql",

    'lc.aux.mods_allow' => true,



    'lc.mail.api_key' =>  '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',
    'lc.mail.from' => 'warpnotifier.fvlib@sendgrid.net',
    'lc.mail.enable' => true,

    'lc.items_out.renew_interval_days' => '7',
    'lc.items_out.view_type' => 'table',

    "lc.requests.view_type" => "table", //table or card

    'lc.ui.theme.color' => '#0032ee',

    'lc.ui.font.url' => 'https://fonts.googleapis.com/', //UNINISHED
    'lc.ui.font.family' => 'Poppins, "Fira Sans", Helvetica, Verdana, sans-serif',

    "lc.ui.glyphs.enable" =>  isset($_COOKIE['lc_glyph_enable']) ? true : false,
    "lc.ui.glyphs.style" => "material" ,

    "lc.ui.book.view_type" => "card", // card or text
    "lc.ui.book.card.show_bookinfo" => true,
    'lc.ui.book.view_thumbnail' => true,

    'lc.suggestions.storage' => 'cookie', //POSSIBILITIES: cookie or session
    'lc.suggestions.carousel.enable' => true,
    'lc.suggestions.enable' => true,
    "lc.suggestions.comply_gdpr" => true, //don't make this false in prod. please...



    'lc.search.card' => true,
    'lc.search.suggestions' => true









);

