var tabla_examenes_ingreso;
function init(){
  listar_examenes_ingreso();
  mostrar_btns_edit_exa();
  listar_examenes_empresarial();
  listar_examenes_diagnosticos();
}

function mostrar_btns_edit_exa(){
  document.getElementById("edit_exa_hemo").style.display = "none";
  document.getElementById("edit_exa_orina").style.display = "none";
  document.getElementById("edit_exa_heces").style.display = "none";
  document.getElementById("diag_heces").style.display = "none";
  document.getElementById("diag_orina").style.display = "none";
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
                'excelHtml5',
                'csvHtml5'
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
/////////////////
/////////////////LISTAR EXAMENES INGRESO////////******
  function listar_examenes_diagnosticos(){
    var id_paciente_examen = $("#id_paciente_examen").val();
    var n_orden_examen = $("#n_orden_examen").val();

    tabla_examenes_ingreso=$('#ingresar_diagnosticos_examenes').dataTable(
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
          url: 'ajax/examenes.php?op=ingresar_diagnosticos_examen',
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
/////////////////LISTAR EXAMENES EMPRESARIAL////////******
  function listar_examenes_empresarial(){
    var id_paciente_examen = $("#id_paciente_examen").val();
    var n_orden_examen = $("#n_orden_examen").val();

    tabla_examenes_empresarial=$('#data_examenes_empresarial').dataTable(
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
          url: 'ajax/examenes.php?op=examenes_empresarial',
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
/////////////////LISTAR EXAMENES EMPRESARIAL////////******
  function listar_examenes_empresarial(){
    var id_paciente_examen = $("#id_paciente_examen").val();
    var n_orden_examen = $("#n_orden_examen").val();

    tabla_examenes_ingreso=$('#data_examenes_empresarial').dataTable(
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
          url: 'ajax/examenes.php?op=examenes_empresarial',
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

/*function clear_disable_inputs_orina(){
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
$("#observaciones_orina").val("");*/
//$("#id_paciente").val("");

//}

function GuardarExamenHeces(){    
  var color_heces = $("#color_heces").val();
  var consistencia_heces = $("#consistencia_heces").val();
  var mucus_heces = $("#mucus_heces").val();
  var macroscopicos_heces = $("#macroscopicos_heces").val();
  var microscopicos_heces = $("#microscopicos_heces").val();
  var hematies_heces = $("#hematies_heces").val();
  var leucocitos_heces = $("#leucocitos_heces").val();
  var protozoarios_heces = $("#protozoarios_heces").val();
  var activos_heces = $("#activos_heces").val();
  var quistes_heces = $("#quistes_heces").val();
  var metazoarios_heces = $("#metazoarios_heces").val();
  var observaciones_heces = $("#observaciones_heces").val();
  var id_paciente = $("#id_pac_exa_heces").val();
  var numero_orden_paciente = $("#num_orden_exa_heces").val();
  
  
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_heces",
    method:"POST",
    data:{color_heces:color_heces,consistencia_heces:consistencia_heces,mucus_heces:mucus_heces,macroscopicos_heces:macroscopicos_heces,microscopicos_heces:microscopicos_heces,hematies_heces:hematies_heces,
    leucocitos_heces:leucocitos_heces,protozoarios_heces:protozoarios_heces,activos_heces:activos_heces,quistes_heces:quistes_heces,metazoarios_heces:metazoarios_heces,observaciones_heces:observaciones_heces,
    id_paciente:id_paciente,numero_orden_paciente:numero_orden_paciente,tratamiento_heces:tratamiento_heces,diagnostico_heces:diagnostico_heces},
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


}///////FIN GUARDAR EXAMEN HECES

function explode(){
  location.reload();
}

$(document).on('click', '.asigna_datos_orden', function(){
  let id_paciente = $(this).attr("id");
  let numero_orden = $(this).attr("name");
  let paciente = $(this).attr("value");
  let categoria_user = $("#categoria_usuario").val();
  console.log(categoria_user);
  if (categoria_user == "doctor") {
   show_blocks_diagnostico_heces();
  }

  $(".id_paciente_exa").val(id_paciente);
  $(".num_orden_exa").val(numero_orden);
  $(".paciente_exa").html(paciente);
  $(".num_orden_exa").html(numero_orden);

});

function show_blocks_diagnostico_heces(){
  document.getElementById("diag_heces").style.display = "block";
  document.getElementById("diag_orina").style.display = "block";
}

$(document).on('click', '.reg_examenes', function(){
document.getElementsByClassName("reg_examenes").style.display = "none";
});

/////////////////GUARDA EXAMEN TRIGLICERIDOS
function GuardarTrigliceridos(){
    
  var resultado = $("#resultado_triglicerido").val();
  var observaciones_trigliceridos = $("#observaciones_trigliceridos").val();
  var id_pac_exa_trigliceridos = $("#id_pac_exa_trigliceridos").val();
  var num_orden_exa_trigliceridos = $("#num_orden_exa_trigliceridos").val();

  
  if (resultado !=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_trig",
    method:"POST",
    data:{resultado:resultado,observaciones_trigliceridos:observaciones_trigliceridos,id_pac_exa_trigliceridos:id_pac_exa_trigliceridos,num_orden_exa_trigliceridos:num_orden_exa_trigliceridos},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de Trigliceridos Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/**************SHOW DATA TRIGLICERIDOS*************/
$(document).on('click', '.Trigliceridos_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");

    $.ajax({
      url:"ajax/examenes.php?op=show_trigliceridos_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_triglicerido").val(data.resultado);
        $("#observaciones_trigliceridos").val(data.observacione);
        $("#id_pac_exa_trigliceridos").val(data.id_paciente);
        $("#num_orden_exa_trigliceridos").val(data.numero_orden);

      }
    });

});
/////////////GUSRADAR COLESTEROL
function GuardarColesterol(){
    
  var resultado = $("#resultado_colesterol").val();
  var observaciones_colesterol = $("#observaciones_colesterol").val();
  var id_pac_exa_colesterol = $("#id_pac_exa_colesterol").val();
  var num_orden_exa_colesterol = $("#num_orden_exa_colesterol").val();
  var fecha = $("#fecha").val();

  if (resultado!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_colesterol",
    method:"POST",
    data:{resultado:resultado,resultado:resultado,observaciones_colesterol:observaciones_colesterol,id_pac_exa_colesterol:id_pac_exa_colesterol,num_orden_exa_colesterol:num_orden_exa_colesterol,fecha:fecha},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de Colesterol Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/**************SHOW DATA GLUCOSA*************/
$(document).on('click', '.Colesterol_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");
    //console.log(id_paciente+" ** "+numero_orden);
    document.getElementById("guardar_hemo").style.display = "none";
    document.getElementById("edit_exa_hemo").style.display = "flex";

    $.ajax({
      url:"ajax/examenes.php?op=show_colesterol_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_colesterol").val(data.resultado);
        $("#observaciones_colesterol").val(data.observacione);
        $("#id_pac_exa_colesterol").val(data.id_paciente);
        $("#num_orden_exa_colesterol").val(data.numero_orden);

      }
    });

  });

//==========================GUARDAR HDL ==================//
function Guardarhdl(){
    
  let resultado_hdl = $("#resultado_hdl").val();
  let observaciones_hdl = $("#observaciones_hdl").val();
  let id_pac_exa_hdl = $("#id_pac_exa_hdl").val();
  let num_orden_exa_hdl = $("#num_orden_exa_hdl").val();
  let fecha = $("#fecha_hdl").val();

  if (resultado_hdl != ""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_hdl",
    method:"POST",
    data:{resultado_hdl:resultado_hdl,observaciones_hdl:observaciones_hdl,id_pac_exa_hdl:id_pac_exa_hdl,num_orden_exa_hdl:num_orden_exa_hdl,fecha:fecha},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de HDL Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/**************SHOW DATA GLUCOSA*************/
$(document).on('click', '.Colesterol_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");
    //console.log(id_paciente+" ** "+numero_orden);
    document.getElementById("guardar_hemo").style.display = "none";
    document.getElementById("edit_exa_hemo").style.display = "flex";

    $.ajax({
      url:"ajax/examenes.php?op=show_colesterol_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_colesterol").val(data.resultado);
        $("#observaciones_colesterol").val(data.observacione);
        $("#id_pac_exa_colesterol").val(data.id_paciente);
        $("#num_orden_exa_colesterol").val(data.numero_orden);

      }
    });

  });


//=================================GUARDAR CREATININA=================

function GuardarCreatinina(){
    
  var resultado_creatinina = $("#resultado_creatinina").val();
  var observaciones_creatinina = $("#observaciones_creatinina").val();
  var id_pac_exa_creatina = $("#id_pac_exa_creatina").val();
  var num_orden_exa_creatina = $("#num_orden_exa_creatina").val();
  var fecha = $("#fecha").val();


  if (resultado_creatinina!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_creatinina",
    method:"POST",
    data:{resultado_creatinina:resultado_creatinina,observaciones_creatinina:observaciones_creatinina,id_pac_exa_creatina:id_pac_exa_creatina,num_orden_exa_creatina:num_orden_exa_creatina},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de Creatinina Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/*************CREATININA DATA SHOW**************/
$(document).on('click', '.Creatinina_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");


    $.ajax({
      url:"ajax/examenes.php?op=show_creatinina_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_creatinina").val(data.resultado);
        $("#observaciones_creatinina").val(data.observacione);
        $("#id_pac_exa_creatina").val(data.id_paciente);
        $("#num_orden_exa_creatina").val(data.numero_orden);

      }
    });

  });

/*=======================GUARDAR SGOT==================*/

function Guardarsgot(){
    
  var resultado_sgot = $("#resultado_sgot").val();
  var observacione_sgot = $("#observacione_sgot").val();
  var id_pac_exa_sgot = $("#id_pac_exa_sgot").val();
  var num_orden_exa_sgot = $("#num_orden_exa_sgot").val();
  var fecha = $("#fecha").val();


  if (resultado_sgot !=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_sgot",
    method:"POST",
    data:{resultado_sgot:resultado_sgot,observacione_sgot:observacione_sgot,id_pac_exa_sgot:id_pac_exa_sgot,num_orden_exa_sgot:num_orden_exa_sgot},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de SGOT Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}

/*******SHOW DATA SGOT********/
$(document).on('click', '.sgot_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");


    $.ajax({
      url:"ajax/examenes.php?op=show_sgot_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_sgot").val(data.resultado);
        $("#observacione_sgot").val(data.observacione);
        $("#id_pac_exa_sgot").val(data.id_paciente);
        $("#num_orden_exa_sgot").val(data.numero_orden);

      }
    });

  });

/*======================INICIO EXAMEN SGPT==================*/
function Guardarsgpt(){
    
  var resultado_sgpt = $("#resultado_sgpt").val();
  var observacione_sgpt = $("#observacione_sgpt").val();
  var id_pac_exa_sgpt = $("#id_pac_exa_sgpt").val();
  var num_orden_exa_sgpt = $("#num_orden_exa_sgpt").val();
  var fecha = $("#fecha").val();


  if (resultado_sgpt !=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_sgpt",
    method:"POST",
    data:{resultado_sgpt:resultado_sgpt,observacione_sgpt:observacione_sgpt,id_pac_exa_sgpt:id_pac_exa_sgpt,num_orden_exa_sgpt:num_orden_exa_sgpt},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de SGPT Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/*SHOW DATA SGTP*/
$(document).on('click', '.Colesterol_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");


    $.ajax({
      url:"ajax/examenes.php?op=show_colesterol_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_colesterol").val(data.resultado);
        $("#observaciones_colesterol").val(data.observacione);
        $("#id_pac_exa_colesterol").val(data.id_paciente);
        $("#num_orden_exa_colesterol").val(data.numero_orden);

      }
    });

  });
