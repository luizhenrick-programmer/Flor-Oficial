<?php

namespace App\Providers;

use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    View::composer('*', function ($view) {
        $user = Auth::user();
        $carrinho = null;

        if ($user) {
            $carrinho = Carrinho::with('itens')->where('user_id', $user->id)->first();
        }

        $view->with('carrinho', $carrinho);
    });
}
}
