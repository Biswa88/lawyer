<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentComissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_comissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_id', false, true);
            $table->float('commission_pc');
            $table->decimal('paid_amount', 20, 2);
            $table->decimal('comission_amount', 20, 2);
            $table->timestamps();

            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_comissions');
    }
}
