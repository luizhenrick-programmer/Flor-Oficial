<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'imagem' => ['required', 'text'],
            'cpf' => ['required', 'string', 'max:14'],
            'telefone' => ['required', 'string', 'max:14'],
            'username' => ['required', 'unique:users,username'],
            'role' => ['required', 'in:admin,gerente,vendedor,cliente'],
            'endereco' => ['required', 'integer', 'exists:enderecos,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'status' => ['required', 'in:ativo,inativo'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'username' => $request->username,
            'role' => $request->role,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
