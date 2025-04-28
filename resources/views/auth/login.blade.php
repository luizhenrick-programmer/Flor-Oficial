@extends('layouts.app')

@section('titulo', 'Flor Oficial')

@section('content')
    <div class="py-3 flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-lg">
            <div class="flex flex-row items-center justify-center">
                <img class="rounded-full w-16 h-16 mx-2" src="{{ ('assets\images\Flor Oficial A.png') }}" alt="Logo">
                <h1 class="text-lg font-bold text-black montserrat my-0 mx-0">Flor Oficial</h1>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Senha -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Manter conectado -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Manter-se conectado') }}</span>
                    </label>
                </div>

                <!-- Ações -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-700 no-underline hover:text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                    <x-primary-button>
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>

                <!-- Cadastro -->
                <div class="mt-6 text-center">
                    @if (Route::has('register'))
                        <p class="text-sm text-gray-600">
                            {{ __('Ainda não tem uma conta?') }}
                            <a class="text-indigo-600 hover:underline font-semibold" href="{{ route('register') }}">
                                {{ __('Cadastre-se') }}
                            </a>
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
