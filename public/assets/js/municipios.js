document.getElementById('municipio').addEventListener('change', function() {
    var municipioSeleccionado = this.value; // Obtiene el valor seleccionado del estado
    var localidadSelect = document.getElementById('localidad');

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