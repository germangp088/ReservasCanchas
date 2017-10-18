@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/reservar.css') }}">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<section id="reserva" style="">

    <div class="container">
        <div>
            <div class="titulo" style="margin-bottom: 20px;">
                <h1 style="color:#fff;">ADMINISTRACIÓN DE RESERVAS</h1>
                <div class="titleline-icon"></div>
                
            </div>
        </div>

        <table class="table">
            <thead>
              <tr">
                <th style="color:#fff;">Cancha</th>
                <th style="color:#fff;">Precio Día</th>
                <th style="color:#fff;">Precio Noche</th>
                <th style="color:#fff;">Estado</th>
                <th style="color:#fff;">MODIFICAR</th>
              </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr class="success">
                        <td>{{ $reserva->cancha()->first()->estado()->first()->descripcion }}</td>
                        <td>{{ $reserva->user()->first()->name }}</td>
                        <td>{{ $reserva->turno()->first()->descripcion }}</td>
                        <td>{{ $reserva->fecha }}</td>
                        <td>{{ $reserva->codigo_reserva }}</td>

                        <td> <a href="">ELIMINAR</a> </td>
                    </tr>
		        @endforeach
		      </tbody>
        </table>

<!--
		{{ $reservas }}
-->
    </div>

</section>

@include ('footer')

@endsection