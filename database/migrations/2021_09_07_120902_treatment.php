<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Treatment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->bigInteger('external_id')->unique()->nullable();
            $table->integer('dentist_id');
            $table->foreign('dentist_id')->references('id')->on('dentist');
            $table->integer('patient_id');
            $table->foreign('patient_id')->references('id')->on('patient');
            $table->integer('plates');
            $table->dateTime('created_at', $precision = 0)->useCurrent();
            $table->dateTime('updated_at', $precision = 0)->useCurrentOnUpdate()->nullable();
            $table->softDeletes($column = 'ended_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('treatment');
    }
}
