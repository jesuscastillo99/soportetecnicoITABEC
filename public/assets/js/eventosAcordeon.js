
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