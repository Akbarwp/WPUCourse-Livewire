<?php

use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', Users::class)->name('users');
