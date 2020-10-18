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

//////////////////GET DETALLE ORDEN POR PACIENTE7
public function get_detalle_orden_pacientes($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  $sql= "SELECT p.nombre,p.empresa,p.departamento,p.cod_emp,d.numero_orden from pacientes_o as p inner join detalle_orden as d on p.id_paciente=d.id_paciente WHERE p.id_paciente=? and d.numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function datos_item_examenes($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  $sql= "select examen from detalle_item_orden where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_categorias($id_paciente,$numero_orden){

  $conectar=parent::conexion();
  parent::set_names();
  
  $sql= "select DISTINCT categoria,examen from detalle_item_orden where id_paciente=? and numero_orden=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

/*==================PLANTILLAS DE IMPRESION=================*/
public function examenes_quimica_print($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  
  $sql= "select examen from detalle_item_orden where id_paciente=? and numero_orden=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

####GET DATA EXAMEN GLUCOSA
public function get_data_quimica($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  
  $sql= "select resultado,observacione from glucosa where id_paciente=? and  numero_orden=?";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
####GET DATA EXAMEN COLESTROL
public function get_data_colesterol($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  
  $sql= "select resultado,observacione from colesterol where id_paciente=? and  numero_orden=?";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
####GET DATA EXAMEN TRIGLICERIDOS
public function get_data_trigliceridos($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  
  $sql= "select resultado,observacione from trigliceridos where id_paciente=? and  numero_orden=?";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
####GET DATA EXAMEN ACIDO URICO
public function get_data_acido($id_paciente,$numero_orden){
  $conectar=parent::conexion();
  parent::set_names();
  
  $sql= "select resultado,observacione from acido_urico where id_paciente=? and  numero_orden=?";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$numero_orden);
  $sql->execute();  
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

}