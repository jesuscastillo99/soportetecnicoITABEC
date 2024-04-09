@extends('layouts.landingsinslider')
@section('title', 'Referencias')
@section('content')

<div class="section margin-top_50">
  <div class="accordion mi-accordion col-md-8 mx-auto" id="accordionExample">
    
    <div class="accordion-item" id="item1">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Ingresar CURP de referencia 1:
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="container mb-4 bg-cremita pt-3 rounded" id="container-padre">
                <form method="POST" action="{{ route('form8-post1') }}">
                  @csrf
                {{-- PRIMER CONTAINER | PADRE | ROW 1 DEL FORMULARIO --}}
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h2 class="titulo-form"><strong>DATOS GENERALES DEL REFERENTE 1</strong><h2>
                      
                    </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="curpvr1">CURP REFERENCIA 1:</label>
                            <input type="text" class="form-control" id="curpvr1" name="curpvr1">  
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
                            <button id="enviar-r1" type="submit" class="boton btn-form">Enviar</button>
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
          Ver datos del referente 1:
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
             {{-- REFERENCIA 1--}}
            <div class="container mb-4 bg-cremita pt-3 rounded">
              <form method="POST" action="{{ route('form8-post2') }}">
                @csrf
                <div class="col-md-12 text-center">
                        <h2 class="titulo-form"><strong>REFERENCIA 1</strong><h2>
                      </div>
                {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 1 DEL FORMULARIO --}}
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="curpr1">CURP:</label>
                              <input type="text" class="form-control" id="curpr1" name="curpr1" value="{{ $xml1->curp ?? $r1curp ?? '' }}" readonly>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fechanacr1">Fecha de Nacimiento:</label>
                              <input type="text" class="form-control" id="fechanacr1" name="fechanacr1" value="{{ $xml1->fn ?? $r1fechanac ?? '' }}" readonly>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="sexor1">Sexo:</label>
                              <input type="text" class="form-control" id="sexor1" name="sexor1" value="{{ $xml1->sexo ?? $r1sexo ?? '' }}" readonly>
                            </div>
                          </div>
                        </div>

                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="paternor1">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="paternor1" name="paternor1" value="{{ $xml1->paterno ?? $r1paterno ?? '' }}" readonly>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="maternor1">Apellido Materno:</label>
                            <input type="text" class="form-control" id="maternor1" name="maternor1" value="{{ $xml1->materno ?? $r1materno ?? '' }}" readonly>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nombrer1">Nombre:</label>
                            <input type="text" class="form-control" id="nombrer1" name="nombrer1" value="{{ $xml1->nombre ?? $r1nombre ?? '' }}" readonly>
                          </div>
                        </div>
                      </div>

                      <h2 class="subtitulo-form">DOMICILIO</h2>
                      <div class="row border-form">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="estador1">Estado:</label>
                            <select class="form-control" id="estador1" name="estador1">
                              <option value="">Selecciona un estado</option>
                              @foreach(($estados ?? []) as $IdEstado => $NombreEstado)
                                  <option value="{{ $IdEstado }}" {{ ($nombreEstadoR1 ?? '' == $NombreEstado) ? 'selected' : '' }}>
                                      {{ $NombreEstado }}
                                  </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="municipior1">Municipio:</label>
                            <select class="form-control" id="municipior1" name="municipior1">
                              <option value="">Selecciona un municipio</option>
                              <option value="{{ $nombreMunicipioR1 ?? '' }}" selected>
                                  {{ $nombreMunicipioR1 ?? 'Selecciona un municipio' }}
                              </option>
                            </select>
                            <script>
                              cargarMunicipios('estador1', 'municipior1');
                            </script> 
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="localidadr1">Localidad:</label>
                            <select class="form-control" id="localidadr1" name="localidadr1">
                              <option value="">Selecciona una localidad</option>
                              @isset($idLocalidadR1)
                                  <option value="{{ $idLocalidadR1 }}" selected>{{ $nombreLocalidadR1 }}</option>
                              @endisset
                            </select>
                            <script>
                              cargarLocalidades('municipior1', 'localidadr1');
                            </script> 
                          </div>
                        </div>
                      

                      {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 4 DEL FORMULARIO --}}
                      
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="domr1">Calle del Domicilio:</label>
                            <input type="text" class="form-control" id="domr1" name="domr1" value="{{ $consultaCalleR1 ?? $r1calledom ?? '' }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nudomr1">Número del Domicilio:</label>
                            <input type="text" class="form-control" id="nudomr1" name="nudomr1" value="{{ $consultaNumeroR1 ?? $r1num ?? '' }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="colr1">Colonia del Domicilio:</label>
                            <input type="text" class="form-control" id="colr1" name="colr1" value="{{ $consultaColoniaR1 ?? $r1colonia ?? '' }}">
                          </div>
                        </div>
                      

                      {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 5 DEL FORMULARIO --}}
                    
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="entre1">Entre que calles se encuentra:</label>
                          <input type="text" class="form-control" id="entre1" name="entre1" value="{{ $consultaCalle2R1 ?? $r1calle2 ?? '' }}">
                          <label for="y">y</label>
                          <input type="text" class="form-control" id="entre2" name="entre2"  value="{{ $consultaCalle3R1 ?? $r1calle3 ?? '' }}">
                        </div>
                      </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="cpr1">Código Postal:</label>
                            <input type="text" class="form-control" id="cpr1" name="cpr1" value="{{ $consultaCpR1 ?? $r1cp ?? '' }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="telr1">Télefono:</label>
                            <input type="text" class="form-control" id="telr1" name="telr1" value="{{ $consultaTelefonoR1 ?? $r1telefono ?? '' }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="celr1">Celular:</label>
                              <input type="text" class="form-control" id="celr1" name="celr1" value="{{ $consultaCelularR1 ?? $r1celular ?? '' }}">
                            </div>
                          </div>
                      </div>

                      {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 6 DEL FORMULARIO --}}
                      
                    <div class="row">
                      <h2 class="subtitulo-form">LUGAR DONDE NACIÓ</h2>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="estado_nacr1">Estado donde nació:</label>
                              <select class="form-control" id="estado_nacr1" name="estado_nacr1">
                                <option value="">Selecciona un estado</option>
                                @foreach(($estados ?? []) as $IdEstado => $NombreEstado)
                                    <option value="{{ $IdEstado }}" {{ ($nombreEstadoNacR1 ?? '' == $NombreEstado) ? 'selected' : '' }}>
                                        {{ $NombreEstado }}
                                    </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="municipio_nacr1">Municipio donde nació:</label>
                              <select class="form-control" id="municipio_nacr1" name="municipio_nacr1">
                                <option value="">Selecciona un municipio</option>
                                <option value="{{ $nombreMunicipioNacR1 ?? '' }}" selected>
                                    {{ $nombreMunicipioNacR1 ?? 'Selecciona un municipio' }}
                                </option>
                              </select>
                              <script>
                                cargarMunicipios('estado_nacr1', 'municipio_nacr1');
                              </script> 
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="localidad_nacr1">Localidad donde nació:</label>
                              <select class="form-control" id="localidad_nacr1" name="localidad_nacr1">
                                <option value="">Selecciona una localidad</option>
                                @isset($idLocalidadNacR1)
                                    <option value="{{ $idLocalidadNacR1 }}" selected>{{ $nombreLocalidadNacR1 }}</option>
                                @endisset
                              </select>
                              <script>
                                cargarLocalidades('municipio_nacr1', 'localidad_nacr1');
                              </script> 
                            </div>
                          </div>
                          {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 7 DEL FORMULARIO --}}
                          <div class="row">
                              <div class="col-md-8">
                                  <div class="form-group">
                                    <label for="nota">Nota: El Domicilio debe ser del estado de tamaulipas y distinto al domicilio familiar del alumno.</label>
                                  </div>
                                </div>
                            <div class="col-md-4 text-right mb-3">
                              <!-- Botón "Guardar" -->
                              <button id="btnGuardarR1" type="submit" name="btnGuardarR1" class="boton btn-form" value="guardar">Guardar datos</button>
                            </div>
                          </div>
                    </div>
              </form>

              {{-- FORMULARIO PARA BOTON ELIMINAR --}}
              <form method="POST" action="{{ route('form8-post5') }}">
                @csrf
                @method('DELETE')
              {{-- CONTAINER PARA BOTON ELIMINAR | PADRE | ROW 1 DEL FORMULARIO --}}
                <div class="row">
                      <div class="row mt-4">
                        <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                          <button id="btnEliminarR1" type="submit" class="boton btn-form" name="btnEliminarR1" value="eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
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
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Ingresar CURP del referente 2:
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="container mb-4 bg-cremita pt-3 rounded" id="container-padre">
                <form method="POST" action="{{ route('form8-post3') }}">
                  @csrf
                {{-- PRIMER CONTAINER | PADRE | ROW 1 DEL FORMULARIO --}}
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h2 class="titulo-form"><strong>DATOS GENERALES DEL REFERENTE 2</strong><h2>
                      
                    </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="curpvr2">CURP REFERENTE 2:</label>
                            <input type="text" class="form-control" id="curpvr2" name="curpvr2">  
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
                            <button id="enviar-r2" type="submit" class="boton btn-form">Enviar</button>
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
          Ver datos del referente 2:
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            {{-- REFERENCIA 2 --}}
        <div class="container mb-4 bg-cremita pt-3 rounded">
          <form method="POST" action="{{ route('form8-post4') }}">
            @csrf
            <div class="col-md-12 text-center">
              <h2 class="titulo-form"><strong>REFERENCIA 2</strong><h2>
          </div>
                {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 8 DEL FORMULARIO --}}
              <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="curpr2">CURP:</label>
                          <input type="text" class="form-control" id="curpr2" name="curpr2" value="{{ $xml2->curp ?? $r2curp ?? '' }}" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechanacr2">Fecha de Nacimiento:</label>
                          <input type="text" class="form-control" id="fechanacr2" name="fechanacr2" value="{{ $xml2->fn ?? $r2fechanac ?? '' }}" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="sexor2">Sexo:</label>
                          <input type="text" class="form-control" id="sexor2" name="sexor2" value="{{ $xml2->sexo ?? $r2sexo ?? '' }}" readonly>
                        </div>
                      </div>
              </div>

              {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 9 DEL FORMULARIO --}}
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="paternor2">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="paternor2" name="paternor2" value="{{ $xml2->paterno ?? $r2paterno ?? '' }}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="maternor2">Apellido Materno:</label>
                    <input type="text" class="form-control" id="maternor2" name="maternor2" value="{{ $xml2->materno ?? $r2materno ?? '' }}" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nombrer2">Nombre:</label>
                    <input type="text" class="form-control" id="nombrer2" name="nombrer2" value="{{ $xml2->nombre ?? $r2nombre ?? '' }}" readonly>
                  </div>
                </div>
              </div>

              {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 10 DEL FORMULARIO --}}
              
            <div class="row">
              <h2 class="subtitulo-form">DOMICILIO</h2>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estador2">Estado:</label>
                    <select class="form-control" id="estador2" name="estador2">
                      <option value="">Selecciona un estado</option>
                      @foreach(($estados ?? []) as $IdEstado => $NombreEstado)
                          <option value="{{ $IdEstado }}" {{ ($nombreEstadoR2 ?? '' == $NombreEstado) ? 'selected' : '' }}>
                              {{ $NombreEstado }}
                          </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="municipior2">Municipio:</label>
                    <select class="form-control" id="municipior2" name="municipior2">
                      <option value="">Selecciona un municipio</option>
                      <option value="{{ $nombreMunicipioR2 ?? '' }}" selected>
                          {{ $nombreMunicipioR2 ?? 'Selecciona un municipio' }}
                      </option>
                    </select>
                    <script>
                      cargarMunicipios('estador2', 'municipior2');
                    </script> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="localidadr2">Localidad:</label>
                    <select class="form-control" id="localidadr2" name="localidadr2">
                      <option value="">Selecciona una localidad</option>
                      @isset($idLocalidadR2)
                          <option value="{{ $idLocalidadR2 }}" selected>{{ $nombreLocalidadR2 }}</option>
                      @endisset
                    </select>
                    <script>
                      cargarLocalidades('municipior2', 'localidadr2');
                    </script> 
                  </div>
                </div>
              

              {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 11 DEL FORMULARIO --}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="domr2">Calle del Domicilio:</label>
                    <input type="text" class="form-control" id="domr2" name="domr2" value="{{ $consultaCalleR2 ?? $r2calledom ?? '' }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nudomr2">Número del Domicilio:</label>
                    <input type="text" class="form-control" id="nudomr2" name="nudomr2" value="{{ $consultaNumeroR2 ?? $r2num ?? '' }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="colr2">Colonia del Domicilio:</label>
                    <input type="text" class="form-control" id="colr2" name="colr2" value="{{ $consultaColoniaR2 ?? $r2colonia ?? '' }}">
                  </div>
                </div>
              

              {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 12 DEL FORMULARIO --}}
              <div class="col-md-4">
                <div class="form-group">
                  <label for="entre3">Entre que calles se encuentra:</label>
                  <input type="text" class="form-control" id="entre3" name="entre3" value="{{ $consultaCalle2R2 ?? $r2calle2 ?? '' }}">
                  <label for="y">y</label>
                  <input type="text" class="form-control" id="entre4" name="entre4" value="{{ $consultaCalle3R2 ?? $r2calle2 ?? '' }}">
                </div>
              </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="cpr2">Código Postal:</label>
                    <input type="text" class="form-control" id="cpr2" name="cpr2" value="{{ $consultaCpR2 ?? $r2cp ?? '' }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="telr2">Télefono:</label>
                    <input type="text" class="form-control" id="telr2" name="telr2" value="{{ $consultaTelefonoR2 ?? $r2telefono ?? '' }}">
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="celr2">Celular:</label>
                      <input type="text" class="form-control" id="celr2" name="celr2" value="{{ $consultaCelularR2 ?? $r2celular ?? '' }}">
                    </div>
                  </div>
              </div>

              {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 13 DEL FORMULARIO --}}
              <h2 class="subtitulo-form">LUGAR DONDE NACIÓ</h2>
                <div class="row border-form">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="estado_nacr2">Estado donde nació:</label>
                          <select class="form-control" id="estado_nacr2" name="estado_nacr2">
                            <option value="">Selecciona un estado</option>
                            @foreach(($estados ?? []) as $IdEstado => $NombreEstado)
                                <option value="{{ $IdEstado }}" {{ ($nombreEstadoNacR2 ?? '' == $NombreEstado) ? 'selected' : '' }}>
                                    {{ $NombreEstado }}
                                </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="municipio_nacr2">Municipio donde nació:</label>
                          <select class="form-control" id="municipio_nacr2" name="municipio_nacr2">
                            <option value="">Selecciona un municipio</option>
                            <option value="{{ $nombreMunicipioNacR2 ?? '' }}" selected>
                                {{ $nombreMunicipioNacR2 ?? 'Selecciona un municipio' }}
                            </option>
                          </select>
                          <script>
                            cargarMunicipios('estado_nacr2', 'municipio_nacr2');
                          </script> 
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="localidad_nacr2">Localidad donde nació:</label>
                          <select class="form-control" id="localidad_nacr2" name="localidad_nacr2">
                            <option value="">Selecciona una localidad</option>
                            @isset($idLocalidadNacR2)
                                <option value="{{ $idLocalidadNacR2 }}" selected>{{ $nombreLocalidadNacR2 }}</option>
                            @endisset
                          </select>
                          <script>
                            cargarLocalidades('municipio_nacr2', 'localidad_nacr2');
                          </script> 
                        </div>
                      </div>
                </div>

            {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 14 DEL FORMULARIO --}}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                      <label for="nota">Nota: El Domicilio debe ser del estado de tamaulipas y distinto al domicilio familiar del alumno.</label>
                    </div>
                  </div>
              <div class="col-md-4 text-right mb-3">
                <!-- Botón "Guardar" -->
                <button id="btnGuardarR2" name="btnGuardarR2" type="submit" class="boton btn-form" value="guardar">Guardar datos</button>
              </div>
            </div>
          </form>
           {{-- FORMULARIO PARA BOTON ELIMINAR --}}
           <form method="POST" action="{{ route('form8-post6') }}">
            @csrf
            @method('DELETE')
          {{-- CONTAINER PARA BOTON ELIMINAR | PADRE | ROW 1 DEL FORMULARIO --}}
            <div class="row">
                  <div class="row mt-4">
                    <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                      <button id="btnEliminarR2" type="submit" class="boton btn-form" name="btnEliminaR2" value="eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
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

<div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form7-formulario') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form9-formulario') }}'">Siguiente</button>
  </div>
</div> 

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var varR1 = {{$consultaIdR1 ?? null}};
      var varR2 = {{$consultaIdR2 ?? null}};
      var var2R1 = {{$consulta2IdR1 ?? 1}};
      var var2R2 = {{$consulta2IdR2 ?? 1}};

      if (varR1 == 0) {
          varR1 = false;
      } else {
          varR1 = true;
      }

      if (varR2 == 0) {
          varR2 = false;
      } else {
          varR2 = true;
      }

      if (var2R1 == 0) {
          var2R1 = false;
      } else {
          var2R1 = true;
      }

      if (var2R2 == 0) {
          var2R2 = false;
      } else {
          var2R2 = true;
      }
      
      console.log(varR1, varR2, var2R1);
      

      existeR1(varR1, var2R1);
      existeR2(varR2, var2R2);
  });
</script>
  
@endsection