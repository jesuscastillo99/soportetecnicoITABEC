document.addEventListener("DOMContentLoaded", function() {
    
    
    const enviarPadre = document.getElementById('enviar-padre');

    

    // Agregar un evento al botón "Enviar" del primer formulario del padre
    enviarPadre.addEventListener('click', function (event) {
        //event.preventDefault(); // Evitar recarga de página por defecto

        // Validar el primer formulario del padre si es necesario
        //const valid = true; // Realiza tu validación aquí

        if (container-padre2) {
            // Verificar si la variable $xml tiene datos
            if (typeof xml !== 'undefined' && xml !== null) {
                container-padre2.classList.remove('container-none'); // Muestra el contenedor
            }
        }
    });

    // Agregar un evento al botón "Enviar" del primer formulario de la mamá
    enviarMadre.addEventListener('click', function (event) {
        event.preventDefault(); // Evitar recarga de página por defecto

        // Validar el primer formulario de la mamá si es necesario
        const valid = true; // Realiza tu validación aquí

        if (valid) {
            // Ocultar el primer formulario de la mamá
            containerMadre.style.display = 'none';

            // Mostrar el segundo formulario de la mamá
            containerMadre2.style.display = 'block';
        }
    });
});

