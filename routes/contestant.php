<?php

use \App\Livewire\ContestantFirstLevel;
use \App\Livewire\EditContestant;
use \App\Livewire\FinalContestant;

Route::get('/tournaments/{tournament}/categories/{category}/first_level/{competition}/{position}', ContestantFirstLevel::class)
    ->middleware(['auth', 'verified'])
    ->name('contestants.first-level');

Route::get('/tournaments/{tournament}/categories/{category}/edit/{competition}/final', FinalContestant::class)
    ->middleware(['auth', 'verified'])
    ->name('contestants.final');

Route::get('/tournaments/{tournament}/categories/{category}/edit/{competition}/{position}', EditContestant::class)
    ->middleware(['auth', 'verified'])
    ->name('contestants.edit');



