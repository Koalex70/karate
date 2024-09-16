<?php

use App\Livewire\TrainersTable;
use App\Livewire\CreateTrainer;
use App\Livewire\UpdateTrainer;

Route::get('/trainers', TrainersTable::class)
    ->middleware(['auth', 'verified'])
    ->name('trainers');

Route::get('trainers/create', CreateTrainer::class)
    ->middleware(['auth', 'verified'])
    ->name('trainers.create');

Route::get('trainers/edit/{trainer}', UpdateTrainer::class)
    ->middleware(['auth', 'verified'])
    ->name('trainers.edit');
