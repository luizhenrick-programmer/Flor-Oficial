<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/flor-compras-oficial', function () {
    return view('loja');
})->name('shopping');

Route::get('/sobre-a-flor', function () {
    return view('about');
})->name('about');

Route::get('/venha-conversar-conosco', function () {
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


// ROTAS E-COMMERCE
Route::middleware(['auth'])->prefix('e-commerce')->group(function () {
    Route::get('/index', [EcommerceController::class, 'index'])->name('e-commerce.index');
    Route::get('/categorias', [EcommerceController::class, 'categoria'])->name('e-commerce.categorias');
    Route::get('/categorias/criar', [EcommerceController::class, 'criarCategoria'])->name('e-commerce.criar_categoria');
    Route::post('/categorias/criar/enviar', [EcommerceController::class, 'store_categoria'])->name('e-commerce.categoria.store');
    Route::get('/marcas', [EcommerceController::class, 'marcas'])->name('e-commerce.marcas');
    Route::get('/marcas/criar', [EcommerceController::class, 'criarMarcas'])->name('e-commerce.criar_marcas');
    Route::post('/marcas/criar/enviar', [EcommerceController::class, 'store_marcas'])->name('e-commerce.marcas.store');
    Route::get('/clientes', [EcommerceController::class, 'clientes'])->name('e-commerce.clientes');

     Route::get('/relatorio', [EcommerceController::class, 'relatorio'])->name('e-commerce.relatorio');

    Route::get('/pedido/confirmado', [EcommerceController::class, 'pedidoConfirma'])->name('e-commerce.pedidos.confirma');
    Route::get('/pedido/cancelado', [EcommerceController::class, 'pedidoCancelado'])->name('e-commerce.pedidos.cancelado');
    Route::get('/pedido/pendente', [EcommerceController::class, 'pedidoPendente'])->name('e-commerce.pedidos.pendente');
    Route::get('/pedido/remessas', [EcommerceController::class, 'remessas'])->name('e-commerce.pedidos.remessas');
});

Route::middleware(['auth', 'admin'])->prefix('e-commerce')->group(function () {
    Route::resource('produtos', ProdutoController::class);
});


// ROTAS FINANCEIRO
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro');
});


Route::get('/checkout', [PagamentoController::class, 'checkout'])->name('pagamento.checkout');
Route::get('/pagamento/sucesso', [PagamentoController::class, 'aprovado'])->name('pagamento.sucesso');
Route::get('/pagamento/falha', fn() => 'Pagamento falhou')->name('pagamento.falha');
Route::get('/pagamento/pendente', fn() => 'Pagamento pendente')->name('pagamento.pendente');


Route::resource('carrinho', CarrinhoController::class);
Route::post('carrinho/add', [CarrinhoController::class, 'add'])->name('carrinho.add');
Route::put('/carrinho/atualizar-quantidade', [CarrinhoController::class, 'update'])->name('carrinho.update');
Route::resource('pedido', PedidoController::class);
Route::resource('pagamento', PagamentoController::class);

require __DIR__ . '/auth.php';
