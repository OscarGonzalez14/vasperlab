<?php  
//conexion a la base de datos
require_once("../config/conexion.php");


class Examenes extends Conectar{  
////////////////////CLASE REGISTRA CPACIENTES

///////////REGISTRAR TRIGLICERIDOS
public function buscar_existe_trigliceridos($id_pac_exa_trigliceridos,$num_orden_exa_trigliceridos){
    $conectar= parent::conexion();
    $sql= "select*from trigliceridos where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_trigliceridos);
    $sql->bindValue(2,$num_orden_exa_trigliceridos);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}
public function registar_examenes_trig($resultado,$observaciones_trigliceridos,$id_pac_exa_trigliceridos,$num_orden_exa_trigliceridos){
    $estado="0";
    $conectar=parent::conexion();
    $sql2="insert into trigliceridos values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$num_orden_exa_trigliceridos);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_trigliceridos);
    $sql2->bindValue(5,$observaciones_trigliceridos);
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='trigliceridos';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_trigliceridos);
    $sql3->bindValue(2,$num_orden_exa_trigliceridos);
    $sql3->execute();
}

public function editar_examenes_trigliceridos($resultado,$observaciones_trigliceridos,$id_pac_exa_trigliceridos,$num_orden_exa_trigliceridos){
    $estado="0";
    $conectar=parent::conexion();
    $sql2="update trigliceridos set resultado=?,observacione=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observaciones_trigliceridos);
    $sql2->bindValue(3,$id_pac_exa_trigliceridos);
    $sql2->bindValue(4,$num_orden_exa_trigliceridos);
    $sql2->execute();
}

/*=================INICIA EXAMEN=============================
====================ACIDO URICO==============================*/
public function buscar_existe_u($id_pac_exa_urico,$num_orden_exa_urico){
    $conectar= parent::conexion();
    $sql= "select*from acido_urico where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_urico);
    $sql->bindValue(2,$num_orden_exa_urico);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}
public function registar_examenes_urico($resultado,$observacione_urico,$id_pac_exa_urico,$num_orden_exa_urico){

    $conectar=parent::conexion();

      $sql3="select genero from pacientes_o where id_paciente=?;";           
      $sql3=$conectar->prepare($sql3);
      $sql3->bindValue(1,$id_pac_exa_urico);
      $sql3->execute();
      $resultados = $sql3->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultados as $b=>$row){
         $re["existencia"] = $row["genero"];
      }            
    $genero = $row["genero"];
    if ($genero=="Masculino" && ($resultado>=3.4 && $resultado<=7.0)) {
        $estado="Bueno";
    }elseif ($genero=="Femenino" && ($resultado>=2.4 && $resultado<=5.7)) {
        $estado="Bueno";
    }elseif ($genero=="Masculino" && (($resultado<=3.3 && $resultado>=2.5) or ($resultado>=7.1 && $resultado<=8.5))){
        $estado="Intermedio";
    }elseif ($genero=="Femenino" && (($resultado>=1.6 && $resultado<=2.3) or ($resultado>=5.8 && $resultado<=7.0))){
        $estado="Intermedio";
    }elseif ($genero=="Masculino" && (($resultado>=0 && $resultado<2.4) or ($resultado>8.5))){
        $estado="Malo";
    }elseif ($genero=="Femenino" && (($resultado>=0 && $resultado<1.5) or ($resultado>7.1))){
        $estado="Malo";
    }


    $sql2="insert into acido_urico values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$num_orden_exa_urico);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_urico);
    $sql2->bindValue(5,$observacione_urico);
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='acido_urico';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_urico);
    $sql3->bindValue(2,$num_orden_exa_urico);
    $sql3->execute();
}

