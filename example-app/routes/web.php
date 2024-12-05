<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/hello', function () {
    return "Olá!!!";
});

Route::get('/hello/{name}', function ($name) {
    return "Olá, $name!!!";
})->middleware('auth');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    // return view('welcome');
    return redirect()->route('home');
})->name('fallback');

require __DIR__.'/auth.php';
