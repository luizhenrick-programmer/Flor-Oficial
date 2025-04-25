<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ColaboradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function index()
    {
        $colaboradores = User::whereIn('role', ['gerente', 'vendedor'])->get();
        return view('colaboradores.index', compact('colaboradores'));
    }

    public function create()
    {
        return view('colaboradores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'senha' => 'required|min:6',
            'role' => 'required|in:gerente,vendedor',
        ]);

        User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'role' => $request->role,
        ]);

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    public function destroy(User $colaborador)
    {
        $colaborador->delete();
        return redirect()->route('colaboradores.index')->with('success', 'Colaborador removido!');
    }
}
