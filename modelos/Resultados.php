<?php  
//conexion a la base de datos
require_once("../config/conexion.php");


class Resultados extends Conectar{

	public function get_resultados_datatable(){
    $conectar= parent::conexion(); 
            
    $sql= 'SELECT d.numero_orden,d.fecha,p.nombre,p.empresa,p.id_paciente from pacientes_o as p inner join detalle_orden as d on p.id_paciente=d.id_paciente group by d.numero_orden;';
    $sql=$conectar->prepare($sql);
   // $sql->bindValue(1,$id_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

////////////////////LISTAR PACIENTES POR EMPRESA-CLINICA
  public function get_resultados_datatable_emp($usuarios_clinica){
    $conectar= parent::conexion(); 
            
    $sql= 'SELECT d.numero_orden,d.fecha,p.nombre,p.empresa,p.cod_emp,p.id_paciente from pacientes_o as p inner join detalle_orden as d on p.id_paciente=d.id_paciente where p.empresa=? group by d.numero_orden;';
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$usuarios_clinica);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

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


}