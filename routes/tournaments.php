<?php

use \App\Livewire\TournamentsTable;
use \App\Livewire\CreateTournament;
use \App\Livewire\EditCategory;

Route::get('/tournaments', TournamentsTable::class)
    ->middleware(['auth', 'verified'])
    ->name('tournaments');

Route::get('/tournaments/create', CreateTournament::class)
    ->middleware(['auth', 'verified'])
    ->name('tournaments.create');

//Route::get('tournaments/edit/{tournament}', EditCategory::class)
//    ->middleware(['auth', 'verified'])
//    ->name('tournaments.edit');
