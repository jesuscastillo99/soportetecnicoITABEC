function existePadre(consultaPadre){
    if(consultaPadre==false){
       //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       
       document.getElementById('item2').classList.add('d-none');
       document.getElementById('item1').classList.remove('d-none');
       document.getElementById('btnGuardarPadre').classList.remove('d-none');
       document.getElementById('btnEliminarPadre').classList.add('d-none');
       
    } else {

        //Si el usuario tiene papá, oculta el campo de ingresar curp y muestra el campo de mostrar datos
      
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('item2').classList.remove('d-none');
        document.getElementById('btnGuardarPadre').classList.add('d-none');
        document.getElementById('btnEliminarPadre').classList.remove('d-none');
    }
}

function existeCurpPadre(existeCurpPadre){
    if(existeCurpPadre==false){
       //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       
       document.getElementById('item2').classList.add('d-none');
       document.getElementById('item1').classList.remove('d-none');
       document.getElementById('btnGuardarPadre').classList.remove('d-none');
       document.getElementById('btnEliminarPadre').classList.add('d-none');
       
    } else {

        //Si el usuario tiene papá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('item2').classList.remove('d-none');
        //document.getElementById('btnGuardarPadre').classList.remove('d-none');
        document.getElementById('btnEliminarPadre').classList.remove('d-none');
    }
}



//TODO SOBRE EL FORM DE LA MADRE
function existeMadre(consultaMadre){
    if(consultaMadre==false){
       //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       
       document.getElementById('item4').classList.add('d-none');
       document.getElementById('item3').classList.remove('d-none');
       document.getElementById('btnGuardarMadre').classList.remove('d-none');
       document.getElementById('btnEliminarMadre').classList.add('d-none');
       
    } else {

        //Si el usuario tiene papá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        
        document.getElementById('item3').classList.add('d-none');
        document.getElementById('item4').classList.remove('d-none');
        document.getElementById('btnGuardarMadre').classList.add('d-none');
        document.getElementById('btnEliminarMadre').classList.remove('d-none');
    }
}

function existeCurpMadre(existeCurpMadre){
    if(existeCurpMadre==false){
       //Si no tiene mamá, muestrame el ingresar curp y oculta el mostrar datos
       document.getElementById('item4').classList.add('d-none');
       document.getElementById('item3').classList.remove('d-none');
       document.getElementById('btnGuardarMadre').classList.remove('d-none');
       document.getElementById('btnEliminarMadre').classList.add('d-none');
       
    } else {

        //Si el usuario tiene mamá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        document.getElementById('item3').classList.add('d-none');
        document.getElementById('item4').classList.remove('d-none');
        //document.getElementById('btnGuardarPadre').classList.remove('d-none');
        document.getElementById('btnEliminarMadre').classList.remove('d-none');
    }
}


//TODO SOBRE EL FORM DEL CONYUGE
// function existeCon(consultaCon){
//     if(consultaCon==false){
//        //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       
//        document.getElementById('item6').classList.add('d-none');
//        document.getElementById('item5').classList.remove('d-none');
//        document.getElementById('btnGuardarCon').classList.remove('d-none');
//        document.getElementById('btnEliminarCon').classList.add('d-none');
       
//     } else {

//         //Si el usuario tiene papá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        
//         document.getElementById('item5').classList.add('d-none');
//         document.getElementById('item6').classList.remove('d-none');
//         document.getElementById('btnGuardarCon').classList.add('d-none');
//         document.getElementById('btnEliminarCon').classList.remove('d-none');
//     }
// }

// function existeCurpCon(existeCurpCon){
//     if(existeCurpCon==false){
//        //Si no tiene mamá, muestrame el ingresar curp y oculta el mostrar datos
//        document.getElementById('item6').classList.add('d-none');
//        document.getElementById('item5').classList.remove('d-none');
//        document.getElementById('btnGuardarCon').classList.remove('d-none');
//        document.getElementById('btnEliminarCon').classList.add('d-none');
       
//     } else {

//         //Si el usuario tiene mamá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
//         document.getElementById('item5').classList.add('d-none');
//         document.getElementById('item6').classList.remove('d-none');
//         //document.getElementById('btnGuardarPadre').classList.remove('d-none');
//         document.getElementById('btnEliminarCon').classList.remove('d-none');
//     }
// }


//FUNCION PARA OCULTAR FORMULARIOS DEPENDIENDO DE CON QUIEN VIVA
function tienePadre(tienepadre){
    if(tienepadre==0){
        
    } else if(tienepadre==10){
        
        document.getElementById('item2').classList.add('d-none');
        document.getElementById('item1').classList.add('d-none');
    } else if(tienepadre==11){
       
        document.getElementById('item3').classList.add('d-none');
        document.getElementById('item4').classList.add('d-none');
        
    } else if(tienepadre==12){
        document.getElementById('item2').classList.add('d-none');
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('item3').classList.add('d-none');
        document.getElementById('item4').classList.add('d-none');
    }
}
