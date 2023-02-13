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
        Schema::create('probono_devs', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['OPEN' , 'WON', 'LOST', 'TRANSACTED']);
            $table->string('title');
            $table->text('narration');
            $table->UnsignedBigInteger('probono_id');
            $table->foreign('probono_id')->references('id')->on('probonos')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('probono_devs');
    }
};
