<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if ( Cache::has('id_cancha') ){
            $id_cancha = Cache::get('id_cancha'); 
            $id_turno = Cache::get('id_turno');
            $fecha = Cache::get('fecha');
            return redirect()->action('ReservaController@senia',
                ['id_cancha' => $id_cancha,'id_turno' => $id_turno,'fecha' => $fecha]);
        }
        else
        {
            return view('index');//home
        }
        
    }

    public function contacto()
    {
        return view('contacto');/*home*/
    }

    public function reservas ()
    {
        return redirect()->action('ReservaController@index');
    }
}
