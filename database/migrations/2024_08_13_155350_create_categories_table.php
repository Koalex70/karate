<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('age_min')->nullable();
            $table->unsignedInteger('age_max')->nullable();
            $table->unsignedInteger('weight_min')->nullable();
            $table->unsignedInteger('weight_max')->nullable();
            $table->unsignedInteger('number_of_participants');
            $table->string('tatami')->nullable();

            $table->unsignedBigInteger('map_id');
            $table->foreign('map_id')->references('id')->on('maps');

            $table->unsignedBigInteger('tournament_id');
            $table->foreign('tournament_id')->references('id')->on('tournaments');

            $table->unsignedBigInteger('winner_id')->nullable();
            $table->foreign('winner_id')->references('id')->on('participants');

            $table->unsignedBigInteger('third_place_id')->nullable();
            $table->foreign('third_place_id')->references('id')->on('participants');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
