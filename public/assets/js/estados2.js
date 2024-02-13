
    function cargarEscuelas(municipioId, escuelaId) {
    document.getElementById(municipioId).addEventListener('change', function() {
        var municipioSeleccionado = this.value; // Obtiene el valor seleccionado del estado
        var localidadSelect = document.getElementById(localidadId);
    
        // Limpia los municipios anteriores
        localidadSelect.innerHTML = '<option value="">Selecciona una escuela</option>';
    
        // Si se selecciona un estado válido, realiza una solicitud AJAX para obtener los municipios
        if (municipioSeleccionado) {
            fetch('/form4-formulario/M/' + municipioSeleccionado)
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('Hubo un problema con la solicitud.');
                    }
                    return response.json();
                })
                .then(function(data) {
                    var escuelas = data;
                    // Agrega los nuevos escuelas al segundo select
                    escuelas.forEach(function(escuela) {
                        escuelaSelect.options.add(new Option(escuela.Escuela, escuela.IdEscuela));
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }
    });
    }
    