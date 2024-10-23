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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('next_competition_id')->nullable();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('competition_result_id')->nullable();
            $table->unsignedTinyInteger('level');

            $table->foreign('next_competition_id')->references('id')->on('competitions');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->foreign('competition_result_id')->references('id')->on('competition_results');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
