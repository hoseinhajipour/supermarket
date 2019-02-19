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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('province_id')->nullable();
            $table->foreign('province_id')->on('provinces')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->on('cities')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string("address");
            $table->integer("postal_code");
            $table->string("phone")->nullable();
            $table->float("lat")->nullable();
            $table->float("lng")->nullable();
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
