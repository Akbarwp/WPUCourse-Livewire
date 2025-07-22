<?php

use App\Livewire\Games;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', Users::class)->name('users');
Route::get('games', Games::class)->name('games');
// Route::get('users', function() {
//     return view('users');
// })->name('users');
