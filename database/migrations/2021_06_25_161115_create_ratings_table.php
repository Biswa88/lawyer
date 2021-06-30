<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id',false,true);
            $table->biginteger('lawyer_id',false,true);
            $table->biginteger('booking_id',false,true);
             $table->boolean('status')->default(1);
            $table->integer('rating');
            $table->boolean('completion_status')->default(0);


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lawyer_id')->references('id')->on('users');

            $table->foreign('booking_id')->references('id')->on('bookings');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
