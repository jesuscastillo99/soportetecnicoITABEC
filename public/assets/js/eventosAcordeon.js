
function validarCurp(curpEsValida){
    // Ahora puedes usar la variable curpEsValida aquí
if (curpEsValida) {
    // Código a ejecutar si la CURP es válida
    document.getElementById('collapseTwo').classList.add('show');
    console.log("Valor de curpEsValida:", curpEsValida);
    
} else {
    // Código a ejecutar si la CURP no es válida
    alert('La CURP no es válida. Por favor, inténtalo de nuevo.');
    console.log("Valor de curp invalida:", curpEsValida);
}

}

function guardarCurp(curpGuardar) {
    if (curpGuardar) {
        // Código a ejecutar si la CURP es válida
        alert('Los datos se guardaron con éxito. ');
        document.getElementById('collapseOne').classList.add('show');
        console.log("Valor de curp guardada:", curpGuardar);
        
    } else {
        // Código a ejecutar si la CURP no es válida
        alert('La CURP no es válida. Por favor, inténtalo de nuevo.');
        console.log("Valor de curp invalida:", curpGuardar);
    }
}

function validarCurp2(curpEsValida){
    // Ahora puedes usar la variable curpEsValida aquí
if (curpEsValida) {
    // Código a ejecutar si la CURP es válida
    document.getElementById('collapseFour').classList.add('show');
    console.log("Valor de curpEsValida:", curpEsValida);
    
} else {
    // Código a ejecutar si la CURP no es válida
    alert('La CURP no es válida. Por favor, inténtalo de nuevo.');
    console.log("Valor de curp invalida:", curpEsValida);
}

}

function guardarCurp2(curpGuardar) {
    if (curpGuardar) {
        // Código a ejecutar si la CURP es válida
        alert('Los datos se guardaron con éxito. ');
        document.getElementById('collapseThree').classList.add('show');
        console.log("Valor de curp guardada:", curpGuardar);
        
    } else {
        // Código a ejecutar si la CURP no es válida
        alert('La CURP no es válida. Por favor, inténtalo de nuevo.');
        console.log("Valor de curp invalida:", curpGuardar);
    }
}

// CODIGO SOBRE LAS REFERENCIAS
function existeR1(consultaR1, validarR1){
    if(consultaR1==false){
       //Si no tiene R1, muestrame el ingresar curp y oculta el mostrar datos
       
       document.getElementById('item2').classList.add('d-none');
       document.getElementById('item1').classList.remove('d-none');
       document.getElementById('btnGuardarR1').classList.remove('d-none');
       document.getElementById('btnEliminarR1').classList.add('d-none');
       
    } 
    
    if(consultaR1==true){

        //Si el usuario tiene R1, oculta el campo de ingresar curp y muestra el campo de ingresar datos
        
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('item2').classList.remove('d-none');
        document.getElementById('btnGuardarR1').classList.add('d-none');
        document.getElementById('btnEliminarR1').classList.remove('d-none');
    }

    if(validarR1==false){
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('btnGuardarR1').classList.remove('d-none');
        document.getElementById('item2').classList.remove('d-none');
    }
}

//CODIGO SOBRE LA REFERENCIA 2

function existeR2(consultaR2, validarR2){
    if(consultaR2==false){
       //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       
       document.getElementById('item4').classList.add('d-none');
       document.getElementById('item3').classList.remove('d-none');
       document.getElementById('btnGuardarR2').classList.remove('d-none');
       document.getElementById('btnEliminarR2').classList.add('d-none');
       
    } else {

        //Si el usuario tiene papá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        
        document.getElementById('item3').classList.add('d-none');
        document.getElementById('item4').classList.remove('d-none');
        document.getElementById('btnGuardarR2').classList.add('d-none');
        document.getElementById('btnEliminarR2').classList.remove('d-none');
    }

    if(validarR2==false){
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('btnGuardarR2').classList.remove('d-none');
        document.getElementById('item2').classList.remove('d-none');
    }
}