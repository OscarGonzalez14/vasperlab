var tabla_examenes_ingreso;
function init(){
  listar_examenes_ingreso();
}

/////////////////LISTAR EXAMENES INGRESO////////******
  function listar_examenes_ingreso(){

    var id_paciente_examen = $("#id_paciente_examen").val();
    var n_orden_examen = $("#n_orden_examen").val();

    tabla_examenes_ingreso=$('#data_examenes_ingreso').dataTable(
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
          url: 'ajax/examenes.php?op=examenes_ingreso',
          type : "post",
          data:{id_paciente_examen:id_paciente_examen,n_orden_examen:n_orden_examen},            
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
}

/////////////////FIN LISTAR EXAMENES INGRESO////////******

function GurdarExamenOrina(){
    
  var color_orina = $("#color_orina").val();
  var olor_orina = $("#olor_orina").val();
  var aspecto_orina = $("#aspecto_orina").val();
  var densidad_orina = $("#densidad_orina").val();
  var esterasas_orina = $("#esterasas_orina").val();
  var nitritos_orina = $("#nitritos_orina").val();
  var ph_orina = $("#ph_orina").val();
  var proteinas_orina = $("#proteinas_orina").val();
  var glucosa_orina = $("#glucosa_orina").val();
  var cetonas_orina = $("#cetonas_orina").val();
  var urobilinogeno_orina = $("#urobilinogeno_orina").val();
  var bilirrubina_orina = $("#bilirrubina_orina").val();
  var sangre_oculta_orina = $("#sangre_oculta_orina").val();
  var cilindros_orina = $("#cilindros_orina").val();
  var leucocitos_orina = $("#leucocitos_orina").val();
  var hematies_orina = $("#hematies_orina").val();
  var epiteliales_orina = $("#epiteliales_orina").val();
  var filamentos_orina = $("#filamentos_orina").val();
  var bacterias_orina = $("#bacterias_orina").val();
  var cristales_orina = $("#cristales_orina").val();
  var observaciones_orina = $("#observaciones_orina").val();
  var id_paciente = $("#id_pac_exa").val();
  var numero_orden_paciente = $("#num_orden_exa_orina").val();


  if (id_paciente!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_orina",
    method:"POST",
    data:{color_orina:color_orina,olor_orina:olor_orina,aspecto_orina:aspecto_orina,densidad_orina:densidad_orina,esterasas_orina:esterasas_orina,
    nitritos_orina:nitritos_orina,ph_orina:ph_orina,proteinas_orina:proteinas_orina,glucosa_orina:glucosa_orina,cetonas_orina:cetonas_orina,
    urobilinogeno_orina:urobilinogeno_orina,bilirrubina_orina:bilirrubina_orina,sangre_oculta_orina:sangre_oculta_orina,cilindros_orina:cilindros_orina,leucocitos_orina:leucocitos_orina,
    hematies_orina:hematies_orina,epiteliales_orina:epiteliales_orina,filamentos_orina:filamentos_orina,bacterias_orina:bacterias_orina,cristales_orina:cristales_orina,observaciones_orina:observaciones_orina,id_paciente:id_paciente,numero_orden_paciente:numero_orden_paciente},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },
      
  success:function(data){ 

    setTimeout ("Swal.fire('Examen de orina guardado exitosamente','','success')", 100);
    //setTimeout ("explode();", 2000);
    clear_disable_inputs_orina()
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe seleccionar un Paciente','','error')", 100);
  }

}

function clear_disable_inputs_orina(){
  $("#color_orina").val("");
  $('#color_orina').attr('readonly', true);

  $("#olor_orina").val("");
  $("#olor_orina").attr('readonly', true);

  $("#aspecto_orina").val("");
  $("#aspecto_orina").attr('readonly', true);

  $("#densidad_orina").val("");
  $("#densidad_orina").attr('readonly', true);

  $("#esterasas_orina").val("");
  $("#esterasas_orina").attr('readonly', true);

  $("#nitritos_orina").val("");
  $("#nitritos_orina").attr('readonly', true);

  $("#ph_orina").val("");
  $("#ph_orina").attr('readonly', true);

  $("#proteinas_orina").val("");
  $("#proteinas_orina").attr('readonly', true);

  $("#glucosa_orina").val("");
  $("#glucosa_orina").attr('readonly', true);

  $("#cetonas_orina").val("");
  $("#cetonas_orina").attr('readonly', true);

$("#urobilinogeno_orina").val("");
$("#bilirrubina_orina").val("");
$("#sangre_oculta_orina").val("");
$("#cilindros_orina").val("");
$("#leucocitos_orina").val("");
$("#hematies_orina").val("");
$("#epiteliales_orina").val("");
$("#filamentos_orina").val("");
$("#bacterias_orina").val("");
$("#cristales_orina").val("");
$("#observaciones_orina").val("");
//$("#id_paciente").val("");

}

function GuardarExamenHeces(){
    
  var color_heces = $("#color_heces").val();
  var consistencia_heces = $("#consistencia_heces").val();
  var mucus_heces = $("#mucus_heces").val();
  var restos_heces = $("#restos_heces").val();
  var macroscopicos_heces = $("#macroscopicos_heces").val();

  var microscopicos_heces = $("#microscopicos_heces").val();
  var hematies_heces = $("#hematies_heces").val();
  var leucocitos_heces = $("#leucocitos_heces").val();
  var protozoarios_heces = $("#protozoarios_heces").val();
  var activos_heces = $("#activos_heces").val();

  var quistes_heces = $("#quistes_heces").val();
  var metazoarios_heces = $("#metazoarios_heces").val();
  var observaciones_heces = $("#observaciones_heces").val();
  var id_paciente = $("#id_pac_exa").val();
  var numero_orden_paciente = $("#num_orden_exa_heces").val();
  

  if (id_paciente!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_heces",
    method:"POST",
    data:{color_heces:color_heces,consistencia_heces:consistencia_heces,mucus_heces:mucus_heces,restos_heces:restos_heces,macroscopicos_heces:macroscopicos_heces,microscopicos_heces:microscopicos_heces,hematies_heces:hematies_heces,leucocitos_heces:leucocitos_heces,protozoarios_heces:protozoarios_heces,activos_heces:activos_heces,quistes_heces:quistes_heces,metazoarios_heces:metazoarios_heces,observaciones_heces:observaciones_heces,id_paciente:id_paciente,numero_orden_paciente:numero_orden_paciente},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },
      
    success:function(data){ 

    //alert(id_paciente);

    setTimeout ("Swal.fire('Examen de heces guardado exitosamente','','success')", 100);
    //setTimeout ("explode();", 2000);
    //clear_disable_inputs_orina()
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe seleccionar un Paciente','','error')", 100);
  }

}///////FIN GUARDAR EXAMEN HECES

function explode(){
  location.reload();
}

$(document).on('click', '.asigna_datos_orden', function(){
  var id_paciente = $(this).attr("id");
  var numero_orden = $(this).attr("name");
  //var examen = $(this).attr("value");

  $("#id_pac_exa").val(id_paciente);
  $(".num_orden_exa").val(numero_orden);


});
init();