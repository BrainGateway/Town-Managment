<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotInstallementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_installements', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->integer('deposit_amount');
            $table->string('slip_number')->nullable();
            $table->string('auto_slip_number');
            $table->string('payment_method');
            $table->string('deposit_slip')->nullable();
            $table->unsignedBigInteger('town_id')->nullable();
            $table->foreign('town_id')->references('id')->on('towns');
            $table->unsignedBigInteger('owner_plot');
            $table->foreign('owner_plot')->references('id')->on('users');
            $table->unsignedBigInteger('number_of_plot')->nullable();
            $table->foreign('number_of_plot')->references('id')->on('plot_sales');
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
        Schema::dropIfExists('plot_installements');
    }
}


