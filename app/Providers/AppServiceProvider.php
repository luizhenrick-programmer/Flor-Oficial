<?php

namespace App\Providers;

use App\Models\Carrinho;
use App\Models\Categorias;
use App\Models\ItemCarrinho;
use App\Models\Marcas;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $user = Auth::user();

            $carrinho = null;
            if ($user) {
                $carrinho = Carrinho::with('itens')->where('user_id', $user->id)->first();
            }

            $view->with('carrinho', $carrinho);

            if ($user && $user->is_admin) {

                $carrinhosAtivos = Carrinho::with(['itens.produto', 'user'])
                    ->whereHas('itens')
                    ->latest()
                    ->get();

                $view->with('carrinhosAtivos', $carrinhosAtivos);

            } else {

                $view->with('carrinhosAtivos', null);

            }

            $produtos = $produtos = Produto::paginate(10);
            $view->with('produtos', $produtos);

            $categorias = Categorias::all();
            $view->with('categorias', $categorias);

            $marcas = Marcas::all();
            $view->with('marcas', $marcas);
        });
    }
}
