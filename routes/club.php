<?php

use App\Livewire\ClubsTable;
use App\Livewire\CreateClub;
use App\Livewire\UpdateClub;

Route::get('/clubs', ClubsTable::class)
    ->middleware(['auth', 'verified'])
    ->name('clubs');

Route::get('/clubs/create', CreateClub::class)
    ->middleware(['auth', 'verified'])
    ->name('clubs.create');

Route::get('/clubs/edit/{club}', UpdateClub::class)
    ->middleware(['auth', 'verified'])
    ->name('clubs.edit');
