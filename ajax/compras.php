<?php  
  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Compras
  require_once("../modelos/Compras.php");
  $compras = new Compras(); 

  switch($_GET["op"]){
  	case "get_numero_compra":
    $datos= $compras->get_numero_compras();
    $suc_rec=$_POST["sucursal_correlativo"];  		
    $correlativo=substr($suc_rec, 0,2);
    // si existe el proveedor entonces recorre el array
	    if(is_array($datos)==true and count($datos)>0){
		    foreach($datos as $row){
			  $num_recibo=substr($row["numero_compra"],3,8)+1;					
			  $output["num_recibo"] = strtoupper($correlativo).'-'.$num_recibo;								
		  }
	 echo json_encode($output);
		}
  break;


    case "buscar_aros_id":

      $datos=$compras->get_lente_por_id($_POST["id_producto"]);

        if(is_array($datos)==true and count($datos)>0){

        foreach($datos as $row)
        {
          $output["id_producto"] = $row["id_producto"];
          $output["medidas"] = $row["medidas"];
          $output["modelo"] = $row["modelo"];
          $output["marca"] = $row["marca"];
          $output["color"] = $row["color"];
          $output["categoria"] = $row["categoria"];                   
        }      

      } else {                 
                 //si no existe el registro entonces no recorre el array
          $output["error"]="El producto seleccionado está inactivo, intenta con otro";

      }

  echo json_encode($output);

break;

case "registrar_compra";

  $compras->agrega_detalle_compra();

break;  
}//FIN DEL SWITCH 	