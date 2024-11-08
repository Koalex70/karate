<?php

use \App\Livewire\CategoriesTable;
use \App\Livewire\EditCategory;
use \App\Livewire\CreateCategory;

Route::get('/tournaments/{tournament}/categories', CategoriesTable::class)
    ->middleware(['auth', 'verified'])
    ->name('categories');

Route::get('/tournaments/{tournament}/categories/create', CreateCategory::class)
    ->middleware(['auth', 'verified'])
    ->name('categories.create');

Route::get('/tournaments/{tournament}/categories/{category}', EditCategory::class)
    ->middleware(['auth', 'verified'])
    ->name('categories.edit');

