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
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('email')->unique()->index();
            $table->string('phone');
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->foreignId('program_id')->constrained('programs')->onDeleteCascade();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
