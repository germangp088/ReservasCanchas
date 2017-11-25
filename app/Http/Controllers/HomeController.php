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
    
        if ( Cache::has('myValue') ){
            echo "Mi valor->".Cache::get('myValue');
            //Cache::forget ('myValue');
            return redirect()->action('CanchaTurnoController@index');
            
        }
        else{
            echo "no existe la key en la cache";
            return view('index');//home
        }
    
/*
        if ( Cache::has('myValue') ){
            echo "Mi valor->".Cache::get('myValue');
            return view('index', ['cache'=>1 ]);
        } else {
            return view('index')
        }
 */

        
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
