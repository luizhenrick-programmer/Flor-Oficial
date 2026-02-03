@props(['produto'])

<div class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-white shadow-md transition-all hover:-translate-y-1 hover:shadow-xl border border-gray-100">
    
    {{-- Link na imagem inteira --}}
    <a href="{{ route('produtos.show', $produto->id) }}" class="relative block overflow-hidden">
        {{-- Imagem Quadrada --}}
        <div class="aspect-square bg-gray-100">
            @if ($produto->imagemPrincipal)
                <img src="{{ $produto->imagemPrincipal->url_completa }}" 
                     alt="{{ $produto->nome }}"
                     loading="lazy"
                     class="h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-110">
            @else
                <div class="flex h-full w-full items-center justify-center text-gray-300">
                    <i class="fa-solid fa-image text-4xl"></i>
                </div>
            @endif
        </div>

        {{-- Badge de Desconto (Bem visível) --}}
        @if ($produto->desconto > 0)
            @php $porcentagem = round(($produto->desconto / $produto->preco) * 100); @endphp
            <div class="absolute top-2 left-2 rounded-md bg-red-600 px-2 py-1 text-xs font-bold text-white shadow-sm">
                -{{ $porcentagem }}%
            </div>
        @endif
    </a>

    {{-- Corpo do Card --}}
    <div class="flex flex-1 flex-col p-4">
        {{-- Categoria --}}
        <p class="text-xs font-semibold text-gray-400 uppercase mb-1">
            {{ $produto->categoria->nome ?? 'Geral' }}
        </p>

        {{-- Título --}}
        <h3 class="mb-2 text-sm font-bold text-gray-800 line-clamp-2 min-h-[40px]">
            <a href="{{ route('produtos.show', $produto->id) }}" class="hover:text-purple-700 transition-colors">
                {{ $produto->nome }}
            </a>
        </h3>

        {{-- Preços --}}
        <div class="mt-auto">
            @if ($produto->desconto > 0)
                <div class="flex items-end gap-2">
                    <span class="text-xs text-gray-400 line-through">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                    <span class="text-lg font-extrabold text-green-600">R$ {{ number_format($produto->preco - $produto->desconto, 2, ',', '.') }}</span>
                </div>
                <p class="text-[10px] text-green-600 font-semibold">em até 3x sem juros</p>
            @else
                <span class="text-lg font-extrabold text-gray-900">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                <p class="text-[10px] text-gray-500 font-semibold">em até 3x sem juros</p>
            @endif
        </div>

        {{-- Botão de Ação (Sempre visível e chamativo) --}}
        <form action="{{ route('carrinho.add') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="produto_id" value="{{ $produto->id }}">
            {{-- Se tiver variação, o botão deve levar para a página do produto --}}
            @if($produto->variacoes->count() > 0)
                 <a href="{{ route('produtos.show', $produto->id) }}" 
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-purple-600 py-2.5 text-sm font-bold text-white transition-colors hover:bg-purple-700 shadow-sm">
                    <i class="fa-solid fa-eye"></i> VER OPÇÕES
                 </a>
            @else
                {{-- Se for produto simples, adiciona direto --}}
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg bg-green-600 py-2.5 text-sm font-bold text-white transition-colors hover:bg-green-700 shadow-sm">
                    <i class="fa-solid fa-cart-shopping"></i> COMPRAR
                </button>
            @endif
        </form>
    </div>
</div>