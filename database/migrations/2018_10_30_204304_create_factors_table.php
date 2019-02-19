<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('factors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('province_id')->nullable();
            $table->foreign('province_id')->on('provinces')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->on('cities')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('address_id')->nullable();
            $table->foreign('address_id')->on('addresses')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('price');
            $table->unsignedInteger('discount_price');
            $table->unsignedInteger('final_price');
            $table->dateTime('expire')->nullable();
            $table->unsignedInteger('shipping_cost')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->string('description')->nullable();
            $table->string('postal_code_tracking')->nullable();
            $table->text('postal_code_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('factors');
    }

}
