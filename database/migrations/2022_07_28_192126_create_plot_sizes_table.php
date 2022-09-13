<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->string('dimension');
            $table->unsignedBigInteger('town_id')->nullable();
            $table->foreign('town_id')->references('id')->on('towns');
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
        Schema::dropIfExists('plot_sizes');
    }
}
