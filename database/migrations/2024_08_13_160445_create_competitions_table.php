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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('competition_result_id')->nullable();
            $table->unsignedTinyInteger('level');
            $table->boolean('is_final')->default(false);
            $table->unsignedInteger('fight_number')->nullable();

            $table->foreign('next_competition_id')->references('id')->on('competitions');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('competition_result_id')->references('id')->on('competition_results');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
