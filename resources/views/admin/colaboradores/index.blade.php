@extends('admin.app')

@section('titulo', 'Colaboradores')

@section('content')
    <div class="container-xl flex flex-col py-5">
        <x-text color='gray-200' size='xs' bold='true'>COLABORADORES</x-text>
        <div class="bg-gray-700 rounded-lg border-l-4 border-violet-500 text-gray-200 mt-4 p-3" role="alert">
            <div class="flex items-center">
                <div class="mr-3">
                    <svg class="icon alert-icon svg-icon-ti-ti-alert-circle" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                        <path d="M12 8v4"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                </div>
                <x-text color="gray-200" size="md">Olá {{ Auth::user()->name }}, bem-vindo ao painel de controle! Use
                    as ferramentas com responsabilidade e cuidado!</x-text>
            </div>
        </div>
    </div>
@endsection
