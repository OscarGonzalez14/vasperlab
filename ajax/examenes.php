<?php
//conexion de la base de datos 
require_once("../config/conexion.php");
//llamo al modelo Pacientes
require_once("../modelos/Examenes.php");
//llamo al modelo Pacientes  
$examenes = new Examenes();

switch($_GET["op"]){

case 'registrar_examenes_check':
	$examenes->registar_examenes_check();
	break;  

///////////////LISTAR EXAMENES A INGRESAR
case 'examenes_ingreso':
	$datos=$examenes->get_examenes_ingresar($_POST["id_paciente_examen"],$_POST["n_orden_examen"]);
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row){
    	$estado = $row["estado"];
    	if ($estado=='0') {
    		$est = "En Proceso";
    		$clase ="none";
    		$modal = $row["examen"];
    		$color ="primary";
    		$text ="Iniciar";
    	}elseif ($estado=='1') {
    		$est = "Iniciado";
    		$clase =$row["examen"]."_show";
    		$modal = $row["examen"];
    		$color ="warning";
    		$text ="Iniciado";
    	}elseif ($estado=='2') {
    		$est = "Finalizado";
    		$clase ="";
    		$modal ="";
    		$color ="success";
    		$text ="Finalizado";
    	}

		$sub_array = array();				
		$sub_array[] = $row["fecha"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["examen"];
		$sub_array[] = $est;
        $sub_array[] = '<button type="button"  class="btn btn-'.$color.' btn-sm btn-flat asigna_datos_orden focus '.$clase.'" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'" data-toggle="modal" data-target="#'.$modal.'" value="'.$row["nombre"].'" data-backdrop="static" data-keyboard="false">'.$text.'</button>';                                 
		$data[] = $sub_array;
	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

    ///////////////uardar examen trigliceridos
    case 'registrar_examen_trig':
	$examenes->registar_examenes_trig($_POST["resultado"]);
	break;
	//////////////////REGISTRAR XAMEN COLESTEROL
	case 'registrar_examen_trigcolesterol':
	$examenes->registar_examenes_colesterol($_POST["resultado"]);
	break;
	//////////////////REGISTRAR XAMEN GLUCOSA
	case 'registrar_examen_glucosa':
	$examenes->registar_examenes_glucosa($_POST["resultado"]);
	break; 
	////////////REGISTRAR EXAMEN EXOFARINGEO
	case 'registrar_examen_exo':
	$examenes->registar_examenes_exo($_POST["aisla"],$_POST["sensible"],$_POST["resiste"],$_POST["id_paciente"],$_POST["numero_orden"],$_POST["refiere"]);
	break;
/*=================================================================================================
**********************************INICIO EXAMEN HEMOGRAMA*******************************                       
===================================================================================================*/
	case 'registrar_examen_hemograma':
	$datos = $examenes->buscar_existe_hemo($_POST["id_paciente"],$_POST["numero_orden"]);

	if(is_array($datos)==true and count($datos)==0){
		$examenes->registar_examenes_hemograma($_POST["gr_hemato"],$_POST["ht_hemato"],$_POST["hb_hemato"],$_POST["vcm_hemato"],$_POST["cmhc_hemato"],$_POST["hcm_hemato"],$_POST["gb_hemato"],$_POST["linfocitos_hemato"],$_POST["monocitos_hemato"],$_POST["eosinofilos_hemato"],$_POST["basinofilos_hemato"],$_POST["banda_hemato"],$_POST["segmentados_hemato"],$_POST["metamielo_hemato"],$_POST["mielocitos_hemato"],$_POST["blastos_hemato"],$_POST["plaquetas_hemato"],$_POST["reti_hemato"],$_POST["eritro_hemato"],$_POST["otros_hema"],$_POST["id_paciente"],$_POST["numero_orden"],$_POST["fecha"],$_POST["gota_hema"]);
		$messages[]="ok";
	}else{
		$examenes->editar_examenes_hemograma($_POST["gr_hemato"],$_POST["ht_hemato"],$_POST["hb_hemato"],$_POST["vcm_hemato"],$_POST["cmhc_hemato"],$_POST["hcm_hemato"],$_POST["gb_hemato"],$_POST["linfocitos_hemato"],$_POST["monocitos_hemato"],$_POST["eosinofilos_hemato"],$_POST["basinofilos_hemato"],$_POST["banda_hemato"],$_POST["segmentados_hemato"],$_POST["metamielo_hemato"],$_POST["mielocitos_hemato"],$_POST["blastos_hemato"],$_POST["plaquetas_hemato"],$_POST["reti_hemato"],$_POST["eritro_hemato"],$_POST["otros_hema"],$_POST["id_paciente"],$_POST["numero_orden"],$_POST["fecha"],$_POST["gota_hema"]);
		$errors[]="edit";
	}
	if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
 }
    //mensaje error
      if (isset($errors)){

   ?>

         <?php
           foreach ($errors as $error) {
               echo json_encode($error);
             }
           ?>
   <?php
   }
	break;
	///////////////SHOW DATA HEMOGRAMA
  case 'show_hemograma_data':    
    $datos=$examenes->show_datos_hemograma($_POST["id_paciente"],$_POST["numero_orden"]);
      foreach($datos as $row){
      //$output["id_paciente"] = $row["id_paciente"];
      	$output["gr_hemato"] = $row["gr_hemato"];
      	$output["ht_hemato"] = $row["ht_hemato"];
      	$output["hb_hemato"] = $row["hb_hemato"];
      	$output["vcm_hemato"] = $row["vcm_hemato"];
      	$output["cmhc_hemato"] = $row["cmhc_hemato"];
      	$output["gota_hema"] = $row["gota_hema"];
      	$output["hcm_hemato"] = $row["hcm_hemato"];
      	$output["gota_hema"] = $row["gota_hema"];
      	$output["gb_hemato"] = $row["gb_hemato"];
      	$output["linfocitos_hemato"] = $row["linfocitos_hemato"];
      	$output["monocitos_hemato"] = $row["monocitos_hemato"];
      	$output["eosinofilos_hemato"] = $row["eosinofilos_hemato"];
      	$output["basinofilos_hemato"] = $row["basinofilos_hemato"];
      	$output["banda_hemato"] = $row["banda_hemato"];
      	$output["segmentados_hemato"] = $row["segmentados_hemato"];
      	$output["metamielo_hemato"] = $row["metamielo_hemato"];
      	$output["mielocitos_hemato"] = $row["mielocitos_hemato"];
      	$output["blastos_hemato"] = $row["blastos_hemato"];
      	$output["plaquetas_hemato"] = $row["plaquetas_hemato"];
      	$output["reti_hemato"] = $row["reti_hemato"];
      	$output["eritro_hemato"] = $row["eritro_hemato"];
      	$output["otros_hema"] = $row["otros_hema"];
      	$output["id_paciente"] = $row["id_paciente"];
      	$output["numero_orden"] = $row["numero_orden"];
      	
      }
    echo json_encode($output);
  break;

  case 'finalizar_hemograma':
   $examenes->finalizar_hemograma($_POST["id_paciente"],$_POST["numero_orden"]);
   $messages[]="ok";

if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
}
 break;
