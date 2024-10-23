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
        Schema::create('contestants', function (Blueprint $table) {
            $table->id();
            $table->decimal('points', 2, 1);
            $table->boolean('is_winner');

            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('participant_id');

            $table->foreign('competition_id')->references('id')->on('competitions');
            $table->foreign('participant_id')->references('id')->on('participants');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contestants');
    }
};
