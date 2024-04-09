@extends('layouts.landingsinslider')
@section('title', 'Información Personal')
@section('content')

<div class="section margin-top_50">
    <div class="container mb-4 bg-cremita pt-3 rounded">

      <form method="POST" action="{{ route('form7-post') }}">
        @csrf
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>ENCUESTA SOCIOECONÓMICA</strong><h2>
              </div>
        </div>

        {{-- ROW 1 DEL FORMULARIO --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="escpa">¿Escolaridad más alta alcanzada de tu padre?</label>
                  <select class="form-control" id="escpa" name="escpa">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('escpa', $consultaEscPa) == '1' ? 'selected' : '' }}>Sin escolaridad/algunos años en primaria</option>
                    <option value="2" {{ old('escpa', $consultaEscPa) == '2' ? 'selected' : '' }}>Primaria terminada, Secundaria incompleta</option>
                    <option value="3" {{ old('escpa', $consultaEscPa) == '3' ? 'selected' : '' }}>Secundaria o Comercio terminado, Bachillerato incompleto</option>
                    <option value="4" {{ old('escpa', $consultaEscPa) == '4' ? 'selected' : '' }}>Educación técnica completa o Normal básica</option>
                    <option value="5" {{ old('escpa', $consultaEscPa) == '5' ? 'selected' : '' }}>Bachillerato completo, Educación Superior incompleta</option>
                    <option value="6" {{ old('escpa', $consultaEscPa) == '6' ? 'selected' : '' }}>Educación Superior terminada o Normal Superior, Posgrado incompleto</option>
                    <option value="7" {{ old('escpa', $consultaEscPa) == '7' ? 'selected' : '' }}>Estudios de Posgrado (Maestría o Doctorado) terminados</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="escma">¿Escolaridad más alta alcanzada de tu madre?</label>
                  <select class="form-control" id="escma" name="escma">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('escma', $consultaEscMa) == '1' ? 'selected' : '' }}>Sin escolaridad/algunos años en primaria</option>
                    <option value="2" {{ old('escma', $consultaEscMa) == '2' ? 'selected' : '' }}>Primaria terminada, Secundaria incompleta</option>
                    <option value="3" {{ old('escma', $consultaEscMa) == '3' ? 'selected' : '' }}>Secundaria o Comercio terminado, Bachillerato incompleto</option>
                    <option value="4" {{ old('escma', $consultaEscMa) == '4' ? 'selected' : '' }}>Educación técnica completa o Normal básica</option>
                    <option value="5" {{ old('escma', $consultaEscMa) == '5' ? 'selected' : '' }}>Bachillerato completo, Educación Superior incompleta</option>
                    <option value="6" {{ old('escma', $consultaEscMa) == '6' ? 'selected' : '' }}>Educación Superior terminada o Normal Superior, Posgrado incompleto</option>
                    <option value="7" {{ old('escma', $consultaEscMa) == '7' ? 'selected' : '' }}>Estudios de Posgrado (Maestría o Doctorado) terminados</option>
                  </select>
                </div>
              </div>
        </div>

        {{-- ROW 2 DEL FORMULARIO --}}
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                <label for="actpa">¿Actividad a lo largo de la vida de Tu Padre?</label>
                <select class="form-control" id="actpa" name="actpa">
                  <option value="0">Seleccione:</option>
                  <option value="1" {{ old('actpa', $consultaActPa) == '1' ? 'selected' : '' }}>Desempleado</option>
                  <option value="2" {{ old('actpa', $consultaActPa) == '2' ? 'selected' : '' }}>Jubilado</option>
                  <option value="3" {{ old('actpa', $consultaActPa) == '3' ? 'selected' : '' }}>Pequeño comerciante (Instalado o ambulante).</option>
                  <option value="4" {{ old('actpa', $consultaActPa) == '4' ? 'selected' : '' }}>Artesano (Productor de objetos de madera, barro, cuero, yeso, tela o cualquier otro material de uso artesanal carpinteros, trabajadores de la construcción, etc.)</option>
                  <option value="5" {{ old('actpa', $consultaActPa) == '5' ? 'selected' : '' }}>Pequeño agricultor, pequeño ganadero o pescador, campesino o ejidatario.</option>
                  <option value="6" {{ old('actpa', $consultaActPa) == '6' ? 'selected' : '' }}>Prestador de servicios personales (jardinero, peluquero, músico, plomero, relojero,mécanico automotriz, electricista, instalador de climas, reparador de televisiones,vigilante u otro tipo </option>
                  <option value="7" {{ old('actpa', $consultaActPa) == '7' ? 'selected' : '' }}>Obrero de la industria o de la minería.</option>
                  <option value="8" {{ old('actpa', $consultaActPa) == '8' ? 'selected' : '' }}>Operador de transporte (chofer, taxista, fletero).</option>
                  <option value="9" {{ old('actpa', $consultaActPa) == '9' ? 'selected' : '' }}>Maestro de preescolar.</option>
                  <option value="10" {{ old('actpa', $consultaActPa) == '10' ? 'selected' : '' }}>Empleado de establecimientos comerciales o de servicios.</option>
                  <option value="11" {{ old('actpa', $consultaActPa) == '11' ? 'selected' : '' }}>Empleado de gobierno municipal, estatal o federal (incluye militares).</option>
                  <option value="12" {{ old('actpa', $consultaActPa) == '12' ? 'selected' : '' }}>Empleado de la Industria o de la Banca.</option>
                  <option value="13" {{ old('actpa', $consultaActPa) == '13' ? 'selected' : '' }}>Empleado de Instituciones Gubernamentales descentralizadas (IMSS, CFE, PEMEX,ISSSTE, CONASUPO, etc.)</option>
                  <option value="14" {{ old('actpa', $consultaActPa) == '14' ? 'selected' : '' }}>Comerciante (propietario de establecimiento comercial).</option>
                  <option value="15" {{ old('actpa', $consultaActPa) == '15' ? 'selected' : '' }}>Ganadero y/o productor agrícola (propietario o copropietario).</option>
                  <option value="16" {{ old('actpa', $consultaActPa) == '16' ? 'selected' : '' }}>Profesor de Bachiller o Universidad (incluye funcionarios de universidades).</option>
                  <option value="17" {{ old('actpa', $consultaActPa) == '17' ? 'selected' : '' }}>Propietario de casas de renta.</option>
                  <option value="18" {{ old('actpa', $consultaActPa) == '18' ? 'selected' : '' }}>Profesionista que trabaja por su cuenta (Médico, Arquitecto, Ingeniero civil,contador, etc., que trabajan de manera independiente).</option>
                  <option value="19" {{ old('actpa', $consultaActPa) == '19' ? 'selected' : '' }}>Directivo de empresas (Subgerente, Gerente, Director, etc.).</option>
                  <option value="20" {{ old('actpa', $consultaActPa) == '20' ? 'selected' : '' }}>Funcionario (Medio alto) de instituciones gubernamentales o que dependen de gobierno municipal, estatal o federal.</option>
                  <option value="21" {{ old('actpa', $consultaActPa) == '21' ? 'selected' : '' }}>Empresario, Accionista de empresas.</option>
                  <option value="22" {{ old('actpa', $consultaActPa) == '22' ? 'selected' : '' }}>Político (Puesto de elección popular).</option>
                  <option value="23" {{ old('actpa', $consultaActPa) == '23' ? 'selected' : '' }}>Ama de casa.</option>
                  <option value="24" {{ old('actpa', $consultaActPa) == '24' ? 'selected' : '' }}>Ninguno de los anteriores (Especificar)</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="actma">¿Actividad a lo largo de la vida de Tu Madre?</label>
                <select class="form-control" id="actma" name="actma">
                  <option value="0">Seleccione:</option>
                  <option value="1" {{ old('actma', $consultaActMa) == '1' ? 'selected' : '' }}>Desempleado</option>
                  <option value="2" {{ old('actma', $consultaActMa) == '2' ? 'selected' : '' }}>Jubilado</option>
                  <option value="3" {{ old('actma', $consultaActMa) == '3' ? 'selected' : '' }}>Pequeño comerciante (Instalado o ambulante).</option>
                  <option value="4" {{ old('actma', $consultaActMa) == '4' ? 'selected' : '' }}>Artesano (Productor de objetos de madera, barro, cuero, yeso, tela o cualquier otro material de uso artesanal carpinteros, trabajadores de la construcción, etc.)</option>
                  <option value="5" {{ old('actma', $consultaActMa) == '5' ? 'selected' : '' }}>Pequeño agricultor, pequeño ganadero o pescador, campesino o ejidatario.</option>
                  <option value="6" {{ old('actma', $consultaActMa) == '6' ? 'selected' : '' }}>Prestador de servicios personales (jardinero, peluquero, músico, plomero, relojero,mécanico automotriz, electricista, instalador de climas, reparador de televisiones,vigilante u otro tipo </option>
                  <option value="7" {{ old('actma', $consultaActMa) == '7' ? 'selected' : '' }}>Obrero de la industria o de la minería.</option>
                  <option value="8" {{ old('actma', $consultaActMa) == '8' ? 'selected' : '' }}>Operador de transporte (chofer, taxista, fletero).</option>
                  <option value="9" {{ old('actma', $consultaActMa) == '9' ? 'selected' : '' }}>Maestro de preescolar.</option>
                  <option value="10" {{ old('actma', $consultaActMa) == '10' ? 'selected' : '' }}>Empleado de establecimientos comerciales o de servicios.</option>
                  <option value="11" {{ old('actma', $consultaActMa) == '11' ? 'selected' : '' }}>Empleado de gobierno municipal, estatal o federal (incluye militares).</option>
                  <option value="12" {{ old('actma', $consultaActMa) == '12' ? 'selected' : '' }}>Empleado de la Industria o de la Banca.</option>
                  <option value="13" {{ old('actma', $consultaActMa) == '13' ? 'selected' : '' }}>Empleado de Instituciones Gubernamentales descentralizadas (IMSS, CFE, PEMEX,ISSSTE, CONASUPO, etc.)</option>
                  <option value="14" {{ old('actma', $consultaActMa) == '14' ? 'selected' : '' }}>Comerciante (propietario de establecimiento comercial).</option>
                  <option value="15" {{ old('actma', $consultaActMa) == '15' ? 'selected' : '' }}>Ganadero y/o productor agrícola (propietario o copropietario).</option>
                  <option value="16" {{ old('actma', $consultaActMa) == '16' ? 'selected' : '' }}>Profesor de Bachiller o Universidad (incluye funcionarios de universidades).</option>
                  <option value="17" {{ old('actma', $consultaActMa) == '17' ? 'selected' : '' }}>Propietario de casas de renta.</option>
                  <option value="18" {{ old('actma', $consultaActMa) == '18' ? 'selected' : '' }}>Profesionista que trabaja por su cuenta (Médico, Arquitecto, Ingeniero civil,contador, etc., que trabajan de manera independiente).</option>
                  <option value="19" {{ old('actma', $consultaActMa) == '19' ? 'selected' : '' }}>Directivo de empresas (Subgerente, Gerente, Director, etc.).</option>
                  <option value="20" {{ old('actma', $consultaActMa) == '20' ? 'selected' : '' }}>Funcionario (Medio alto) de instituciones gubernamentales o que dependen de gobierno municipal, estatal o federal.</option>
                  <option value="21" {{ old('actma', $consultaActMa) == '21' ? 'selected' : '' }}>Empresario, Accionista de empresas.</option>
                  <option value="22" {{ old('actma', $consultaActMa) == '22' ? 'selected' : '' }}>Político (Puesto de elección popular).</option>
                  <option value="23" {{ old('actma', $consultaActMa) == '23' ? 'selected' : '' }}>Ama de casa.</option>
                  <option value="24" {{ old('actma', $consultaActMa) == '24' ? 'selected' : '' }}>Ninguno de los anteriores (Especificar)</option>
                </select>
              </div>
            </div>

            {{-- ROW 3 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="autopr">¿Tienes Automovil Propio?</label>
                  <select class="form-control" id="autopr" name="autopr">
                    <option value="seleccione">Seleccione:</option>
                    <option value="0" {{ old('autopr', $consultaAuPro) == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('autopr', $consultaAuPro) == '1' ? 'selected' : '' }}>Si</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colpri">¿Estudiaste en algun Colegio Privado?</label>
                  <select class="form-control" id="colpri" name="colpri">
                    <option value="seleccione">Seleccione:</option>
                    <option value="0">{{ old('colpri', $consultaColPri) == '0' ? 'selected' : '' }}No</option>
                    <option value="1" {{ old('colpri', $consultaColPri) == '1' ? 'selected' : '' }}>Si</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="cpup">¿Tienes Computadora para uso Personal?</label>
                  <select class="form-control" id="cpup" name="cpup">
                    <option value="seleccione">Seleccione:</option>
                    <option value="0" {{ old('cpup', $consultaCpu) == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('cpup', $consultaCpu) == '0' ? 'selected' : '' }}>Si</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- ROW 4 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="autmad">¿Tu Madre, tiene automovil Propio?</label>
                  <select class="form-control" id="autmad" name="autmad">
                    <option value="seleccione">Seleccione:</option>
                    <option value="0" {{ old('autmad', $consultaAuMa) == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('autmad', $consultaAuMa) == '1' ? 'selected' : '' }}>Si</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tamcasa">¿Cual es el tamaño de la casa donde vive tu familia?</label>
                  <select class="form-control" id="tamcasa" name="tamcasa">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('tamcasa', $consultaTamCas) == '1' ? 'selected' : '' }}>Menos de 100 metros cuadrados</option>
                    <option value="2" {{ old('tamcasa', $consultaTamCas) == '2' ? 'selected' : '' }}>De 101 a 200 metros cuadrados</option>
                    <option value="3" {{ old('tamcasa', $consultaTamCas) == '3' ? 'selected' : '' }}>De 201 a 300 metros cuadrados</option>
                    <option value="4" {{ old('tamcasa', $consultaTamCas) == '4' ? 'selected' : '' }}>De 301 a 500 metros cuadrados</option>
                    <option value="5" {{ old('tamcasa', $consultaTamCas) == '5' ? 'selected' : '' }}>Más de 500 metros cuadrados</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="matcasa">¿Material del cual esta hecha?</label>
                  <select class="form-control" id="matcasa" name="matcasa">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('matcasa', $consultaMatCas) == '1' ? 'selected' : '' }}>Block</option>
                    <option value="2" {{ old('matcasa', $consultaMatCas) == '2' ? 'selected' : '' }}>Madera</option>
                    <option value="3" {{ old('matcasa', $consultaMatCas) == '3' ? 'selected' : '' }}>Adobe</option>
                    <option value="4" {{ old('matcasa', $consultaMatCas) == '4' ? 'selected' : '' }}>Otros</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- ROW 5 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ingeco">Actualmente, ¿Cuál es el ingreso economico?</label>
                  <select class="form-control" id="ingeco" name="ingeco">
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('ingeco', $consultaIngEco) == '1' ? 'selected' : '' }}>Menos de 1,500 pesos</option>
                    <option value="2" {{ old('ingeco', $consultaIngEco) == '2' ? 'selected' : '' }}>Entre 1,501 y 3,000 pesos</option>
                    <option value="3" {{ old('ingeco', $consultaIngEco) == '3' ? 'selected' : '' }}>Entre 3,001 y 5,000 pesos</option>
                    <option value="4" {{ old('ingeco', $consultaIngEco) == '4' ? 'selected' : '' }}>Entre 5,001 y 10,000 pesos</option>
                    <option value="5" {{ old('ingeco', $consultaIngEco) == '5' ? 'selected' : '' }}>Entre 10,001 y 20,000 pesos</option>
                    <option value="6" {{ old('ingeco', $consultaIngEco) == '6' ? 'selected' : '' }}>Entre 20,001 y 30,000 pesos</option>
                    <option value="7" {{ old('ingeco', $consultaIngEco) == '7' ? 'selected' : '' }}>Entre 30,001 y 40,000 pesos</option>
                    <option value="8" {{ old('ingeco', $consultaIngEco) == '8' ? 'selected' : '' }}>Entre 40,001 y 50,000 pesos</option>
                    <option value="9" {{ old('ingeco', $consultaIngEco) == '9' ? 'selected' : '' }}>Entre 50,001 y 60,000 pesos</option>
                    <option value="10" {{ old('ingeco', $consultaIngEco) == '10' ? 'selected' : '' }}>Más de 60,000</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-right mb-3">
                <!-- Botón "Guardar" -->
                <button type="submit" class="boton btn-form">Guardar datos</button>
              </div>
            </div>
            </div>
          </form>
      </div>
 
    <div class="container mb-4 bg-cremita pt-3 rounded">
        <form method="POST" action="{{ route('form7-post2') }}">
          @csrf
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>ENCUESTA SOCIOECONÓMICA PARTE 2</strong><h2>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tipapo">¿Señale el tipo de apoyo economico con el que cuenta para realizar sus estudios?</label>
                  <select class="form-control" id="tipapo" name="tipapo" required>
                    <option value="0">Seleccione:</option>
                    <option value="1" {{ old('tipapo', $consultaTipApo) == '1' ? 'selected' : '' }}>Familiar</option>
                    <option value="2" {{ old('tipapo', $consultaTipApo) == '2' ? 'selected' : '' }}>Beca</option>
                    <option value="3" {{ old('tipapo', $consultaTipApo) == '3' ? 'selected' : '' }}>Cotacyt</option>
                    <option value="4" {{ old('tipapo', $consultaTipApo) == '4' ? 'selected' : '' }}>Otro</option>
                    <option value="5" {{ old('tipapo', $consultaTipApo) == '5' ? 'selected' : '' }}>BecaNet</option>
                  </select>
                </div>
              </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="monmens">Indique el monto mensual de este apoyo:</label>
              <input type="number" class="form-control" id="monmens" name="monmens" value="{{ old('monmens', $consultaMonMens) }}" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="comapo">¿Cómo se entero de este apoyo?</label>
              <input type="text" class="form-control" id="comapo" name="comapo" value="{{ old('comapo', $consultaComApo ?? '') }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="solapo">¿Solicitó anteriormente este apoyo?</label>
              <select class="form-control" id="solapo" name="solapo">
                <option value="3">Seleccione:</option>
                <option value="0" {{ old('solapo', $consultaSolApo) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('solapo', $consultaSolApo) == '1' ? 'selected' : '' }}>Si</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="seoto">¿Se le otorgó?</label>
              <select class="form-control" id="seoto" name="seoto">
                <option value="3">Seleccione:</option>
                <option value="0" {{ old('seoto', $consultaSeOto) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('seoto', $consultaSeOto) == '1' ? 'selected' : '' }}>Si</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="recmen">¿Recibio alguna mensualidad?</label>
              <select class="form-control" id="recmen" name="recmen">
                <option value="seleccione">Seleccione:</option>
                <option value="0" {{ old('recmen', $consultaRecMen) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('recmen', $consultaRecMen) == '1' ? 'selected' : '' }}>Si</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="hermapo">¿Tienes un hermano que recibio o este recibiendo este apoyo?</label>
              <select class="form-control" id="hermapo" name="hermapo">
                <option value="seleccione">Seleccione:</option>
                <option value="0" {{ old('hermapo', $consultaHermApo) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('hermapo', $consultaHermApo) == '1' ? 'selected' : '' }}>Si</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="cantherm">¿Cuántos hermanos?</label>
              <input type="number" class="form-control" id="cantherm" name="cantherm" value="{{ old('cantherm', $consultaCntHerm ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 2)" >
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="firmun">¿Usted y su aval firmaran en el municipio de?</label>
              <select class="form-control" id="firmun" name="firmun">
                <option value="">Seleccione:</option>
                @foreach($municipios as $IdMunicipio => $NombreMunicipio)
                    <option value="{{ $IdMunicipio }}" {{ ($nombreMunicipio2 == $NombreMunicipio) ? 'selected' : '' }}>
                        {{ $NombreMunicipio }}
                    </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-right mb-3">
            <!-- Botón "Guardar" -->
            <button type="submit" class="boton btn-form">Guardar datos</button>
          </div>
        </div>
        </form>
    </div>
        <div class="container mb-4 bg-cremita pt-3 rounded">
            <form id="miFormulario2">
              @csrf
            <div class="row">
                <div class="col-md-12 text-center">
                   <h2 class="titulo-form"><strong>DEPENDIENTES ECONOMICOS</strong><h2>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="paterno">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="paterno" name="paterno">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="materno">Apellido Materno:</label>
                    <input type="text" class="form-control" id="materno" name="materno">
                  </div>
                </div>
             </div>

             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="niveltd">Nivel:</label>
                  <select class="form-control" id="niveltd" name="niveltd">
                    <option value="0">Seleccione:</option>
                    <option value="1">Inicial</option>
                    <option value="2">Primaria</option>
                    <option value="3">Secundaria</option>
                    <option value="4">Bachillerato</option>
                    <option value="5">Licenciatura</option>
                    <option value="6">Posgrado</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="escuela">Nombre de la Escuela:</label>
                  <input type="text" class="form-control" id="escuela" name="escuela">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tipoesc">Tipo:</label>
                  <select class="form-control" id="tipoesc" name="tipoesc">
                    <option value="seleccione">Seleccione:</option>
                    <option value="0">Pública</option>
                    <option value="1">Privada</option>
                  </select>
                </div>
              </div>
             </div>
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="parentesco">Parentesco:</label>
                  <input type="text" class="form-control" id="parentesco" name="parentesco">
                </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="fechanac">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fechanac" name="fechanac">
            </div>
              </div>
             </div>
             <div class="text-end">
              <button type="submit" class="btn btn-danger">Agregar Registro</button>
            </div>
           </form>
           <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha Nac</th>
                    <th>Parentezco</th>
                    <th>Escuela</th>
                    <th>Tipo</th>
                    <th>Nivel</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tablaRegistros2">
                @isset($registros)
                @foreach($registros as $registro)
                <tr id="tr_{{$registro->id}}">          
                    <td>{{ $registro->nombre }}</td>
                    <td>{{ $registro->paterno }}</td>
                    <td>{{ $registro->materno }}</td>
                    <td>{{ $registro->fechanac }}</td>
                    <td>{{ $registro->parentezco }}</td>
                    <td>{{ $registro->escuela }}</td>

                    {{-- IF PARA MOSTRAR TIPO DEPENDIENDO DEL NUMERO QUE TRAIGA LA BD --}}
                    @if($registro->tipo==0)
                      <td>Pública</td>
                    @else 
                      <td>Privada</td>
                    @endif  
                    
                     {{-- IF PARA MOSTRAR NIVEL DEPENDIENDO DEL NUMERO QUE TRAIGA LA BD --}}
                    @if($registro->nivel==1)
                      <td>Inicial</td>
                    @elseif($registro->nivel==2) 
                      <td>Primaria</td>
                      @elseif($registro->nivel==3) 
                      <td>Secundaria</td>
                      @elseif($registro->nivel==4) 
                      <td>Bachillerato</td>
                      @elseif($registro->nivel==5) 
                      <td>Licenciatura</td>
                      @elseif($registro->nivel==6) 
                      <td>Posgrado</td>
                    @endif
                    <td>
                        <a href="{{ url('delete2/'.$registro->id) }}" class="btn btn-danger btn-form">Eliminar</button>
                    </td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
       </div>
    
</div>

<div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form6') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form8-formulario') }}'">Siguiente</button>
  </div>
</div> 
@endsection