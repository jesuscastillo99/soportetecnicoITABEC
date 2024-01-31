@extends('layouts.landingsinslider')
@section('title', 'Información Personal')
@section('content')

<div class="section margin-top_50">
    <div class="container mb-4 bg-cremita pt-3 rounded">

      <form method="POST" action="{{ route('form7') }}">

        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>ENCUESTA SOCIOECONÓMICA</strong><h2>
              </div>
        </div>

        {{-- ROW 1 DEL FORMULARIO --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="escolaridad_padre">¿Escolaridad más alta alcanzada de tu padre?</label>
                  <select class="form-control" id="escolaridad_padre" name="escolaridad_padre">
                    <option value="0">Seleccione:</option>
                    <option value="1">Sin escolaridad/algunos años en primaria</option>
                    <option value="2">Primaria terminada, Secundaria incompleta</option>
                    <option value="3">Secundaria o Comercio terminado, Bachillerato incompleto</option>
                    <option value="4">Educación técnica completa o Normal básica</option>
                    <option value="5">Bachillerato completo, Educación Superior incompleta</option>
                    <option value="6">Educación Superior terminada o Normal Superior, Posgrado incompleto</option>
                    <option value="7">Estudios de Posgrado (Maestría o Doctorado) terminados</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="escolaridad_madre">¿Escolaridad más alta alcanzada de tu madre?</label>
                  <select class="form-control" id="escolaridad_madre" name="escolaridad_madre">
                    <option value="0">Seleccione:</option>
                    <option value="1">Sin escolaridad/algunos años en primaria</option>
                    <option value="2">Primaria terminada, Secundaria incompleta</option>
                    <option value="3">Secundaria o Comercio terminado, Bachillerato incompleto</option>
                    <option value="4">Educación técnica completa o Normal básica</option>
                    <option value="5">Bachillerato completo, Educación Superior incompleta</option>
                    <option value="6">Educación Superior terminada o Normal Superior, Posgrado incompleto</option>
                    <option value="7">Estudios de Posgrado (Maestría o Doctorado) terminados</option>
                  </select>
                </div>
              </div>
        </div>

        {{-- ROW 2 DEL FORMULARIO --}}
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                <label for="actividad_padre">¿Actividad a lo largo de la vida de Tu Padre?</label>
                <select class="form-control" id="actividad_padre" name="actividad_padre">
                  <option value="0">Seleccione:</option>
                  <option value="1">Desempleado</option>
                  <option value="2">Jubilado</option>
                  <option value="3">Pequeño comerciante (Instalado o ambulante).</option>
                  <option value="4">Artesano (Productor de objetos de madera, barro, cuero, yeso, tela o cualquier otro material de uso artesanal carpinteros, trabajadores de la construcción, etc.)</option>
                  <option value="5">Pequeño agricultor, pequeño ganadero o pescador, campesino o ejidatario.</option>
                  <option value="6">Prestador de servicios personales (jardinero, peluquero, músico, plomero, relojero,mécanico automotriz, electricista, instalador de climas, reparador de televisiones,vigilante u otro tipo </option>
                  <option value="7">Obrero de la industria o de la minería.</option>
                  <option value="8">Operador de transporte (chofer, taxista, fletero).</option>
                  <option value="9">Maestro de preescolar.</option>
                  <option value="10">Empleado de establecimientos comerciales o de servicios.</option>
                  <option value="11">Empleado de gobierno municipal, estatal o federal (incluye militares).</option>
                  <option value="12">Empleado de la Industria o de la Banca.</option>
                  <option value="13">Empleado de Instituciones Gubernamentales descentralizadas (IMSS, CFE, PEMEX,ISSSTE, CONASUPO, etc.)</option>
                  <option value="14">Comerciante (propietario de establecimiento comercial).</option>
                  <option value="15">Ganadero y/o productor agrícola (propietario o copropietario).</option>
                  <option value="16">Profesor de Bachiller o Universidad (incluye funcionarios de universidades).</option>
                  <option value="17">Propietario de casas de renta.</option>
                  <option value="18">Profesionista que trabaja por su cuenta (Médico, Arquitecto, Ingeniero civil,contador, etc., que trabajan de manera independiente).</option>
                  <option value="19">Directivo de empresas (Subgerente, Gerente, Director, etc.).</option>
                  <option value="20">Funcionario (Medio alto) de instituciones gubernamentales o que dependen de gobierno municipal, estatal o federal.</option>
                  <option value="21">Empresario, Accionista de empresas.</option>
                  <option value="22">Político (Puesto de elección popular).</option>
                  <option value="23">Ama de casa.</option>
                  <option value="24">Ninguno de los anteriores (Especificar)</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="actividad_madre">¿Actividad a lo largo de la vida de Tu Madre?</label>
                <select class="form-control" id="actividad_madre" name="actividad_madre">
                  <option value="0">Seleccione:</option>
                  <option value="1">Desempleado</option>
                  <option value="2">Jubilado</option>
                  <option value="3">Pequeño comerciante (Instalado o ambulante).</option>
                  <option value="4">Artesano (Productor de objetos de madera, barro, cuero, yeso, tela o cualquier otro material de uso artesanal carpinteros, trabajadores de la construcción, etc.)</option>
                  <option value="5">Pequeño agricultor, pequeño ganadero o pescador, campesino o ejidatario.</option>
                  <option value="6">Prestador de servicios personales (jardinero, peluquero, músico, plomero, relojero,mécanico automotriz, electricista, instalador de climas, reparador de televisiones,vigilante u otro tipo) </option>
                  <option value="7">Obrero de la industria o de la minería.</option>
                  <option value="8">Operador de transporte (chofer, taxista, fletero).</option>
                  <option value="9">Maestro de preescolar.</option>
                  <option value="10">Empleado de establecimientos comerciales o de servicios.</option>
                  <option value="11">Empleado de gobierno municipal, estatal o federal (incluye militares).</option>
                  <option value="12">Empleado de la Industria o de la Banca.</option>
                  <option value="13">Empleado de Instituciones Gubernamentales descentralizadas (IMSS, CFE, PEMEX,ISSSTE, CONASUPO, etc.)</option>
                  <option value="14">Comerciante (propietario de establecimiento comercial).</option>
                  <option value="15">Ganadero y/o productor agrícola (propietario o copropietario).</option>
                  <option value="16">Profesor de Bachiller o Universidad (incluye funcionarios de universidades).</option>
                  <option value="17">Propietario de casas de renta.</option>
                  <option value="18">Profesionista que trabaja por su cuenta (Médico, Arquitecto, Ingeniero civil,contador, etc., que trabajan de manera independiente).</option>
                  <option value="19">Directivo de empresas (Subgerente, Gerente, Director, etc.).</option>
                  <option value="20">Funcionario (Medio alto) de instituciones gubernamentales o que dependen de gobierno municipal, estatal o federal.</option>
                  <option value="21">Empresario, Accionista de empresas.</option>
                  <option value="22">Político (Puesto de elección popular).</option>
                  <option value="23">Ama de casa.</option>
                  <option value="24">Ninguno de los anteriores (Especificar)</option>
                </select>
              </div>
            </div>

            {{-- ROW 3 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="auto_propio">¿Tienes Automovil Propio?</label>
                  <select class="form-control" id="auto_propio" name="auto_propio">
                    <option value="seleccione">Seleccione:</option>
                    <option value="no">No</option>
                    <option value="si">Si</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colegio_privado">¿Estudiaste en algun Colegio Privado?</label>
                  <select class="form-control" id="colegio_privado" name="colegio_privado">
                    <option value="seleccione">Seleccione:</option>
                    <option value="no">No</option>
                    <option value="si">Si</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="compu_personal">¿Tienes Computadora para uso Personal?</label>
                  <select class="form-control" id="compu_personal" name="compu_personal">
                    <option value="seleccione">Seleccione:</option>
                    <option value="no">No</option>
                    <option value="si">Si</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- ROW 4 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="auto_madre">¿Tu Madre, tiene automovil Propio?</label>
                  <select class="form-control" id="auto_madre" name="auto_madre">
                    <option value="seleccione">Seleccione:</option>
                    <option value="no">No</option>
                    <option value="si">Si</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tamaño_casa_fam">¿Cual es el tamaño de la casa donde vive tu familia?</label>
                  <select class="form-control" id="tamaño_casa_fam" name="tamaño_casa_fam">
                    <option value="0">Seleccione:</option>
                    <option value="1">Menos de 100 metros cuadrados</option>
                    <option value="2">De 101 a 200 metros cuadrados</option>
                    <option value="3">De 201 a 300 metros cuadrados</option>
                    <option value="4">De 301 a 500 metros cuadrados</option>
                    <option value="5">Más de 500 metros cuadrados</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="material_casa">¿Material del cual esta hecha?</label>
                  <select class="form-control" id="material_casa" name="material_casa">
                    <option value="0">Seleccione:</option>
                    <option value="1">Block</option>
                    <option value="2">Madera</option>
                    <option value="3">Adobe</option>
                    <option value="4">Otros</option>
                  </select>
                </div>
              </div>
            </div>

            {{-- ROW 5 DEL FORMULARIO --}}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ingreso_eco">Actualmente, ¿Cuál es el ingreso economico?</label>
                  <select class="form-control" id="ingreso_eco" name="ingreso_eco">
                    <option value="0">Seleccione:</option>
                    <option value="1">Menos de 1,500 pesos</option>
                    <option value="2">Entre 1,501 y 3,000 pesos</option>
                    <option value="3">Entre 3,001 y 5,000 pesos</option>
                    <option value="4">Entre 5,001 y 10,000 pesos</option>
                    <option value="5">Entre 10,001 y 20,000 pesos</option>
                    <option value="6">Entre 20,001 y 30,000 pesos</option>
                    <option value="7">Entre 30,001 y 40,000 pesos</option>
                    <option value="8">Entre 40,001 y 50,000 pesos</option>
                    <option value="9">Entre 50,001 y 60,000 pesos</option>
                    <option value="10">Más de 60,000</option>
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
        <form method="POST" action="{{ route('form7') }}">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>ENCUESTA SOCIOECONÓMICA PARTE 2</strong><h2>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tipo_apoyo_eco">¿Señale el tipo de apoyo economico con el que cuenta para realizar sus estudios?</label>
                  <select class="form-control" id="tipo_apoyo_eco" name="tipo_apoyo_eco">
                    <option value="0">Seleccione:</option>
                    <option value="1">Familiar</option>
                    <option value="2">Beca</option>
                    <option value="3">Cotacyt</option>
                    <option value="4">Otro</option>
                    <option value="5">BecaNet</option>
                  </select>
                </div>
              </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="monto_mensual">Indique el monto mensual de este apoyo:</label>
              <input type="text" class="form-control" id="monto_mensual" name="monto_mensual">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="sentero_apoyo">¿Como se entero de este apoyo?</label>
              <input type="text" class="form-control" id="sentero_apoyo" name="sentero_apoyo">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="soli_ant_apoyo">¿Solicito anteriormente este apoyo?</label>
              <select class="form-control" id="soli_ant_apoyo" name="soli_ant_apoyo">
                <option value="seleccione">Seleccione:</option>
                <option value="no">No</option>
                <option value="si">Si</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="se_otorgo">¿Se le otorgo?</label>
              <select class="form-control" id="se_otorgo" name="se_otorgo">
                <option value="seleccione">Seleccione:</option>
                <option value="no">No</option>
                <option value="si">Si</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="recibio_mens">¿Recibio alguna mensualidad?</label>
              <select class="form-control" id="recibio_mens" name="recibio_mens">
                <option value="seleccione">Seleccione:</option>
                <option value="no">No</option>
                <option value="si">Si</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="herm_reci_apoyo">¿Tienes un hermano que recibio o este recibiendo este apoyo?</label>
              <select class="form-control" id="herm_reci_apoyo" name="herm_reci_apoyo">
                <option value="seleccione">Seleccione:</option>
                <option value="no">No</option>
                <option value="si">Si</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="cant_hermanos">¿Cuantos hermanos?</label>
              <input type="text" class="form-control" id="cant_hermanos" name="cant_hermanos">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="aval_firma_mun">¿Usted y su aval firmaran en el municipio de?</label>
              <select class="form-control" id="aval_firma_mun" name="aval_firma_mun">
                <option value="seleccione">Seleccione:</option>
                <option value="prueba1">Prueba 1</option>
                <option value="prueba2">Prueba 2</option>
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
            <form method="POST" action="{{ route('form7') }}" id="formulario-dependientes">
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
                    <label for="apellido_pa">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="apellido_pa" name="apellido_pa">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="apellido_ma">Apellido Materno:</label>
                    <input type="text" class="form-control" id="apellido_ma" name="apellido_ma">
                  </div>
                </div>
             </div>

             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nivel">Nivel:</label>
                  <select class="form-control" id="nivel" name="nivel">
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
                  <label for="nom_escuela">Nombre de la Escuela:</label>
                  <input type="text" class="form-control" id="nom_escuela" name="nom_escuela">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tipo_escuela">Tipo:</label>
                  <select class="form-control" id="tipo_escuela" name="tipo_escuela">
                    <option value="seleccione">Seleccione:</option>
                    <option value="publica">Pública</option>
                    <option value="privada">Privada</option>
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
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
            </div>
              </div>
             </div>
             <div class="row">
              <div class="col-md-10">
              <table class="table table-striped table-small" id="tabla-dinamica">
                <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th >Apellido Paterno</th>
                        <th >Apellido Materno</th>
                        <th class="text-center">Parentesco</th>
                        <th class="text-center">Nombre de la Escuela</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Nivel</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se mostrarán las filas dinámicas -->
                </tbody>
            </table>
              </div>
             </div>
             <div class="row">
              <div class="col-md-12 text-right mb-3">
                <!-- Botón "Guardar" -->
                <button type="submit" class="boton btn-form" id="">Guardar datos</button>
              </div>
            </div>
           </form>
       </div>
    
</div>

<div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form6') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form8') }}'">Siguiente</button>
  </div>
</div> 
@endsection