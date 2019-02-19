<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('mobile', 11)->nullable();
            $table->boolean('check_mobile')->default(false);
            $table->boolean('check_email')->default(false);
            $table->string('token')->nullable();
            $table->unsignedInteger('code')->nullable();
            $table->boolean('susspend')->default(false);
            $table->unsignedInteger('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
