
    // Script JavaScript para enviar datos del formulario y manejar eliminación
    $(document).ready(function() {
        console.log(5);
        $("#miFormulario2").submit(function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Obtener datos del formulario
            var formData = $(this).serialize();

            // Enviar datos mediante AJAX
            $.ajax({
                url: '/form7-formularior3',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Recargar la tabla después de agregar el registro
                    $("#tablaRegistros2").load(location.href + " #tablaRegistros2>*", "");
                }
            });

            // Limpiar campos del formulario
            $("#nombre").val("");
            $("#paterno").val("");
            $("#materno").val("");
            $("#fechanac").val("");
            $("#parentesco").val("");
            $("#escuela").val("");
            $("#tipoesc").val("");
            $("#niveltd").val("");
            

            
        });

        // Manejar eventos de eliminación
        $("#tablaRegistros2").on("click", ".eliminar", function() {
            $.ajaxSetup({
                headers: 
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var registroId = $(this).data('id');
            console.log('ID del registro a eliminar:', registroId);
            // Enviar solicitud AJAX para eliminar el registro
            $.ajax({
                url: 'form7-formulariod/' + registroId,
                type:'DELETE',
                
                success: function(response) {
                    // Recargar la tabla después de eliminar el registro
                    $("#tablaRegistros2").load(location.href + " #tablaRegistros2>*", "");
                }
            });
        });
    });