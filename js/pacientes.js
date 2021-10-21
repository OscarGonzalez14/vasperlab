var tabla_pacientes;
var tabla_pacientes_reg;
var tabla_pacientes_reg_clinicas;

function init(){
  listar_pacientes();
  listar_pacientes_registrados();
  listar_pacientes_registrados_clinicas();
}
/////////////////////////DEPARTAMENTOS POR EMPRESA

////////////LSTAR PACIENTES REGISTRADOS
function listar_pacientes_registrados()
{
  tabla_pacientes_reg=$('#data_pacientes_reg').dataTable(
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
          url: 'ajax/pacientes.php?op=listar_pacientes_registrados',
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

/////////////////////LISTAR PACIENTES EN EMPRESAS-CLINICAS*******
function listar_pacientes_registrados_clinicas()
{
  var usuario_clinica = $("#user_clinica").val();
  tabla_pacientes_reg_clinicas=$('#data_pacientes_reg_clinicas').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              

                'excelHtml5',
                'csvHtml5',

            ],
    "ajax":
        {
          url: 'ajax/pacientes.php?op=listar_pacientes_registrados_clinicas',
          type : "post",
          data:{usuario_clinica:usuario_clinica},            
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

/////////////////////FIN LSTAR PACIENTES CLINICAS
function listar_pacientes()
{
  tabla_pacientes=$('#data_pacient').dataTable(
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
          url: 'ajax/pacientes.php?op=listar_pacientes',
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

function agregarPaciente(){
    
  //var  numero_orden_diario = $("#numero_orden_diario").val();
  var  nombrePaciente = $("#nombrePaciente").val();
  var  edad_paciente = $("#edad_paciente").val();
  var  tipo_paciente = $("#tipo_paciente").val();
  var  empresa_paciente = $("#empresa_paciente").val();
  var  codigo_emp = $("#codigo_emp").val();
  var  departamento = $("#departamento_paciente").val();
  var  fecha_nacimiento = $("#fecha_nac").val();
  if(nombrePaciente != ""){
    setTimeout ("Swal.fire('Se ha registrado paciente','','success')", 100);
    //console.log('Message Oscar');
    $.ajax({
    url:"ajax/pacientes.php?op=registrar_paciente",
    method:"POST",
    data:{nombrePaciente:nombrePaciente,edad_paciente:edad_paciente,tipo_paciente:tipo_paciente,empresa_paciente:empresa_paciente,codigo_emp:codigo_emp,departamento:departamento,fecha_nacimiento:fecha_nacimiento},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },
      
    success:function(data){
     
  }

  }); 
    setTimeout ("Swal.fire('Paciente Creado Existosamente','','success')", 100);
      setTimeout ("explode();", 2000);
   //cierre del condicional de validacion de los campos del producto,proveedor,pago
  }else{
    Swal.fire('Existen campos  vacios o sin seleccionar!','','error')
    return false;
  }  
  
}
/*
function agregarPaciente(){
  var  nombrePaciente = $("#nombrePaciente").val();
  var  genero_paciente = $("#genero_paciente").val();
  var  edad_paciente = $("#edad_paciente").val();
  var  fecha_nacimiento = $("#fecha_nac").val();
  var  empresa_paciente = $("#empresa_paciente").val();
  var  departamento = $("#departamento_paciente").val();
  var  codigo_emp = $("#codigo_emp").val();
  if(nombrePaciente != ""){
    setTimeout ("Swal.fire('Se ha registrado paciente','','success')", 100);
    //console.log('Message Oscar');
    $.ajax({
    url:"ajax/pacientes.php?op=registrar_paciente",
    method:"POST",
    data:{nombrePaciente:nombrePaciente,genero_paciente:genero_paciente,edad_paciente:edad_paciente,fecha_nacimiento:fecha_nacimiento,empresa_paciente:empresa_paciente,departamento:departamento,codigo_emp:codigo_emp},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    }, 
    success:function(data){   
  }
  }); 
      setTimeout ("explode();", 2000);
   //cierre del condicional de validacion de los campos del producto,proveedor,pago
  }else{
    Swal.fire('Existen campos  vacios o sin seleccionar!','','error')
    return false;
  }   
}
*/
function explode(){
  location.reload();
}

////LLENADO DE CAMPOS DE´PACINTE EN NUEVO EXAMEN
$(document).on('click', '.agrega_paciente', function(){
    //toma el valor del id
    var id_paciente = $(this).attr("id");
    $.ajax({
      url:"ajax/pacientes.php?op=agrega_paciente_examenes",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $('#modalPacientes').modal('hide');
        $("#nombre_paciente").val(data.nombre);
        $("#id_paciente").val(data.id_paciente);
        $("#num_orden_paciente").val(data.numero_orden);        
      }
    })
});
//RELLENAR CAMPOS DE PACIENTE EN NUEVA ORDEN
////LLENADO DE CAMPOS EN COMPRAS DE PROVEEDOR
$(document).on('click', '.agregar_oden_paciente', function(){
    //toma el valor del id
    var id_paciente = $(this).attr("id");
    $.ajax({
      url:"ajax/pacientes.php?op=agrega_paciente_examen",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data)      {
       // $('#').modal('show');
        //$("#nombre_paciente").val(data.nombre);
        $("#new_orden_empleado").val(data.nombre);
        $("#id_paciente_orden").val(data.id_paciente);
        $("#paciente_orden").val(data.empresa);
        //$("#num_den_paciente").val(data.numero_orden);              
      }
    })

    $.ajax({
      url:"ajax/ordenes.php?op=correlativo_orden_laboratorio",
      method:"POST",
      cache:false,
      dataType:"json",
      success:function(data){       
        $("#correlativo_de_orden").html(data.correlativo_de_orden);       
      }
    })
});

function agregarOrden(){

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

///return false;

  var correlativo_de_orden = $("#correlativo_de_orden").html();
  var examenes_paciente = $("#examenes_paciente").val();
  var fecha_orden = $("#fecha_orden").val();
  var id_paciente_orden = $("#id_paciente_orden").val();
  
  $.ajax({
    url:"ajax/pacientes.php?op=registrar_orden",
    method:"POST",
    data:{'arrayChecks':JSON.stringify(lang),correlativo_de_orden:correlativo_de_orden,examenes_paciente:examenes_paciente,fecha_orden:fecha_orden,id_paciente_orden:id_paciente_orden},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },
      
  success:function(data){ 

    setTimeout ("Swal.fire('Se ha registrado una nueva orden','','success')", 100);
    //setTimeout ("explode();", 2000);
  }

  });

}

function eliminar_paciente_o(id_paciente){
    
  bootbox.confirm("¿Está Seguro de eliminar el paciente?", function(result){
    if(result)
    {

        $.ajax({
          url:"ajax/pacientes.php?op=eliminar_paciente",
          method:"POST",
          data:{id_paciente:id_paciente},

          success:function(data)
          {
            explode();
          }
        });

    }

     });//bootbox


   }


//function eliminar_paciente (id_paciente)



////ELIMINAR PACIENTE QUE NO POSEEN EXAMENES
function eliminar_pacientes(id_paciente){
    
  bootbox.confirm("¿Está Seguro de eliminar el paciente?", function(result){
    if(result){

  $.ajax({
    url:"ajax/pacientes.php?op=eliminar_pacientes",
    method:"POST",
    data:{id_paciente:id_paciente},
    dataType:"json",
    success:function(data)
    {
      console.log(data);
      if(data=='ok'){
        setTimeout ("Swal.fire('Paciente Eliminado Existosamente','','success')", 100);
      }else if(data=='existe'){
        setTimeout ("Swal.fire('Paciente posee una orden','','error')", 100);
      } 
      $("#data_examenes_clinica").DataTable().ajax.reload();
    }
  });

}
});//bootbox

}

init();