@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">  
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


<section id="contact" style="">
<div class="container">
    <div>
        <div class="about_our_company" style="margin-bottom: 20px;">
            <h1 style="color:#fff;">NUEVA CANCHA</h1>
            <div class="titleline-icon"></div>
            <p style="color:#fff;">Agregando cancha al sitio web</p>
        </div>
    </div>
    <div>
                    <form name="sentMessage" id="contactForm"  method="POST" action="/canchas">
                        {{ csrf_field() }}
                        <div>
                            <div>
                                <div class="form-group">
                                    <p class="login_text_size" style="color:#fff;">Tipo de Cancha: </p>
									<select name="id_tipo_cancha" id="id_tipo_cancha">
									@foreach($tiposCancha as $tipoCancha)										
										<option value="{{ $tipoCancha->id }}"> {{ $tipoCancha->descripcion }}</option>
									@endforeach
									</select>
									
                                    <p class="help-block text-danger"></p>
                                </div>

                                <input type="hidden" class="form-control" name="id_estado_cancha" id="id_estado_cancha" value="1"/>
                                <input type="hidden" name="latitud" id="latitud" value="1"/>
                                <input type="hidden" name="longitud" id="longitud" value="10"/>

                                <div class="form-group">
                                    <p class="login_text_size" style="color:#fff;">Precio de Dia: </p>
                                    <input type="text" class="form-control" name="precio_dia" id="precio_dia" value="800"/>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <p class="login_text_size" style="color:#fff;">Precio de Noche: </p>
                                    <input type="text" class="form-control" name="precio_noche" id="precio_noche" value="1000"/>
                                    <p class="help-block text-danger"></p>
                                </div>

                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl get" style="font-size: 20px;">Crear Cancha</button>
                            </div>

                        </div>
                    </form>
                
            </div>
        </div>
</section>

@includeIf ('footer')

@endsection
<!--
<h1>Canchas</h1>
        <form method="post" action="/canchas">
            {{ csrf_field() }}
            <input type="hidden" name="id_tipo_cancha" id="id_tipo_cancha" value="1"/>
            <input type="hidden" name="id_estado_cancha" id="id_estado_cancha" value="1"/>
            <input type="text" name="latitud" id="latitud" value="1"/>
            <input type="text" name="longitud" id="longitud" value="10"/>
            <input type="text" name="precio_dia" id="precio_dia" value="800"/>
            <input type="text" name="precio_noche" id="precio_noche" value="1000"/>
            <input type="submit">
        </form>
-->