/*=================================================================================================
**********************************INICIO EXAMEN HECES*******************************                       
===================================================================================================*/
case "registrar_examen_heces":
$datos = $examenes->buscar_existe_heces($_POST["id_paciente"],$_POST["numero_orden_paciente"]);

if(is_array($datos)==true and count($datos)==0){
$examenes->agregar_examen_heces($_POST["numero_orden_paciente"],$_POST["color_heces"],$_POST["consistencia_heces"],$_POST["mucus_heces"],$_POST["macroscopicos_heces"],$_POST["microscopicos_heces"],$_POST["hematies_heces"],$_POST["leucocitos_heces"],$_POST["activos_heces"],$_POST["quistes_heces"],$_POST["metazoarios_heces"],$_POST["protozoarios_heces"],$_POST["observaciones_heces"],$_POST["id_paciente"]);
$messages[]="ok";
}else{
  $examenes->editar_examen_heces($_POST["numero_orden_paciente"],$_POST["color_heces"],$_POST["consistencia_heces"],$_POST["mucus_heces"],$_POST["macroscopicos_heces"],$_POST["microscopicos_heces"],$_POST["hematies_heces"],$_POST["leucocitos_heces"],$_POST["activos_heces"],$_POST["quistes_heces"],$_POST["metazoarios_heces"],$_POST["protozoarios_heces"],$_POST["observaciones_heces"],$_POST["id_paciente"]);
    $errors[]="edit";
  }
  if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
 }
    //mensaje error
      if (isset($errors)){

   ?>

         <?php
           foreach ($errors as $error) {
               echo json_encode($error);
             }
           ?>
   <?php
   }
break;
#show data heces
case 'show_heces_data':    
    $datos=$examenes->show_datos_heces($_POST["id_paciente"],$_POST["numero_orden"]);
      foreach($datos as $row){
      //$output["id_paciente"] = $row["id_paciente"];
        $output["numero_orden"] = $row["numero_orden"];
        $output["color"] = $row["color"];
        $output["consistencia"] = $row["consistencia"];
        $output["mucus"] = $row["mucus"];
        $output["macroscopicos"] = $row["macroscopicos"];
        $output["microscopicos"] = $row["microscopicos"];
        $output["hematies"] = $row["hematies"];
        $output["leucocitos"] = $row["leucocitos"];
        $output["activos"] = $row["activos"];
        $output["quistes"] = $row["quistes"];
        $output["metazoarios"] = $row["metazoarios"];
        $output["protozoarios"] = $row["protozoarios"];
        $output["observaciones"] = $row["observaciones"];
        $output["id_paciente"] = $row["id_paciente"];
      }

    echo json_encode($output);
