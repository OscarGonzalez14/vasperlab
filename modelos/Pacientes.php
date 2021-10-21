<?php  
//conexion a la base de datos
require_once("../config/conexion.php");


class Pacientes extends Conectar{  
////////////////////CLASE REGISTRA CPACIENTES

public function agregar_paciente($nombrePaciente,$edad_paciente,$tipo_paciente,$empresa_paciente,$codigo_emp,$departamento,$fecha_nacimiento){
	$conectar=parent::conexion();   
    $sql2="insert into pacientes_o values(null,?,?,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$nombrePaciente); 
    $sql2->bindValue(2,$edad_paciente);
    $sql2->bindValue(3,$codigo_emp); 
    $sql2->bindValue(4,$tipo_paciente); 
    $sql2->bindValue(5,$empresa_paciente);
    $sql2->bindValue(6,$departamento);
    $sql2->bindValue(7,$fecha_nacimiento);             
    $sql2->execute();
}

/*public function agregar_paciente($nombrePaciente,$edad_paciente,$codigo_emp,$genero_paciente,$empresa_paciente,$departamento,$fecha_nacimiento){
  $conectar= parent::conexion();

  $sql= "insert into pacientes_o values(null,?,?,?,?,?,?,?);";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$nombrePaciente);
  $sql->bindValue(2,$edad_paciente);
  $sql->bindValue(3,$codigo_emp);
  $sql->bindValue(4,$genero_paciente);
  $sql->bindValue(5,$empresa_paciente);
  $sql->bindValue(6,$departamento);
  $sql->bindValue(7,$fecha_nacimiento);
  $sql->execute();
}*/

public function registrarEmpresa($nomEmpresa,$dirEmpresa,$nitEmpresa,$telEmpresa,$respEmpresa,$correoEmpresa,$encargado,$registro,$giro){

  $conectar= parent::conexion();
  parent::set_names();
  $sql="insert into empresas values(null,?,?,?,?,?,?,?,?,?);";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1, $nomEmpresa);
  $sql->bindValue(2, $dirEmpresa);
  $sql->bindValue(3, $nitEmpresa);
  $sql->bindValue(4, $telEmpresa);
  $sql->bindValue(5, $respEmpresa);
  $sql->bindValue(6, $correoEmpresa);
  $sql->bindValue(7, $encargado);
  $sql->bindValue(8, $registro);
  $sql->bindValue(9, $giro);
  $sql->execute();

    //print_r($_POST);
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

public function comprobar_existe_orden(){
    $conectar= parent::conexion();
    $sql= "select*from detalle_orden where numero_orden=? and id_paciente=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$_POST["correlativo_de_orden"]);
    $sql->bindValue(2,$_POST["id_paciente_orden"]);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function agregar_orden(){

    $conectar=parent::conexion();
    $str = '';
    $detalles = array();
    $detalles = json_decode($_POST['arrayChecks']);
    $estado_eval ="Sin Evaluar";

    foreach($detalles as $d=>$v){
    $examen = $v->examen;
    $categoria = $v->categoria;

    $correlativo_de_orden = $_POST["correlativo_de_orden"];
        //$examenes_paciente = $_POST["examenes_paciente"];
    $fecha_orden = $_POST["fecha_orden"];
    $id_paciente_orden = $_POST["id_paciente_orden"];
    $nom_empresa = "0";
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

    $sql2="insert into detalle_orden values(null,?,?,?,?,?,?,?);";

    $sql2=$conectar->prepare($sql2); 
    //$sql2->bindValue(1,$numero_orden_diario);
    $sql2->bindValue(1,$nom_empresa); 
    $sql2->bindValue(2,$id_paciente_orden);
    $sql2->bindValue(3,$correlativo_de_orden); 
    $sql2->bindValue(4,$fecha_orden);
    $sql2->bindValue(5,$estado_orden);
    $sql2->bindValue(6,$tipo_orden);
    $sql2->bindValue(7,$estado_eval);                
              
    $sql2->execute();
}

public function edita_orden(){
    $conectar=parent::conexion();
    $str = '';
    $detalles = array();
    $detalles = json_decode($_POST['arrayChecks']);

    foreach($detalles as $d=>$v){
    $examen = $v->examen;
    $categoria = $v->categoria;

    $correlativo_de_orden = $_POST["correlativo_de_orden"];
    $fecha_orden = $_POST["fecha_orden"];
    $id_paciente_orden = $_POST["id_paciente_orden"];
    //$nom_empresa = $_POST["empresa_paciente"];
    $tipo_orden = $_POST["tipo_orden"];
    $estado_orden = $_POST["estado_orden"];


    $sql11="select *from detalle_item_orden where numero_orden=? and id_paciente=? and examen=?;";            
    $sql11=$conectar->prepare($sql11);
    $sql11->bindValue(1,$correlativo_de_orden);
    $sql11->bindValue(2,$id_paciente_orden);
    $sql11->bindValue(3,$examen);
    $sql11->execute();
    $resultados = $sql11->fetchAll(PDO::FETCH_ASSOC);

    print_r($_POST);
    print_r($resultados);

    if(is_array($resultados)==true and count($resultados)==0) {
    $sql="insert into detalle_item_orden values(null,?,?,?,?,?,'0');";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$examen);
    $sql->bindValue(2,$fecha_orden);
    $sql->bindValue(3,$id_paciente_orden);
    $sql->bindValue(4,$categoria);
    $sql->bindValue(5,$correlativo_de_orden);
    $sql->execute();
    } 
   }/////////////FIN FOREACH
}//////////FIN FUNCION
/*
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
}*/


////////////VALIDACION PARA ELIMINAR PACIENTE SI EXISTE CONSULTA
   public function valida_paciente_orden($id_paciente){
    $conectar= parent::conexion();
    /*$sql="select p.nombre,d.id_paciente from pacientes_o as p INNER JOIN detalle_orden as d on p.id_paciente=d.id_paciente WHERE d.id_paciente=?;";*/
    $sql="select * from detalle_orden where id_paciente=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  //////////////FUNCION PARA ELIMINAR PACIENTE
  public function eliminar_paciente($id_paciente){
    $conectar=parent::conexion();
    $sql="delete from pacientes_o where id_paciente=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->execute();
    return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
  }

}//FIN DE LA CLASE


