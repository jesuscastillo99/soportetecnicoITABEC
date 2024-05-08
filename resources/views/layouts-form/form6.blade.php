@extends('layouts.landingsinslider')
@section('title', 'Información Personal del Solicitante')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')


<div class="section margin-top_50">
  <h2 class="text-center">Por favor ingresa los datos de tu AVAL</h2>
 
  
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
   
    <!-- Utiliza 'container' para centrar y 'd-flex' para establecer flexbox -->
    
    <div class="accordion mi-accordion" id="accordionExample">
        <div class="accordion-item" id="item1">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Ingresar CURP del AVAL:
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="container mb-4 bg-cremita pt-3 rounded" id="container-aval">
                    <form method="POST" action="{{ route('form6-post1') }}">
                      @csrf
                    {{-- PRIMER CONTAINER | PADRE | ROW 1 DEL FORMULARIO --}}
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <h2 class="titulo-form"><strong>DATOS GENERALES DEL AVAL</strong><h2>
                          
                        </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="curpaval1">CURP AVAL:</label>
                                <input type="text" class="form-control" id="curpaval1" name="curpaval1">  
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
                                <button id="enviar-aval" type="submit" class="boton btn-form">Enviar</button>
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
              Ver datos del AVAL:
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        
             
            <div class="accordion-body">
                <div class="container mb-4 bg-cremita pt-3 rounded container-none" id="container-aval2">
                    <form id="form-aval2" method="POST" action="{{ route('form6-post2') }}">  
                      @csrf
                      <div class="row">
                      <div class="col-md-12 text-center">
                        <h2 class="titulo-form"><strong>DATOS GENERALES DEL AVAL</strong><h2>
                      </div>
                      <p>{{$idAval ?? null}}</p>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="curpaval2">CURP:</label>
                              <input type="text" class="form-control" id="curpaval2" name="curpaval2" value="{{ $xml1->curp ?? $avcurp ?? '' }}" readonly>
                              @error('curpaval2')
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
                              <label for="fechaaval">Fecha de Nacimiento:</label>
                              <input type="text" class="form-control" id="fechaaval" name="fechaaval" value="{{ $xml1->fn ?? $avfechanac ?? '' }}" readonly>
                              @error('fechaaval')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="sexo">Sexo:</label>
                              <input type="text" class="form-control" id="sexo" name="sexo" value="{{ $xml1->sexo ?? $avsexo ?? '' }}" readonly>
                            </div>
                          </div>
                        </div>
              
                       
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="apellidoaval1">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="apellidoaval1" name="apellidoaval1" value="{{ $xml1->paterno ?? $avpaterno ?? '' }}" readonly>
                                @error('apellidoaval1')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="apellidoaval2">Apellido Materno:</label>
                                <input type="text" class="form-control" id="apellidoaval2" name="apellidoaval2" value="{{ $xml1->materno ?? $avmaterno ?? '' }}" readonly>
                                @error('apellidoaval2')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="nombreaval">Nombre:</label>
                                <input type="text" class="form-control" id="nombreaval" name="nombreaval" value="{{ $xml1->nombre ?? $avnombre ?? '' }}" readonly>
                                @error('nombreaval')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <h2 class="subtitulo-form">DOMICILIO</h2>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" id="estado" name="estado">
                                  <option value="">Selecciona un estado</option>
                                  @foreach(($estados ?? []) as $IdEstado => $NombreEstado)
                                      <option value="{{ $IdEstado }}" {{ ($nombreEstadoAval == $NombreEstado) ? 'selected' : '' }}>
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
                                <label for="municipio">Municipio:</label>
                                <select class="form-control" id="municipio" name="municipio">
                                  <option value="">Selecciona un municipio</option>
                                  <option value="{{ $nombreMunicipioAval ?? '' }}" selected>
                                      {{ $nombreMunicipioAval ?? 'Selecciona un municipio' }}
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
                                <label for="localidad">Localidad:</label>
                                <select class="form-control" id="localidad" name="localidad">
                                  <option value="">Selecciona una localidad</option>
                                  @isset($avidlocalidad)
                                      <option value="{{ $avidlocalidad }}" selected>{{ $nombreLocalidadAval }}</option>
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

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="calle">Calle del domicilio:</label>
                              <input type="text" class="form-control uppercase-input" id="calle" maxlength="100" name="calle" value="{{ $consultaavcalle ?? $avcalle ?? '' }}">
                            </div>
                           </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="numero">Número del domicilio:</label>
                              <input type="text" class="form-control" id="numero" name="numero" maxlength="25" value="{{ $consultaavnum ?? $avnum ?? '' }}">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="colonia">Colonia:</label>
                              <input type="text" class="form-control uppercase-input" id="colonia" maxlength="100" name="colonia" value="{{ $consultaavcolonia ?? $avcolonia ?? '' }}">
                            </div>
                         </div>
                        </div>
            
                    {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 5 DEL FORMULARIO --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="entrecalle1">Entre que calles se encuentra:</label>
                              <input type="text" class="form-control uppercase-input" id="entrecalle1" maxlength="50" name="entrecalle1" value="{{ $consultaavcalle2 ?? $avcalle2 ?? '' }}">
                              <label for="y">y</label>
                              <input type="text" class="form-control uppercase-input" id="entrecalle2" maxlength="50" name="entrecalle2" value="{{ $consultaavcalle3 ?? $avcalle3 ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="codpostal">Código Postal:</label>
                              <input type="text" class="form-control" id="codpostal" maxlength="5" name="codpostal" value="{{ $consultaavcp ?? $avcp ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="telefono">Télefono:</label>
                              <input type="text" class="form-control" id="telefono" maxlength="10" name="telefono" value="{{ $consultaavtelefono ?? $avtelefono ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="celular">Celular:</label>
                              <input type="text" class="form-control" id="celular" maxlength="10" name="celular" value="{{ $consultaavcelular ?? $avcelular ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="relacionacred">Relación con el Acréditado:</label>
                              <select class="form-control" id="relacionacred" name="relacionacred">
                                  <option value="" {{ old('relacionacred', $consultaavrelacred ?? $avrelacred ?? '') == "" ? 'selected' : '' }}>Seleccione:</option>
                                    <option value="1" {{ old('relacionacred', $consultaavrelacred ?? $avrelacred ?? '') == "1" ? 'selected' : '' }}>Padre</option>
                                    <option value="2" {{ old('relacionacred', $consultaavrelacred ?? $avrelacred ?? '') == "2" ? 'selected' : '' }}>Madre</option>
                                    <option value="3" {{ old('relacionacred', $consultaavrelacred ?? $avrelacred ?? '') == "3" ? 'selected' : '' }}>Familiar</option>
                                    <option value="4" {{ old('relacionacred', $consultaavrelacred ?? $avrelacred ?? '') == "4" ? 'selected' : '' }}>Otro</option>
                                    <option value="5" {{ old('relacionacred', $consultaavrelacred ?? $avrelacred ?? '') == "5" ? 'selected' : '' }}>Conyuge</option>
                                  </select>
                            </div>
                         </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="casapropia">Tiene Casa Propia:</label>
                              <select class="form-control" id="casapropia" name="casapropia">
                                <option value="1" {{ old('casapropia', $consultaavcasap ?? $avcasap ?? '') == "1" ? 'selected' : '' }}>Si</option>
                                <option value="2" {{ old('casapropia', $consultaavcasap ?? $avcasap ?? '') == "2" ? 'selected' : '' }}>No</option>
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="trabaja">¿Trabaja?</label>
                            <select class="form-control" id="trabaja" name="trabaja">
                              <option value="1" {{ old('trabaja', $consultaavtrabaja ?? $avtrabaja ?? '') == "1" ? 'selected' : '' }}>Si</option>
                                <option value="2" {{ old('trabaja', $consultaavtrabaja ?? $avtrabaja ?? '') == "2" ? 'selected' : '' }}>No</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12 text-center">
                          <h2 class="titulo-form"><strong>TRABAJO DEL AVAL</strong><h2>
                        </div>
                         
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="nomorgt">Nombre de la Organización donde Trabaja:</label>
                                <input type="text" class="form-control uppercase-input" maxlength="50" id="nomorgt" name="nomorgt" value="{{ $consultaavnombreorg ?? $avnombreorg ?? '' }}">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="cargodesem">Cargo que desempeña:</label>
                                <input type="text" class="form-control uppercase-input" maxlength="50" id="cargodesem" name="cargodesem" value="{{ $consultaavpuesto ?? $avpuesto ?? '' }}">
                              </div>
                            </div>
                           
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="ingmens">Ingreso Mensual:</label>
                                  <input type="text" class="form-control" id="ingmens" maxlength="10" name="ingmens" value="{{ $consultaavsueldo ?? $avsueldo ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                                </div>
                              </div>
                            </div>
                            </div>
                              <div class="col-md-12 text-center">
                                <h2 class="titulo-form"><strong>Domicilio del Trabajo</strong><h2>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="callet">Calle:</label>
                                      <input type="text" class="form-control uppercase-input" maxlength="50" id="callet" name="callet" value="{{ $consultaavcallet ?? $avcallet ?? '' }}">
                                    </div>
                                  </div>
      
                                  <div class="col-md-4">
                                   <div class="form-group">
                                   <label for="numerot">Número:</label>
                                  <input type="text" class="form-control" id="numerot" maxlength="20" name="numerot" value="{{ $consultaavnumerot ?? $avnumerot ?? '' }}">
                                   </div>
                                 </div>
                               <div class="col-md-4">
                                 <div class="form-group">
                                 <label for="coloniat">Colonia:</label>
                                <input type="text" class="form-control uppercase-input" id="coloniat" maxlength="50" name="coloniat" value="{{ $consultaavcoloniat ?? $avcoloniat ?? '' }}">
                               </div>
                              </div>
                              </div>
                    
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="entrecalle1t">Entre que calles se encuentra:</label>
                              <input type="text" class="form-control uppercase-input" id="ecalle1t" maxlength="50" name="ecalle1t" value="{{ $consultaavcalle2t ?? $avcalle2t ?? '' }}">
                              <label for="y">y</label>
                              <input type="text" class="form-control uppercase-input" id="ecalle2t" maxlength="50" name="ecalle2t" value="{{ $consultaavcalle3t ?? $avcalle3t ?? '' }}">
                            </div>
                        </div>
                     
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="codpostalt">Código Postal:</label>
                            <input type="text" class="form-control" id="codpostalt" maxlength="5" name="codpostalt" value="{{ $consultaavcpt ?? $avcpt ?? '' }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                          </div>
                       </div>
                       </div>
                         
                          <div class="row mt-4">
                              <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                                <button id="btnGuardarAval" type="submit" class="boton btn-form" name="btnGuardarAval" value="guardar">Guardar datos</button>
                               
                              </div>
                            </div>
                    </form>

                    {{-- FORMULARIO PARA BOTON ELIMINAR --}}
                    <form method="POST" action="{{ route('form6-post3') }}">
                      @csrf
                      @method('DELETE')
                   
                      <div class="row">
                            <div class="row mt-4">
                              <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
                                <button id="btnEliminarAval" type="submit" class="boton btn-form" name="btnEliminarAval" value="eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
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
</div>

<div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form2-formulario') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form7-formulario') }}'">Siguiente</button>
  </div>
</div>
<script src="{{ asset('assets/js/eventosAcordeon.js')}}"></script>
<script src="{{ asset('assets/js/eventosForm3.js')}}"></script>
{{-- SCRIPTS PARA ACORDEONES AVAL --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var varAval = {{$consultaIdAval ?? null}};
      var varAval2 = {{$consulta2IdAval ?? 1}};
 

      if (varAval == 0) {
          varAval = false;
      } else {
          varAval = true;
      }

      

      if (varAval2 == 0) {
          varAval2 = false;
      } else {
          varAval2 = true;
      }

      
      console.log(varAval, varAval2);
      

      existeAval(varAval, varAval2);
  });
</script>
<script>
  document.querySelectorAll('.uppercase-input').forEach(function(input) {
      input.addEventListener('input', function() {
          this.value = this.value.toUpperCase();
      });
  });
</script>
@endsection