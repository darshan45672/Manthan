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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDeleteCascade();
            $table->foreignId('college_id')->constrained('colleges')->onDeleteCascade();
            $table->foreignId('department_id')->constrained('departments')->onDeleteCascade();
            $table->string('designation');
            $table->string('qualification');
            $table->string('experience');
            $table->string('specialization');
            $table->string('joining_date');
            $table->string('leaving_date')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('is_cordinator')->default(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
