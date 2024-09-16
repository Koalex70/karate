<?php

use \App\Livewire\ParticipantsTable;
use \App\Livewire\CreateParticipant;
use \App\Livewire\UpdateParticipant;

Route::get('/participants', ParticipantsTable::class)
    ->middleware(['auth', 'verified'])
    ->name('participants');

Route::get('participants/create', CreateParticipant::class)
    ->middleware(['auth', 'verified'])
    ->name('participants.create');

Route::get('participants/edit/{participant}', UpdateParticipant::class)
    ->middleware(['auth', 'verified'])
    ->name('participants.edit');
