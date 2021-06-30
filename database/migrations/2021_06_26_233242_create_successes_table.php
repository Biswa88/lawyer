<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('successes', function (Blueprint $table) {
            $table->id();
           
            $table->biginteger('lawyer_id',false,true);
            $table->biginteger('case_type_id',false,true);
             $table->integer('year');
            $table->boolean('status');
           

           
            $table->foreign('lawyer_id')->references('id')->on('users');

            $table->foreign('case_type_id')->references('id')->on('case_types');

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
        Schema::dropIfExists('successes');
    }
}
