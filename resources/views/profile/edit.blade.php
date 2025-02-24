
@extends('layouts.app') {{-- herança --}}

@section('titulo', 'Sobre')

@section('content')
<div class="conteiner d-flex justify-content-center py-4">
    <div class="content">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl mb-6">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="max-w-xl mb-6">
                @include('profile.partials.update-password-form')
            </div>
            <div class="max-w-xl mb-6">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

@endsection
