<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cancha;

class main extends Controller
{
    public function getCancha(){
        $c = Cancha::find(1);
        $tipo = $c->tipo;
        return view('canchaView',[$tipo => $tipo]);
    }
}
