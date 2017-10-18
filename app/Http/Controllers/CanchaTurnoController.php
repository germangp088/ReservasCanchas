<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CanchaTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCancha, $idTurno)
    {
        $req->validate([
            'id_cancha' => $idCancha,
            'id_turno' => $idTurno,
            'reservada' => 0
        ]);
        $CTnew = new CanchaTurno ();
        
        $CTnew->id_tipo_cancha = $req->id_tipo_cancha;
        $CTnew->id_estado_cancha = $req->id_estado_cancha;
        $CTnew->latitud = $req->latitud;
        
        $CTnew->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showLibres()
    {
        $reservas = Reserva::all()->where ('reservada', 0)->get();
        return view('reservaCancha', array ('reservas'=>$reservas);
    }

    public function showAll()
    {
        $reservas = Reserva::all();
        return view('reservaCancha', array ('reservas'=>$reservas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
