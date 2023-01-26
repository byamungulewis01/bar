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
        Schema::create('discipline', function (Blueprint $table) {
            $table->id();
            $table->string('p_name')->nullable();
            $table->string('p_email')->nullable();
            $table->string('p_phone')->nullable();
            $table->integer('p_advocate')->nullable();
            $table->string('d_name')->nullable();
            $table->string('d_email')->nullable();
            $table->string('d_phone')->nullable();
            $table->integer('d_advocate')->nullable();
            $table->string('case_number');
            $table->enum('case_type',[1,2,3]);
            $table->string('complaint');
            $table->longText('sammary');
            $table->enum('case_status',['OPEN','CLOSED'])->default('OPEN');
            $table->enum('authority',['BATONIER','DISCIPLINARY COMMITEE'])->default('BATONIER');
            $table->integer('register');
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
        Schema::dropIfExists('discipline');
    }
};
