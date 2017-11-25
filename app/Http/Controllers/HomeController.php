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
    /*    
    if ( Cache::add('myValue',0,2000) ){
        echo "no existe la key en la cache";
        //Cache::forget ('myValue');
        return view('index');//home
    }
    else{
        echo "Mi valor->".Cache::get('myValue');
        //Cache::forget ('myValue');
        return redirect()->action('ReservaController@index');
    }
    */
        return view('index');/*home*/
    }

    public function contacto()
    {
        return view('contacto');/*home*/
    }
}
