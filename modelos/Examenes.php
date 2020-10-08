<?php  
//conexion a la base de datos
require_once("../config/conexion.php");


class Examenes extends Conectar{  
////////////////////CLASE REGISTRA CPACIENTES

public function agregar_examen_orina($color_orina,$olor_orina,$aspecto_orina,$densidad_orina,$esterasas_orina,$nitritos_orina,$ph_orina,$proteinas_orina,$glucosa_orina,$cetonas_orina,$urobilinogeno_orina,$bilirrubina_orina,$sangre_oculta_orina,$cilindros_orina,$leucocitos_orina,$hematies_orina,$epiteliales_orina,$filamentos_orina,$bacterias_orina,$cristales_orina,$observaciones_orina,$id_paciente,$numero_orden_paciente
){

	$conectar=parent::conexion();   

    $sql2="insert into examen_orina values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $sql2=$conectar->prepare($sql2); 
    //$sql2->bindValue(1,$numero_orden_diario);
    $sql2->bindValue(1,$numero_orden_paciente);
    $sql2->bindValue(2,$color_orina); 
    $sql2->bindValue(3,$olor_orina);
    $sql2->bindValue(4,$aspecto_orina); 
    $sql2->bindValue(5,$densidad_orina); 
    $sql2->bindValue(6,$esterasas_orina);

    $sql2->bindValue(7,$ph_orina); 
    $sql2->bindValue(8,$proteinas_orina);
    $sql2->bindValue(9,$glucosa_orina); 
    $sql2->bindValue(10,$cetonas_orina); 
    $sql2->bindValue(11,$urobilinogeno_orina);              

    $sql2->bindValue(12,$bilirrubina_orina);
    $sql2->bindValue(13,$sangre_oculta_orina);
    $sql2->bindValue(14,$cilindros_orina);
    $sql2->bindValue(15,$leucocitos_orina);
    $sql2->bindValue(16,$hematies_orina);

    $sql2->bindValue(17,$epiteliales_orina);
    $sql2->bindValue(18,$filamentos_orina);
    $sql2->bindValue(19,$bacterias_orina);
    $sql2->bindValue(20,$cristales_orina);
    $sql2->bindValue(21,$observaciones_orina);
    $sql2->bindValue(22,$id_paciente);
    $sql2->bindValue(23,$nitritos_orina);
              
    $sql2->execute();
}

public function agregar_examen_heces($numero_orden_paciente,$color_heces,$consistencia_heces,$mucus_heces,$restos_heces,$macroscopicos_heces,$microscopicos_heces,$hematies_heces,$leucocitos_heces,$activos_heces,$quistes_heces,$metazoarios_heces,$protozoarios_heces,$observaciones_heces,$id_paciente){

    $conectar=parent::conexion();   

    $sql2="insert into heces values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $sql2=$conectar->prepare($sql2); 

    $sql2->bindValue(1,$numero_orden_paciente);
    $sql2->bindValue(2,$color_heces); 
    $sql2->bindValue(3,$consistencia_heces);
    $sql2->bindValue(4,$mucus_heces); 
    $sql2->bindValue(5,$restos_heces);

    $sql2->bindValue(6,$macroscopicos_heces);
    $sql2->bindValue(7,$microscopicos_heces); 
    $sql2->bindValue(8,$hematies_heces);
    $sql2->bindValue(9,$leucocitos_heces); 
    $sql2->bindValue(10,$activos_heces);

    $sql2->bindValue(11,$quistes_heces);
    $sql2->bindValue(12,$metazoarios_heces);
    $sql2->bindValue(13,$protozoarios_heces);
    $sql2->bindValue(14,$observaciones_heces);
    $sql2->bindValue(15,$id_paciente);

    $sql2->execute(); 
}
///////////FIN 

public function registar_examenes_check(){

$conectar=parent::conexion();
$str = '';
$detalles = array();
$detalles = json_decode($_POST['arrayChecks']);

    foreach($detalles as $d=>$v){
    $sql="insert into detalle_item_orden values(null,?,?,?);";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$d);
    //$sql->bindValue(2,$cod_pac);
    $sql->bindValue(2,$id_paciente);
    $sql->bindValue(3,$fecha);
    $sql->execute(); 
  }

}

public function get_examenes_ingresar($id_paciente,$numero_orden){
$conectar= parent::conexion();         
$sql= "select p.nombre,p.empresa,d.examen,d.numero_orden,p.empresa,d.fecha,d.estado,p.id_paciente from pacientes_o as p inner join detalle_item_orden as d on d.id_paciente=p.id_paciente where d.id_paciente=? and d.numero_orden=?;";
$sql=$conectar->prepare($sql);
$sql->bindValue(1,$id_paciente);
$sql->bindValue(2,$numero_orden);
$sql->execute();
return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}



}//FIN DE LA CLASE