/**************SHOW DATA SGTP***************/
$(document).on('click', '.sgpt_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");


    $.ajax({
      url:"ajax/examenes.php?op=show_sgpt_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_sgpt").val(data.resultado);
        $("#observacione_sgpt").val(data.observacione);
        $("#id_pac_exa_sgpt").val(data.id_paciente);
        $("#num_orden_exa_sgpt").val(data.numero_orden);

      }
    });

  });


///////////////////   GUARDAR GLUCOSA
function GuardarGlucosa(){
    
  var resultado = $("#resultado_glucosa").val();
  var observacione_glucosa = $("#observacione_glucosa").val();
  var id_pac_exa_glucosa = $("#id_pac_exa_glucosa").val();
  var num_orden_exa_glucosa = $("#num_orden_exa_glucosa").val();
  var fecha = $("#fecha").val();
  
  if (resultado!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_glucosa",
    method:"POST",
    data:{resultado:resultado,observacione_glucosa:observacione_glucosa,id_pac_exa_glucosa:id_pac_exa_glucosa,num_orden_exa_glucosa:num_orden_exa_glucosa,fecha:fecha},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
     console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de Glucosa Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
    
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/*=============FUNCION SHOW GLUCOSA==================*/
$(document).on('click', '.glucosa_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");
    console.log();

    $.ajax({
      url:"ajax/examenes.php?op=show_glucosa_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#num_orden_exa_glucosa").val(data.numero_orden);
        $("#resultado_glucosa").val(data.resultado);
        $("#observacione_glucosa").val(data.observacione);
        $("#id_pac_exa_glucosa").val(data.id_paciente);      }
    });

  });



