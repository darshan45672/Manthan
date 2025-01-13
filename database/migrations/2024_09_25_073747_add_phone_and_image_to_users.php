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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->unique()->nullable();
            $table->string('image')->nullable();
            $table->enum('role', ['student', 'faculty', 'HoD', 'Principle'])->default('student');
            $table->text('address')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->boolean('profile_completed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
