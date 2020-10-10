<?php
//conexion de la base de datos 
require_once("../config/conexion.php");
//llamo al modelo Pacientes
require_once("../modelos/Examenes.php");
//llamo al modelo Pacientes  
$examenes = new Examenes();

switch($_GET["op"]){

case "registrar_examen_orina":

$examenes->agregar_examen_orina($_POST["color_orina"],$_POST["olor_orina"],$_POST["aspecto_orina"],$_POST["densidad_orina"],$_POST["esterasas_orina"],$_POST["nitritos_orina"],$_POST["ph_orina"],$_POST["proteinas_orina"],$_POST["glucosa_orina"],$_POST["cetonas_orina"],$_POST["urobilinogeno_orina"],$_POST["bilirrubina_orina"],$_POST["sangre_oculta_orina"],$_POST["cilindros_orina"],$_POST["leucocitos_orina"],$_POST["hematies_orina"],$_POST["epiteliales_orina"],$_POST["filamentos_orina"],$_POST["bacterias_orina"],$_POST["cristales_orina"],$_POST["observaciones_orina"],$_POST["id_paciente"],$_POST["numero_orden_paciente"]);

break;

case "registrar_examen_heces":

$examenes->agregar_examen_heces($_POST["numero_orden_paciente"],$_POST["color_heces"],$_POST["consistencia_heces"],$_POST["mucus_heces"],$_POST["restos_heces"],$_POST["macroscopicos_heces"],$_POST["microscopicos_heces"],$_POST["hematies_heces"],$_POST["leucocitos_heces"],$_POST["activos_heces"],$_POST["quistes_heces"],$_POST["metazoarios_heces"],$_POST["protozoarios_heces"],$_POST["observaciones_heces"],$_POST["id_paciente"]);
//,$_POST["protozoarios_heces"]$_POST["observaciones_heces"],
break;

case 'registrar_examenes_check':
	$examenes->registar_examenes_check();
	break;   


///////////////LISTAR EXAMENES A INGRESAR
case 'examenes_ingreso':
	$datos=$examenes->get_examenes_ingresar($_POST["id_paciente_examen"],$_POST["n_orden_examen"]);
    //Vamos a declarar un array
 	$data= Array();
    foreach($datos as $row)
	{
		$sub_array = array();				
		$sub_array[] = $row["fecha"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["examen"];
		$sub_array[] = $row["estado"];
        $sub_array[] = '<button type="button"  class="btn btn-infos btn-md asigna_datos_orden focus" id="'.$row["id_paciente"].'" name="'.$row["numero_orden"].'" data-toggle="modal" data-target="#'.$row["examen"].'" value="'.$row["nombre"].'" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i></button>';                                 
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

	case 'registrar_examen_exo':
	$examenes->registar_examenes_exo($_POST["aisla"],$_POST["sensible"],$_POST["resiste"],$_POST["id_paciente"],$_POST["numero_orden"],$_POST["refiere"]);
	break;

}

?>
