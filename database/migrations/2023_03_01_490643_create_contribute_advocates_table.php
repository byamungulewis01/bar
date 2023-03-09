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
        Schema::create('contribute_advocates', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('transction_type');
            $table->string('reference_no')->unique();
            $table->string('transction_date');
            $table->UnsignedBigInteger('advocate');
            $table->UnsignedBigInteger('contribution');
            $table->foreign('advocate')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreign('contribution')->references('id')->on('contributions')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('contribute_advocates');
    }
};