break;
case 'finalizar_heces':
   $examenes->finalizar_heces($_POST["id_paciente"],$_POST["numero_orden"]);
   $messages[]="ok";

if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
}
 break;

/*=================================================================================================
**********************************INICIO EXAMEN ORINA*******************************                       
===================================================================================================*/
case "registrar_examen_orina":

$datos = $examenes->buscar_existe_orina($_POST["id_paciente"],$_POST["numero_orden_paciente"]);

if(is_array($datos)==true and count($datos)==0){
$examenes->agregar_examen_orina($_POST["color_orina"],$_POST["olor_orina"],$_POST["aspecto_orina"],$_POST["densidad_orina"],$_POST["esterasas_orina"],$_POST["nitritos_orina"],$_POST["ph_orina"],$_POST["proteinas_orina"],$_POST["glucosa_orina"],$_POST["cetonas_orina"],$_POST["urobilinogeno_orina"],$_POST["bilirrubina_orina"],$_POST["sangre_oculta_orina"],$_POST["cilindros_orina"],$_POST["leucocitos_orina"],$_POST["hematies_orina"],$_POST["epiteliales_orina"],$_POST["filamentos_orina"],$_POST["bacterias_orina"],$_POST["cristales_orina"],$_POST["observaciones_orina"],$_POST["id_paciente"],$_POST["numero_orden_paciente"]);
$messages[]="ok";
}else{
  $examenes->editar_examen_orina($_POST["color_orina"],$_POST["olor_orina"],$_POST["aspecto_orina"],$_POST["densidad_orina"],$_POST["esterasas_orina"],$_POST["nitritos_orina"],$_POST["ph_orina"],$_POST["proteinas_orina"],$_POST["glucosa_orina"],$_POST["cetonas_orina"],$_POST["urobilinogeno_orina"],$_POST["bilirrubina_orina"],$_POST["sangre_oculta_orina"],$_POST["cilindros_orina"],$_POST["leucocitos_orina"],$_POST["hematies_orina"],$_POST["epiteliales_orina"],$_POST["filamentos_orina"],$_POST["bacterias_orina"],$_POST["cristales_orina"],$_POST["observaciones_orina"],$_POST["id_paciente"],$_POST["numero_orden_paciente"]);
  $errors[]="edit";
}
if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
 }
    //mensaje error
      if (isset($errors)){

   ?>
         <?php
           foreach ($errors as $error) {
               echo json_encode($error);
             }
           ?>
   <?php
   }
break;
#show data orina
case 'show_orina_data':    
    $datos=$examenes->show_datos_orina($_POST["id_paciente"],$_POST["numero_orden"]);
      foreach($datos as $row){
        $output["numero_orden"] = $row["numero_orden"];
        $output["color"] = $row["color"];
        $output["olor"] = $row["olor"];
        $output["aspecto"] = $row["aspecto"];
        $output["densidad"] = $row["densidad"];
        $output["est_leuco"] = $row["est_leuco"];
        $output["ph"] = $row["ph"];
        $output["proteinas"] = $row["proteinas"];
        $output["glucosa"] = $row["glucosa"];
        $output["cetonas"] = $row["cetonas"];
        $output["urobigilogeno"] = $row["urobigilogeno"];
        $output["bilirrubina"] = $row["bilirrubina"];
        $output["sangre_oculta"] = $row["sangre_oculta"];
        $output["cilindros"] = $row["cilindros"];
        $output["leucocitos"] = $row["leucocitos"];
        $output["hematies"] = $row["hematies"];
        $output["cel_epiteliales"] = $row["cel_epiteliales"];
        $output["filamentos_muco"] = $row["filamentos_muco"];
        $output["bacterias"] = $row["bacterias"];
        $output["cristales"] = $row["cristales"];
        $output["observaciones"] = $row["observaciones"];
        $output["id_paciente"] = $row["id_paciente"];
        $output["nitritos_orina"] = $row["nitritos_orina"];
      }
  echo json_encode($output);
break;
#FINALIZAR ORINA
case 'finalizar_orina':
   $examenes->finalizar_orina($_POST["id_paciente"],$_POST["numero_orden"]);
   $messages[]="ok";

if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
}
 break;


}
?>
