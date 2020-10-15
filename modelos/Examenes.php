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

///////////REGISTRAR TRIGLICERIDOS
public function registar_examenes_trig($resultado){

    $conectar=parent::conexion();
    $sql2="insert into trigliceridos values(null,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->execute();
}

/////////////REGISTRAR COLESTEROL
public function registar_examenes_colesterol($resultado){
    $conectar=parent::conexion();
    $sql2="insert into colesterol values(null,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->execute();
}
//////////////
public function registar_examenes_glucosa($resultado){
    $conectar=parent::conexion();
    $sql2="insert into glucosa values(null,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->execute();
}

//////////////REGISTRAR EXAMEN EXOFARINGEO
public function registar_examenes_exo($aisla,$sensible,$resiste,$id_paciente,$numero_orden,$refiere){
    $conectar=parent::conexion();
    $sql2="insert into exofaringeo values(null,?,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$aisla);
    $sql2->bindValue(2,$sensible);
    $sql2->bindValue(3,$resiste);
    $sql2->bindValue(4,$numero_orden);
    $sql2->bindValue(5,$id_paciente);
    $sql2->bindValue(6,$refiere);
    $sql2->execute();
}
/*===================INICIA EXAMEN ==========================
======================DE HEMOGRAMA=====================*/
////***************COMPROBAR SI EXISTE EXAMEN DE HEMATOLOGIA***********////

public function buscar_existe_hemo($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql= "select*from hemograma where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }
//////////////REGISTRAR EXAMEN HEMATOLOGIA
public function registar_examenes_hemograma($gr_hemato,$ht_hemato,$hb_hemato,$vcm_hemato,$cmhc_hemato,$hcm_hemato,$gb_hemato,$linfocitos_hemato,$monocitos_hemato,$eosinofilos_hemato,$basinofilos_hemato,$banda_hemato,$segmentados_hemato,$metamielo_hemato,$mielocitos_hemato,$blastos_hemato,$plaquetas_hemato,$reti_hemato,$eritro_hemato,$otros_hema,$id_paciente,$numero_orden,$fecha,$gota_hema){
    $estado='0';
    $conectar=parent::conexion();
    $sql2="insert into hemograma values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$gr_hemato);
    $sql2->bindValue(2,$ht_hemato);
    $sql2->bindValue(3,$hb_hemato);
    $sql2->bindValue(4,$vcm_hemato);
    $sql2->bindValue(5,$cmhc_hemato);
    $sql2->bindValue(6,$gota_hema);
    $sql2->bindValue(7,$gb_hemato);
    $sql2->bindValue(8,$linfocitos_hemato);
    $sql2->bindValue(9,$monocitos_hemato);
    $sql2->bindValue(10,$eosinofilos_hemato);
    $sql2->bindValue(11,$basinofilos_hemato);
    $sql2->bindValue(12,$banda_hemato);
    $sql2->bindValue(13,$segmentados_hemato);
    $sql2->bindValue(14,$metamielo_hemato);
    $sql2->bindValue(15,$mielocitos_hemato);
    $sql2->bindValue(16,$blastos_hemato);
    $sql2->bindValue(17,$plaquetas_hemato);
    $sql2->bindValue(18,$reti_hemato);
    $sql2->bindValue(19,$eritro_hemato);
    $sql2->bindValue(20,$otros_hema);
    $sql2->bindValue(21,$id_paciente);
    $sql2->bindValue(22,$numero_orden);
    $sql2->bindValue(23,$fecha);
    $sql2->bindValue(24,$estado);
    $sql2->bindValue(25,$hcm_hemato);   
    $sql2->execute();

    ///////////////////UPDATE ESTADO DE EXAMEN
    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='hemograma';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden);
    $sql3->execute();
}
/////////////GET DATOS HEMOGRAMA PARA FUNCION SHOW DATA
public function show_datos_hemograma($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from hemograma where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }
////////////////////EDITAR HEMATOLOGIA
public function editar_examenes_hemograma($gr_hemato,$ht_hemato,$hb_hemato,$vcm_hemato,$cmhc_hemato,$hcm_hemato,$gb_hemato,$linfocitos_hemato,$monocitos_hemato,$eosinofilos_hemato,$basinofilos_hemato,$banda_hemato,$segmentados_hemato,$metamielo_hemato,$mielocitos_hemato,$blastos_hemato,$plaquetas_hemato,$reti_hemato,$eritro_hemato,$otros_hema,$id_paciente,$numero_orden,$fecha,$gota_hema){
    
    $conectar=parent::conexion();
    $sql2="update hemograma set gr_hemato=?,ht_hemato=?,hb_hemato=?,vcm_hemato=?,cmhc_hemato=?,gota_hema=?,gb_hemato=?,linfocitos_hemato=?,monocitos_hemato=?,eosinofilos_hemato=?,basinofilos_hemato=?,banda_hemato=?,segmentados_hemato=?,metamielo_hemato=?,mielocitos_hemato=?,blastos_hemato=?,plaquetas_hemato=?,reti_hemato=?,eritro_hemato=?,otros_hema=?,hcm_hemato=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$gr_hemato);
    $sql2->bindValue(2,$ht_hemato);
    $sql2->bindValue(3,$hb_hemato);
    $sql2->bindValue(4,$vcm_hemato);
    $sql2->bindValue(5,$cmhc_hemato);
    $sql2->bindValue(6,$gota_hema);
    $sql2->bindValue(7,$gb_hemato);
    $sql2->bindValue(8,$linfocitos_hemato);
    $sql2->bindValue(9,$monocitos_hemato);
    $sql2->bindValue(10,$eosinofilos_hemato);
    $sql2->bindValue(11,$basinofilos_hemato);
    $sql2->bindValue(12,$banda_hemato);
    $sql2->bindValue(13,$segmentados_hemato);
    $sql2->bindValue(14,$metamielo_hemato);
    $sql2->bindValue(15,$mielocitos_hemato);
    $sql2->bindValue(16,$blastos_hemato);
    $sql2->bindValue(17,$plaquetas_hemato);
    $sql2->bindValue(18,$reti_hemato);
    $sql2->bindValue(19,$eritro_hemato);
    $sql2->bindValue(20,$otros_hema);
    $sql2->bindValue(21,$hcm_hemato);
    $sql2->bindValue(22,$id_paciente);
    $sql2->bindValue(23,$numero_orden);
  
    $sql2->execute();
}
///////////////FINALIZAR HEMOGRAMA
    public function finalizar_hemograma($id_paciente,$numero_orden){
        $conectar=parent::conexion();
        $sql2="update detalle_item_orden set estado='2' where id_paciente=? and numero_orden=? and examen='hemograma';";
        $sql2=$conectar->prepare($sql2);
        $sql2->bindValue(1,$id_paciente);
        $sql2->bindValue(2,$numero_orden);
        $sql2->execute();
    }
