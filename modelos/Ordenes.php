<?php  
//conexion a la base de datos
require_once("../config/conexion.php");

class Ordenes extends Conectar{

	public function get_solicitudes(){
    $conectar= parent::conexion();         
    $sql= "SELECT d.numero_orden,p.nombre,p.cod_emp,d.fecha,d.empresa,p.id_paciente,d.estado from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente where d.estado='0' order by d.id_det_item DESC;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}
/////////////////////LISTAR SOLICITUDES EN PROCESO
  public function get_solicitudes_proceso(){
    $conectar= parent::conexion();         
    $sql= "SELECT d.numero_orden,p.nombre,p.cod_emp,d.fecha,p.empresa,p.departamento,p.id_paciente,d.estado from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente  order by d.id_detalle_orden DESC;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

/////////////////////LISTAR SOLICITUDES EN PROCESO
  public function get_show_cat_print($id_paciente,$numero_orden){
    $conectar= parent::conexion();         
    $sql= "select p.nombre,p.cod_emp,d.numero_orden,d.categoria,p.id_paciente from pacientes_o as p inner join detalle_item_orden as d on d.id_paciente=p.id_paciente
      where d.id_paciente=? and d.numero_orden=? group by d.categoria;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

/////////////////////LISTAR SOLICITUDES EN PROCESO LABORATORIOS
  public function get_solicitudes_proceso_lab(){
    $conectar= parent::conexion();         
    $sql= "SELECT d.numero_orden,p.nombre,p.cod_emp,d.fecha,d.empresa,p.id_paciente,d.estado from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente where d.estado='1' AND tipo_orden='laboratorio' order by p.id_paciente DESC;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

//////////////DATOS GENERALES DEL PACIENTE EN DETALLES DE SOLICITUD
	public function get_datos_solicitud_pacientes($id_paciente,$numero_orden){
    $conectar= parent::conexion();         
    $sql= "SELECT p.nombre,p.empresa,p.departamento,p.cod_emp,d.numero_orden from pacientes_o as p inner join detalle_orden as d on p.id_paciente=d.id_paciente WHERE p.id_paciente=? and d.numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

////////////LISTAR DETALLE DE SOLICITUDES***************
public function get_detalle_solicitudes($id_paciente,$numero_orden){

  $conectar=parent::conexion();
  parent::set_names();

  $sql='SELECT examen,fecha,id_paciente,numero_orden from detalle_item_orden where id_paciente=? and numero_orden=?';
  $sql=$conectar->prepare($sql);            

  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();
  $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

  $html="
  <tr>
  	<td colspan='20' style='background: #034f84;color:white;'># Item</td>
  	<td colspan='50' style='background: #034f84;color:white;'>Exámen</td>
  	<td colspan='30' style='background: #034f84;color:white;'>Fecha Emisión</td>
  </tr>
  ";
  for ($i=0; $i < sizeof($resultado) ; $i++) { 
  	$item=$i+1;
  	$html.="<tr class='filas' style='text-align:center'>
   <td colspan='20'>".$item."</td>
   <td colspan='50' style='text-transform:uppercase'>".$resultado[$i]['examen']."</td>
   <td colspan='50' style='text-transform:uppercase'>".$resultado[$i]['fecha']."</td>
   </tr>";
  }

  $html.="
    <tr>
      <td colspan='80'></td>
      <td colspan='20'><a href='imprimir_orden_pdf.php?n_orden=".$numero_orden."&id_paciente=".$id_paciente."' id='' target='_blank'><button type='button' class='btn btn-primary agregndoe'><i class='fas fa-print'></i> Imprimir orden</button></a></td>
    </tr>
  ";

  echo $html;
}

///////////////////set estado solicitud
public function set_estado_solicitud($id_paciente,$numero_orden){
    $conectar = parent::conexion();         
    $sql= "update detalle_orden set estado='1' where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
         
    $sql= "update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
}
//////////////////correlativo para ordenes diarias de laboratorio
  public function get_correlativo_orden_laboratorio($now){

    $conectar= parent::conexion();         
    $sql= "select numero_orden as correlativo_de_orden from detalle_orden where fecha=? order by id_detalle_orden DESC limit 1;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$now);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  /////////GET ORDENES
  public function get_examenes_orden_pac($id_paciente,$numero_orden){
  $conectar= parent::conexion();         
  $sql= "select examen from detalle_item_orden where id_paciente=? and numero_orden=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();
return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}
//////////ESTADO EXAMENES
public function estado_examenes_pac($id_paciente,$numero_orden,$exa){
    $conectar= parent::conexion();
    $sql3='select estado from '.$exa.' where id_paciente=? and numero_orden=?;';           
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden);
    $sql3->execute();
    return $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);
}
////////////////////////GET PACIENTES BUENOS
public function get_pacientes_buenos($empresa_act){
    $conectar= parent::conexion();
    $sql3='select p.nombre,p.cod_emp,p.empresa,p.departamento,d.estado,d.estado_eval,p.id_paciente,d.numero_orden from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente where d.estado="1" and p.empresa=?;';           
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$empresa_act);
    $sql3->execute();
    return $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);
}
//////////////////GET PACIENTES INTERMEDIOS
public function get_pacientes_intermedios($empresa_act){
    $conectar= parent::conexion();
    $sql3='select p.nombre,p.cod_emp,p.empresa,p.departamento,d.estado,d.estado_eval,p.id_paciente,d.numero_orden from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente where (d.estado>1 and d.estado<3) and p.empresa=?;';           
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$empresa_act);
    $sql3->execute();
    return $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);
}
/////////////////GET PACIENTES MALOS
public function get_pacientes_malos($empresa_act){
    $conectar= parent::conexion();
    $sql3='select p.nombre,p.cod_emp,p.empresa,p.departamento,d.estado,d.estado_eval,p.id_paciente,d.numero_orden from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente where d.estado>=3 and p.empresa=?;';           
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$empresa_act);
    $sql3->execute();
    return $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);
}
////////////////SET ESTADO EVALUACION 
public function set_estado_evaluacion($numero_orden,$id_paciente){
  $conectar= parent::conexion();
  $sql6="update detalle_orden set estado_eval='Evaluado' where id_paciente=? and numero_orden=?;";
  $sql6=$conectar->prepare($sql6);
  $sql6->bindValue(1,$id_paciente);
  $sql6->bindValue(2,$numero_orden);
  $sql6->execute();
}

//////////////DATOS EXAMENS CHECK ORDEN
  public function get_examenes_edita_orden($id_paciente,$numero_orden){
    $conectar= parent::conexion();         
    $sql= "select examen from detalle_item_orden where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

}