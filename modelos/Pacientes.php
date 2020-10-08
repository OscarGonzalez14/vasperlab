<?php  
//conexion a la base de datos
require_once("../config/conexion.php");


class Pacientes extends Conectar{  
////////////////////CLASE REGISTRA CPACIENTES

public function agregar_paciente($nombrePaciente,$edad_paciente,$tipo_paciente,$empresa_paciente,$codigo_emp,$departamento){

	$conectar=parent::conexion();   

    $sql2="insert into pacientes_o values(null,?,?,?,?,?,?);";

    $sql2=$conectar->prepare($sql2); 
    
    $sql2->bindValue(1,$nombrePaciente); 
    $sql2->bindValue(2,$edad_paciente);
    $sql2->bindValue(3,$codigo_emp); 
    $sql2->bindValue(4,$tipo_paciente); 
    $sql2->bindValue(5,$empresa_paciente);
    $sql2->bindValue(6,$departamento);         
              
    $sql2->execute();
}

public function get_pacientes(){
    $conectar= parent::conexion();         
    $sql= "select*from pacientes_o order by id_paciente DESC;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_pacientes_id($id_paciente){
    $conectar= parent::conexion();         
    $sql= "select*from pacientes_o where id_paciente=? order by id_paciente DESC;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

/////////////get pacientes por empresas-clinica
public function get_pacientes_clinicas($usuario_clinica){
    $conectar= parent::conexion();         
    $sql= "select*from pacientes_o where empresa=? order by id_paciente DESC;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$usuario_clinica);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_pacientes_examenes_id($id_paciente){
    $conectar= parent::conexion();         
    $sql= "SELECT p.id_paciente,p.nombre,d.numero_orden,p.empresa from pacientes_o as p inner join detalle_orden as d on d.id_paciente=p.id_paciente where p.id_paciente=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_correlativo_orden(){
    $conectar= parent::conexion();         
    $sql= "select p.nombre,p.empresa,d.id_detalle_orden,d.numero_orden as correlativo_de_orden from pacientes_o as p inner JOIN detalle_orden as d on p.id_paciente=d.id_paciente where p.empresa='indufoam' order by d.id_detalle_orden DESC limit 1;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function agregar_orden(){

    $conectar=parent::conexion();
    $str = '';
    $detalles = array();
    $detalles = json_decode($_POST['arrayChecks']);

    foreach($detalles as $d=>$v){
        $examen = $v->examen;
        $categoria = $v->categoria;

        $correlativo_de_orden = $_POST["correlativo_de_orden"];
        $examenes_paciente = $_POST["examenes_paciente"];
        $fecha_orden = $_POST["fecha_orden"];
        $id_paciente_orden = $_POST["id_paciente_orden"];
        $nom_empresa = $_POST["nom_empresa"];
        $tipo_orden = $_POST["tipo_orden"];
        $estado_orden = $_POST["estado_orden"];

    $sql="insert into detalle_item_orden values(null,?,?,?,?,?,'0');";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$examen);
    $sql->bindValue(2,$fecha_orden);
    $sql->bindValue(3,$id_paciente_orden);
    $sql->bindValue(4,$categoria);
    $sql->bindValue(5,$correlativo_de_orden);
    $sql->execute(); 
  }   

    $sql2="insert into detalle_orden values(null,?,?,?,?,?,?);";

    $sql2=$conectar->prepare($sql2); 
    //$sql2->bindValue(1,$numero_orden_diario);
    $sql2->bindValue(1,$nom_empresa); 
    $sql2->bindValue(2,$id_paciente_orden);
    $sql2->bindValue(3,$correlativo_de_orden); 
    $sql2->bindValue(4,$fecha_orden);
    $sql2->bindValue(5,$estado_orden);
    $sql2->bindValue(6,$tipo_orden);                  
              
    $sql2->execute();

    print_r($_POST);
}

public function eliminar_paciente($id_paciente){
    $conectar=parent::conexion();

    $sql="delete FROM detalle_orden where id_paciente=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->execute();

    $sql="delete from pacientes_o where id_paciente=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->execute();
}

}//FIN DE LA CLASE


