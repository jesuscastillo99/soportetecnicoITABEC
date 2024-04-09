function existePadre(consultaPadre){
    if(consultaPadre==false){
       //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       
       document.getElementById('item2').classList.add('d-none');
       document.getElementById('item1').classList.remove('d-none');
       document.getElementById('btnGuardarPadre').classList.remove('d-none');
       document.getElementById('btnEliminarPadre').classList.add('d-none');
       
    } else {

        //Si el usuario tiene papá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('item2').classList.remove('d-none');
        document.getElementById('btnGuardarPadre').classList.add('d-none');
        document.getElementById('btnEliminarPadre').classList.remove('d-none');
    }
}

function existeCurpPadre(existeCurpPadre){
    if(existeCurpPadre==false){
       //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       alert('Por favor ingresa la curp de tu padre');
       document.getElementById('item2').classList.add('d-none');
       document.getElementById('item1').classList.remove('d-none');
       document.getElementById('btnGuardarPadre').classList.remove('d-none');
       document.getElementById('btnEliminarPadre').classList.add('d-none');
       
    } else {

        //Si el usuario tiene papá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        alert('La curp de tu padre es válida');
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
       //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
       alert('Por favor ingresa la curp de tu Madre');
       document.getElementById('item4').classList.add('d-none');
       document.getElementById('item3').classList.remove('d-none');
       document.getElementById('btnGuardarMadre').classList.remove('d-none');
       document.getElementById('btnEliminarMadre').classList.add('d-none');
       
    } else {

        //Si el usuario tiene mapá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        alert('La curp de tu madre es válida');
        document.getElementById('item3').classList.add('d-none');
        document.getElementById('item4').classList.remove('d-none');
        //document.getElementById('btnGuardarPadre').classList.remove('d-none');
        document.getElementById('btnEliminarMadre').classList.remove('d-none');
    }
}

