<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->tinyInteger('email_verified_at')->nullable()->comment('null -> not active, 1-> active');
            $table->tinyInteger('status')->default(1)->comment('0-> blocked');
            $table->tinyInteger('gender')->nullable()->comment('0-> male, 1-> famale');
            $table->date('birth')->nullable();
            $table->string('socialite_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
