@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/reservar.css') }}">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<section id="reserva" style="">

<div class="container">
	<div>
        <div class="titulo" style="margin-bottom: 20px;">
            <h1 style="color:#fff;">RESERVA DE CANCHAS</h1>
            <div class="titleline-icon"></div>
        </div>
    </div>

    <div>
        <div class="titulo" style="margin-bottom: 20px;">
            <h1 style="color:#fff;">Selección de Fecha</h1>
            <div class="titleline-icon"></div>
        </div>

        <form method="POST" action="/canchaTurno/FiltroFecha" id="contactForm">
        {{ csrf_field() }}
        	Fecha:
        	<input type="date" name="fecha_reserva" min="{{ $fechaMin }}" max="{{ $fechaMax }}" value="{{ $fechaFiltro }}">
        	<input type="submit" value="Filtrar">
        </form>
    </div>

    <div class="">
        <div class="titulo" style="margin-bottom: 20px;">
            <h1 style="color:#fff;">FECHA: {{ $fechaFiltro }}</h1>
            <div class="titleline-icon"></div>
        </div>
    </div>

  <div class="panel-group" id="accordion">

  	@foreach ($canchas as $cancha)

	    <div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				  	<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $cancha->id }}">{{ $cancha->nombre ." - ". $cancha->tipoCancha()->first()->descripcion }}</a>
				</h4>
			</div>

    		<div id="collapse{{ $cancha->id }}" class="panel-collapse collapse in">
        		<div class="panel-body">
				
        			<table class="table">
			            <thead>
			              <tr>
			                <th style="color:black;">Turno</th>
			                <th sHtyle="color:black;">Precio</th>
			                <th style="color:black;">HACER RESERVA</th>
			              </tr>
			            </thead>
			            <tbody>
			                @foreach($reservas as $reserva)
			                	@if ($cancha->id == $reserva->id_cancha)
			                    <tr class="success">
			                        <td>{{ $reserva->hora }}</td>
			                        <td>{{ $reserva->precio }}</td>
			                        <td> <a href="/senia/form/{{ $cancha->id }}/{{ $reserva->id_turno }}/{{ $fechaFiltro }}">RESERVAR</a> </td>
			                    </tr>
			                    @endif
					        @endforeach
					      </tbody>
			        </table>

				</div>
			</div>
		</div>

	@endforeach

</div>

</section>
@include ('footer')

@endsection