@extends('layouts.landingsinslider')
@section('title', 'Información Personal del Solicitante')
@section('content')



<div class="section margin-top_50">
  <h2 class="text-center">Por favor ingresa los datos de tus padres</h2>
  @if (session('success'))
    <div class="alert alert-success text-center">
         {{ session('success') }}
    </div>
  @endif
  @if (session('padreEli'))
    <div class="alert alert-danger text-center">
         {{ session('padreEli') }}
    </div>
  @endif
  @if (session('successM'))
    <div class="alert alert-success text-center">
         {{ session('successM') }}
    </div>
  @endif
  @if (session('madreEli'))
    <div class="alert alert-danger text-center">
         {{ session('madreEli') }}
    </div>
  @endif
  @if (session('successF3R3'))
    <div class="alert alert-success text-center">
         {{ session('successF3R3') }}
    </div>
  @endif
  @if (session('errorCF3'))
    <div class="alert alert-success text-center">
         {{ session('errorCF3') }}
    </div>
  @endif
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
   
    <!-- Utiliza 'container' para centrar y 'd-flex' para establecer flexbox -->
    
    <div class="accordion mi-accordion" id="accordionExample">
      
        <div class="accordion-item" id="item1">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Ingresar CURP del padre:
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
            </div>
          </div>
        </div>

        <div class="accordion-item" id="item2">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Ver datos del padre:
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        
             
            <div class="accordion-body">
                <div class="container mb-4 bg-cremita pt-3 rounded container-none" id="container-padre2">
                    <form id="form-padre2" method="POST" action="{{ route('form3-post2') }}">  {{-- SEGUNDO CONTAINER | PADRE | ROW 2 DEL FORMULARIO --}}
                      @csrf
                      <div class="row">
                      <div class="col-md-12 text-center">
                        <h2 class="titulo-form"><strong>DATOS GENERALES DEL PADRE</strong><h2>
                      </div>
                      <p>{{$idPadre ?? null}}</p>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="curppadre2">CURP:</label>
                              <input type="text" class="form-control" id="curppadre2" name="curppadre2" value="{{ $xml1->curp ?? $consultaPadreCurp ?? '' }}" readonly>
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
                              <input type="text" class="form-control" id="fechapadre" name="fechapadre" value="{{ $xml1->fn ?? $consultaPFechaNac ?? '' }}" readonly>
                              @error('fechapadre')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fechapadre">Sexo:</label>
                              <input type="text" class="form-control" id="sexopadre" name="sexopadre" value="{{ $xml1->sexo ?? $consultaPSexo ?? '' }}"  readonly>
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
                                <input type="text" class="form-control" id="apellidopadre1" name="apellidopadre1" value="{{ $xml1->paterno ?? $consultaPPaterno ?? '' }}" readonly>
                                @error('apellidopadre1')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="apellidopadre2">Apellido Materno:</label>
                                <input type="text" class="form-control" id="apellidopadre2" name="apellidopadre2" value="{{ $xml1->materno ?? $consultaPMaterno ?? '' }}" readonly>
                                @error('apellidopadre2')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="nombrepadre">Nombre:</label>
                                <input type="text" class="form-control" id="nombrepadre" name="nombrepadre" value="{{ $xml1->nombre ?? $consultaPNombre ?? '' }}" readonly>
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
                                  <label for="trabajapadre">¿Trabaja?</label>
                                  <select class="form-control" id="trabajapadre" name="trabajapadre">
                                    <option value="" {{ old('trabajapadre', $consultaTrabaja ?? $consultaPTrabaja ?? '') == "" ? 'selected' : '' }}>Seleccione:</option>
                                    <option value="1" {{ old('trabajapadre', $consultaTrabaja ?? $consultaPTrabaja ?? '') == "1" ? 'selected' : '' }}>Si</option>
                                    <option value="0" {{ old('trabajapadre', $consultaTrabaja ?? $consultaPTrabaja ?? '') == "0" ? 'selected' : '' }}>No</option>
                                  </select>
                                  @error('trabajapadre')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="estudiospadre">Último Grado de Estudios:</label>
                                  <select class="form-control" id="estudiospadre" name="estudiospadre">
                                    {{-- El "old" sirve para que laravel pueda detectar variables que aun no han sido definidas --}}
                                    <option value="" {{ old('estudiospadre', $consultaUltEstudios ?? $consultaPEstudios ?? '' ) == "" ? 'selected' : '' }}>Seleccione:</option>
                                    <option value="Primaria" {{ old('estudiospadre', $consultaUltEstudios ?? $consultaPEstudios ?? '' ) == "Primaria" ? 'selected' : '' }}>Primaria</option>
                                    <option value="Secundaria" {{ old('estudiospadre', $consultaUltEstudios ?? $consultaPEstudios ?? '') == "Secundaria" ? 'selected' : '' }}>Secundaria</option>
                                    <option value="Preparatoria" {{ old('estudiospadre', $consultaUltEstudios ?? $consultaPEstudios ?? '') == "Preparatoria" ? 'selected' : '' }}>Preparatoria</option>
                                    <option value="Universidad" {{ old('estudiospadre', $consultaUltEstudios ?? $consultaPEstudios ?? '') == "Universidad" ? 'selected' : '' }}>Universidad</option>
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
                                <button id="btnGuardarPadre" type="submit" class="boton btn-form" name="btnGuardarPadre" value="guardar">Guardar datos</button>
                               
                              </div>
                            </div>
                    </form>

                    {{-- FORMULARIO PARA BOTON ELIMINAR --}}
                    <form method="POST" action="{{ route('form3-post5') }}">
                      @csrf
                      @method('DELETE')
                    {{-- CONTAINER PARA BOTON ELIMINAR | PADRE | ROW 1 DEL FORMULARIO --}}
                      <div class="row">
                            <div class="row mt-4">
                              <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                                <button id="btnEliminarPadre" type="submit" class="boton btn-form" name="btnEliminarPadre" value="eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                  Eliminar Registro
                                </button>
                              </div>
                            </div>
                      </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
        
        <div class="accordion-item" id="item3">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Ingresar CURP de la madre:
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
             {{-- AQUI VA EL FORMULARIO PARA INGRESAR CURP MADRE --}}
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
                        @if(session('error2'))
                            <div class="alert alert-danger">
                                {{ session('error2') }}
                            </div>
                        @endif
                        @if (session('success2'))
                            <div class="alert alert-success">
                                {{ session('success2') }}
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
            </div>
          </div>
        </div>

        <div class="accordion-item" id="item4">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Ver datos de la madre:
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
                          <input type="text" class="form-control" id="curpmadre2" name="curpmadre2" value="{{ $xml2->curp ?? $consultaMadreCurp ?? '' }}" readonly>
                          @error('curpmadre2')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechamadre">Fecha de Nacimiento:</label>
                          <input type="text" class="form-control" id="fechamadre" name="fechamadre" value="{{ $xml2->fn ?? $consultaMFechaNac ?? '' }}" readonly>
                          @error('fechamadre')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechamadre">Sexo:</label>
                          <input type="text" class="form-control" id="sexomadre" name="sexomadre" value="{{ $xml2->sexo ?? $consultaMSexo ?? '' }}" readonly>
                          @error('fechamadre')
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
                            <input type="text" class="form-control" id="apellidomadre1" name="apellidomadre1" value="{{ $xml2->paterno ?? $consultaMPaterno ?? '' }}" readonly>
                            @error('apellidomadre1')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="apellidomadre2">Apellido Materno:</label>
                            <input type="text" class="form-control" id="apellidomadre2" name="apellidomadre2" value="{{ $xml2->materno ?? $consultaMMaterno ?? '' }}" readonly>
                            @error('apellidomadre2')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nombremadre">Nombre:</label>
                            <input type="text" class="form-control" id="nombremadre" name="nombremadre" value="{{ $xml2->nombre ?? $consultaMNombre ?? '' }}" readonly>
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
                              <label for="trabajamadre">¿Trabaja?</label>
                              <select class="form-control" id="trabajamadre" name="trabajamadre">
                                <option value="" {{ old('trabajamadre', $consultaTrabaja2 ?? $consultaMTrabaja ?? '') == "" ? 'selected' : '' }}>Seleccione:</option>
                                <option value="1" {{ old('trabajamadre', $consultaTrabaja2 ?? $consultaMTrabaja ?? '') == "1" ? 'selected' : '' }}>Si</option>
                                <option value="0" {{ old('trabajamadre', $consultaTrabaja2 ?? $consultaMTrabaja ?? '') == "0" ? 'selected' : '' }}>No</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="estudiosmadre">Último Grado de Estudios:</label>
                              <select class="form-control" id="estudiosmadre" name="estudiosmadre">
                                {{-- El "old" sirve para que laravel pueda detectar variables que aun no han sido definidas --}}
                                <option value="" {{ old('estudiosmadre', $consultaUltEstudios2 ?? $consultaMEstudios ?? '' ) == "" ? 'selected' : '' }}>Seleccione:</option>
                                    <option value="Primaria" {{ old('estudiosmadre', $consultaUltEstudios2 ?? $consultaMEstudios ?? '' ) == "Primaria" ? 'selected' : '' }}>Primaria</option>
                                    <option value="Secundaria" {{ old('estudiosmadre', $consultaUltEstudios2 ?? $consultaMEstudios ?? '') == "Secundaria" ? 'selected' : '' }}>Secundaria</option>
                                    <option value="Preparatoria" {{ old('estudiosmadre', $consultaUltEstudios2 ?? $consultaMEstudios ?? '') == "Preparatoria" ? 'selected' : '' }}>Preparatoria</option>
                                    <option value="Universidad" {{ old('estudiosmadre', $consultaUltEstudios2 ?? $consultaMEstudios ?? '') == "Universidad" ? 'selected' : '' }}>Universidad</option>
                              </select>
                            </div>
                          </div>
                      </div>
          
                      {{-- CUARTO CONTAINER | MADRE | ROW 11 DEL FORMULARIO --}}
                      <div class="row mt-4">
                          <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                            <button id="btnGuardarMadre" type="submit" class="boton btn-form" name="btnGuardarMadre" value="guardar">Guardar datos</button>
                          </div>
                        </div>
                </form>
                 {{-- FORMULARIO PARA BOTON ELIMINAR --}}
                 <form method="POST" action="{{ route('form3-post6') }}">
                  @csrf
                  @method('DELETE')
                {{-- CONTAINER PARA BOTON ELIMINAR | MADRE | ROW 1 DEL FORMULARIO --}}
                  <div class="row">
                        <div class="row mt-4">
                          <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                            <button id="btnEliminarMadre" type="submit" class="boton btn-form" name="btnEliminarMadre" value="eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                              Eliminar Registro
                            </button>
                          </div>
                        </div>
                  </div>
                </form>
            </div>
            </div>
          </div>
        </div>


      </div>

