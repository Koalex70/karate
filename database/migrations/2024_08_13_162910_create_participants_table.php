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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->decimal('weight', 5, 2)->nullable();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('rank_id');
            $table->unsignedBigInteger('club_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('trainer_id')->references('id')->on('trainers');
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->foreign('club_id')->references('id')->on('clubs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
