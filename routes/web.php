<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
require __DIR__.'/federation.php';
require __DIR__.'/club.php';
require __DIR__.'/trainers.php';
require __DIR__.'/participant.php';
require __DIR__.'/tournaments.php';
require __DIR__.'/category.php';
require __DIR__.'/contestant.php';
require __DIR__.'/import.php';




