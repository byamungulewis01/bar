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
        Schema::create('table_discipline_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_number');
            $table->string('complaint');
            $table->text('sammary');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('advcate_id');
            $table->enum('status',['closed','open']);
            $table->enum('case_type',['advcate','civilian']);
            $table->integer('createdby');
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
        Schema::dropIfExists('table_discipline_cases');
    }
};
