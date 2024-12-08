@extends('layouts.app') {{-- herança --}}

@section('titulo', 'Contato')

@section('content')
    <main>
        <div class="container mt-5">
            <h2 class="fw-bold fs-2">Nosso Contato</h2>
            <h3 class="fw-bold fs-5 mt-3">Fale com a gente</h3>
            <form class="mt-5">
                <div>
                    <x-input-label for="name" :value="__('Nome Completo')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Telefone')" />
                    <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" required autofocus autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" required autofocus autocomplete="email" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="message" :value="__('Mensagem')" />
                    <textarea class="mt-1 block w-full rounded" name="message" id="message" cols="30" rows="10"></textarea>
                </div>

            </form>
        </div>
    </main>
@endsection