/*=======================GUARDAR EXAMEN DE BACILOSCOPIA=============*/
function GuardarBaciloscopia(){
    
  var resultado = $("#resultado_baciloscopia").val();
  var observaciones_baciloscopia = $("#observaciones_baciloscopia").val();
  var id_pac_exa_baciloscopia = $("#id_pac_exa_baciloscopia").val();
  var num_orden_exa_baciloscopia = $("#num_orden_exa_baciloscopia").val();

  if (resultado!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_baciloscopia",
    method:"POST",
    data:{resultado:resultado,observaciones_baciloscopia:observaciones_baciloscopia,id_pac_exa_baciloscopia:id_pac_exa_baciloscopia,num_orden_exa_baciloscopia:num_orden_exa_baciloscopia},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
     console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de Baciloscopia Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
    
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/*****************SHOW DATA BACILOSCOPIA*************/
$(document).on('click', '.baciloscopia_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");


    $.ajax({
      url:"ajax/examenes.php?op=show_baciloscopia_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_baciloscopia").val(data.resultado);
        $("#observaciones_baciloscopia").val(data.observacione);
        $("#id_pac_exa_baciloscopia").val(data.id_paciente);
        $("#num_orden_exa_baciloscopia").val(data.numero_orden);

      }
    });

  });



/*=======================FIN  EXAMEN DE BACILOSCOPIA=============*/

