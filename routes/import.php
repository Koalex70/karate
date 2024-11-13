<?php

Route::get('/import', \App\Livewire\Import::class)
    ->middleware(['auth', 'verified'])
    ->name('import');
