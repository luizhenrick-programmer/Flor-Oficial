<x-guest-layout>
    <form method="POST" action="{{ route('register.two.post') }}">
        @csrf

        <!-- Linha com CPF, Telefone e Username -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <!-- CPF -->
            <div>
                <x-input-label for="cpf" :value="__('CPF')" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
                <x-input-error :messages="$errors->get('cpf')" class="mt-1" />
            </div>

            <!-- Telefone -->
            <div>
                <x-input-label for="telefone" :value="__('Telefone')" />
                <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" required autocomplete="tel" />
                <x-input-error :messages="$errors->get('telefone')" class="mt-1" />
            </div>

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-1" />
            </div>
        </div>

        <!-- Linha com CEP e Número -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
            <div>
                <x-input-label for="cep" :value="__('CEP')" />
                <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required autocomplete="postal-code" />
                <x-input-error :messages="$errors->get('cep')" class="mt-1" />
            </div>

            <div>
                <x-input-label for="numero" :value="__('Número')" />
                <x-text-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero')" required />
                <x-input-error :messages="$errors->get('numero')" class="mt-1" />
            </div>
        </div>

        <!-- Rua e Bairro -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
            <div>
                <x-input-label for="rua" :value="__('Rua')" />
                <x-text-input id="rua" class="block mt-1 w-full" type="text" name="rua" :value="old('rua')" required />
                <x-input-error :messages="$errors->get('rua')" class="mt-1" />
            </div>

            <div>
                <x-input-label for="bairro" :value="__('Bairro')" />
                <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required />
                <x-input-error :messages="$errors->get('bairro')" class="mt-1" />
            </div>
        </div>

        <!-- Linha com Cidade e Estado -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
            <div>
                <x-input-label for="cidade" :value="__('Cidade')" />
                <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')" required autocomplete="address-level2" />
                <x-input-error :messages="$errors->get('cidade')" class="mt-1" />
            </div>

            <div>
                <x-input-label for="estado" :value="__('Estado')" />
                <x-text-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required autocomplete="address-level1" />
                <x-input-error :messages="$errors->get('estado')" class="mt-1" />
            </div>
        </div>

        <!-- Ações -->
        <div class="flex items-center justify-end mt-3">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Já tem login?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