/*=======================GUARDAR EXAMEN DE Antigenos=============*/
function GuardarAntigenos(){
  
  //console.log("Holaaaaa");return false;
  var muestra_antigenos = $("#muestra_antigenos").val();
  var resultado = $("#resultado_antigenos").val();
  var observaciones_antigenos = $("#observaciones_antigenos").val();
  var id_pac_exa_antigenos = $("#id_pac_exa_antigenos").val();
  var num_orden_exa_antigenos = $("#num_orden_exa_antigenos").val();


//muestra_antigenos:muestra_antigenos,resultado:resultado,observaciones_antigenos:observaciones_antigenos,id_pac_exa_antigenos:id_pac_exa_antigenos,num_orden_exa_antigenos:num_orden_exa_antigenos
  if (resultado!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_antigenos",
    method:"POST",
    data:{muestra_antigenos:muestra_antigenos,resultado:resultado,observaciones_antigenos:observaciones_antigenos,id_pac_exa_antigenos:id_pac_exa_antigenos,num_orden_exa_antigenos:num_orden_exa_antigenos},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
     console.log(data);
      if(data=='edit'){
        alert('Se ha editado Exitosamente!')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        alert('Examen Registrado Exitosamente!')
        setTimeout ("explode();", 2000);
      }
    
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}



/////////////////////////GUARDAR EXOFARIGEO
function GuardarExo(){
    
  var ais = $("#aisla_exo").val();
  var sens = $("#sensible_exo").val();
  var res = $("#resiste_exo").val();
  var id_paciente = $("#id_paciente_exofarigeo").val();
  var numero_orden = $("#n_orden_exofarigeo").val();
  var refiere = $("#refiere_exo").val();

  var  aisla = ais.toString();
 // var  sensible = sens.toString();
  var  resiste = res.toString();
  var sensible = sens.toString();
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_exo",
    method:"POST",
    data:{aisla:aisla,sensible:sensible,resiste:resiste,id_paciente:id_paciente,numero_orden:numero_orden,refiere:refiere},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
         console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen Exofaringeo Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  });
  }
  
  ///*SHOW DATA EXOFARINGEO*///
