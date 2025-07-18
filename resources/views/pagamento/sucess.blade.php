@extends('layouts.app')

@section('content')
    <x-modal name="modal-sucesso" :show="true">
        <div class="p-6">
            <h2 class="text-xl font-bold text-green-600">Pagamento aprovado!</h2>
            <p class="mt-2 text-gray-700">
                Seu pagamento foi processado com sucesso. Obrigado!
            </p>
            <div class="mt-4 text-right">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                    x-on:click="$dispatch('close-modal', 'modal-sucesso')">
                    Fechar
                </button>
            </div>
        </div>
    </x-modal>

@endsection
