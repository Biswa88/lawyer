<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
			
			$table->bigInteger('user_id', false,true);
			$table->bigInteger('buyer_id', false,true);
			$table->dateTime('date_of_payment');
			$table->decimal('amount_paid', 20, 2);
			$table->string('payment_request_id', 128)->unique();
			$table->string('payment_status')->default('Failed');
			$table->string('payment_mode')->nullable();
			
			$table->boolean('status')->default(1);
			
            $table->timestamps();
			
			
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('buyer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