$(document).on('click', '.exofaringeo_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");
    $.ajax({
      url:"ajax/examenes.php?op=show_exofaringeo_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#aisla_exo_data").html(data.aisla);
        $("#sensible_exo_data").html(data.sensible);
        $("#resiste_exo_data").html(data.resiste);
        $("#refiere_exo").val(data.refiere);
        $("#id_paciente_exa").val(data.id_paciente);
        $("#num_orden_exa").val(data.numero_orden);


      }
    });

  });


  //////////////////GUARDAR EXAMEN HEMOGRAMA
  function GuardarHemograma(){
    
  var gr_hemato = $("#gr_hemato").val();
  var ht_hemato = $("#ht_hemato").val();
  var hb_hemato = $("#hb_hemato").val();
  var vcm_hemato = $("#vcm_hemato").val();
  var cmhc_hemato = $("#cmhc_hemato").val();
  var hcm_hemato  = $("#hcm_hemato").val();
  var gb_hemato  = $("#gb_hemato").val();
  var linfocitos_hemato  = $("#linfocitos_hemato").val();
  var monocitos_hemato  = $("#monocitos_hemato").val();
  var eosinofilos_hemato  = $("#eosinofilos_hemato").val();
  var basinofilos_hemato  = $("#basinofilos_hemato").val();

  var banda_hemato = $("#banda_hemato").val();
  var segmentados_hemato = $("#segmentados_hemato").val();
  var metamielo_hemato = $("#metamielo_hemato").val();
  var mielocitos_hemato = $("#mielocitos_hemato").val();
  var blastos_hemato = $("#blastos_hemato").val();

  var plaquetas_hemato = $("#plaquetas_hemato").val();
  var reti_hemato = $("#reti_hemato").val();
  var eritro_hemato = $("#eritro_hemato").val();
  var otros_hema = $("#otros_hema").val();

  var id_paciente = $("#id_paciente_hematologia").val();
  var numero_orden = $("#n_orden_hematologia").val();
  var fecha = $("#fecha").val();
  var gota_hema  = $("#gota_hema").val();

  
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_hemograma",
    method:"POST",
    data:{gr_hemato:gr_hemato,ht_hemato:ht_hemato,hb_hemato:hb_hemato,vcm_hemato:vcm_hemato,cmhc_hemato:cmhc_hemato,hcm_hemato:hcm_hemato,gb_hemato:gb_hemato,linfocitos_hemato:linfocitos_hemato,monocitos_hemato:monocitos_hemato,eosinofilos_hemato:eosinofilos_hemato,basinofilos_hemato:basinofilos_hemato,banda_hemato:banda_hemato,segmentados_hemato:segmentados_hemato,metamielo_hemato:metamielo_hemato,mielocitos_hemato:mielocitos_hemato,blastos_hemato:blastos_hemato,plaquetas_hemato:plaquetas_hemato,reti_hemato:reti_hemato,eritro_hemato:eritro_hemato,otros_hema:otros_hema,id_paciente:id_paciente,numero_orden:numero_orden,fecha:fecha,gota_hema:gota_hema},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
          console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen Hemograma Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  });
  }
  ///////////////EDITAR HEMOGRAMA
  $(document).on('click', '.hemograma_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");
    //console.log(id_paciente+" ** "+numero_orden);
    document.getElementById("guardar_hemo").style.display = "none";
    document.getElementById("edit_exa_hemo").style.display = "flex";

    $.ajax({
      url:"ajax/examenes.php?op=show_hemograma_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#gr_hemato").val(data.gr_hemato);
        $("#ht_hemato").val(data.ht_hemato);
        $("#hb_hemato").val(data.hb_hemato);
        $("#vcm_hemato").val(data.vcm_hemato);
        $("#cmhc_hemato").val(data.cmhc_hemato);
        $("#hcm_hemato").val(data.hcm_hemato);
        $("#gota_hema").val(data.gota_hema);
        $("#gb_hemato").val(data.gb_hemato);
        $("#linfocitos_hemato").val(data.linfocitos_hemato);
        $("#monocitos_hemato").val(data.monocitos_hemato);
        $("#eosinofilos_hemato").val(data.eosinofilos_hemato);
        $("#basinofilos_hemato").val(data.basinofilos_hemato);
        $("#banda_hemato").val(data.banda_hemato);
        $("#segmentados_hemato").val(data.segmentados_hemato);
        $("#metamielo_hemato").val(data.metamielo_hemato);
        $("#mielocitos_hemato").val(data.mielocitos_hemato);
        $("#blastos_hemato").val(data.blastos_hemato);
        $("#plaquetas_hemato").val(data.plaquetas_hemato);
        $("#reti_hemato").val(data.reti_hemato);
        $("#eritro_hemato").val(data.eritro_hemato);
        $("#otros_hema").val(data.otros_hema);
        $("#id_paciente_hematologia").val(data.id_paciente);
        $("#n_orden_hematologia").val(data.numero_orden);

      }
    });

  });
