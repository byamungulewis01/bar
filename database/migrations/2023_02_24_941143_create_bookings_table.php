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
            $table->boolean('booked')->default(false);
            $table->boolean('confirm')->default(false);
            $table->enum('status',[1,2,3,4])->nullable();
            $table->integer('yearInBar');
            $table->decimal('cumulatedCredit')->nullable();
            $table->date('attendanceDay')->nullable();
            $table->bigInteger('voucherNumber')->nullable();
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
