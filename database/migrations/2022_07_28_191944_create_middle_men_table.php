<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiddleMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middle_men', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('address');
            $table->integer('phoneNumber');
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
        Schema::dropIfExists('middle_men');
    }
}