/*===================FINALIZA EXAMEN 0===========================
======================DE HEMOGRAMA=====================*/

/*=================================================================================================
**********************************INICIO EXAMEN HECES********************************                          
===================================================================================================*/
public function buscar_existe_heces($id_paciente,$numero_orden_paciente){
    $conectar= parent::conexion();
    $sql= "select*from heces where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function agregar_examen_heces($numero_orden_paciente,$color_heces,$consistencia_heces,$mucus_heces,$macroscopicos_heces,$microscopicos_heces,$hematies_heces,$leucocitos_heces,$activos_heces,$quistes_heces,$metazoarios_heces,$protozoarios_heces,$observaciones_heces,$id_paciente){

    $conectar=parent::conexion();  

    $sql2="insert into heces values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$numero_orden_paciente);
    $sql2->bindValue(2,$color_heces); 
    $sql2->bindValue(3,$consistencia_heces);
    $sql2->bindValue(4,$mucus_heces); 
    $sql2->bindValue(5,$macroscopicos_heces);
    $sql2->bindValue(6,$microscopicos_heces); 
    $sql2->bindValue(7,$hematies_heces);
    $sql2->bindValue(8,$leucocitos_heces); 
    $sql2->bindValue(9,$activos_heces);
    $sql2->bindValue(10,$quistes_heces);
    $sql2->bindValue(11,$metazoarios_heces);
    $sql2->bindValue(12,$protozoarios_heces);
    $sql2->bindValue(13,$observaciones_heces);
    $sql2->bindValue(14,$id_paciente);
    $sql2->execute();
    #ACTUALIZA EL ESTADO DE DETALLE ORDEN ITEM
    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='heces';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden_paciente);
    $sql3->execute();
}
/////////////GET DATOS HECES PARA FUNCION SHOW DATA
public function show_datos_heces($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from heces where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }
# Edita EXamen heces
public function editar_examen_heces($numero_orden_paciente,$color_heces,$consistencia_heces,$mucus_heces,$macroscopicos_heces,$microscopicos_heces,$hematies_heces,$leucocitos_heces,$activos_heces,$quistes_heces,$metazoarios_heces,$protozoarios_heces,$observaciones_heces,$id_paciente){

    $conectar=parent::conexion();  

    $sql2="update heces set color=?,consistencia=?,mucus=?,macroscopicos=?,microscopicos=?,hematies=?,leucocitos=?,protozoarios=?,activos=?,quistes=?,metazoarios=?,observaciones=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$color_heces);
    $sql2->bindValue(2,$consistencia_heces);
    $sql2->bindValue(3,$mucus_heces);
    $sql2->bindValue(4,$macroscopicos_heces);
    $sql2->bindValue(5,$microscopicos_heces);
    $sql2->bindValue(6,$hematies_heces);
    $sql2->bindValue(7,$leucocitos_heces);
    $sql2->bindValue(8,$protozoarios_heces);
    $sql2->bindValue(9,$activos_heces);
    $sql2->bindValue(10,$quistes_heces);
    $sql2->bindValue(11,$metazoarios_heces);
    $sql2->bindValue(12,$observaciones_heces);
    $sql2->bindValue(13,$id_paciente);
    $sql2->bindValue(14,$numero_orden_paciente);    
    $sql2->execute();
}
   public function finalizar_heces($id_paciente,$numero_orden){
        $conectar=parent::conexion();
        $sql2="update detalle_item_orden set estado='2' where id_paciente=? and numero_orden=? and examen='heces';";
        $sql2=$conectar->prepare($sql2);
        $sql2->bindValue(1,$id_paciente);
        $sql2->bindValue(2,$numero_orden);
        $sql2->execute();
    }
/*=================================================================================================
**********************************FIN EXAMEN HECES********************************                          
===================================================================================================*/

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


