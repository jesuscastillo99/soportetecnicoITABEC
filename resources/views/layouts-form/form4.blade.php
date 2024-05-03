@extends('layouts.landingsinslider')
@section('title', 'form4')
@section('content')
<div class="section margin-top_50">
  @if (session('successF4R1'))
    <div class="alert alert-success text-center">
         {{ session('successF4R1') }}
    </div>
  @endif
  @if (session('errorF4R1'))
    <div class="alert alert-success text-center">
         {{ session('errorF4R1') }}
    </div>
  @endif
    <div class="container mb-2 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form4-post') }}" id="formulario-historial">
        @csrf
        <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="titulo-form"><strong>Información Académica</strong><h2>
            </div>
          </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="form-group">
              <label for="estado">Estado:</label>
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
              <label for="municipio">Municipio donde esta ubicada:</label>
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
              <label for="escuela">Escuela o facultad:</label>
              <select class="form-control" id="escuela" name="escuela">
                <option value="">Selecciona una escuela</option>
                <option value="{{ $nombreEscuela ?? '' }}" selected>
                    {{ $nombreEscuela ?? 'Selecciona una escuela' }}
                </option>
              </select>
              @error('escuela')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <script>
                cargarEscuelas('municipio', 'escuela');
              </script> 
            </div>
          </div>
        </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="carrera">Carrera:</label>
                  <select class="form-control" id="carrera" name="carrera">
                    <option value="">Selecciona una carrera</option>
                    @isset($consultaIdCarrera)
                        <option value="{{ $carreras ?? null }}" selected>{{ $nombreCarrera }}</option>
                    @endisset
                  </select>
                  @error('carrera')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <script>
                    cargarCarreras('escuela', 'carrera');
                  </script> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="semestre">Semestre o Cuatrimestre:</label>
                  <select class="form-control" id="semestre" name="semestre">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('semestre', $consultaSemestre) == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('semestre', $consultaSemestre) == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('semestre', $consultaSemestre) == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('semestre', $consultaSemestre) == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ old('semestre', $consultaSemestre) == '5' ? 'selected' : '' }}>5</option>
                    <option value="6" {{ old('semestre', $consultaSemestre) == '6' ? 'selected' : '' }}>6</option>
                    <option value="7" {{ old('semestre', $consultaSemestre) == '7' ? 'selected' : '' }}>7</option>
                    <option value="8" {{ old('semestre', $consultaSemestre) == '8' ? 'selected' : '' }}>8</option>
                    <option value="9" {{ old('semestre', $consultaSemestre) == '9' ? 'selected' : '' }}>9</option>
                    <option value="10" {{ old('semestre', $consultaSemestre) == '10' ? 'selected' : '' }}>10</option>
                    <option value="11" {{ old('semestre', $consultaSemestre) == '11' ? 'selected' : '' }}>11</option>
                    <option value="12" {{ old('semestre', $consultaSemestre) == '12' ? 'selected' : '' }}>12</option>
                    <option value="13" {{ old('semestre', $consultaSemestre) == '13' ? 'selected' : '' }}>13</option>
                    <option value="14" {{ old('semestre', $consultaSemestre) == '14' ? 'selected' : '' }}>14</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pAcademico">Plan Académico:</label>
                  <select class="form-control" id="pAcademico" name="pAcademico">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('pAcademico', $consultapAcademico) == '1' ? 'selected' : '' }}>SEMESTRE</option>
                    <option value="2" {{ old('pAcademico', $consultapAcademico) == '2' ? 'selected' : '' }}>TRIMESTRE</option>
                    <option value="3" {{ old('pAcademico', $consultapAcademico) == '3' ? 'selected' : '' }}>AÑO</option>
                    <option value="4" {{ old('pAcademico', $consultapAcademico) == '4' ? 'selected' : '' }}>CUATRIMESTRE</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numControl">Número de Control Escolar:</label>
                  <input type="text" class="form-control" id="numControl" maxlength="25" name="numControl" value="{{ old('numControl', $consultaNumControl) }}" maxlength="25" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 100)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="periodo">Periodo:</label>
                  <select class="form-control" id="periodo" name="periodo">
                    <option value="46">FEBRERO JUNIO 2024</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="promUltGrado">Promedio del último grado:</label>
                  <input type="number" class="form-control" id="promUltGrado" name="promUltGrado" maxlength="3" value="{{ old('promUltGrado', $consultaPromUltGrado) }}" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="impInscripcion">Importe de la inscripción:</label>
                  <input type="text" class="form-control" id="impInscripcion" maxlength="10" name="impInscripcion" value="{{ old('impInscripcion', $consultaImpInscripcion) }}" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="impInscripcionCol">Importe de la colegiatura que cubrirá mensualmente:</label>
                  <input type="text" class="form-control" id="impInscripcionCol" maxlength="10" name="impInscripcionCol" value="{{ old('impInscripcionCol', $consultaImpInscripcionCol) }}" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nivel">Nivel:</label>
                  <select class="form-control" id="nivel" name="nivel">
                    <option value="7">Seleccione:</option>
                    <option value="4" {{ old('nivel', $consultaNivel) == '4' ? 'selected' : '' }}>Bachillerato</option>
                    <option value="5" {{ old('nivel', $consultaNivel) == '5' ? 'selected' : '' }}>Licenciatura</option>
                    <option value="6" {{ old('nivel', $consultaNivel) == '6' ? 'selected' : '' }}>Posgrado</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                  <div class="form-group">
                      <label class="font-weight-bold titulo-form" for="mesTermEst">Mes y año en el que terminaría sus estudios</label>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <select class="form-control" id="mesTermEst" name="mesTermEst">
                              <option value="01" {{ old('mesTermEst', $consultaMesTermEst) == '01' ? 'selected' : '' }}>Enero</option>
                              <option value="02" {{ old('mesTermEst', $consultaMesTermEst) == '02' ? 'selected' : '' }}>Febrero</option>
                              <option value="03" {{ old('mesTermEst', $consultaMesTermEst) == '03' ? 'selected' : '' }}>Marzo</option>
                              <option value="04" {{ old('mesTermEst', $consultaMesTermEst) == '04' ? 'selected' : '' }}>Abril</option>
                              <option value="05" {{ old('mesTermEst', $consultaMesTermEst) == '05' ? 'selected' : '' }}>Mayo</option>
                              <option value="06" {{ old('mesTermEst', $consultaMesTermEst) == '06' ? 'selected' : '' }}>Junio</option>
                              <option value="07" {{ old('mesTermEst', $consultaMesTermEst) == '07' ? 'selected' : '' }}>Julio</option>
                              <option value="08" {{ old('mesTermEst', $consultaMesTermEst) == '08' ? 'selected' : '' }}>Agosto</option>
                              <option value="09" {{ old('mesTermEst', $consultaMesTermEst) == '09' ? 'selected' : '' }}>Septiembre</option>
                              <option value="10" {{ old('mesTermEst', $consultaMesTermEst) == '10' ? 'selected' : '' }}>Octubre</option>
                              <option value="11" {{ old('mesTermEst', $consultaMesTermEst) == '11' ? 'selected' : '' }}>Noviembre</option>
                              <option value="12" {{ old('mesTermEst', $consultaMesTermEst) == '12' ? 'selected' : '' }}>Diciembre</option>
                            </select>
                          </div>
                        </div>
                          <span class="col-sm-1 text-center">del</span>
                          <div class="col-md-4">
                            <div class="form-group">
                              <select class="form-control" id="añoTermEst" name="añoTermEst">
                                <option value="2017" {{ old('añoTermEst', $consultaAñoTermEst) == '2017' ? 'selected' : '' }}>2017</option>
                                <option value="2018" {{ old('añoTermEst', $consultaAñoTermEst) == '2018' ? 'selected' : '' }}>2018</option>
                                <option value="2019" {{ old('añoTermEst', $consultaAñoTermEst) == '2019' ? 'selected' : '' }}>2019</option>
                                <option value="2020" {{ old('añoTermEst', $consultaAñoTermEst) == '2020' ? 'selected' : '' }}>2020</option>
                                <option value="2021" {{ old('añoTermEst', $consultaAñoTermEst) == '2021' ? 'selected' : '' }}>2021</option>
                                <option value="2022" {{ old('añoTermEst', $consultaAñoTermEst) == '2022' ? 'selected' : '' }}>2022</option>
                                <option value="2023" {{ old('añoTermEst', $consultaAñoTermEst) == '2023' ? 'selected' : '' }}>2023</option>
                                <option value="2024" {{ old('añoTermEst', $consultaAñoTermEst) == '2024' ? 'selected' : '' }}>2024</option>
                                <option value="2025" {{ old('añoTermEst', $consultaAñoTermEst) == '2025' ? 'selected' : '' }}>2025</option>
                                <option value="2026" {{ old('añoTermEst', $consultaAñoTermEst) == '2026' ? 'selected' : '' }}>2026</option>
                                <option value="2027" {{ old('añoTermEst', $consultaAñoTermEst) == '2027' ? 'selected' : '' }}>2027</option>
                                <option value="2028" {{ old('añoTermEst', $consultaAñoTermEst) == '2028' ? 'selected' : '' }}>2028</option>
                                <option value="2029" {{ old('añoTermEst', $consultaAñoTermEst) == '2029' ? 'selected' : '' }}>2029</option>
                                <option value="2030" {{ old('añoTermEst', $consultaAñoTermEst) == '2030' ? 'selected' : '' }}>2030</option>                                
                              </select>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>          

          <p class="font-weight-bold"> En caso de titulación </p>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nivelAcaTitulacion">Nivel académico para titulación:</label>
                  <select class="form-control" id="nivelAcaTitulacion" name="nivelAcaTitulacion">
                    <option value="0" {{ old('nivelAcaTitulacion', $consultaNivelTitu) == '0' ? 'selected' : '' }}>No aplica</option>
                    <option value="1" {{ old('nivelAcaTitulacion', $consultaNivelTitu) == '1' ? 'selected' : '' }}>Licenciatura</option>
                    <option value="2" {{ old('nivelAcaTitulacion', $consultaNivelTitu) == '2' ? 'selected' : '' }}>Maestría</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tipoTitulacion">Tipo de titulación:</label>
                  <select class="form-control" id="tipoTitulacion" name="tipoTitulacion">
                    <option value="0" {{ old('tipoTitulacion', $consultaTipoTitu) == '0' ? 'selected' : '' }}>No aplica</option>
                    <option value="1" {{ old('tipoTitulacion', $consultaTipoTitu) == '1' ? 'selected' : '' }}>Curso</option>
                    <option value="2" {{ old('tipoTitulacion', $consultaTipoTitu) == '2' ? 'selected' : '' }}>Tesis</option>
                    <option value="3" {{ old('tipoTitulacion', $consultaTipoTitu) == '3' ? 'selected' : '' }}>Diplomado</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-right mb-3">
                  <button type="submit" class="boton btn-form">Guardar datos</button>
                </div>
            </div>
          </form>
        </div> 
    </div>
</div>

 <div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form3-formulario') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form5-formulario') }}'">Siguiente</button>
  </div>
</div> 

<!-- end section -->
@endsection