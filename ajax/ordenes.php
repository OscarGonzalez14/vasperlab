<?php
//conexion de la base de datos 
require_once("../config/conexion.php");
//llamo al modelo Pacientes
require_once("../modelos/Ordenes.php");
//llamo al modelo Pacientes  
$ordenes = new Ordenes();

switch($_GET["op"]){

	case "listar_solicitudes":
    $datos=$ordenes->get_solicitudes();
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{

		if ($row["estado"]=='0') {
			$status='Pendiente';
			$color='red';
		}else{
			$status='Recibido';
			$color='green';
		}

		$sub_array = array();				
		$sub_array[] = $row["fecha"];		
	    $sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["cod_emp"];
		$sub_array[] = $row["empresa"];				
        $sub_array[] = '<button type="button" class="btn btn-primary show_solicitudes_det" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-eye"></i></button>';
        $sub_array[] = '<span style="color:'.$color.'"><strong>'.$status.'</strong></span>';
        $sub_array[] = '<button type="button" class="btn btn-success" onClick="set_estado_orden('.$row["id_paciente"].',\''.$row["numero_orden"].'\');"><i class="fas fa-file-download"></i></button>';                                 
		$data[] = $sub_array;
	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;
////////////////LISTAR EXAMENES DE CLINICA EN PROCESO(PENDIENTES)
case "examenes_clinica_pendientes":
    $datos=$ordenes->get_solicitudes_proceso();
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{

		if ($row["estado"]=='1') {
			$status='En proceso';
			$color='red';
		}elseif($row["estado"]=='2'){
			$status='Completa';
			$color='blue';
		}

		$sub_array = array();				
		$sub_array[] = $row["id_detalle_orden"];		
	    $sub_array[] = $row["fecha"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["cod_emp"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["departamento"];				
        $sub_array[] = '<button type="button" class="btn btn-md bg-light show_solicitudes_det" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-eye" style="color:blue"></i></button>';
        $sub_array[] = '<a href="examenes_ingresar.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'"><button type="button"  class="btn btn-md bg-light"><i class="fas fa-file-download" style="color:#1E0F59"></i></button></a>';
        $sub_array[] = '<button type="button" class="btn btn-md bg-light show_print_categorias" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-print" style="color:green"></i></button></a>';
        $sub_array[] = '<button type="button" class="btn btn-md bg-light edita_orden" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-edit" style="color:green"></i></button></a>';                               
		$data[] = $sub_array;

	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

 /////////////////////LISTAR EXAMENES DIAGNOSTICO
    case "examenes_diagnosticos":
    $datos=$ordenes->get_solicitudes_proceso();
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row){

		$sub_array = array();				
		//$sub_array[] = $row["id_paciente"];		
	    $sub_array[] = $row["fecha"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["cod_emp"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["departamento"];				
        $sub_array[] = '<a href="ingresar_diagnostico.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'"><button type="button"  class="btn btn-md bg-light"><i class="fas fa-file-download" style="color:#1E0F59"></i></button></a>';
                                      
		$data[] = $sub_array;

	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

////////////////LISTAR EXAMENES DE CLINICA(EMPRESARIAL)
case "examenes_clinica_pendientes_empresarial":
    $datos=$ordenes->get_solicitudes_proceso();
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{
		$numero_orden=$row["numero_orden"];
		$id_paciente=$row["id_paciente"];
		$malos=0;
		$items= $ordenes->get_examenes_orden_pac($id_paciente,$numero_orden);
		foreach ($items as $value){
		 	$ex=$value["examen"];
		    if ($ex!="orina") {
		    	$exa=$value["examen"];
		    }else{
		    	$exa="examen_orina";
		    }
		  
		  $estados= $ordenes->estado_examenes_pac($id_paciente,$numero_orden,$exa);
		  foreach ($estados as $key) {
		          if ($key["estado"]=="Malo") {
		          	$malos=$malos+1;
		          }
		  }          
        } 
        if ($malos==0) {
        	$resultado="Bueno";
        	$badge="success";
        }elseif($malos>=1 and $malos<3){
        $resultado="Intermedio";
        	$badge="warning";
        }elseif($malos>3){
        $resultado="Malo";
       $badge="danger";
        }

		$sub_array = array();				
	
	    $sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["cod_emp"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["departamento"];				
        $sub_array[] = '<button type="button" class="btn btn-md bg-light show_solicitudes_det" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-file-alt" style="color:#00001a"></i></button>';
        $sub_array[] = '<span class="right badge badge-'.$badge.'" style="font-size:12px"> '.$resultado.'</span>';

        $sub_array[] = '<a href="examenes_empresarial.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'"><button type="button"  class="btn btn-md bg-light"><i class="fas fa-eye" style="color:blue"></i></button></a>';
        $sub_array[] = '<button type="button" class="btn btn-md bg-light show_print_categorias" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-id-card-alt" style="color:blue"></i></button></a>';                               
		$data[] = $sub_array;

	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;
 ///////////////LISTAR ORDENES DE LABORATORIO PENDIENTES

    case "examenes_laboratorio_pendientes":
    $datos=$ordenes->get_solicitudes_proceso_lab();
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{

		if ($row["estado"]=='1') {
			$status='En proceso';
			$color='red';
		}elseif($row["estado"]=='2'){
			$status='Completa';
			$color='blue';
		}

		$sub_array = array();				
		$sub_array[] = $row["fecha"];		
	    $sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["cod_emp"];
		$sub_array[] = $row["empresa"];				
        $sub_array[] = '<button type="button" class="btn btn-primary show_solicitudes_det" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-eye"></i></button>';
        $sub_array[] = '<span style="color:'.$color.'"><strong>'.$status.'</strong></span>';
        $sub_array[] = '<a href="examenes_ingresar.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'"><button type="button"  class="btn btn-warning btn-md"><i class="fas fa-file-download"></i></button></a>';                                 
		$data[] = $sub_array;
	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

//////////////LISTAR CATEGORIAS PARA IMPRESION

    case "show_cat_print":
    $datos=$ordenes->get_show_cat_print($_POST["id_paciente"],$_POST["numero_orden"]);
    //Vamos a declarar un array
 	$data= Array();
 	$ant = "antigenos_dos";

    foreach($datos as $row)
	{
		$sub_array = array();				
	    $sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["categoria"];	
        $sub_array[] = '<a href="imprimir_resultados_pdf.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'&categoria='.$row["categoria"].'&nombre='.$row["nombre"].'&cod_emp='.$row["cod_emp"].'" target="_blank"><button type="button"  class="btn btn-ligth btn-md"><i class="fas fa-print" style="color:green"></i></button></a>';
        $sub_array[] = '<a href="imprimir_resultados_pdf.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'&categoria='.$ant.'&nombre='.$row["nombre"].'&cod_emp='.$row["cod_emp"].'" target="_blank"><button type="button"  class="btn btn-ligth btn-md"><i class="fas fa-print" style="color:green"></i></button></a>';                               
		$data[] = $sub_array;
	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

////////////////GET DATOS GENERALES DE PACIENTES EN DETALLE SOLICITUD
    case "datos_pacientes_solicitudes":

    $datos= $ordenes->get_datos_solicitud_pacientes($_POST["id_paciente"],$_POST["numero_orden"]);

	    if(is_array($datos)==true and count($datos)>0){
			foreach($datos as $row)
			{
				//$output["numero_orden"] = $row["numero_orden"];
				$output["nombre"] = $row["nombre"];
				$output["empresa"] = $row["empresa"];
				$output["cod_emp"] = $row["cod_emp"];
				$output["departamento"] = $row["departamento"];		
			}			 

	    }
	echo json_encode($output);
	break;
////////////////LISTAR DETALLES DE SOLICITUDES*************////
    case "ver_detalle_solicitudes":
  	   $datos= $ordenes->get_detalle_solicitudes($_POST["id_paciente"],$_POST["numero_orden"]);
  	break;

    case "set_estado_solicitud":
  	   $datos= $ordenes->set_estado_solicitud($_POST["id_paciente"],$_POST["numero_orden"]);
  	break;

  	case "correlativo_orden_laboratorio":
  	      date_default_timezone_set('America/El_Salvador'); $now = date("d-m-Y");
    	  $datos= $ordenes->get_correlativo_orden_laboratorio($now);

	    if(is_array($datos)==true and count($datos)>0){

			foreach($datos as $row)
			{
				$numero_orden = substr($row["correlativo_de_orden"],11,15)+1;
				$output["correlativo_de_orden"] = $now."-".$numero_orden;
			}	 

	    }else{
	    	$output["correlativo_de_orden"] = $now."-".'1';
	    }
	echo json_encode($output);    
    break;


    //////////////////////GET PACIENTES BUENOS
    case "get_pacientes_buenos":
    if ($_POST["estado_pacs"]=="1") {
    	$datos=$ordenes->get_pacientes_buenos($_POST['empresa_act']);
    	$resultados="Bueno";
    	$badge_c="success";
    }elseif ($_POST["estado_pacs"]=="2") {
    	$datos=$ordenes->get_pacientes_intermedios($_POST['empresa_act']);
    	$resultados="Intermedio";
    	$badge_c="warning";
    }elseif ($_POST["estado_pacs"]=="3") {
        $datos=$ordenes->get_pacientes_malos($_POST['empresa_act']);
        $resultados="Malo";
        $badge_c="danger";
    }elseif ($_POST["estado_pacs"]=="4") {
        $datos=$ordenes->get_pacientes_general($_POST['empresa_act']);
        $resultados="";
        $badge_c="ligth";
    }
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{
		if ($row["estado_eval"]=="Sin Evaluar") {
			$color="white";
			$clase="danger";
		}elseif($row["estado_eval"]=="Evaluado"){
			$color="white";
			$clase ="success";
		}

		$sub_array = array();				
	    $sub_array[] = $row["nombre"];
		$sub_array[] = $row["cod_emp"];
		$sub_array[] = $row["empresa"];
	    $sub_array[] = $row["departamento"];
		$sub_array[] = '<span style="color:'.$color.'" class="right badge badge-'.$clase.'">'.$row["estado_eval"].'</span>';	
        $sub_array[] = '<span class="right badge badge-'.$badge_c.'" style="font-size:12px;">'.$resultados.'</span>';
        $sub_array[] = '<button type="button" class="btn btn-md bg-light show_print_categorias" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-print" style="color:green"></i></button></a>';  
        $sub_array[] = '<button type="button"  class="btn btn-sm btn-outline-primary btn-flat" style="border-radius:6px" onClick="confirma_evaluacion(\''.$row["numero_orden"].'\','.$row["id_paciente"].',\''.$row["nombre"].'\')">Marcar como Evaluado</button>';                                 
		$data[] = $sub_array;
	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

    case 'confirmar_evaluacion':
    	$ordenes->set_estado_evaluacion($_POST["numero_orden"],$_POST["id_paciente"]);
    break;

/////////////////////GET EXAMENES FOR EDIT ORDEN
    case "get_examenes_edita_orden":

    $datos= $ordenes->get_examenes_edita_orden($_POST["id_paciente"],$_POST["numero_orden"]);
        $data= Array();
			foreach($datos as $row){
			   $sub_array = array();
		       $sub_array[] = $row["examen"];
		       $data[] = $sub_array;
			}			 

	echo json_encode($data);
	break;
  }