/////////////////FINALIZA HEMOGRAMA
function finalizar_hemograma(){
  var id_paciente = $("#id_paciente_hematologia").val();
  var numero_orden = $("#n_orden_hematologia").val();
  bootbox.confirm("¿Está Seguro que ha finalizado el llenado de este examen correctamente?", function(result){
  if(result){
  $.ajax({
    url:"ajax/examenes.php?op=finalizar_hemograma",
    method:"POST",
    data:{id_paciente:id_paciente,numero_orden:numero_orden},
    dataType:"json",
    success:function(data)
    {
      console.log(data);
      GuardarHemograma();
      Swal.fire('Examen finalizado!','','error')   
      setTimeout ("explode();", 2000);
    }
  });

}else{
  GuardarHemograma();

}
});//bootbox
}

/*============================================
              INICIO EXAMEN HECES
==============================================*/
function GuardarExamenHeces(){    
  var color_heces = $("#color_heces").val();
  var consistencia_heces = $("#consistencia_heces").val();
  var mucus_heces = $("#mucus_heces").val();
  var macroscopicos_heces = $("#macroscopicos_heces").val();
  var microscopicos_heces = $("#microscopicos_heces").val();
  var hematies_heces = $("#hematies_heces").val();
  var leucocitos_heces = $("#leucocitos_heces").val();
  var protozoarios_heces = $("#protozoarios_heces").val();
  var activos_heces = $("#activos_heces").val();
  var quistes_heces = $("#quistes_heces").val();
  var metazoarios_heces = $("#metazoarios_heces").val();
  var observaciones_heces = $("#observaciones_heces").val();
  var id_paciente = $("#id_pac_exa_heces").val();
  var numero_orden_paciente = $("#num_orden_exa_heces").val();
  var tratamiento_heces = $("#tratamiento_heces").val();
  var diagnostico_heces = $("#diagnostico_heces").val(); 


  
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_heces",
    method:"POST",
    data:{color_heces:color_heces,consistencia_heces:consistencia_heces,mucus_heces:mucus_heces,macroscopicos_heces:macroscopicos_heces,microscopicos_heces:microscopicos_heces,
    hematies_heces:hematies_heces,leucocitos_heces:leucocitos_heces,protozoarios_heces:protozoarios_heces,activos_heces:activos_heces,quistes_heces:quistes_heces,
    metazoarios_heces:metazoarios_heces,observaciones_heces:observaciones_heces,id_paciente:id_paciente,numero_orden_paciente:numero_orden_paciente,tratamiento_heces:tratamiento_heces,diagnostico_heces:diagnostico_heces},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },
      
    success:function(data){ 
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen Heces Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  });
}///////FIN GUARDAR EXAMEN HECES
/*#########HECES SHOW DATA############*/
$(document).on('click', '.heces_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");
    console.log(id_paciente+" ** "+numero_orden);
    document.getElementById("guerda_exa_heces").style.display = "none";
    document.getElementById("edit_exa_heces").style.display = "flex";

    $.ajax({
      url:"ajax/examenes.php?op=show_heces_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#color_heces").val(data.color);
        $("#consistencia_heces").val(data.consistencia);
        $("#mucus_heces").val(data.mucus);
        $("#macroscopicos_heces").val(data.macroscopicos);
        $("#microscopicos_heces").val(data.microscopicos);
        $("#hematies_heces").val(data.hematies);
        $("#leucocitos_heces").val(data.leucocitos);
        $("#protozoarios_heces").val(data.protozoarios);
        $("#activos_heces").val(data.activos);
        $("#quistes_heces").val(data.quistes);
        $("#metazoarios_heces").val(data.metazoarios);
        $("#observaciones_heces").val(data.observaciones);
        $("#id_pac_exa_heces").val(data.id_paciente);
        $("#num_orden_exa_heces").val(data.numero_orden);
      }
    });

  });
