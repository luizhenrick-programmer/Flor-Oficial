@extends('layouts.app')

@section('titulo', 'Flor Oficial')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white shadow-lg rounded-lg max-w-3xl">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Escolha seu método de pagamento</h2>

        <!-- Opções de Pagamento -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
            <button class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition w-full" onclick="showPayment('cartao')">
                <i class="fas fa-credit-card mr-2"></i> Cartão
            </button>
            <button class="bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition w-full" onclick="showPayment('pix')">
                <i class="fas fa-qrcode mr-2"></i> Pix
            </button>
            <button class="bg-purple-600 text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition w-full" onclick="showPayment('link')">
                <i class="fas fa-link mr-2"></i> Link de Pagamento
            </button>
        </div>

        <hr class="my-6">

        <!-- Formulário de Pagamento -->
        <div id="cartao" class="payment-method hidden">
            <h3 class="text-xl font-semibold mb-4">Pagamento com Cartão</h3>
            <form>
                <div class="mb-3">
                    <label class="block text-gray-700">Número do Cartão</label>
                    <input type="text" class="form-control" placeholder="**** **** **** ****">
                </div>
                <div class="mb-3 flex gap-4">
                    <div class="w-1/2">
                        <label class="block text-gray-700">Validade</label>
                        <input type="text" class="form-control" placeholder="MM/AA">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700">CVV</label>
                        <input type="text" class="form-control" placeholder="***">
                    </div>
                </div>
                <button class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition w-full">Pagar com Cartão</button>
            </form>
        </div>

        <div id="pix" class="payment-method hidden">
            <h3 class="text-xl font-semibold mb-4">Pagamento via Pix</h3>
            <div class="text-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Qr-code-verde.png" alt="QR Code Pix" class="mx-auto w-40">
                <p class="mt-3 text-gray-700">Escaneie o QR Code ou copie o código abaixo:</p>
                <p class="text-gray-900 font-mono bg-gray-200 p-2 rounded-lg inline-block">00020126490014BR.GOV.BCB.PIX...</p>
                <button class="bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition w-full mt-4">Copiar Código</button>
            </div>
        </div>

        <div id="link" class="payment-method hidden">
            <h3 class="text-xl font-semibold mb-4">Pagamento via Link</h3>
            <p class="text-gray-700 mb-3">Clique no botão abaixo para gerar um link de pagamento.</p>
            <button class="bg-purple-600 text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition w-full">Gerar Link</button>
        </div>
    </div>

    <script>
        function showPayment(method) {
            document.querySelectorAll('.payment-method').forEach(el => el.classList.add('hidden'));
            document.getElementById(method).classList.remove('hidden');
        }
    </script>