public function editar_examenes_urico($resultado,$observacione_urico,$id_pac_exa_urico,$num_orden_exa_urico){

     $conectar=parent::conexion();
     
     $sql3="select genero from pacientes_o where id_paciente=?;";           
      $sql3=$conectar->prepare($sql3);
      $sql3->bindValue(1,$id_pac_exa_urico);
      $sql3->execute();
      $resultados = $sql3->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultados as $b=>$row){
         $re["existencia"] = $row["genero"];
      }            
    $genero = $row["genero"];
    if ($genero=="Masculino" && ($resultado>=3.4 && $resultado<=7.0)) {
        $estado="Bueno";
    }elseif ($genero=="Femenino" && ($resultado>=2.4 && $resultado<=5.7)) {
        $estado="Bueno";
    }elseif ($genero=="Masculino" && (($resultado<=3.3 && $resultado>=2.5) or ($resultado>=7.1 && $resultado<=8.5))){
        $estado="Intermedio";
    }elseif ($genero=="Femenino" && (($resultado<=1.5 && $resultado>=2.4) or ($resultado>=5.8 && $resultado<=7.0))){
        $estado="Intermedio";
    }elseif ($genero=="Masculino" && (($resultado>=0 && $resultado<2.4) or ($resultado>8.5))){
        $estado="Malo";
    }elseif ($genero=="Femenino" && (($resultado>=0 && $resultado<1.5) or ($resultado>7.1))){
        $estado="Malo";
    }


   
    $sql2="update acido_urico set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observacione_urico);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_urico);
    $sql2->bindValue(5,$num_orden_exa_urico);
    $sql2->execute();
}


/*=================INICIA EXAMEN=============================
====================CREATININA =============================*/
public function buscar_existe_creatinina($id_pac_exa_creatina,$num_orden_exa_creatina){
    $conectar= parent::conexion();
    $sql= "select*from creatinina where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_creatina);
    $sql->bindValue(2,$num_orden_exa_creatina);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}
public function registar_examenes_creatinina($resultado_creatinina,$observaciones_creatinina,$id_pac_exa_creatina,$num_orden_exa_creatina){

    $conectar=parent::conexion();

      $sql3="select genero from pacientes_o where id_paciente=?;";           
      $sql3=$conectar->prepare($sql3);
      $sql3->bindValue(1,$id_pac_exa_creatina);
      $sql3->execute();
      $resultados = $sql3->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultados as $b=>$row){
         $re["existencia"] = $row["genero"];
      }            
    $genero = $row["genero"];
    /*if ($genero=="Masculino" && ($resultado>=3.4 && $resultado<=7.0)) {
        $estado="Bueno";
    }elseif ($genero=="Femenino" && ($resultado>=2.4 && $resultado<=5.7)) {
        $estado="Bueno";
    }elseif ($genero=="Masculino" && (($resultado<=3.3 && $resultado>=2.5) or ($resultado>=7.1 && $resultado<=8.5))){
        $estado="Intermedio";
    }elseif ($genero=="Femenino" && (($resultado>=1.6 && $resultado<=2.3) or ($resultado>=5.8 && $resultado<=7.0))){
        $estado="Intermedio";
    }elseif ($genero=="Masculino" && (($resultado>=0 && $resultado<2.4) or ($resultado>8.5))){
        $estado="Malo";
    }elseif ($genero=="Femenino" && (($resultado>=0 && $resultado<1.5) or ($resultado>7.1))){
        $estado="Malo";
    }*/
    $estado="Bueno";


    $sql2="insert into creatinina values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_creatinina);
    $sql2->bindValue(2,$num_orden_exa_creatina);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_creatina);
    $sql2->bindValue(5,$observaciones_creatinina);
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='creatinina';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_creatina);
    $sql3->bindValue(2,$num_orden_exa_creatina);
    $sql3->execute();
}

