var tablas_solicitudes;
var tabla_examenes_clinica;
var tabla_examenes_laboratorio;
var tabla_cats;

function init(){
  listar_solicitudes();
  listar_examenes_clinica();
  listar_examenes_laboratorio();
  listar_examenes_clinica_emprearial();
  listar_examenes_diagnostico();
}

function listar_solicitudes()
{
  tablas_solicitudes=$('#data_solicitudes').dataTable(
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
          url: 'ajax/ordenes.php?op=listar_solicitudes',
          type : "get",
          dataType : "json",
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


////////////LISTAR EXAMENES DE CLINICA
function listar_examenes_clinica(){
  tabla_examenes_clinica=$('#data_examenes_clinica').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [
                'excelHtml5',
                'csvHtml5'
            ],
    "ajax":
        {
          url: 'ajax/ordenes.php?op=examenes_clinica_pendientes',
          dataType : "json",
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

///////////////DATATABLES DIAGNOSTICOS
////////////LISTAR EXAMENES DE CLINICA
function listar_examenes_diagnostico(){
  tabla_examenes_clinica=$('#data_diagnosticos').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [
                'excelHtml5',
                'csvHtml5'
            ],
    "ajax":
        {
          url: 'ajax/ordenes.php?op=examenes_diagnosticos',
          dataType : "json",
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
/////////////FIN DATATABLES EXAMENES CLINICA
////////////LISTAR EXAMENES DE CLINICA EMPRESARIAL
function listar_examenes_clinica_emprearial(){
  tabla_examenes_empresarial=$('#data_examenes_clinica_empresarial').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [
                'excelHtml5',
                'csvHtml5'
            ],
    "ajax":
        {
          url: 'ajax/ordenes.php?op=examenes_clinica_pendientes_empresarial',
          dataType : "json",
          error: function(e){
            console.log(e.responseText);
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 30,//Por cada 10 registros hace una paginación
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
/////////////FIN DATATABLES EXAMENES CLINICA





////////////LISTAR EXAMENES DE LABORATORIO
function listar_examenes_laboratorio()
{
  tabla_examenes_laboratorio=$('#data_examenes_laboratorio').dataTable(
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
          url: 'ajax/ordenes.php?op=examenes_laboratorio_pendientes',
          dataType : "json",
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
/////////////FIN DATATABLES EXAMENES LABORATORIO


$(document).on('click', '.agregar_orden_paciente_clinica', function(){
    //toma el valor del id
    var id_paciente = $(this).attr("id");
    //alert(id_paciente);
    //return false;
    $.ajax({
      url:"ajax/pacientes.php?op=agrega_paciente_examen",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data)      {
       // $('#').modal('show');
        //$("#nombre_paciente").val(data.nombre);
        $("#nombre_orden_empleado").val(data.nombre);
        $("#id_paciente_orden_clinica").val(data.id_paciente);
        $("#nom_empresa_orden").val(data.empresa);
        //$("#num_den_paciente").val(data.numero_orden);
      }
    })

    $.ajax({
      url:"ajax/pacientes.php?op=correlativo_orden",
      method:"POST",
      //data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data){
        //$("#new_orden_empleado").val(data.nombre);
        $("#correlativo_de_orden_clinica").html(data.correlativo_de_orden);
      }
    })
});

$(document).on('click', '.diag_buenos', function(){
    //toma el valor del id
   var empresa_act = $("#empresa_act").val();
   var estado_pacs = $(this).attr("name");
  console.log(estado_pacs);
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
          url: 'ajax/ordenes.php?op=get_pacientes_buenos',
          type : "post",
          dataType : "json",
          data:{empresa_act:empresa_act,estado_pacs:estado_pacs},
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

function agregarOrdenClinica(){

  var lang = [];
  // Initializing array with Checkbox checked values
  $("input[name='check_box']:checked").each(function(){
      var obj = {
        examen : this.value,
        categoria : this.className
      }
      lang.push(obj);
  });
  console.log(lang);

  //return false;

  var correlativo_de_orden = $("#correlativo_de_orden_clinica").html();
  var nom_empresa = $("#nom_empresa_orden").val();
  var fecha_orden = $("#fecha_orden_clinica").val();
  var id_paciente_orden = $("#id_paciente_orden_clinica").val();
  var tipo_orden = $("#tipo_orden").val();

  $.ajax({
    url:"ajax/pacientes.php?op=registrar_orden",
    method:"POST",
    data:{'arrayChecks':JSON.stringify(lang),'correlativo_de_orden':correlativo_de_orden,'fecha_orden':fecha_orden,'id_paciente_orden':id_paciente_orden,'nom_empresa':nom_empresa,'tipo_orden':tipo_orden},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },

  success:function(data){
    console.log(data);

    setTimeout ("Swal.fire('Se ha registrado una nueva orden','','success')", 100);
    setTimeout ("explode();", 2000);
  }

  });
}
////////////////////AGREGAR ORDEN DE LABORATORIO

function agregarOrdenLab(){

  var lang = [];
  // Initializing array with Checkbox checked values
  $("input[name='check_box']:checked").each(function(){
      var obj = {
        examen : this.value,
        categoria : this.className
      }
      lang.push(obj);
  });
console.log(lang);
//return false;
var length_lang = lang.length;
console.log(length_lang);
//return false;
  if(length_lang==0){
    setTimeout ("Swal.fire('Debe agrear al menos un examen a la orden','','error')", 100);
    return false;
  }else{

  var correlativo_de_orden = $("#correlativo_orders").html();
  var nom_empresa = '';
  var fecha_orden = $("#fecha_orden").val();
  var id_paciente_orden = $("#id_paciente_orden").val();
  var tipo_orden = $("#tipo_orden").val();
  var estado_orden = $("#estado_orden").val();

  $.ajax({
    url:"ajax/pacientes.php?op=registrar_orden",
    method:"POST",
    data:{'arrayChecks':JSON.stringify(lang),'correlativo_de_orden':correlativo_de_orden,'fecha_orden':fecha_orden,'id_paciente_orden':id_paciente_orden,'nom_empresa':nom_empresa,'tipo_orden':tipo_orden,'estado_orden':estado_orden},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },

    success:function(data){
    console.log(data);
    setTimeout ("Swal.fire('Se ha registrado una nueva orden','','success')", 100);
    setTimeout ("explode();", 2000);
  }

  });
}
}

////////////////////////orden empresarial
function agregarOrdenClinic(){

  let lang = [];
  // Initializing array with Checkbox checked values
  $("input[name='check_box']:checked").each(function(){
      let obj = {
        examen : this.value,
        categoria : this.className
      }
      lang.push(obj);
  });
console.log(lang);
//return false;
let length_lang = lang.length;
console.log(length_lang);
//return false;
  if(length_lang==0){
    setTimeout ("Swal.fire('Debe agrear al menos un examen a la orden','','error')", 100);
    return false;
  }else{

  var correlativo_de_orden = $("#correlativo_orders").html();
  var nom_empresa = '';
  var fecha_orden = $("#fecha_orden").val();
  let id_pacs_orden = $("#empleado_clinic").val();
  var tipo_orden = $("#tipo_orden").val();
  var estado_orden = $("#estado_orden").val();
  let id_paciente_orden = id_pacs_orden.toString();
  $.ajax({
    url:"ajax/pacientes.php?op=registrar_orden",
    method:"POST",
    data:{'arrayChecks':JSON.stringify(lang),'correlativo_de_orden':correlativo_de_orden,'fecha_orden':fecha_orden,'id_paciente_orden':id_paciente_orden,'nom_empresa':nom_empresa,'tipo_orden':tipo_orden,'estado_orden':estado_orden},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },

    success:function(data){
    console.log(data);
    setTimeout ("Swal.fire('Se ha registrado una nueva orden','','success')", 100);
    $("#nueva_orden_clinic").modal('hide');
    $("#data_examenes_clinica").DataTable().ajax.reload();
  }

  });
}
}


/////////////////mostrar detalles de solicitud
$(document).on('click', '.show_solicitudes_det', function(){
  var id_paciente = $(this).attr("id");
  var numero_orden = $(this).attr("name");
  $("#detalle_solicitudes").modal("show");

  /////////////ajax lista datos del paciente
  $.ajax({
      url:"ajax/ordenes.php?op=datos_pacientes_solicitudes",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#cod_emp").html(data.cod_emp);
        $("#pac_solicitud").html(data.nombre);
        $("#empresa_solicitud").html(data.empresa);
        $("#depto_solicitud").html(data.departamento);

      }
    })

      $.ajax({
      url:"ajax/ordenes.php?op=ver_detalle_solicitudes",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      //dataType:"json",
      success:function(data)
      {

        $("#detalles_solicitud").html(data);

      }
    })
});

//////////////////////RECIBIR SOLICITUDES DE CLINICA**********
function set_estado_orden(id_paciente,numero_orden){

  bootbox.confirm("¿Desea ingresar esta solicitud para ser procesada?", function(result){
    if(result)
    {
        $.ajax({
          url:"ajax/ordenes.php?op=set_estado_solicitud",
          method:"POST",
          data:{id_paciente:id_paciente,numero_orden:numero_orden},
          success:function(data)
          {
            explode();
          }
        });
    }
  });//bootbox;
}

/////////////////SHOW CATEGORIAS PARA IMPRIMIR
/////////////////mostrar detalles de solicitud
$(document).on('click', '.show_print_categorias', function(){
  var id_paciente = $(this).attr("id");
  var numero_orden = $(this).attr("name");
  console.log(id_paciente+"**"+numero_orden);
  $("#show_cat_print").modal("show");
  ///////////////DATATABLES

  tabla_cats=$('#data_show_cat_print').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [
                'excelHtml5'
            ],
    "ajax":
        {
          url: 'ajax/ordenes.php?op=show_cat_print',
          type : "post",
          dataType : "json",
          data:{id_paciente:id_paciente,numero_orden:numero_orden},
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


$(document).on('click', '.disabled_input', function(){    
  // $(":input").attr("disabled", true);
  var inputs = $(":input");
   $(inputs).attr('readonly', true);
   
   console.log(inputs);
});

init();

///////////
function confirma_evaluacion(numero_orden,id_paciente,nombre){
    
  bootbox.confirm("¿Desea confirmar que "+nombre+ " ha sido evaluado?", function(result){
    if(result){

  $.ajax({
    url:"ajax/ordenes.php?op=confirmar_evaluacion",
    method:"POST",
    data:{numero_orden:numero_orden,id_paciente:id_paciente},
    dataType:"json",
    success:function(data)
    {
     
    }
  });

}
});//bootbox
 setTimeout ("Swal.fire('Paciente Evaluado','','success')", 100);
 $("#estado_pacientes_emp").DataTable().ajax.reload();
}

$(document).on('click', '.edita_orden', function(){
  var id_paciente = $(this).attr("id");
  var numero_orden = $(this).attr("name");
  $("#edit_orden").modal("show");

  /////////////ajax lista datos del paciente
  $.ajax({
      url:"ajax/ordenes.php?op=get_examenes_edita_orden",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        //console.log(data);
        for(var i in data){ 
          console.log(data[i]);
          examen = data[i];
          document.getElementById(examen).checked = true;
        }
      }
    })
//////////////////AGREGA ORDEN PACIENTE
  $.ajax({
      url:"ajax/pacientes.php?op=agrega_paciente_examen",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data){
       console.log(data.nombre);
        $("#new_orden_empleado").val(data.nombre);
        $("#id_paciente_orden").val(data.id_paciente);
        $("#paciente_orden").val(data.empresa);
        $("#correlativo_de_orden").html(numero_orden);      }
    })

});


function clear_inputs_order(cn){
  var cbarray = document.getElementsByName(cn);
  for(var i = 0; i < cbarray.length; i++){
    cbarray[i].checked = false;
  }   
  $("#empleado_clinic").val('').trigger('change'); 
}