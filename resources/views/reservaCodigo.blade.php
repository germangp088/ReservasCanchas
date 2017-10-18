@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">  

<section id="contact" style="">
        <div class="container">
            <div>
                <div class="about_our_company" style="margin-bottom: 20px;">
                    <h1 style="color:#fff;">CÓDIGO DE RESERVA</h1>
                    <div class="titleline-icon"></div>
                    <p style="color:#fff;">-</p>
                </div>
            </div>
            <div>
                <h2 style="color:#fff;">Tu código de reserva es {{ $codigo }}</h2>
            </div>
        </div>
</section>

@includeIf ('footer')

@endsection