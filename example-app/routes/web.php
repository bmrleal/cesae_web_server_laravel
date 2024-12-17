<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('orders.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
Rotas relacionadas com as orders (lista e CRUD).
O middleware "auth" valida que o acesso às rotas apenas é possível para utilizadores autenticados.
*/
Route::middleware('auth')->group(function() {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); // Lista de orders.
    Route::get('/orders/{id}', [OrderController::class, 'show'])->where('id', '[0-9]+')->name('orders.show'); // Detalhe de uma order.
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create'); // Formulário para criação de nova order.
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store'); // Gravação, na bd, de nova order.
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit'); // Formulário para edição (do "status") de order.
    Route::patch('/orders/{id}/update', [OrderController::class, 'update'])->name('orders.update'); // Gravação, na bd, das alterações a uma order.
    Route::delete('/orders/{id}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy'); // Eliminção (na bd) de order.
});
/*
Rotas relacionadas com os customers (lista e vista de detalhe).
O middleware "auth" valida que o acesso às rotas apenas é possível para utilizadores autenticados.
*/
Route::middleware('auth')->group(function() {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index'); // Lista de customers.
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show'); // Detalhe de um customer.
});

require __DIR__.'/auth.php';