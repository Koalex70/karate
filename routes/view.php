<?php

use \App\Livewire\ViewsTable;
use \App\Livewire\TatamiTable;
use \App\Livewire\ContestantsScreen;
use \App\Livewire\JudgesScreen;

Route::get('/views', ViewsTable::class)
    ->middleware(['auth', 'verified'])
    ->name('views');

Route::get('/views/{tournament}', TatamiTable::class)
    ->middleware(['auth', 'verified'])
    ->name('views.tatami');

Route::get('/views/{tournament}/{tatami}/contestants', ContestantsScreen::class)
    ->middleware(['auth', 'verified'])
    ->name('views.contestants');

Route::get('/views/{tournament}/{tatami}/judges', JudgesScreen::class)
    ->middleware(['auth', 'verified'])
    ->name('views.judges');
