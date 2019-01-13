<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemsOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ItemsOut', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("bookid");
            $table->integer("userid");
            $table->date("date_out");
            $table->date("date_due");
            $table->integer("renewals_remaining");

            // This is an integer that is the number of renewals the user could renew the book from before. 
            $table->integer("previous_renewal");
            $table->integer("fine");
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ItemsOut');
    }
}
