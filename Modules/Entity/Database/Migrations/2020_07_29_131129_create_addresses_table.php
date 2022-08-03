<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('model');
            $table->string('addr1',255);
            $table->string('addr2',255)->nullable();
            $table->string('city',255);
            $table->string('state',255)->nullable();
            $table->string('zip_code',255);
            $table->string('country',255);
            $table->decimal('lat', 12,8)->nullable();
            $table->decimal('lng', 12,8)->nullable();

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
        Schema::dropIfExists('addresses');
    }
}
