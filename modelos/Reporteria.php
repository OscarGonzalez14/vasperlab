<?php  
//conexion a la base de datos
require_once("config/conexion.php");


class Reporteria extends Conectar{

public function get_datos_orden($numero_orden,$id_paciente){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="SELECT p.nombre,d.numero_orden,d.fecha from pacientes_o as p INNER join detalle_orden as d on p.id_paciente=d.id_paciente WHERE p.id_paciente=? and d.numero_orden=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_orden);
  $sql->bindValue(2,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_items_orina($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select*from examen_orina where numero_orden=? and id_paciente=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_orden);
  $sql->bindValue(2,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_items_heces($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select*from heces where numero_orden=? and id_paciente=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_orden);
  $sql->bindValue(2,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_detalle_orden($id_paciente){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select*from detalle_item_orden where id_paciente=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
/////////////CONTEO SOLICITUDES PENDIENTES
public function count_solicitudes_pendientes(){
    $conectar= parent::conexion();           
    $sql="SELECT estado from detalle_orden where estado='0'";             
    $sql=$conectar->prepare($sql);
    $sql->execute();
    $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    return $sql->rowCount();
}
public function count_solicitudes_pendientes_emp(){
    $conectar= parent::conexion();           
    $sql="SELECT estado from detalle_orden where estado='1'";             
    $sql=$conectar->prepare($sql);
    $sql->execute();
    $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    return $sql->rowCount();
}

}