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
        Schema::create('training_topics', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('startAt');
            $table->string('endAt');
            $table->string('trainer');
            $table->UnsignedBigInteger('register');
            $table->UnsignedBigInteger('training_id');
            $table->foreign('training_id')->references('id')->on('trainings')->constrained()->onDelete('cascade');
            $table->foreign('register')->references('id')->on('admins')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('training_topics');
    }
};
