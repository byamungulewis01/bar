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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_period')->format('Y-m-d');
            $table->date('end_period')->format('Y-m-d');
            $table->date('deadline')->format('Y-m-d');
            $table->string('amount');
            $table->decimal('percentage');
            $table->string('concern');
            $table->integer('yearInBar');
            $table->UnsignedBigInteger('createdBy');
            $table->UnsignedBigInteger('updateby')->nullable();
            $table->foreign('createdBy')->references('id')->on('admins')->constrained()->onDelete('cascade');
            $table->foreign('updateby')->references('id')->on('admins')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('contributions');
    }
};
