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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('venue');
            $table->decimal('credits');
            $table->decimal('price');
            $table->string('starton');
            $table->string('endon');
            $table->string('early_deadline');
            $table->string('late_deadline');
            $table->decimal('rate');
            $table->integer('seats');
            $table->integer('confirm')->default(0);
            $table->integer('booking')->default(0);
            $table->enum('publish',[0,1])->default(1);
            $table->UnsignedBigInteger('register');
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
        Schema::dropIfExists('trainings');
    }
};
