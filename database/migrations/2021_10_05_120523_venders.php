<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class venders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('fullName')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->tinyInteger('email_verified')->nullable()->comment('null -> not active, 1-> active');
            $table->tinyInteger('status')->default(1)->comment('0-> blocked');
            $table->tinyInteger('gender')->nullable()->comment('0-> male, 1-> famale')->default(0);
            $table->date('birth')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
