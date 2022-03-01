<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cause_id')->nullable();
            $table->string('cause_location')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('gender');
            $table->string('city');
            $table->string('address');
            $table->double('mobile');
            $table->string('education');
            $table->string('occupation');
            $table->string('image')->nullable;
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
        Schema::dropIfExists('volunteers');
    }
};
