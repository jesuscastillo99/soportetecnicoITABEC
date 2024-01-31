@extends('layouts.landingsinslider')
@section('title', 'Terminó con Exito el Formulario')
@section('content')

<div class="section margin-top_50 mb-4">
    <div class="container d-flex justify-content-center align-items-center">
        <!-- Utiliza 'container' para centrar y 'd-flex' para establecer flexbox -->
        <div class="text-center">
            <img src="{{ asset('assets/images/exito.png')}}" class="img-fluid" alt="img_exito">
            <div class="card-body">
                <h5 class="card-title">¡FORMULARIO FINALIZADO!</h5>
                <p class="card-text">Tus datos se guardaron con éxito. Puedes seguir navegando.</p>
                <button class="fill rounded" type="button" onclick="window.location.href='{{ route('inicio') }}'">Volver al Inicio</button>
            </div>
        </div>
      </div>
</div>

@endsection