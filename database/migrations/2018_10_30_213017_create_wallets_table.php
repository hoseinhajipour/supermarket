<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('shop_id')->nullable();
            $table->foreign('shop_id')->on('shops')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('factor_id')->nullable();
            $table->foreign('factor_id')->on('factors')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('payment_id')->nullable();
            $table->foreign('payment_id')->on('payments')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount');
            $table->integer('oldAmount');
            $table->integer('newAmount');
            $table->unsignedInteger('status');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('wallets');
    }

}
