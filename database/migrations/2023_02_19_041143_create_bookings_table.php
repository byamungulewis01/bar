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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('training');
            $table->UnsignedBigInteger('advocate');
            $table->date('attendanceDay')->nullable();
            $table->decimal('cumulatedCredit')->nullable();
            $table->bigInteger('voucherNumber')->nullable();
            $table->boolean('confirm')->default(false);
            $table->foreign('training')->references('id')->on('trainings')->constrained()->onDelete('cascade');
            $table->foreign('advocate')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
};
