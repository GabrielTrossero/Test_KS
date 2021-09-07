<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->enum('gender', ['m', 'f', 'o']);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->dateTime('created_at', $precision = 0)->useCurrent();
            $table->dateTime('updated_at', $precision = 0)->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
