<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->char('cpf', 14);
            $table->string('advice', 10)->nullable();
            $table->string('uf', 2)->nullable();
            $table->unsignedBigInteger('profile');
            $table->char('phone', 15);
            $table->string('email', 120);
            $table->string('password', 255);
            $table->boolean('active');
            $table->boolean('change_password');

            $table->foreign('profile')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
