@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/registrar.css') }}">  

<section id="contact" style="">
        <div class="container">
            <div>
                <div class="about_our_company" style="margin-bottom: 20px;">
                    <h1 style="color:#fff;">REGISTRO</h1>
                    <div class="titleline-icon"></div>
                    <p style="color:#fff;">Introduzca sus futuros datos de usuarios</p>
                </div>
            </div>
            <div>
                    <form name="sentMessage" id="contactForm" method="POST" action="{{ route('register') }}">
                     {{ csrf_field() }}
                        <div>
                            <div>
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <p class="register_text_size" style="">Introducir nombre de perfil</p>
                                    <input type="text" class="form-control" placeholder="Tu nombre *" id="name"  name="name" value="{{ old('name') }}" required autofocus>
                                    <p class="help-block text-danger"></p>

                                    @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
                                </div>

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <p class="register_text_size">Introducir mail</p>
                                    <input type="email" class="form-control" placeholder="Tu Email *" id="email" name="email" value="{{ old('email') }}" required>
                                    <p class="help-block text-danger"></p>
                                    @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
                                </div>

                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <p class="register_text_size">Introducir password</p>
                                    <input type="tel" class="form-control" placeholder="Tu password *" id="phone" name="password" required>
                                    <p class="help-block text-danger"></p>
                                    
                                    @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
                                </div>

                                <div class="form-group">
                                    <p class="register_text_size">Introducir confirmacion de password</p>
                                    <input type="tel" class="form-control" placeholder="Confirmacion password *" id="phone" name="password_confirmation" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl get">Confirmar Registro</button>
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
</section>

@include ('footer')

@endsection