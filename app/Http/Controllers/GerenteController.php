<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GerenteController extends Controller
{

    public function dashboard() {
        return view('gerente.dashboard');
    }
}
