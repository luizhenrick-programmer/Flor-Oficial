@extends('layouts.app')

@section('titulo', 'Pagamento')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg m-10">
    <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">Pagamento</h2>

    {{-- Seletor de métodos de pagamento --}}
    <div class="grid grid-cols-3 gap-2 justify-center my-6">
        <input type="radio" id="cartao" name="metodo_pagamento" class="hidden peer/cartao" checked>
        <label for="cartao"
            class="cursor-pointer bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition-all peer-checked/cartao:bg-blue-600 peer-checked/cartao:text-white">
            <i class="fas fa-credit-card mr-2"></i> Cartão
        </label>

        <input type="radio" id="pix" name="metodo_pagamento" class="hidden peer/pix">
        <label for="pix"
            class="cursor-pointer bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition-all peer-checked/pix:bg-green-600 peer-checked/pix:text-white">
            <i class="fas fa-qrcode mr-2"></i> Pix
        </label>

        <input type="radio" id="link" name="metodo_pagamento" class="hidden peer/link">
        <label for="link"
            class="cursor-pointer bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition-all peer-checked/link:bg-purple-600 peer-checked/link:text-white">
            <i class="fas fa-link mr-2"></i> Link
        </label>
    </div>

    {{-- Cartão --}}
    <section id="cartaoContainer">
        <form>
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Número do cartão</label>
                <input type="text" name="card_number" class="w-full p-2 border rounded-lg" placeholder="Digite somente números" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Nome do titular</label>
                <input type="text" name="cardholder_name" class="w-full p-2 border rounded-lg" placeholder="Nome impresso no cartão" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email do comprador</label>
                <input type="email" name="payer_email" class="w-full p-2 border rounded-lg" placeholder="exemplo@email.com" required>
            </div>

            <div class="flex gap-4 mb-4">
                <div class="w-1/3">
                    <label class="block text-gray-700">Mês</label>
                    <select name="expiration_month" class="w-full p-2 border rounded-lg" required>
                        <option value="" disabled selected>MM</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                        @endfor
                    </select>
                </div>

                <div class="w-1/3">
                    <label class="block text-gray-700">Ano</label>
                    <select name="expiration_year" class="w-full p-2 border rounded-lg" required>
                        <option value="" disabled selected>AAAA</option>
                        @for ($i = date('Y'); $i <= date('Y') + 10; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="w-1/3">
                    <label class="block text-gray-700">CVV</label>
                    <input type="text" name="security_code" class="w-full p-2 border rounded-lg" placeholder="CVV" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Parcelas</label>
                <select name="installments" class="w-full p-2 border rounded-lg" required>
                    <option value="1">1x de R$ {{ number_format($pedido->total, 2, ',', '.') }}</option>
                </select>
            </div>

            <div class="mb-4 p-4 border rounded-lg bg-gray-100">
                <p class="font-semibold">Detalhes da compra</p>
                <p class="text-gray-700">Curso Gateways de Pagamentos com PHP8</p>
                <p class="text-gray-900 font-semibold">R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
            </div>

            <a type="submit" href="{{ route('pagamento.store') }}"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Comprar agora</a>
        </form>
    </section>

    {{-- PIX --}}
    <section id="pixContainer" class="hidden">
        <div class="mb-4 p-4 border rounded-lg bg-gray-100">
            <p class="font-semibold">Detalhes da compra</p>
            <p class="text-gray-700">Curso Gateways de Pagamentos com PHP8</p>
            <p class="text-gray-900 font-semibold">R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
        </div>
        <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">Gerar QRCode</button>
    </section>

    {{-- Link --}}
    <section id="linkContainer" class="hidden">
        <div class="mb-4 p-4 border rounded-lg bg-gray-100">
            <p class="font-semibold">Detalhes da compra</p>
            <p class="text-gray-700">Curso Gateways de Pagamentos com PHP8</p>
            <p class="text-gray-900 font-semibold">R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
        </div>
        <button class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition">Gerar Link de Pagamento</button>
    </section>

    <div id="wallet_container"></div>
</div>

{{-- Scripts --}}
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cartao = document.getElementById('cartao');
        const pix = document.getElementById('pix');
        const link = document.getElementById('link');

        const containerCartao = document.getElementById('cartaoContainer');
        const containerPix = document.getElementById('pixContainer');
        const containerLink = document.getElementById('linkContainer');

        function atualizarExibicao() {
            containerCartao.classList.toggle('hidden', !cartao.checked);
            containerPix.classList.toggle('hidden', !pix.checked);
            containerLink.classList.toggle('hidden', !link.checked);
        }

        [cartao, pix, link].forEach(input => input.addEventListener('change', atualizarExibicao));
        atualizarExibicao();
    });

    // Inicialize o Mercado Pago com sua chave pública
    const mp = new MercadoPago(env('NEXT_PUBLIC_MERCADO_PAGO_PUBLIC_KEY'));

    // Crie o botão de pagamento no container especificado
    mp.bricks().create("wallet", "wallet_container", {
      initialization: {
        preferenceId: "787997534-6dad21a1-6145-4f0d-ac21-66bf7a5e7a58", // Substitua com seu ID de preferência
      }
    });

</script>
@endsection
