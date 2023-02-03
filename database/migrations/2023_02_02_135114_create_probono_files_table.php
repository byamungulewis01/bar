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
        Schema::create('probono_files', function (Blueprint $table) {
            $table->id();
            $table->string('case_title');
            $table->string('case_type');
            $table->string('case_file');
            $table->UnsignedBigInteger('probono_id');
            $table->UnsignedBigInteger('register');
            $table->foreign('probono_id')->references('id')->on('probonos')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('probono_files');
    }
};
