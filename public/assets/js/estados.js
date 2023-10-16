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
