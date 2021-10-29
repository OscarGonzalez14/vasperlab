<?php  
//conexion a la base de datos
require_once("../config/conexion.php");

class Empresarial extends Conectar{
	public function get_resultados_buenosj1($empresa){
      $conectar = parent::conexion();
      $sql = "select d.fecha,p.nombre,p.cod_emp,p.empresa,p.departamento,d.estado,d.estado_eval,p.id_paciente,d.numero_orden from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente where d.estado='1' and p.empresa=? and (fecha like '%10-2021' or fecha like '%11-2021') order by d.id_detalle_orden desc;";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1,$empresa);
      $sql->execute();
      return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
	}


}