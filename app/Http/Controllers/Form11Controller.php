<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
class Form11Controller extends Controller
{
    public function index(){
        $textoConcatenado=null;
        return view('layouts-form.form11', ['textoConcatenado'=>$textoConcatenado]);
    }


    public function form11Validacion(Request $request){
        $usuario = Auth::user();
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;


        //codigo para obtener vivecon del solicitante
        $nombreproceODP= 'ObtenerDatosPersona';
        $arrayODP = [$curpId];
        $viveconResult = $obtenerId->proceSelect($nombreproceODP, $arrayODP);
        $vivecon= $viveconResult[0]->vivecon ?? null;
        //Si vive sin padres, se iguala a cero el null
        if($vivecon==null){
            $vivecon=12;
        }
        //Si vive con la mamá solamente entonces se manda un 10 como variable para ocultar los campos del padre
        if($vivecon==1){
            $vivecon=10;
        }

        //Si vive con el papá solamente se manda un 11 como variable
        if($vivecon==2){
            $vivecon=11;
        }
        $arrayValidar = [$userId];
        $proceValidar = 'ValidarForms';
        $obtenerValidacion = new ContadorParametros();
        $resultValidar = $obtenerValidacion->proceSelect($proceValidar, $arrayValidar);
        $validaciones = $resultValidar[0] ?? null;
      
        if ($validaciones) {
            $textoConcatenado = '';
            
            // Comprobar y concatenar EstadoCivil solo si es una cadena y no numérica
            if (is_string($validaciones->EstadoCivil) && !is_numeric($validaciones->EstadoCivil)) {
                $textoConcatenado .= $validaciones->EstadoCivil . " ";
            }

            // Comprobar y concatenar ID1 solo si es una cadena y no numérica
            if (is_string($validaciones->ID1) && !is_numeric($validaciones->ID1)) {
                $textoConcatenado .= $validaciones->ID1 . " ";
            }
        
            // Comprobar y concatenar ID2 solo si es una cadena y no numérica
            if (is_string($validaciones->ID2) && !is_numeric($validaciones->ID2)) {
                $textoConcatenado .= $validaciones->ID2 . " ";
            }
        
            // // Comprobar y concatenar ID3 solo si es una cadena y no numérica
            // if (is_string($validaciones->ID3) && !is_numeric($validaciones->ID3)) {
            //     $textoConcatenado .= $validaciones->ID3;
            // }

            // Comprobar y concatenar IDPadre solo si es una cadena y no numérica
            if (is_string($validaciones->IDPadre) && !is_numeric($validaciones->IDPadre)) {
                $textoConcatenado .= $validaciones->IDPadre . " ";
            }

            // Comprobar y concatenar IDMadre solo si es una cadena y no numérica
            if (is_string($validaciones->IDMadre) && !is_numeric($validaciones->IDMadre)) {
                $textoConcatenado .= $validaciones->IDMadre . " ";
            }

            // Comprobar y concatenar IDCatForm3 solo si es una cadena y no numérica
            if (is_string($validaciones->IDCatForm3) && !is_numeric($validaciones->IDCatForm3)) {
                $textoConcatenado .= $validaciones->IDCatForm3 . " ";
            }

            // Comprobar y concatenar IDAcademica solo si es una cadena y no numérica
            if (is_string($validaciones->IDAcademica) && !is_numeric($validaciones->IDAcademica)) {
                $textoConcatenado .= $validaciones->IDAcademica . " ";
            }

            // Comprobar y concatenar IDF5 solo si es una cadena y no numérica
            if (is_string($validaciones->IDF5) && !is_numeric($validaciones->IDF5)) {
                $textoConcatenado .= $validaciones->IDF5 . " ";
            }

            // Comprobar y concatenar IDAval solo si es una cadena y no numérica
            if (is_string($validaciones->IDAval) && !is_numeric($validaciones->IDAval)) {
                $textoConcatenado .= $validaciones->IDAval . " ";
            }

            // Comprobar y concatenar IDF7 solo si es una cadena y no numérica
            if (is_string($validaciones->IDF7) && !is_numeric($validaciones->IDF7)) {
                $textoConcatenado .= $validaciones->IDF7 . " ";
            }

            // Comprobar y concatenar IDTD2 solo si es una cadena y no numérica
            if (is_string($validaciones->IDTD2) && !is_numeric($validaciones->IDTD2)) {
                $textoConcatenado .= $validaciones->IDTD2 . " ";
            }

            // Comprobar y concatenar IDR1 solo si es una cadena y no numérica
            if (is_string($validaciones->IDR1) && !is_numeric($validaciones->IDR1)) {
                $textoConcatenado .= $validaciones->IDR1 . " ";
            }

            // Comprobar y concatenar IDR2 solo si es una cadena y no numérica
            if (is_string($validaciones->IDR2) && !is_numeric($validaciones->IDR2)) {
                $textoConcatenado .= $validaciones->IDR2 . " ";
            }

            // Comprobar y concatenar IDTrabajo solo si es una cadena y no numérica
            if (is_string($validaciones->IDTrabajo) && !is_numeric($validaciones->IDTrabajo)) {
                $textoConcatenado .= $validaciones->IDTrabajo . " ";
            }
        
            //echo "Cadenas concatenadas: " . $textoConcatenado;
        } else {
            echo "No hay datos disponibles.";
        }

        if($textoConcatenado==''){
            $usuario2 = Usuario::find($usuario->idlog);
            $usuario2->finalizado = 1;
            $usuario2->save();
            return view('layouts-form.form12');
        } else {
            alert()
            ->error($textoConcatenado,  'Si deseas terminar el formulario completa los datos faltantes')
            ->showConfirmButton('Aceptar', '#ab0033');
            return view('layouts-form.form11');
        }
        
       
    }
}
