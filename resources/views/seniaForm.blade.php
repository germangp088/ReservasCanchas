@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">  

<section id="contact" style="">
        <div class="container">
            <div>
                <div class="about_our_company" style="margin-bottom: 20px;">
                    <h1 style="color:#fff;">RESERVA DE CANCHA</h1>
                    <div class="titleline-icon"></div>
                    <p style="color:#fff;">Introduzca el monto de la seña</p>
                </div>
            </div>
            <div>
            
                    <form name="sentMessage" id="contactForm"  method="POST" action="/senia/form">
                        {{ csrf_field() }}>
                        <div>

                            <div>
                                <div class="form-group">
                                    <p class="login_text_size" style="color:#fff;">Introducir seña</p>
                                    <input type="email" class="form-control" placeholder="Seña *" id="email" name="senia" required autofocus>
                                    <p class="help-block text-danger"></p>
                                </div>

                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl get" style="font-size: 20px;">Confirmar Reserva</button>
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
</section>

@includeIf ('footer')

@endsection