<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CanchaTurno;
use App\TipoCancha;
use App\EstadoCancha;
use Illuminate\Support\Facades\Validator;
class CanchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * SHOW ALL CANHCAS IN DB
     */
    public function index()
    {
        $canchas = Cancha::all();
        return view('canchas', array('canchas' => $canchas));
    }

    public function getAll()
    {
        $canchas = Cancha::all();
        return $canchas;
    }
	
	 public function form()
    {
        $tiposCancha = TipoCancha::all();
		return view('canchasForm', array('tiposCancha' => $tiposCancha));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
	   $req->validate([
			'id_tipo_cancha' => 'required|exists:tipo_canchas,id',
			'id_estado_cancha' => 'required|exists:estado_canchas,id',
			'latitud' => 'required|numeric',
			'longitud' => 'required|numeric',
			'precio_dia' => 'required|numeric|min:0',
			'precio_noche' => 'required|numeric|min:0'
		]);
		$canchaNew = new Cancha ();
		
		$canchaNew->id_tipo_cancha = $req->id_tipo_cancha;
		$canchaNew->id_estado_cancha = $req->id_estado_cancha;
		$canchaNew->latitud = $req->latitud;
		$canchaNew->longitud = $req->longitud;
		$canchaNew->precio_dia = $req->precio_dia;
		$canchaNew->precio_noche = $req->precio_noche;
		
        $canchaNew->save();

        for ($i=1; $i <=12 ; $i++) { 
            $ct = new CanchaTurno();
            $ct->create ($canchaNew->id, $i);
        }

        return view ('index');
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
    public function show($id)
    {
        $cancha = Cancha::find($id);
        $tipo = $cancha->first()->tipoCancha;
        return view('canchas',[$tipo => $tipo]);
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
        $req->validate([
			'id' => 'required|exists:canchas,id',
			'id_tipo_cancha' => 'required|exists:tipo_canchas,id',
			'id_estado_cancha' => 'required|exists:estado_canchas,id',
			'latitud' => 'required|numeric',
			'longitud' => 'required|numeric',
			'precio_dia' => 'required|numeric|min:0',
			'precio_noche' => 'required|numeric|min:0'
		]);
		$canchaNew = new Cancha ();
		
		$canchaNew->id_tipo_cancha = $req->id_tipo_cancha;
		$canchaNew->id_estado_cancha = $req->id_estado_cancha;
		$canchaNew->latitud = $req->latitud;
		$canchaNew->longitud = $req->longitud;
		$canchaNew->precio_dia = $req->precio_dia;
		$canchaNew->precio_noche = $req->precio_noche;
		
        $canchaNew->where($id)->update();
    }

	public function cambiarEstado($id, $idEstado)
	{
		$rules = array(
			'id' => 'required|exists:canchas,id',
        );        
		
		$validatorArray = array(
			'id' => $id
			);
		
        $validator = Validator::make($validatorArray, $rules);

        if (!$validator->fails()) {
			Cancha::where(['id' => $id])->update(['id_estado_cancha' => $idEstado]);
        }
		
		return redirect()->action('CanchaController@index');
	}
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
      $cancha = Cancha::find($id);
      $cancha->delete();

      return view('index');
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