public function editar_examenes_creatinina($resultado_creatinina,$observaciones_creatinina,$id_pac_exa_creatina,$num_orden_exa_creatina){

     $conectar=parent::conexion();
     
     $sql3="select genero from pacientes_o where id_paciente=?;";           
      $sql3=$conectar->prepare($sql3);
      $sql3->bindValue(1,$id_pac_exa_creatina);
      $sql3->execute();
      $resultados = $sql3->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultados as $b=>$row){
         $re["existencia"] = $row["genero"];
      }            
    $genero = $row["genero"];
    if ($genero=="Femenino" && ($resultado_creatinina>=0.50 && $resultado_creatinina<=0.90)) {
        $estado="Bueno";
    }elseif ($genero=="Masculino" && ($resultado_creatinina>=0.60 && $resultado_creatinina<=1.0)) {
        $estado="Bueno";
    }elseif ($genero=="Femenino" && (($resultado_creatinina<=0.50) or ($resultado_creatinina>=0.91 && $resultado_creatinina<=1.50))){
        $estado="Intermedio";
    }elseif ($genero=="Masculino" && (($resultado_creatinina<=0.60) or ($resultado_creatinina>=1.01 && $resultado_creatinina<=1.60))){
        $estado="Intermedio";
    }elseif ($genero=="Femenino" && $resultado_creatinina>=1.50){
        $estado="Malo";
    }elseif ($genero=="Masculino" && $resultado_creatinina>=1.60){
        $estado="Malo";
    }
   
    $sql2="update creatinina set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_creatinina);
    $sql2->bindValue(2,$observaciones_creatinina);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_creatina);
    $sql2->bindValue(5,$num_orden_exa_creatina);
    $sql2->execute();
}
/*===================INICIA EXAMEN ==========================
======================DE COLESTEROL==========================*/

public function buscar_existe_colesterol($id_pac_exa_colesterol,$num_orden_exa_colesterol){
    $conectar= parent::conexion();
    $sql= "select*from colesterol where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_colesterol);
    $sql->bindValue(2,$num_orden_exa_colesterol);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function registar_examenes_colesterol($resultado,$observaciones_colesterol,$id_pac_exa_colesterol,$num_orden_exa_colesterol,$fecha){
    $estado="0";
    $conectar=parent::conexion();
    $sql2="insert into colesterol values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$num_orden_exa_colesterol);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_colesterol);
    $sql2->bindValue(5,$observaciones_colesterol);    
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='colesterol';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_colesterol);
    $sql3->bindValue(2,$num_orden_exa_colesterol);
    $sql3->execute();
}
public function editar_examenes_colesterol($resultado,$observaciones_colesterol,$id_pac_exa_colesterol,$num_orden_exa_colesterol,$fecha){
    
    $conectar=parent::conexion();
    $sql2="update colesterol set resultado=?,observacione=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observaciones_colesterol);
    $sql2->bindValue(3,$id_pac_exa_colesterol);
    $sql2->bindValue(4,$num_orden_exa_colesterol);
    $sql2->execute();
}
/*===================INICIA EXAMEN ==========================
======================DE GLUCOSA=====================*/
////***************COMPROBAR SI EXISTE EXAMEN DE HEMATOLOGIA***********////
public function buscar_existe_glucosa($id_pac_exa_glucosa,$num_orden_exa_glucosa){
    $conectar= parent::conexion();
    $sql= "select*from glucosa where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_glucosa);
    $sql->bindValue(2,$num_orden_exa_glucosa);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }

public function registar_examenes_glucosa($resultado,$observacione_glucosa,$id_pac_exa_glucosa,$num_orden_exa_glucosa,$fecha){
    $estado="";

    if ($resultado>=75 and $resultado <=115) {
        $estado="Bueno";
    }elseif(($resultado>56 && $resultado<=115) or ($resultado>115 && $resultado<=150)){
        $estado="Intermedio";
    }elseif(($resultado>150) or ($resultado<55)){
        $estado="Malo";
    }


    $conectar=parent::conexion();
    $sql2="insert into glucosa values(null,?,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$num_orden_exa_glucosa);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_glucosa);
    $sql2->bindValue(5,$observacione_glucosa);
    $sql2->bindValue(6,$fecha);
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='glucosa';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_glucosa);
    $sql3->bindValue(2,$num_orden_exa_glucosa);
    $sql3->execute();
}