/*===============FINALIZAR EXAMEN HECES============*/
function finalizar_heces(){
  var id_paciente = $("#id_pac_exa_heces").val();
  var numero_orden = $("#num_orden_exa_heces").val();
  bootbox.confirm("¿Está Segur@ que ha finalizado el llenado de este examen correctamente?", function(result){
  if(result){
  $.ajax({
    url:"ajax/examenes.php?op=finalizar_heces",
    method:"POST",
    data:{id_paciente:id_paciente,numero_orden:numero_orden},
    dataType:"json",
    success:function(data)
    {
      console.log(data);
      Swal.fire('Examen finalizado!','','error')  
  setTimeout("GuardarExamenHeces();",2000)  
      setTimeout ("explode();", 2000);
    }
  });

}else{
  Swal.fire('Examen finalizado!','','error')  
  setTimeout("GuardarExamenHeces();",2000)
}
});//bootbox
}

/*============================================
              INICIO EXAMEN ORINA
==============================================*/

function GuardarExamenOrina(){
  $("#orina").modal("hide");
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
  var id_paciente = $("#id_pac_exa_orina").val();
  var numero_orden_paciente = $("#num_orden_exa_orina").val();
  var tratamiento_orina = $("#tratamiento_orina").val();
  var diagnostico_orina = $("#diagnostico_orina").val();
  
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_orina",
    method:"POST",
    data:{color_orina:color_orina,olor_orina:olor_orina,aspecto_orina:aspecto_orina,densidad_orina:densidad_orina,esterasas_orina:esterasas_orina,
    nitritos_orina:nitritos_orina,ph_orina:ph_orina,proteinas_orina:proteinas_orina,glucosa_orina:glucosa_orina,cetonas_orina:cetonas_orina,
    urobilinogeno_orina:urobilinogeno_orina,bilirrubina_orina:bilirrubina_orina,sangre_oculta_orina:sangre_oculta_orina,cilindros_orina:cilindros_orina,leucocitos_orina:leucocitos_orina,
    hematies_orina:hematies_orina,epiteliales_orina:epiteliales_orina,filamentos_orina:filamentos_orina,bacterias_orina:bacterias_orina,cristales_orina:cristales_orina,
    observaciones_orina:observaciones_orina,id_paciente:id_paciente,numero_orden_paciente:numero_orden_paciente,tratamiento_orina:tratamiento_orina,diagnostico_orina:diagnostico_orina},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },
      
  success:function(data){
        console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de Orina Registrado!','','success')
        setTimeout ("explode();", 2000);
      } 
  }
  }); 
}
/////////////////////////////////////////////////
$(document).on('click', '.orina_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");
    console.log(id_paciente+" ** "+numero_orden);
    document.getElementById("guarda_orina").style.display = "none";
    document.getElementById("edit_exa_orina").style.display = "flex";
    $.ajax({
      url:"ajax/examenes.php?op=show_orina_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#color_orina").val(data.color);
        $("#olor_orina").val(data.olor);
        $("#aspecto_orina").val(data.aspecto);
        $("#densidad_orina").val(data.densidad);
        $("#esterasas_orina").val(data.est_leuco);
        $("#nitritos_orina").val(data.nitritos_orina);
        $("#ph_orina").val(data.ph);
        $("#proteinas_orina").val(data.proteinas);
        $("#glucosa_orina").val(data.glucosa);
        $("#cetonas_orina").val(data.cetonas);
        $("#urobilinogeno_orina").val(data.urobigilogeno);
        $("#bilirrubina_orina").val(data.bilirrubina);
        $("#sangre_oculta_orina").val(data.sangre_oculta);
        $("#cilindros_orina").val(data.cilindros);
        $("#leucocitos_orina").val(data.leucocitos);
        $("#hematies_orina").val(data.hematies);
        $("#epiteliales_orina").val(data.cel_epiteliales);
        $("#filamentos_orina").val(data.filamentos_muco);
        $("#bacterias_orina").val(data.bacterias);
        $("#cristales_orina").val(data.cristales);
        $("#observaciones_orina").val(data.observaciones);
        $("#id_pac_exa_orina").val(data.id_paciente);
        $("#num_orden_exa_orina").val(data.numero_orden);
      }
    });
  });