</div>
  {{-- QUINTO CONTAINER | FAMILIARES --}}
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form3-fam')}}">    {{-- QUINTO CONTAINER | FAMILIARES | ROW 12 DEL FORMULARIO --}}
        @csrf
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>DATOS FAMILIARES</strong><h2>
          </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label class="mb-4 mt-3" for="padres_cas_sol">Sus Padres están:</label>
                  <select class="form-control" id="padres_cas_sol" name="padres_cas_sol">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('padres_cas_sol', $datosF3R3->padres_civil ?? null) == '1' ? 'selected' : '' }}>Casados</option>
                    <option value="2" {{ old('padres_cas_sol', $datosF3R3->padres_civil ?? null) == '2' ? 'selected' : '' }}>Divorciados</option>
                    <option value="3" {{ old('padres_cas_sol', $datosF3R3->padres_civil ?? null) == '3' ? 'selected' : '' }}>Otro</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="herm_dep_ing_familiar" >Núm de Hermanos que Dependen del ingreso familiar:</label>
                  <select class="form-control" id="herm_dep_ing_familiar" name="herm_dep_ing_familiar">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '5' ? 'selected' : '' }}>5</option>
                    <option value="6" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '6' ? 'selected' : '' }}>6</option>
                    <option value="7" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '7' ? 'selected' : '' }}>7</option>
                    <option value="8" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '8' ? 'selected' : '' }}>8</option>
                    <option value="9" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '9' ? 'selected' : '' }}>9</option>
                    <option value="10" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '10' ? 'selected' : '' }}>10</option>
                    <option value="11" {{ old('herm_dep_ing_familiar', $datosF3R3->num_herm_dep ?? null) == '11' ? 'selected' : '' }}>11</option>
                  </select>
                </div>
              </div>
              
        </div>

        {{-- QUINTO CONTAINER | FAMILIARES | ROW 13 DEL FORMULARIO --}}
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="edad_hermanos">Edades Hermanos:</label>
            <input type="text" class="form-control" id="edad_hermanos" name="edad_hermanos" value="{{ old('edad_hermanos', $datosF3R3->edad_hermanos ?? '') }}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="casa_familiar">La Casa Familiar es:</label>
            <select class="form-control" id="casa_familiar" name="casa_familiar">
              <option value="0">Seleccione:</option>
              <option value="Propia" {{ old('casa_familiar', $datosF3R3->casa_familiar ?? null) == 'Propia' ? 'selected' : '' }}>Propia</option>
              <option value="Rentada" {{ old('casa_familiar', $datosF3R3->casa_familiar ?? null) == 'Rentada' ? 'selected' : '' }}>Rentada</option>
              <option value="Hipotecada" {{ old('casa_familiar', $datosF3R3->casa_familiar ?? null) == 'Hipotecada' ? 'selected' : '' }}>Hipotecada</option>
              <option value="Prestada" {{ old('casa_familiar', $datosF3R3->casa_familiar ?? null) == 'Prestada' ? 'selected' : '' }}>Prestada</option>
              <option value="Interes Social" {{ old('casa_familiar', $datosF3R3->casa_familiar ?? null) == 'Interes Social' ? 'selected' : '' }}>Interes Social</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="cantidad_renta">Cantidad que paga como renta o Hipoteca:</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
            <input type="text" class="form-control" id="cantidad_renta" name="cantidad_renta" value="{{ old('cantidad_renta', $datosF3R3->pago_renta ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
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
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form4-formulario') }}'">Siguiente</button>
  </div>
