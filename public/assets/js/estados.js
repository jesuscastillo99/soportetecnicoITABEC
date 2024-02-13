function cargarMunicipios(estadoId, municipioId) {
document.getElementById(estadoId).addEventListener('change', function() {
    var estadoSeleccionado = this.value; // Obtiene el valor seleccionado del estado
    var municipioSelect = document.getElementById(municipioId);

    // Limpia los municipios anteriores
    municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';

    // Si se selecciona un estado válido, realiza una solicitud AJAX para obtener los municipios
    if (estadoSeleccionado) {
        fetch('/form1-formulario/E/' + estadoSeleccionado)
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Hubo un problema con la solicitud.');
                }
                return response.json();
            })
            .then(function(data) {
                var municipios = data;
                // Agrega los nuevos municipios al segundo select
                municipios.forEach(function(municipio) {
                    municipioSelect.options.add(new Option(municipio.NombreMunicipio, municipio.IdMunicipio));
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    }
});
}
function cargarLocalidades(municipioId, localidadId) {
document.getElementById(municipioId).addEventListener('change', function() {
    var municipioSeleccionado = this.value; // Obtiene el valor seleccionado del estado
    var localidadSelect = document.getElementById(localidadId);

    // Limpia los municipios anteriores
    localidadSelect.innerHTML = '<option value="">Selecciona una localidad</option>';

    // Si se selecciona un estado válido, realiza una solicitud AJAX para obtener los municipios
    if (municipioSeleccionado) {
        fetch('/form1-formulario/M/' + municipioSeleccionado)
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Hubo un problema con la solicitud.');
                }
                return response.json();
            })
            .then(function(data) {
                var localidades = data;
                // Agrega los nuevos localidades al segundo select
                localidades.forEach(function(localidad) {
                    localidadSelect.options.add(new Option(localidad.Localidad, localidad.IdLocalidad));
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    }
});
}


function cargarEscuelas(municipioId, escuelaId) {
    document.getElementById(municipioId).addEventListener('change', function() {
        var municipioSeleccionado = this.value; // Obtiene el valor seleccionado del estado
        var escuelaSelect = document.getElementById(escuelaId);
    
        // Limpia los municipios anteriores
        escuelaSelect.innerHTML = '<option value="">Selecciona una escuela</option>';
    
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
                        escuelaSelect.options.add(new Option(escuela.NombreEscuela, escuela.IdEscuela));
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }
    });
}

function cargarCarreras(escuelaId, carreraId) {
    document.getElementById(escuelaId).addEventListener('change', function() {
        var escuelaSeleccionado = this.value; // Obtiene el valor seleccionado del estado
        var carreraSelect = document.getElementById(carreraId);
    
        // Limpia los municipios anteriores
        carreraSelect.innerHTML = '<option value="">Selecciona una carrera</option>';
    
        // Si se selecciona un estado válido, realiza una solicitud AJAX para obtener los municipios
        if (escuelaSeleccionado) {
            fetch('/form4-formulario/C/' + escuelaSeleccionado)
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('Hubo un problema con la solicitud.');
                    }
                    return response.json();
                })
                .then(function(data) {
                    var carreras = data;
                    // Agrega los nuevos escuelas al segundo select
                    carreras.forEach(function(carrera) {
                        carreraSelect.options.add(new Option(carrera.NombreCarrera, carrera.IdCarrera));
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }
    });
}

