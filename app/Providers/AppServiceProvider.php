<?php

namespace App\Providers;

use App\Models\Carrinho;
use App\Models\ItemCarrinho;
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

            // Carrinho do usuário logado (para exibir no ícone dele, se quiser)
            $carrinho = null;
            if ($user) {
                $carrinho = Carrinho::with('itens')->where('user_id', $user->id)->first();
            }
            $view->with('carrinho', $carrinho);

            // Se for admin, carrega todos os carrinhos com itens
            if ($user && $user->is_admin) {
                $carrinhosAtivos = Carrinho::with(['itens.produto', 'user'])
                    ->whereHas('itens') // Apenas carrinhos com itens
                    ->latest()
                    ->get();

                $view->with('carrinhosAtivos', $carrinhosAtivos);
            } else {
                $view->with('carrinhosAtivos', null);
            }
        });
    }
}
