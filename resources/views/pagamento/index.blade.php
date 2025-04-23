@extends('layouts.app')

@section('titulo', 'Pagamento')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg m-10">
        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">Pagamento</h2>

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
                <i class="fas fa-link mr-2"></i> Link de Pagamento
            </label>
        </div>


        <!-- Script para trocar a exibição dos métodos de pagamento -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const cartao = document.getElementById('cartao');
                const pix = document.getElementById('pix');
                const link = document.getElementById('link');
                const containerCartao = document.getElementById('cartaoContainer');
                const containerPix = document.getElementById('pixContainer');
                const containerLink = document.getElementById('linkContainer');

                function atualizarExibicao() {
                    if (cartao.checked) {

                        containerCartao.classList.remove("hidden");
                        containerPix.classList.add("hidden");
                        containerLink.classList.add("hidden");

                    } else if (pix.checked) {

                        containerPix.classList.remove("hidden");
                        containerCartao.classList.add("hidden");
                        containerLink.classList.add("hidden");

                    } else {

                        containerLink.classList.remove("hidden");
                        containerPix.classList.add("hidden");
                        containerCartao.classList.add("hidden");
                    }
                }

                // Adiciona os eventos de mudança
                document.querySelectorAll('input[name="metodo_pagamento"]').forEach(input => {
                    input.addEventListener('change', atualizarExibicao);
                });

                // Chama a função no carregamento da página para garantir a exibição correta
                atualizarExibicao();
            });
        </script>

        <section id="cartaoContainer" class="hidden">
            <div class="flex items-center justify-center">
                <div
                    class="relative w-80 h-40 bg-gray-800 rounded-lg mb-6 p-4 text-white shadow-md transition-transform transform hover:scale-105">
                    <div class="absolute top-4 left-4 w-12 h-8 bg-gray-400 rounded"></div>
                    <div class="mt-12 text-lg font-mono tracking-widest">**** **** **** ****</div>
                    <div class="mt-2 flex justify-between text-sm">
                        <span>NOME DO TITULAR</span>
                        <span>MM/AA</span>
                    </div>
                </div>
            </div>

            <form>
                <div class="mb-4">
                    <label class="block text-gray-700">Número do cartão</label>
                    <input type="text" class="w-full p-2 border rounded-lg" placeholder="Digite somente números">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nome do titular</label>
                    <input type="text" class="w-full p-2 border rounded-lg" placeholder="Digite o nome impresso no cartão">
                </div>
                <div class="flex gap-4 mb-4">
                    <div class="w-1/3">
                        <label class="block text-gray-700">Mês</label>
                        <select class="w-full p-2 border rounded-lg">
                            <option value="" class="hidden" disabled selected>MM</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="w-1/3">
                        <label class="block text-gray-700">Ano</label>
                        <select class="w-full p-2 border rounded-lg">
                            <option value="" class="hidden" selected>AAAA</option>
                            @for ($i = date('Y'); $i <= date('Y') + 10; $i++)
                                <option>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="w-1/3">
                        <label class="block text-gray-700">CVV</label>
                        <input type="text" class="w-full p-2 border rounded-lg" placeholder="CVV">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Selecione o número de parcelas</label>
                    <select class="w-full p-2 border rounded-lg">
                        <option>12x de R$ 12,50</option>
                    </select>
                </div>
                <div class="mb-4 p-4 border rounded-lg bg-gray-100">
                    <p class="font-semibold">Detalhes da compra</p>
                    <p class="text-gray-700">Curso Gateways de Pagamentos com PHP8</p>
                    <p class="text-gray-900 font-semibold">12x de R$ 12,50</p>
                </div>
                <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Comprar
                    agora</button>
            </form>
        </section>

        <section id="pixContainer" class="hidden">
            <div class="mb-4 p-4 border rounded-lg bg-gray-100">
                <p class="font-semibold">Detalhes da compra</p>
                <p class="text-gray-700">Curso Gateways de Pagamentos com PHP8</p>

                @if($pagamento && $pagamento->pedido)
                    <p class="text-gray-900 font-semibold">R$ {{ number_format($pagamento->pedido->total, 2, ',', '.') }}</p>
                @else
                    <p class="text-gray-500">Nenhum pagamento encontrado.</p>
                @endif
            </div>
            <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">Gerar QRCode</button>
        </section>


        <section id="linkContainer" class="hidden">
            <div class="mb-4 p-4 border rounded-lg bg-gray-100">
                <p class="font-semibold">Detalhes da compra</p>
                <p class="text-gray-700">Curso Gateways de Pagamentos com PHP8</p>
                <p class="text-gray-900 font-semibold">R$ 150,00</p>
            </div>
            <button class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition">Gerar Link de
                Pagamento</button>
        </section>
    </div>
@endsection
