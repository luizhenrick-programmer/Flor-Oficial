<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EcommerceController,
    ProdutoController,
    CarrinhoController,
    PedidoController,
    PagamentoController,
    AdminController,
    ProfileController,
    FreteController
};

/*
|--------------------------------------------------------------------------
| 1. ROTAS PÚBLICAS (Qualquer um acessa)
|--------------------------------------------------------------------------
*/

// Home Page (Landing Page com Destaques)
Route::get('/', [EcommerceController::class, 'index'])->name('home');

// Vitrine da Loja (Listagem de Produtos com Filtros)
Route::get('/loja', [ProdutoController::class, 'index'])->name('loja.index');

// Detalhes do Produto
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produtos.show');

// Busca
Route::get('/search', [EcommerceController::class, 'search'])->name('search');

// Páginas Institucionais
Route::get('/sobre', [EcommerceController::class, 'about'])->name('about');
Route::get('/contato', [EcommerceController::class, 'contact'])->name('contact');
Route::post('/contato/enviar', [EcommerceController::class, 'sendContact'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| 2. ROTAS DO CLIENTE (Precisa estar logado)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // --- Carrinho de Compras ---
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/carrinho/adicionar', [CarrinhoController::class, 'add'])->name('carrinho.add');
    Route::post('/carrinho/atualizar', [CarrinhoController::class, 'update'])->name('carrinho.update');
    Route::delete('/carrinho/{id}', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');
    Route::post('/frete/calcular', [FreteController::class, 'calcular'])->name('frete.calcular');

    // --- Checkout e Pedidos ---
    // Transforma carrinho em pedido
    Route::post('/checkout/processar', [PedidoController::class, 'store'])->name('pedido.store');
    
    // Tela de Pagamento
    Route::get('/checkout/pagamento/{pedido?}', [PagamentoController::class, 'checkout'])->name('pagamento.checkout');
    
    // Meus Pedidos
    Route::get('/meus-pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/meus-pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
    Route::patch('/meus-pedidos/{id}/cancelar', [PedidoController::class, 'update'])->name('pedidos.cancelar');

    // --- Perfil do Usuário (Padrão Breeze/Jetstream) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| 3. ROTAS ADMINISTRATIVAS (Logado + Permissão Admin/Gerente)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Principal
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Gestão de Produtos (CRUD Completo exceto show/index que são públicos)
    Route::resource('produtos', ProdutoController::class)->except(['show', 'index']);
    
    // Gestão de Categorias
    Route::get('/categorias', [AdminController::class, 'categorias'])->name('categorias.index');
    Route::post('/categorias', [AdminController::class, 'storeCategoria'])->name('categorias.store');
    Route::delete('/categorias/{id}', [AdminController::class, 'destroyCategoria'])->name('categorias.destroy');

    // Gestão de Marcas
    Route::get('/marcas', [AdminController::class, 'marcas'])->name('marcas.index');
    Route::post('/marcas', [AdminController::class, 'storeMarca'])->name('marcas.store');

    // Gestão de Pessoas
    Route::get('/clientes', [AdminController::class, 'clientes'])->name('clientes.index');
    Route::get('/funcionarios', [AdminController::class, 'funcionarios'])->name('funcionarios.index');
    Route::get('/funcionarios/novo', [AdminController::class, 'createFuncionario'])->name('funcionarios.create');
    Route::post('/funcionarios', [AdminController::class, 'storeFuncionario'])->name('funcionarios.store');

    // Financeiro e Relatórios
    Route::get('/financeiro', [AdminController::class, 'financeiro'])->name('financeiro.index');
    Route::get('/relatorios', [AdminController::class, 'relatorios'])->name('relatorios.index');
});

require __DIR__ . '/auth.php';