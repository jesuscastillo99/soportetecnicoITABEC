@extends('layouts.landingsinslider')
@section('title', 'Información Personal del Solicitante')
@section('content')



<div class="section margin-top_50">

  {{-- PRIMER CONTAINER | PADRE --}}
    <div class="container mb-4 bg-cremita pt-3 rounded" id="container-padre">
      <form method="POST" action="{{ route('form3-post1') }}">
        @csrf
      {{-- PRIMER CONTAINER | PADRE | ROW 1 DEL FORMULARIO --}}
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>DATOS GENERALES DEL PADRE</strong><h2>
          </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="curppadre1">CURP PAPÁ:</label>
                  <input type="text" class="form-control" id="curppadre1" name="curppadre1">  
                  <p class="text-danger">{{ $errorMessage ?? '' }}</p>
                </div>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
              </div>
              <div class="row mt-4">
                <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                  <button id="enviar-padre" type="submit" class="boton btn-form">Enviar</button>
                </div>
              </div>
        </div>
      </form>
    </div>

    {{-- SEGUNDO CONTAINER | PADRE --}}
    <div class="container mb-4 bg-cremita pt-3 rounded container-none" id="container-padre2">
      <form id="form-padre2" method="POST" action="{{ route('form3-post2') }}">  {{-- SEGUNDO CONTAINER | PADRE | ROW 2 DEL FORMULARIO --}}
        @csrf
        <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="titulo-form"><strong>DATOS GENERALES DEL PADRE</strong><h2>
        </div>
          <div class="col-md-4">
              <div class="form-group">
                <label for="curppadre2">CURP:</label>
                <input type="text" class="form-control" id="curppadre2" name="curppadre2" value="{{ $xml1->curp ?? '' }}" readonly>
                @error('curppadre2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                @if (session('errorR'))
                    <div class="alert alert-danger">
                        {{ session('errorR') }}
                    </div>
                @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="fechapadre">Fecha de Nacimiento:</label>
                <input type="text" class="form-control" id="fechapadre" name="fechapadre" value="{{ $xml1->fn ?? '' }}" readonly>
                @error('fechapadre')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="fechapadre">Sexo:</label>
                <input type="text" class="form-control" id="sexopadre" name="sexopadre" value="{{ $xml1->sexo ?? '' }}" readonly>
                @error('fechapadre')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

            {{-- SEGUNDO CONTAINER | PADRE | ROW 3 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellidopadre1">Apellido Paterno:</label>
                  <input type="text" class="form-control" id="apellidopadre1" name="apellidopadre1" value="{{ $xml1->paterno ?? '' }}" readonly>
                  @error('apellidopadre1')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellidopadre2">Apellido Materno:</label>
                  <input type="text" class="form-control" id="apellidopadre2" name="apellidopadre2" value="{{ $xml1->materno ?? '' }}" readonly>
                  @error('apellidopadre2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nombrepadre">Nombre:</label>
                  <input type="text" class="form-control" id="nombrepadre" name="nombrepadre" value="{{ $xml1->nombre ?? '' }}" readonly>
                  @error('nombrepadre')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            {{-- SEGUNDO CONTAINER | PADRE | ROW 4 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado">Estado donde nació:</label>
                  <select class="form-control" id="estado" name="estado">
                    <option value="">Selecciona un estado</option>
                    @foreach(($estados ?? []) as $IdEstado => $NombreEstado)
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
                  <label for="municipio">Municipio donde nació:</label>
                  <select class="form-control" id="municipio" name="municipio">
                    <option value="">Selecciona un municipio</option>
                    <option value="{{ $nombreMunicipio ?? '' }}" selected>
                        {{ $nombreMunicipio ?? 'Selecciona un municipio' }}
                    </option>
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
                  <label for="localidad">Localidad donde nació:</label>
                  <select class="form-control" id="localidad" name="localidad">
                    <option value="">Selecciona una localidad</option>
                    @isset($localidadPadre)
                        <option value="{{ $localidadPadre }}" selected>{{ $nombreLocalidad }}</option>
                    @endisset
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
            {{-- SEGUNDO CONTAINER | PADRE | ROW 5 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="vivepadre">¿Vive?</label>
                    <select class="form-control" id="vivepadre" name="vivepadre">
                      <option value="seleccione">Seleccione:</option>
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                    @error('vivepadre')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="trabajapadre">¿Trabaja?</label>
                    <select class="form-control" id="trabajapadre" name="trabajapadre">
                      <option value="0">Seleccione:</option>
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                    @error('trabajapadre')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estudiospadre">Último Grado de Estudios:</label>
                    <select class="form-control" id="estudiospadre" name="trabajapadre">
                      <option value="0">Seleccione:</option>
                      <option value="1">Primaria</option>
                      <option value="2">Secundaria</option>
                      <option value="3">Preparatoria</option>
                      <option value="4">Universidad</option>
                    </select>
                    @error('estudiospadre')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                </div>
            </div>

            {{-- SEGUNDO CONTAINER | PADRE | ROW 6 DEL FORMULARIO --}}
            <div class="row mt-4">
                <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                  <button type="submit" class="boton btn-form">Guardar datos</button>
                </div>
              </div>
      </form>
  </div>

   {{--  TERCER CONTAINER | MADRE --}}
    <div class="container mb-4 bg-cremita pt-3 rounded" id="container-madre">
      <form method="POST" action="{{ route('form3-post3')}}"> {{-- TERCER CONTAINER | MADRE | ROW 7 DEL FORMULARIO --}}
        @csrf
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>DATOS GENERALES DE LA MADRE</strong><h2>
          </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="curpmadre1">CURP MAMÁ:</label>
                  <input type="text" class="form-control" id="curpmadre1" name="curpmadre1">
                  <p class="text-danger">{{ $errorMessageM ?? '' }}</p>
                </div>
                @if(session('errorM'))
                    <div class="alert alert-danger">
                        {{ session('errorM') }}
                    </div>
                @endif
                @if (session('successM'))
                    <div class="alert alert-success">
                        {{ session('successM') }}
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                  <button id="enviar-madre" type="submit" class="boton btn-form">Enviar</button>
                </div>
              </div>
        </div>
      </form>
    </div>

    {{--  CUARTO CONTAINER | MADRE --}}
    <div class="container mb-4 bg-cremita pt-3 rounded container-none" id="container-madre2" >
      <form id="form-madre2" method="POST" action="{{ route('form3-post4')}}">    {{-- CUARTO CONTAINER | MADRE | ROW 8 DEL FORMULARIO --}}
        @csrf
        <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="titulo-form"><strong>DATOS GENERALES DE LA MADRE</strong><h2>
        </div>
          <div class="col-md-4">
              <div class="form-group">
                <label for="curpmadre2">CURP:</label>
                <input type="text" class="form-control" id="curpmadre2" name="curpmadre2" value="{{ $xml2->curp ?? '' }}" readonly>
                @error('curpmadre2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="fechamadre">Fecha de Nacimiento:</label>
                <input type="text" class="form-control" id="fechamadre" name="fechamadre" value="{{ $xml2->fn ?? '' }}" readonly>
                @error('fechamadre')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="fechapadre">Sexo:</label>
                <input type="text" class="form-control" id="sexomadre" name="sexomaadre" value="{{ $xml2->sexo ?? '' }}" readonly>
                @error('fechapadre')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
       </div>
            {{-- CUARTO CONTAINER | MADRE | ROW 9 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellidomadre1">Apellido Paterno:</label>
                  <input type="text" class="form-control" id="apellidomadre1" name="apellidomadre1" value="{{ $xml2->paterno ?? '' }}" readonly>
                  @error('apellidomadre1')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellidomadre2">Apellido Materno:</label>
                  <input type="text" class="form-control" id="apellidomadre2" name="apellidomadre2" value="{{ $xml2->materno ?? '' }}" readonly>
                  @error('apellidomadre2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nombremadre">Nombre:</label>
                  <input type="text" class="form-control" id="nombremadre" name="nombremadre" value="{{ $xml2->nombre ?? '' }}" readonly>
                  @error('nombremadre')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            {{-- CUARTO CONTAINER | MADRE | ROW 9 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado2">Estado donde nació:</label>
                  <select class="form-control" id="estado2" name="estado2">
                    <option value="">Selecciona un estado</option>
                    @foreach(($estados2 ?? []) as $IdEstado => $NombreEstado)
                        <option value="{{ $IdEstado }}" {{ ($nombreEstado22 == $NombreEstado) ? 'selected' : '' }}>
                            {{ $NombreEstado }}
                        </option>
                    @endforeach
                  </select>
                  @error('estado2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio2">Municipio donde nació:</label>
                  <select class="form-control" id="municipio2" name="municipio2">
                    <option value="">Selecciona un municipio</option>
                    <option value="{{ $nombreMunicipio2 ?? '' }}" selected>
                        {{ $nombreMunicipio2 ?? 'Selecciona un municipio' }}
                    </option>
                  </select>
                  @error('municipio2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <script>
                    cargarMunicipios('estado2', 'municipio2');
                  </script> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad2">Localidad donde nació:</label>
                  <select class="form-control" id="localidad2" name="localidad2">
                    <option value="">Selecciona una localidad</option>
                    @isset($localidadMadre)
                        <option value="{{ $localidadMadre }}" selected>{{ $nombreLocalidad2 }}</option>
                    @endisset
                  </select>
                  @error('localidad2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <script>
                    cargarLocalidades('municipio2', 'localidad2');
                  </script>
                </div>
              </div>
            </div>

            {{-- CUARTO CONTAINER | MADRE | ROW 10 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="vivemadre">¿Vive?</label>
                    <select class="form-control" id="vivemadre" name="vivemadre">
                      <option value="seleccione">Seleccione:</option>
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="trabajamadre">¿Trabaja?</label>
                    <select class="form-control" id="trabajamadre" name="trabajamadre">
                      <option value="seleccione">Seleccione:</option>
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estudiosmadre">Último Grado de Estudios:</label>
                    <input type="text" class="form-control" id="estudiosmadre" name="estudiosmadre">
                  </div>
                </div>
            </div>

            {{-- CUARTO CONTAINER | MADRE | ROW 11 DEL FORMULARIO --}}
            <div class="row mt-4">
                <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                  <button type="submit" class="boton btn-form">Guardar datos</button>
                </div>
              </div>
      
      </form>
  </div>

  {{-- QUINTO CONTAINER | FAMILIARES --}}
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form3-formulario')}}">    {{-- QUINTO CONTAINER | FAMILIARES | ROW 12 DEL FORMULARIO --}}
        @csrf
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>DATOS FAMILIARES</strong><h2>
          </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label class="mb-4 mt-3" for="padres_cas_sol">Sus Padres están:</label>
                  <select class="form-control" id="padres_cas_sol" name="padres_cas_sol">
                    <option value="seleccione">Seleccione:</option>
                    <option value="casados">Casados</option>
                    <option value="solteros">Solteros</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="herm_dep_ing_familiar" >Núm de Hermanos que Dependen del ingreso familiar:</label>
                  <select class="form-control" id="herm_dep_ing_familiar" name="herm_dep_ing_familiar">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
                </div>
              </div>
              
        </div>

        {{-- QUINTO CONTAINER | FAMILIARES | ROW 13 DEL FORMULARIO --}}
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="edad_hermanos">Edades Hermanos:</label>
            <input type="text" class="form-control" id="edad_hermanos" name="edad_hermanos">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="casa_familiar">La Casa Familiar es:</label>
            <select class="form-control" id="casa_familiar" name="casa_familiar">
              <option value="Propia">Propia</option>
              <option value="Rentada">Rentada</option> 
              <option value="Hipotecada">Hipotecada</option>
              <option value="Prestada">Prestada</option>
              <option value="Interes Social">Interes Social</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="cantidad_renta">Cantidad que paga como renta o Hipoteca:</label>
            <input type="text" class="form-control" id="cantidad_renta" name="cantidad_renta">
          </div>
        </div>
        </div>

        {{-- QUINTO CONTAINER | FAMILIARES | ROW 14 DEL FORMULARIO --}}
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
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form2-formulario') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form4') }}'">Siguiente</button>
  </div>
</div>
@endsection