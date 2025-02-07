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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable();
            $table->string('name');
            $table->text('description');
            $table->enum('type', ['SDP', 'FDP', 'STTP', 'Workshop', 'Seminar', 'Conference', 'Webinar', 'Hackathon', 'Bootcamp', 'Other'])->default('Other');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('duration');
            $table->string('fees')->nullable();
            $table->string('location');
            $table->boolean('is_featured')->default(false);
            $table->string('address')->nullable();
            $table->string('venue')->nullable();
            $table->boolean('requires_registration')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
