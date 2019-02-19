<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('factor_id')->nullable();
            $table->foreign('factor_id')->on('factors')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('price');
            $table->string('authority');
            $table->string('refid')->nullable();
            $table->integer('status')->default(0);
            $table->string('code')->default(0);
            $table->string('ip',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('payments');
    }

}
