$(document).on('click', '.diag_buenos', function(){
    
   let jornada = $("#jornada").val();
   let empresa_act = $("#empresa_act").val();
   let estado_pacs = $(this).attr("name");
   if (jornada=='0' || empresa_act=='0') {
    alert('Hay campos obligatorios vacios');return false;
   }
   
   tabla_examenes_buenos=$('#estado_pacientes_emp').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip',//Definimos los elementos del control de tabla
    buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdf'
    ],
    "ajax":
        {
          url: 'ajax/ordenes.php?op=get_resultados_pacientes',
          type : "post",
          data:{jornada:jornada,empresa_act:empresa_act,estado_pacs:estado_pacs}
          //dataType : "json",
          error: function(e){
            console.log(e.responseText);
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,//Por cada 10 registros hace una paginación
    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
    "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },

          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"

          }

         }//cerrando language

  }).DataTable();
 });   
