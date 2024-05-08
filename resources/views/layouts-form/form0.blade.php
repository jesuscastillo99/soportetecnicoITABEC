@extends('layouts.landingsinslider')
@section('title', 'Formulario')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
<div class="section margin-top_50 mb-4">
    <div class="container d-flex justify-content-center align-items-center">
        <!-- Utiliza 'container' para centrar y 'd-flex' para establecer flexbox -->
        <div class="text-center">
            <img src="{{ asset('assets/images/form0.png')}}" class="img-fluid" alt="img_exito">
            <div class="card-body">
                <h5 class="card-title">¡ATENCIÓN!</h5>
                <p class="card-text">Antes de iniciar con el formulario verifica que los datos que ingreses sean los correctos.</p>
                <button class="fill rounded" type="button" onclick="window.location.href='{{ route('form1-formulario') }}'">Iniciar formulario</button>
            </div>
        </div>
      </div>
</div>

@endsection