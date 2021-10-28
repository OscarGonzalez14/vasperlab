<?php
//conexion de la base de datos 
require_once("../config/conexion.php");
//llamo al modelo Pacientes
require_once("../modelos/Pacientes.php");
//llamo al modelo Pacientes  
$paciente = new Pacientes();

switch($_GET["op"]){

case "listar_pacientes_registrados":
    $datos=$paciente->get_pacientes();
    //Vamos a declarar un array
  $data= Array();
    foreach($datos as $row)
  {
    $sub_array = array();       
    $sub_array[] = $row["id_paciente"];
    $sub_array[] = $row["cod_emp"];
    $sub_array[] = $row["nombre"];
    $sub_array[] = $row["empresa"];
    $sub_array[] = $row["departamento"];
    $sub_array[] = '<button type="button" class="btn btn-md bg-light agregar_oden_paciente" id="'.$row["id_paciente"].'" data-toggle="modal" data-target="#nueva_orden" data-backdrop="static" data-keyboard="false"><i class="fas fa-file-medical" style="color:blue"></i></button>';
        $sub_array[] = '<button type="button" class="btn btn-light agregndoe" id="'.$row["id_paciente"].'"><i class="fa fa-edit" style="color:green"></i></button>';
        $sub_array[] = '<button type="button" class="btn btn-light" onClick="eliminar_paciente_o('.$row["id_paciente"].');"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></button>';                                 
    $data[] = $sub_array;
  }

        $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

    break;

/////////////////////LISTAR PACIENTES EM EPRESAS CLINICAS-*/*/////
case "listar_pacientes_registrados_clinicas":
    $datos=$paciente->get_pacientes_clinicas($_POST["usuario_clinica"]);
    //Vamos a declarar un array
  $data= Array();
    foreach($datos as $row)
  {
    $sub_array = array();       
        
      $sub_array[] = 'AV'."-".$row["id_paciente"];
    $sub_array[] = $row["nombre"];
    $sub_array[] = $row["edad"];
    $sub_array[] = $row["empresa"];
    $sub_array[] = '<button type="button" class="btn btn-primary agregar_orden_paciente_clinica" id="'.$row["id_paciente"].'" data-toggle="modal" data-target="#nueva_orden_clinicas" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"> Orden</button>';
                            
    $data[] = $sub_array;
  }

        $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

    break;
/////////////////FIN LISTAR PACIENTES ENPRESAS CLINICAS

case "registrar_paciente":

$paciente->agregar_paciente($_POST["nombrePaciente"],$_POST["edad_paciente"],$_POST["tipo_paciente"],$_POST["empresa_paciente"],$_POST["codigo_emp"],$_POST["departamento"],$_POST["fecha_nacimiento"]);
 $mensaje ="existe";
 echo json_encode($mensaje);


break;

case "listar_pacientes":
    $datos=$paciente->get_pacientes();
    //Vamos a declarar un array
  $data= Array();
    foreach($datos as $row)
  {
    $sub_array = array();       
        
      $sub_array[] = $row["id_paciente"];
    $sub_array[] = $row["nombre"];
        $sub_array[] = '<button type="button" class="btn btn-dark agrega_paciente" id="'.$row["id_paciente"].'">Seleccionar</button>';
                                 
    $data[] = $sub_array;
  }

        $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

    break;

    case "agrega_paciente_examen":

    $datos= $paciente->get_pacientes_id($_POST["id_paciente"]);

      if(is_array($datos)==true and count($datos)>0){

        foreach($datos as $row)
        {
          $output["id_paciente"] = $row["id_paciente"];
          $output["nombre"] = $row["nombre"];
          $output["empresa"] = $row["empresa"];
          //$output["numero_orden"] = $row["numero_orden"];   
        }      

      }
  echo json_encode($output);
    break;

    case "agrega_paciente_examenes":

    $datos= $paciente->get_pacientes_examenes_id($_POST["id_paciente"]);

      if(is_array($datos)==true and count($datos)>0){

        foreach($datos as $row)
        {
          $output["id_paciente"] = $row["id_paciente"];
          $output["nombre"] = $row["nombre"];
          $output["empresa"] = $row["empresa"];
          $output["numero_orden"] = $row["numero_orden"];   
        }      

      }
  echo json_encode($output);
    break;

    case "correlativo_orden":
      $datos= $paciente->get_correlativo_orden();

      if(is_array($datos)==true and count($datos)>0){

        foreach($datos as $row)
        {
          $numero_orden = substr($row["correlativo_de_orden"],4,8)+1;
          $empresa = substr($row["empresa"],0,3);

          $output["correlativo_de_orden"] = $empresa."-".$numero_orden;
        }      

      }
  echo json_encode($output);    
    break;


    case "registrar_orden":
    $datos = $paciente->comprobar_existe_orden($_POST["correlativo_de_orden"],$_POST["id_paciente_orden"]);
    if(is_array($datos)==true and count($datos)==0){   
      $paciente->agregar_orden();
      $mensaje="oKK";
    }else{
      $paciente->edita_orden();
    }
    echo json_encode($mensaje);
    break;

    case 'eliminar_paciente':
      $paciente->eliminar_paciente($_POST["id_paciente"]);
    break;
   
}

?>
   
   