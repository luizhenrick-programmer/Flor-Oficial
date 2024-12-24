<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');

    }

    public function ecommerce(){
        return view('admin.ecommerce.index');
    }

    public function cadFuncionario(){
        return view('admin.colaboradores.cad-funcionario');
    }


    public function colaboradores(){
        return view('admin.colaboradores.index');
    }

    public function financeiro(){
        return view('admin.financeiro.index');
    }
}
