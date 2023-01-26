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
        Schema::create('discipline_participants', function (Blueprint $table) {
            $table->id('table_id');
            $table->bigInteger('discipline_case');
            $table->bigInteger('advocate');
            $table->enum('role',['Plaintiff','Defendant']);
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
        Schema::dropIfExists('discipline_participants');
    }
};
