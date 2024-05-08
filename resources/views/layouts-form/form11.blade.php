@extends('layouts.landingsinslider')
@section('title', 'Finalizar Solicitud')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
<div class="section margin-top_50">

  <div class="container mb-4 bg-cremita pt-3 rounded">
    <h1 class="text-center">¿SEGURO QUE DESEAS FINALIZAR?</h1>
    <h3 class="text-center">SI FINALIZAS YA NO PODRÁS REALIZAR NINGÚN CAMBIO EN TU SOLICITUD</h3>
    <form method="POST" action="{{ route('form11-validation') }}" class="text-center">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                <button id="validarforms" type="submit" class="boton btn-form">SI</button>
            </div>
        </div>
    </form>
    </div>
    <div class="d-flex">
      <button class="boton btn-form ml-6" onclick="window.location.href='{{ route('form1-formulario') }}'">Regresar al inicio</button>
    </div>
        
        {{-- <p class="text-center">{{ $textoConcatenado }}</p> --}}
    </div>

</div>

@endsection