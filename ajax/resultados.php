<?php
//conexion de la base de datos 
require_once("../config/conexion.php");
//llamo al modelo Pacientes
require_once("../modelos/Resultados.php");
//llamo al modelo Pacientes  
$resultados = new Resultados();

switch($_GET["op"]){

	case 'data_resultados_examenes':
	$datos=$resultados->get_resultados_datatable();
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{
		$sub_array = array();				
				
		$sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["fecha"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["empresa"];
        $sub_array[] = '<a href="resultados_examenes.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'" method="POST" target="_blank"><button type="button"  class="btn btn-infos btn-md"><i class="glyphicon glyphicon-edit"></i> Imprimir</button></a>';                                 
		$data[] = $sub_array;
	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;


case 'data_resultados_examenes_emp':
	$datos=$resultados->get_resultados_datatable_emp($_POST["usuario_clinica"]);
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{
		$sub_array = array();				
				
		$sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["fecha"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["cod_emp"];
        $sub_array[] = '<a href="resultados_examenes.php?id_paciente='.$row["id_paciente"].'&numero_orden='.$row["numero_orden"].'" method="POST" target="_blank"><button type="button"  class="btn btn-infos btn-md"><i class="glyphicon glyphicon-edit"></i> Imprimir</button></a>';                                 
		$data[] = $sub_array;
	}

        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;
}
