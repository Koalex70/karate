<?php

use \App\Livewire\TournamentsTable;
use \App\Livewire\CreateTournament;
use App\Livewire\UpdateTrainer;

Route::get('/tournaments', TournamentsTable::class)
    ->middleware(['auth', 'verified'])
    ->name('tournaments');

Route::get('tournaments/create', CreateTournament::class)
    ->middleware(['auth', 'verified'])
    ->name('tournaments.create');

//Route::get('trainers/edit/{trainer}', UpdateTrainer::class)
//    ->middleware(['auth', 'verified'])
//    ->name('trainers.edit');
