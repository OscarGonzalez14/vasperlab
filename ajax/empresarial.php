<?php
require_once("../config/conexion.php");
require_once("../modelos/Empresarial.php");
$empresarial = new Empresarial();
switch($_GET["op"]){
////  GET RESULTADOS PACIENTES ////////////
case 'get_resultados_pacientes':
	if ($_POST["estado_pacs"]=="1") {
    	$datos=$ordenes->get_pacientes_buenos($_POST['jornada'],$_POST["empresa_act"]);
    }
break;
}