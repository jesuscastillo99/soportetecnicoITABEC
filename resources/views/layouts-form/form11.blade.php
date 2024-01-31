@extends('layouts.landingsinslider')
@section('title', 'Finalizar Solicitud')
@section('content')

<div class="section margin-top_50">

    <div class="container mb-4 bg-cremita pt-3 rounded">
        <h1 class="text-center">¿SEGURO QUE DESEAS FINALIZAR?</h1>
        <h3 class="text-center">SI FINALIZAS YA NO PODRÁS REALIZAR NINGÚN CAMBIO EN TU SOLICITUD</h3>

        <div class="row">
            <div class="col-md-6 mb-3 text-center">
                <button type="submit" class="boton btn-form" onclick="window.location.href='{{ route('form10') }}'">NO</button>
              </div>
              <div class="col-md-4 mb-3 text-center">
                <button type="submit" class="boton btn-form" onclick="window.location.href='{{ route('form12') }}'">SI</button>
              </div>
        </div>
    </div>

</div>

@endsection