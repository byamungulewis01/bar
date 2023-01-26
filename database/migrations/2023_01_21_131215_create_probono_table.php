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
        Schema::create('probono', function (Blueprint $table) {
            $table->id();
            $table->string('referral_name');
            $table->integer('referral_mobile');
            $table->string('referral_gender');
            $table->string('referral_case_no');
            $table->string('case_nature');
            $table->date('hearing_date');
            $table->string('category');
            $table->integer('register');
            $table->enum('case_status',['OPEN','CLOSED']);
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
        Schema::dropIfExists('probono');
    }
};
