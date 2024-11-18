<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pagamento extends Controller
{

    public function index() {
        return view('pagamento');
    }
}
