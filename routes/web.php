<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('comprar', [UserController::class, 'comprar'])->name('shopping');

Route::get('/sobre', function () {
    return view('about');
})->name('about');

Route::get('/contato', function () {
    return view('contact');
})->name('contact');

// rota de pesquisa
Route::get('/search', [SearchController::class, 'index'])->name('search');


// CRUD USUÁRIO
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'gerente'])->group(function () {
    Route::get('gerente/dashboard', [GerenteController::class, 'dashboard'])->name('gerente.dashboard');
});

Route::middleware(['auth', 'vendedor'])->group(function () {
    Route::get('vendedor/dashboard', [VendedorController::class, 'dashboard'])->name('vendedor.dashboard');
    Route::get('vendedor/vendas', [VendedorController::class, 'vendas'])->name('vendedor.vendas');
    Route::get('vendedor/lista', [VendedorController::class, 'lista'])->name('vendedor.listaProd');
});


// ROTAS E-COMMERCE
Route::middleware(['auth', 'admin'])->prefix('e-commerce')->group(function () {
    Route::get('/index', [AdminController::class, 'ecommerce'])->name('e-commerce.index');
    Route::get('/categorias', [AdminController::class, 'categoria'])->name('e-commerce.categorias');
    Route::get('/categorias/criar', [AdminController::class, 'criarCategoria'])->name('e-commerce.criar_categoria');
    Route::post('/categorias/criar/enviar', [AdminController::class, 'store_categoria'])->name('e-commerce.categoria.store');
    Route::get('/marcas', [AdminController::class, 'marcas'])->name('e-commerce.marcas');
    Route::get('/marcas/criar', [AdminController::class, 'criarMarcas'])->name('e-commerce.criar_marcas');
    Route::post('/marcas/criar/enviar', [AdminController::class, 'store_marcas'])->name('e-commerce.marcas.store');
    Route::get('/clientes', [AdminController::class, 'clientes'])->name('e-commerce.clientes');
});

// ROTAS PRODUTO
Route::middleware(['auth'])->group(function () {
    Route::resource('produtos', ProdutoController::class);
});

// ROTAS COLABORADORES
Route::middleware(['auth'])->group(function () {
    Route::resource('colaboradores', ColaboradorController::class);
});

// ROTAS FINANCEIRO
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/financeiro', [AdminController::class, 'ReceitasDespesas'])->name('financeiro');
});

Route::resource('carrinho', CarrinhoController::class);
Route::post('carrinho/add', [CarrinhoController::class, 'add'])->name('carrinho.add');
Route::post('carrinho/remove', [CarrinhoController::class, 'removeItem'])->name('carrinho.removeItem');
Route::put('/carrinho/atualizar-quantidade', [CarrinhoController::class, 'update'])->name('carrinho.update');
Route::resource('pedido', PedidoController::class);
Route::resource('pagamento', PagamentoController::class);

require __DIR__ . '/auth.php';
