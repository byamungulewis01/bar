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
        Schema::create('probonos', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('gender');
            $table->string('age');
            $table->string('phone');
            $table->string('referral_case_no');
            $table->string('jurisdiction');
            $table->string('court');
            $table->string('case_nature');
            $table->date('hearing_date');
            $table->string('category');
            $table->UnsignedBigInteger('referrel');
            $table->enum('status',['OPEN' , 'CLOSED']);
            $table->string('register');
            $table->foreign('referrel')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('probonos');
    }
};
