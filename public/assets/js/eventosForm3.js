function existePadre(consultaPadre){
    if(consultaPadre){
        //Si el usuario tiene papá, oculta el campo de mostrar datos y muestra el campo de ingresar curp
        document.getElementById('item1').classList.add('d-none');
        document.getElementById('item2').classList.remove('d-none');
        //alert('Tienes papá');
    } else {
        //Si no tiene papá, muestrame el ingresar curp y oculta el mostrar datos
        alert('Por favor ingresa la curp de tu padre');
        document.getElementById('item2').classList.add('d-none');
        document.getElementById('item1').classList.remove('d-none');
    }
}