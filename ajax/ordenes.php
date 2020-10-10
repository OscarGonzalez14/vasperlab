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
		$sub_array[] = $row["fecha"];		
	    $sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["cod_emp"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["departamento"];				
        $sub_array[] = '<button type="button" class="btn btn-md bg-light show_solicitudes_det" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'"><i class="fas fa-eye" style="color:blue"></i></button>';
        $sub_array[] = '<span style="color:'.$color.'"><strong>'.$status.'</strong></span>';
        $sub_array[] = '<a href="examenes_ingresar.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'"><button type="button"  class="btn btn-md bg-light"><i class="fas fa-file-download" style="color:#1E0F59"></i></button></a>';                                 
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

  }