<?php

use App\Livewire\FederationsTable;
use \App\Livewire\CreateFederation;
use \App\Livewire\UpdateFederation;

Route::get('/federations', FederationsTable::class)
->middleware(['auth', 'verified'])
->name('federations');

Route::get('federations/create', CreateFederation::class)
->middleware(['auth', 'verified'])
->name('federations.create');

Route::get('federations/edit/{federation}', UpdateFederation::class)
->middleware(['auth', 'verified'])
->name('federations.edit');