public function editar_examenes_glucosa($resultado,$observacione_glucosa,$id_pac_exa_glucosa,$num_orden_exa_glucosa,$fecha){
    $estado="0";
    $conectar=parent::conexion();
    $sql2="update glucosa set resultado=?,observacione=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observacione_glucosa);
    $sql2->bindValue(3,$id_pac_exa_glucosa);
    $sql2->bindValue(4,$num_orden_exa_glucosa);
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
**********************************INICIO DE EXAMEN ORINA*****************************                          
===================================================================================================*/
public function buscar_existe_orina($id_paciente,$numero_orden_paciente){
    $conectar= parent::conexion();
    $sql= "select*from examen_orina where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function agregar_examen_orina($color_orina,$olor_orina,$aspecto_orina,$densidad_orina,$esterasas_orina,$nitritos_orina,$ph_orina,$proteinas_orina,$glucosa_orina,$cetonas_orina,$urobilinogeno_orina,$bilirrubina_orina,$sangre_oculta_orina,$cilindros_orina,$leucocitos_orina,$hematies_orina,$epiteliales_orina,$filamentos_orina,$bacterias_orina,$cristales_orina,$observaciones_orina,$id_paciente,$numero_orden_paciente){

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
     #ACTUALIZA EL ESTADO DE DETALLE ORDEN ITEM
    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='orina';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden_paciente);
    $sql3->execute();
}
########EDITAR EXAMEN ORINA
public function editar_examen_orina($color_orina,$olor_orina,$aspecto_orina,$densidad_orina,$esterasas_orina,$nitritos_orina,$ph_orina,$proteinas_orina,$glucosa_orina,$cetonas_orina,$urobilinogeno_orina,$bilirrubina_orina,$sangre_oculta_orina,$cilindros_orina,$leucocitos_orina,$hematies_orina,$epiteliales_orina,$filamentos_orina,$bacterias_orina,$cristales_orina,$observaciones_orina,$id_paciente,$numero_orden_paciente){

    $conectar=parent::conexion();   

    $sql2="update examen_orina set color=?,olor=?,aspecto=?,densidad=?,est_leuco=?,ph=?,proteinas=?,glucosa=?,cetonas=?,urobigilogeno=?,bilirrubina=?,sangre_oculta=?,cilindros=?,leucocitos=?,hematies=?,cel_epiteliales=?,filamentos_muco=?,bacterias=?,cristales=?,observaciones=?,nitritos_orina=? where id_paciente=? and numero_orden=?;";

    $sql2=$conectar->prepare($sql2);    
    $sql2->bindValue(1,$color_orina);
    $sql2->bindValue(2,$olor_orina);
    $sql2->bindValue(3,$aspecto_orina);
    $sql2->bindValue(4,$densidad_orina);
    $sql2->bindValue(5,$esterasas_orina);
    $sql2->bindValue(6,$ph_orina);
    $sql2->bindValue(7,$proteinas_orina);
    $sql2->bindValue(8,$glucosa_orina);
    $sql2->bindValue(9,$cetonas_orina);
    $sql2->bindValue(10,$urobilinogeno_orina);
    $sql2->bindValue(11,$bilirrubina_orina);
    $sql2->bindValue(12,$sangre_oculta_orina);
    $sql2->bindValue(13,$cilindros_orina);
    $sql2->bindValue(14,$leucocitos_orina);
    $sql2->bindValue(15,$hematies_orina);
    $sql2->bindValue(16,$epiteliales_orina);
    $sql2->bindValue(17,$filamentos_orina);
    $sql2->bindValue(18,$bacterias_orina);
    $sql2->bindValue(19,$cristales_orina);
    $sql2->bindValue(20,$observaciones_orina);
    $sql2->bindValue(21,$nitritos_orina);
    $sql2->bindValue(22,$id_paciente);
    $sql2->bindValue(23,$numero_orden_paciente);
    $sql2->execute();
}

########SHOW DATA ORINA
public function show_datos_orina($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from examen_orina where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }
###########FINALIZAR ORINA
 public function finalizar_orina($id_paciente,$numero_orden){
        $conectar=parent::conexion();
        $sql2="update detalle_item_orden set estado='2' where id_paciente=? and numero_orden=? and examen='orina';";
        $sql2=$conectar->prepare($sql2);
        $sql2->bindValue(1,$id_paciente);
        $sql2->bindValue(2,$numero_orden);
        $sql2->execute();
    }

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


