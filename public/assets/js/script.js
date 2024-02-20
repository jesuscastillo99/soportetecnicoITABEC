
    // Script JavaScript para enviar datos del formulario y manejar eliminación
    $(document).ready(function() {
        $("#miFormulario").submit(function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Obtener datos del formulario
            var formData = $(this).serialize();

            // Enviar datos mediante AJAX
            $.ajax({
                url: '/form5-formularior',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Recargar la tabla después de agregar el registro
                    $("#tablaRegistros").load(location.href + " #tablaRegistros>*", "");
                }
            });

            // Limpiar campos del formulario
            $("#nivel").val("");
            $("#escuela").val("");
            $("#tipo").val("");
            $("#promedio").val("");
            $("#estado").val("");
            $("#municipio").val("");
        });

        // Manejar eventos de eliminación
        $("#tablaRegistros").on("click", ".eliminar", function() {
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
                url: 'form5-formulariod/' + registroId,
                type:'DELETE',
                
                success: function(response) {
                    // Recargar la tabla después de eliminar el registro
                    $("#tablaRegistros").load(location.href + " #tablaRegistros>*", "");
                }
            });
        });
    });

// function deletepost(idtd){
//     console.log('ID del registro a eliminar:', idtd);
//     if(confirm("¿Estás seguro que deseas eliminar este registro?")){
//         $.ajaxSetup({

//             headers:
//                 {
    
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
    
//                 });
    
//                 $.ajax({
    
//                     url:'/form5-formulariod/'+idtd,
//                     type:'DELETE',
//                     success:function(result)
//                     {
//                         $("#"+result['tr']).slideUp("slow");
//                     }
    
    
//         });
    
    
    
//      }
// }

