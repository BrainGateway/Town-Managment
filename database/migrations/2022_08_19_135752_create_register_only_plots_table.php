<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterOnlyPlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_only_plots', function (Blueprint $table) {
            $table->id();
            $table->string('plot_number');
            $table->string('size');
            $table->string('dimension');
            $table->string('form_number');
            $table->integer('plot_price');
            $table->integer('discount');
            $table->integer('registration_charges');
            $table->integer('deal_price');
            $table->integer('installments');
            $table->integer('deal_validity');
            $table->string('sale_man');
            $table->integer('mmd');
            $table->unsignedBigInteger('town_id')->nullable();
            $table->foreign('town_id')->references('id')->on('towns');
            $table->unsignedBigInteger('block_id')->nullable();
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->unsignedBigInteger('owner_plot');
            $table->foreign('owner_plot')->references('id')->on('users');
            $table->unsignedBigInteger('nominee_owner_plot');
            $table->foreign('nominee_owner_plot')->references('id')->on('users');
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
        Schema::dropIfExists('register_only_plots');
    }
}
