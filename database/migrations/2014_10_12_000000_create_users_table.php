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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('district')->nullable();
            $table->enum('gender',['Male','Female']);
            $table->string('marital');
            $table->string('photo')->nullable();
            $table->string('diplome')->nullable();
            $table->string('username')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('regNumber');
            $table->enum('status',['1','2','3','4']);
            $table->enum('practicing',['1','2','3','4','5','6']);
            $table->enum('category',['Advocate','Staff']);
            $table->string('password');
            $table->date('date');
            $table->boolean('blocked')->default(false);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
};