/*===============FINALIZAR EXAMEN ORINA============*/
function finalizar_orina(){
  var id_paciente = $("#id_pac_exa_orina").val();
  var numero_orden = $("#num_orden_exa_orina").val();
  console.log(id_paciente+numero_orden);
  bootbox.confirm("¿Está Segur@ que ha finalizado el llenado de este examen correctamente?", function(result){
  if(result){
  $.ajax({
    url:"ajax/examenes.php?op=finalizar_orina",
    method:"POST",
    data:{id_paciente:id_paciente,numero_orden:numero_orden},
    dataType:"json",
    success:function(data){
      console.log(data);
      Swal.fire('Examen finalizado!','','error')  
      setTimeout("GuardarExamenOrina();",2000)  
      setTimeout ("explode();", 2000);
    }
  });

}else{
  Swal.fire('Examen finalizado!','','error')  
  setTimeout("GuardarExamenOrina();",2000)
}
});//bootbox
}

/*======================INICIO EXAMEN ==========================
=============================ORINA==============================*/
//////////////////GUARDAR EXAMEN HEMOGRAMA
  function GuardarAcidoUrico(){
    
  var resultado = $("#resultado_acido_urico").val();
  var observacione_urico = $("#observaciones_acido_urico").val();
  var id_pac_exa_urico= $("#id_pac_exa_acido_urico").val();
  var num_orden_exa_urico = $("#num_orden_exa_acido_urico").val();

 
  if (resultado!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_acido_u",
    method:"POST",
    data:{resultado:resultado,observacione_urico:observacione_urico,id_pac_exa_urico:id_pac_exa_urico,num_orden_exa_urico:num_orden_exa_urico},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
     console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de Ácido Urico Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
    
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }
  
  }
/*   DATA SHOW ACIDO URICO   */
$(document).on('click', '.acido_urico_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");


    $.ajax({
      url:"ajax/examenes.php?op=show_acido_urico_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_acido_urico").val(data.resultado);
        $("#observaciones_acido_urico").val(data.observacione);
        $("#id_pac_exa_acido_urico").val(data.id_paciente);
        $("#num_orden_exa_acido_urico").val(data.numero_orden);

      }
    });

  });



/*=======================GUARDAR SGOT==================*/

function Guardarrpr(){
    
  var resultado_rpr = $("#resultado_rpr").val();
  var observaciones_rpr = $("#observaciones_rpr").val();
  var id_pac_exa_rpr = $("#id_pac_exa_rpr").val();
  var num_orden_exa_rpr = $("#num_orden_exa_rpr").val();
  var fecha = $("#fecha").val();

  if (resultado_rpr !=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_rpr",
    method:"POST",
    data:{resultado_rpr:resultado_rpr,observaciones_rpr:observaciones_rpr,id_pac_exa_rpr:id_pac_exa_rpr,num_orden_exa_rpr:num_orden_exa_rpr},
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    console.log(data);
      if(data=='edit'){
        Swal.fire('Se ha editado Exitosamente!','','success')
        setTimeout ("explode();", 2000);
        return false;
      }else if (data=="ok") {
        Swal.fire('Examen de RPR Registrado!','','success')
        setTimeout ("explode();", 2000);
      }
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}

/**************SHOW DATA VDRL*************/
$(document).on('click', '.vdrl_show', function(){    
    var id_paciente = $(this).attr("id");
    var numero_orden = $(this).attr("name");


    $.ajax({
      url:"ajax/examenes.php?op=show_rpr_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#resultado_rpr").val(data.resultado);
        $("#observaciones_rpr").val(data.observacione);
        $("#id_pac_exa_rpr").val(data.id_paciente);
        $("#num_orden_exa_rpr").val(data.numero_orden);

      }
    });

  });

///////INIT
init();