@extends('layouts.landingsinslider')
@section('title', 'Historial Académico')
@section('content')

<div class="section margin-top_50">
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form5') }}" id="formulario-historial">
        @csrf
      {{-- ROW 1 DEL FORMULARIO --}}
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>HISTORIAL ACADÉMICO</strong><h2>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nivel_aca">Nivel:</label>
              <select class="form-control" id="nivel_aca" name="nivel_aca">
                <option value="seleccione">Seleccione:</option>
                <option value="inicial">Inicial</option>
                <option value="primaria">Primaria</option>
                <option value="secundaria">Secundaria</option>
                <option value="bachillerato">Bachillerato</option>
                <option value="licenciatura">Licenciatura</option>
                <option value="posgrado">Posgrado</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nombre_escuela">Nombre de la Escuela:</label>
              <input type="text" class="form-control" id="nombre_escuela" name="nombre_escuela">
              <p class="error-message view-error">Por favor, llena este campo.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="tipo_sector">Tipo:</label>
              <select class="form-control" id="tipo_sector" name="tipo_sector">
                <option value="seleccione">Seleccione:</option>
                <option value="publico">Público</option>
                <option value="privado">Privado</option>
              </select>
            </div>
        </div>
        </div>

        {{-- ROW 2 DEL FORMULARIO --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="promedio">Promedio: ejem 9.5, 8.6</label>
                  <input type="text" class="form-control" id="promedio" name="promedio">
                  <p class="error-message view-error">Por favor, llena este campo.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="estado_nac">Estado donde nació:</label>
                      <select class="form-control" id="estado" name="estado">
                        <option value="">Selecciona un estado</option>
                        {{-- @foreach($estados as $IdEstado => $NombreEstado)
                            <option value="{{ $IdEstado }}" >
                                {{ $NombreEstado }}
                            </option>
                        @endforeach --}}
                      </select>
                      @error('estado')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="municipio_nac">Municipio donde nació:</label>
                        <select class="form-control" id="municipio" name="municipio">
                          <option value="">Selecciona un municipio</option>
                          <option value="1" selected></option>
                        </select>
                        @error('municipio')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror    
                        <script>
                          cargarMunicipios('estado', 'municipio');
                        </script>                            
                    </div>
                  </div>
        </div>
        <div class="row">
          <div class="col-md-8">
          <table class="table table-striped table-small" id="tabla-dinamica">
            <thead>
                <tr>
                    <th class="text-center">Nivel</th>
                    <th class="text-center">Nombre de la Escuela</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Promedio</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Municipio</th>
                    <th class="text-center">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán las filas dinámicas -->
            </tbody>
        </table>
          </div>
         </div>

        {{-- ROW 3 DEL FORMULARIO --}}
        <div class="row mt-4">
          <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
            <button type="submit" class="boton btn-form">Guardar datos</button>
          </div>
        </div>
      </form>
    </div>
</div>

 <div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form4') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form6') }}'">Siguiente</button>
  </div>
</div>  

@endsection