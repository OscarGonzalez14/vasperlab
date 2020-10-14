var tabla_examenes_ingreso;
function init(){
  listar_examenes_ingreso();
  mostrar_btns_edit_exa();
}

function mostrar_btns_edit_exa(){
  document.getElementById("edit_exa_hemo").style.display = "none";
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
  var paciente = $(this).attr("value");
  console.log(paciente);
  $(".id_paciente_exa").val(id_paciente);
  $(".num_orden_exa").val(numero_orden);
  $("#paciente_exa").html(paciente);

});

$(document).on('click', '.reg_examenes', function(){
document.getElementsByClassName("reg_examenes").style.display = "none";
});

/////////////////GUARDA EXAMEN TRIGLICERIDOS
function GuardarTrigliceridos(){
    
  var resultado = $("#resultado_triglicerido").val();
  if (resultado !=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_trig",
    method:"POST",
    data:{resultado:resultado},
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    setTimeout ("Swal.fire('Examen de heces guardado exitosamente','','success')", 100);
    setTimeout ("explode();", 2000);
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
/////////////GUSRADAR COLESTEROL
function GuardarColesterol(){
    
  var resultado = $("#resultado_colesterol").val();
  if (resultado!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_trigcolesterol",
    method:"POST",
    data:{resultado:resultado},
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    setTimeout ("Swal.fire('Examen de heces guardado exitosamente','','success')", 100);
    setTimeout ("explode();", 2000);
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}
///////////////////   GUARDAR GLUCOSA
function GuardarGlucosa(){
    
  var resultado = $("#resultado_glucosa").val();
  if (resultado!=""){
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_glucosa",
    method:"POST",
    data:{resultado:resultado},
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    setTimeout ("Swal.fire('Examen de heces guardado exitosamente','','success')", 100);
    setTimeout ("explode();", 2000);
  }

  }); 
  }else{
    setTimeout ("Swal.fire('Debe llenar correctamente los campos','','error')", 100);
  }

}


/////////////////////////GUARDAR EXOFARIGEO
function GuardarExo(){
    
  var aisla = $("#aisla_exo").val();
  var sensible = $("#sensible_exo").val();
  var resiste = $("#resiste_exo").val();
  var id_paciente = $("#id_paciente_exofarigeo").val();
  var numero_orden = $("#n_orden_exofarigeo").val();
  var refiere = $("#refiere_exo").val();
  
    $.ajax({
    url:"ajax/examenes.php?op=registrar_examen_exo",
    method:"POST",
    data:{aisla:aisla,sensible:sensible,resiste:resiste,id_paciente:id_paciente,numero_orden:numero_orden,refiere:refiere},
    dataType:"html",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },      
    success:function(data){   //alert(id_paciente);
    setTimeout ("Swal.fire('Examen Exofaringeo guardado exitosamente','','success')", 100);
    setTimeout ("explode();", 2000);
  }

  });
  }

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
init();