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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->string('profile_picture');
            $table->string('valid_id_picture');
            $table->string('username');
            $table->string('password');
            $table->string('user_role');
            $table->string('status');
            $table->rememberToken();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
