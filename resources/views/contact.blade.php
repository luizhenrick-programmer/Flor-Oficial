@extends('layouts.app') {{-- herança --}}

@section('titulo', 'Contato')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <h2 class="text-2xl font-extrabold text-gray-800">Estamos Aqui para Você</h2>
        <h3 class="text-lg font-semibold text-gray-600 mt-3">Precisa de ajuda ou tem algo a dizer? Estamos à disposição.</h3>
        <form class="mt-6 space-y-6">
            {{-- Nome Completo --}}
            <div>
                <x-input-label for="name" :value="__('Nome Completo')" />
                <x-text-input id="name" name="name" type="text"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            {{-- Telefone --}}
            <div>
                <x-input-label for="phone" :value="__('Telefone')" />
                <x-text-input id="phone" name="phone" type="tel"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required autofocus autocomplete="phone" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            {{-- Email --}}
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required autofocus autocomplete="email" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            {{-- Mensagem --}}
            <div>
                <x-input-label for="message" :value="__('Mensagem')" />
                <textarea id="message" name="message" rows="5"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('message')" />
            </div>

            {{-- Botão Enviar --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Enviar
                </button>
            </div>
        </form>
    </div>
@endsection
