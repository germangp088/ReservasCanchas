@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">  

<section id="contact" style="">
        <div class="container">
            <div>
                <div class="about_our_company" style="margin-bottom: 20px;">
                    <h1 style="color:#fff;">LOGIN</h1>
                    <div class="titleline-icon"></div>
                    <p style="color:#fff;">Introduzca su email y password para loguearse</p>
                </div>
            </div>
            <div>
                    <form name="sentMessage" id="contactForm"  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div>

                            <div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <p class="login_text_size" style="color:#fff;">Introducir mail</p>
                                    <input type="email" class="form-control" placeholder="Tu Email *" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                    <p class="help-block text-danger"></p>

                                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                	@endif
                                </div>

                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <p class="login_text_size" >Introducir password</p>
                                    <input type="password" class="form-control" placeholder="Tu password *" id="phone" name="password" required>
                                    <p class="help-block text-danger"></p>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                	@endif
                                </div>
                            </div>

                            <div class="form-group">
	                            <div class="col-md-6 col-md-offset-0">
	                                <div class="checkbox">
	                                    <label class="login_text_size">
	                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
	                                    </label>
	                                </div>
	                            </div>
                        	</div>

                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl get" style="font-size: 20px;">Ingresar</button>
                            </div>
                            <a class="login_text_size" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                
            </div>
        </div>
</section>

@includeIf ('footer')

@endsection