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
            $table->integer('probono_files')->default(0);
            $table->integer('probono_devs')->default(0);
            $table->timestamp('hearing_date');
            $table->string('category');
            $table->string('referrel');
            $table->enum('status',['OPEN' , 'WON', 'LOST', 'TRANSACTED']);
            $table->UnsignedBigInteger('advocate')->nullable();
            $table->UnsignedBigInteger('register')->nullable();
            $table->foreign('advocate')->references('id')->on('users')->constrained()->onDelete('set null');
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
        Schema::dropIfExists('probonos');
    }
};
