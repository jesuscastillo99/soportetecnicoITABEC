document.getElementById('estado').addEventListener('change', function() {
    var estadoSeleccionado = this.value; // Obtiene el valor seleccionado del estado
    var municipioSelect = document.getElementById('municipio');

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

//CODIGO PARA EL FORMULARIO 2
document.getElementById('estado2').addEventListener('change', function() {
    var estadoSeleccionado = this.value; // Obtiene el valor seleccionado del estado
    var municipioSelect = document.getElementById('municipio2');

    // Limpia los municipios anteriores
    municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';

    if (estadoSeleccionado) {
        fetch('/form2-formulario/E/' + estadoSeleccionado)
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