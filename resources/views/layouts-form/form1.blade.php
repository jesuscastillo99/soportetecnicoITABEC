@extends('layouts.landingsinslider')
@section('title', 'Formulario')
@section('content')

<div class="section margin-top_50">
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form1-post') }}">
        @csrf
        <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="titulo-form"><strong>Datos Personales</strong><h2>
            </div>
          </div>
      
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="curp">CURP:</label>
                  <input type="text" class="form-control" id="curp" name="curp" value="{{ old('curp', $datosPersona->curp) }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="fecha_nac">Fecha de Nacimiento:</label>
                  <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac', $datosPersona->fechanac) }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sexo">Sexo:</label>
                  <input type="text" class="form-control" id="sexo" name="sexo" value="{{ old('sexo', $datosPersona->sexo) == 0 ? 'Femenino' : ($datosPersona->sexo == 1 ? 'Masculino' : 'Otro') }}" readonly>
                  @error('sexo')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>   
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellido_pa">Apellido Paterno:</label>
                  <input type="text" class="form-control" id="apellido_pa" name="apellido_pa" value="{{ old('apellido_pa', $datosPersona->paterno) }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellido_ma">Apellido Materno:</label>
                  <input type="text" class="form-control" id="apellido_ma" name="apellido_ma" value="{{ $datosPersona->materno }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $datosPersona->nombre }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    
                  </div>
              <div class="col-md-4">
               {{-- Campo vacio --}}
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="titulo-form"><strong>Lugar de Nacimiento</strong><h2>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="estado_nac">Estado donde nació:</label>
                      <select class="form-control" id="estado" name="estado">
                        <option value="">Selecciona un estado</option>
                        @foreach($estados as $IdEstado => $NombreEstado)
                            <option value="{{ $IdEstado }}" {{ ($nombreEstado2 == $NombreEstado) ? 'selected' : '' }}>
                                {{ $NombreEstado }}
                            </option>
                        @endforeach
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
                          <option value="{{ $nombreMunicipio }}" selected>{{ $nombreMunicipio }}</option>
                        </select>
                        @error('municipio')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror    
                        <script>
                          cargarMunicipios('estado', 'municipio');
                        </script>                            
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="localidad_nac">Localidad donde nació:</label>
                        <select class="form-control" id="localidad" name="localidad">
                          <option value="">Selecciona una localidad</option>
                          <option value="{{ $datosPersona->locnac }}" selected>{{ $nombreLocalidad }}</option>
                        </select>
                        @error('localidad')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <script>
                          cargarLocalidades('municipio', 'localidad');
                        </script>  
                    </div>
                  </div>
            </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="estado_civil">Estado Civil:</label>
                      <select class="form-control" id="estado_civil" name="estado_civil">
                        <option value="seleccione">Seleccione:</option>
                        <option value="0" {{ old('estado_civil', $datosPersona->estadoCivil) == '0' ? 'selected' : '' }}>Soltero(a)</option>
                        <option value="1" {{ old('estado_civil', $datosPersona->estadoCivil) == '1' ? 'selected' : '' }}>Casado(a)</option>
                      </select>
                      @error('estado_civil')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                     
                    </div>
                  </div>    
              </div>
              <div class="row mt-4">
                <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                  <button type="submit" class="boton btn-form">Guardar datos</button>
                </div>
              </div>
        </form>
    </div>
    <div class="row mt-4 pl-5 pr-5">
    <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
      <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form0') }}'">Regresar</button>
    </div>
    <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
      <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form2-formulario') }}'">Siguiente</button>
    </div>
    </div>
</div>

@endsection