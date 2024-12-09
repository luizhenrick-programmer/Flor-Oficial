<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\GerenteController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VendedorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\Pagamento;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('dashboard');

Route::get('/comprar', function () {
    return view('shop');
})->name('shopping');

Route::get('/sobre', function () {
    return view('about');
})->name('about');

Route::get('/contato', function () {
    return view('contact');
})->name('contact');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/cadastrar-funcionario', [AdminController::class, 'cadFuncionario'])->name('admin.cad-funcionario');
});

// Rotas para gerentes
Route::middleware(['auth', 'gerente'])->group(function () {
    Route::get('gerente/dashboard', [GerenteController::class, 'dashboard'])->name('gerente.dashboard');
});

// Rotas para vendedores
Route::middleware(['auth', 'vendedor'])->group(function () {
    Route::get('vendedor/dashboard', [VendedorController::class, 'dashboard'])->name('vendedor.dashboard');
});

// Rotas para clientes
Route::middleware(['auth', 'cliente'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('cliente.dashboard');
});

require __DIR__.'/auth.php';
