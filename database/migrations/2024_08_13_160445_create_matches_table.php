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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('next_match_id')->nullable();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('match_result_id')->nullable();

            $table->foreign('next_match_id')->references('id')->on('matches');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->foreign('match_result_id')->references('id')->on('match_results');

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
