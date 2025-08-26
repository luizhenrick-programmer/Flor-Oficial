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
        return view('auth.register-one');
    }

    public function register_one()
    {
        return view('auth.register-one');
    }

    public function register_one_post(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Salva dados na sessão (NÃO no banco ainda)
        session(['register_data' => $validated]);

        return redirect()->route('register.two');
    }

    public function register_two()
    {
        // Impede de acessar a segunda etapa sem a primeira
        if (!session()->has('register_data')) {
            return redirect()->route('register.step1');
        }

        return view('auth.register-two');
    }

    public function register_two_post(Request $request)
    {
        $validated = $request->validate([
            'telefone' => 'required',
            'cpf' => 'required|string|max:255',
            'username' => 'required|string|max:255',
        ]);

        // Recupera dados da sessão
        $step1Data = session('register_data');

        // Cria usuário no banco
        $user = User::create([
            'name'     => $step1Data['name'],
            'email'    => $step1Data['email'],
            'password' => Hash::make($step1Data['password']),
            'cpf'    => $validated['cpf'],
            'telefone'  => $validated['telefone'],
            'username' => $validated['username'],
            'role' => 'cliente'
        ]);

        // Limpa a sessão
        session()->forget('register_data');

        // Autentica o usuário
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Cadastro concluído com sucesso!');
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
            'role' => ['required', 'in:admin,cliente'],
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

        return redirect(route('dashboard'));
    }
}
