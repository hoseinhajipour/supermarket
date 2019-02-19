<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('shop_id')->nullable();
            $table->foreign('shop_id')->on('shops')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('factor_id')->nullable();
            $table->foreign('factor_id')->on('factors')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('count')->default(1);
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('discount_price')->default(0);
            $table->unsignedInteger('final_price')->default(0);
            $table->unsignedInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('carts');
    }

}