</div>
<script src="{{ asset('assets/js/eventosAcordeon.js')}}"></script>
<script src="{{ asset('assets/js/eventosForm3.js')}}"></script>
{{-- SCRIPTS PARA ACORDEONES PADRE --}}
<script>
  //Desplegar acordeon del padre si la curp es válida
  curp = {{ $curpEsValida ?? null }};
  if(curp==1){
    curp = true;
  } else {
    curp = false;
  }
  validarCurp(curp); 
</script>
<script>
  //Desplegar acordeon del padre si la curp se guarda
  curp2 = {{ $curpGuardar ?? null }};
  if(curp2==1){
    curp2 = true;
  } else {
    curp2 = false;
  }
  console.log(curp2)
  guardarCurp(curp2);
</script>
{{-- SCRIPTS PARA ACORDEONES MADRE --}}
<script>
  //Desplegar acordeon de la madre si la curp es válida
  curp3 = {{ $curpEsValida2 ?? null }};
  if(curp3==1){
    curp3 = true;
  } else {
    curp3 = false;
  }
  validarCurp2(curp3); 
</script>
<script>
  //Desplegar acordeon de la madre si la curp se guarda
  curp4 = {{ $curpGuardar2 ?? null }};
  if(curp4==1){
    curp4 = true;
  } else {
    curp4 = false;
  }
  console.log(curp4)
  guardarCurp2(curp4);
</script>

{{-- SCRIPTS PARA OCULTAR Y MOSTRAR LOS ITEMS DEL ACORDEON--}}
<script>
varpadre = {{$consultaIdPadre ?? null}};
if(varpadre==0){
  varpadre= false;
} else {
  varpadre=true;
}


existePadre(varpadre);

</script>

<script>
varexistepadre= {{$existeCurpPadre ?? null}}
if(varexistepadre==0){
  varexistepadre= false;
} else {
  varexistepadre=true;
}
console.log('existe curppadre o no', varpadre)
existeCurpPadre(varexistepadre);
</script>

{{-- SCRIPTS PARA OCULTAR Y MOSTRAR LOS ITEMS DEL ACORDEON MADRE--}}
<script>
  varmadre = {{$consultaIdMadre}};
  if(varmadre==0){
    varmadre= false;
  } else {
    varmadre=true;
  }
  
  
  existeMadre(varmadre);
  
</script>
  
<script>
  varexistemadre= {{$existeCurpMadre}}
  if(varexistemadre==0){
    varexistemadre= false;
  } else {
    varexistemadre=true;
  }
  console.log('existe curppadre o no', varmadre)
  existeCurpMadre(varexistemadre);
</script>
@endsection