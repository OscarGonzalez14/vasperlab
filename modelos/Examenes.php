<?php  
//conexion a la base de datos
require_once("../config/conexion.php");


class Examenes extends Conectar{  
////////////////////CLASE REGISTRA CPACIENTES
public function estado_examenes($id_paciente,$numero_orden,$exameness){
    $conectar= parent::conexion();
    $sql3='select estado from '.$exameness.' where id_paciente=? and numero_orden=?;';           
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden);
    $sql3->execute();
    return $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);
}

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
    if ($resultado>=0 and $resultado <=200) {
       $estado="Bueno";
    }elseif($resultado>=201 and $resultado <=300){
        $estado="Intermedio";
    }elseif($resultado>=301){
        $estado="Malo";
    }


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

    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_trigliceridos);
    $sql4->bindValue(2,$num_orden_exa_trigliceridos);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_trigliceridos);
        $sql6->bindValue(3,$num_orden_exa_trigliceridos);
        $sql6->execute();

    }
}

public function editar_examenes_trigliceridos($resultado,$observaciones_trigliceridos,$id_pac_exa_trigliceridos,$num_orden_exa_trigliceridos){

    $conectar=parent::conexion();

    if ($resultado>=0 and $resultado <=200) {
       $estado="Bueno";
    }elseif($resultado>=201 and $resultado <=300){
        $estado="Intermedio";
    }elseif($resultado>=301){
        $estado="Malo";
    }
    ////////////EDITAR L ESTADO DE DETALLE_ORDEN

    ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_trigliceridos);
    $sql->bindValue(2,$num_orden_exa_trigliceridos);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from trigliceridos where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_trigliceridos);
    $sql4->bindValue(2,$num_orden_exa_trigliceridos);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }


    $sql2="update trigliceridos set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observaciones_trigliceridos);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_trigliceridos);
    $sql2->bindValue(5,$num_orden_exa_trigliceridos);
    $sql2->execute();

    ###########ACTUALIZA ESTADO DE LA ORDEN
    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_trigliceridos);
    $sql6->bindValue(3,$num_orden_exa_trigliceridos);
    $sql6->execute();

}
///////////////////SHOW DATA TRIGLICRERIDOS
public function show_datos_trigliceridos($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from trigliceridos where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
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
/////////////////////GET ESTADO DE LA ORDEN
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_urico);
    $sql4->bindValue(2,$num_orden_exa_urico);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_urico);
        $sql6->bindValue(3,$num_orden_exa_urico);
        $sql6->execute();

    }
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
    }elseif ($genero=="Femenino" && (($resultado>=1.5 && $resultado<=2.4) or ($resultado>=5.8 && $resultado<=7.0))){
        $estado="Intermedio";
    }elseif ($genero=="Masculino" && (($resultado>=0 && $resultado<2.4) or ($resultado>8.5))){
        $estado="Malo";
    }elseif ($genero=="Femenino" && (($resultado>=0 && $resultado<1.5) or ($resultado>7.1))){
        $estado="Malo";
    }

    ////////////EDITAR L ESTADO DE DETALLE_ORDEN

    ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_urico);
    $sql->bindValue(2,$num_orden_exa_urico);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from acido_urico where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_urico);
    $sql4->bindValue(2,$num_orden_exa_urico);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }
   
    $sql2="update acido_urico set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observacione_urico);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_urico);
    $sql2->bindValue(5,$num_orden_exa_urico);
    $sql2->execute();


    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_urico);
    $sql6->bindValue(3,$num_orden_exa_urico);
    $sql6->execute();
}
##################show data acido urico############
public function show_datos_acido_urico($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from acido_urico where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
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
/////////////////////GET ESTADO DE LA ORDEN
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_creatina);
    $sql4->bindValue(2,$num_orden_exa_creatina);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_creatina);
        $sql6->bindValue(3,$num_orden_exa_creatina);
        $sql6->execute();


}
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

        ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_creatina);
    $sql->bindValue(2,$num_orden_exa_creatina);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from creatinina where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_creatina);
    $sql4->bindValue(2,$num_orden_exa_creatina);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }
   
    $sql2="update creatinina set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_creatinina);
    $sql2->bindValue(2,$observaciones_creatinina);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_creatina);
    $sql2->bindValue(5,$num_orden_exa_creatina);
    $sql2->execute();


    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_creatina);
    $sql6->bindValue(3,$num_orden_exa_creatina);
    $sql6->execute();
}

################show data creatinina################
public function show_datos_creatinina($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from creatinina where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
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
    if ($resultado>=0 and $resultado<=190) {
        $estado="Bueno";
    }elseif($resultado>=191 and $resultado<=250){
        $estado="Intermedio";
    }elseif($resultado>=251){
        $estado="Malo";
    }


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
/////////////////////GET ESTADO DE LA ORDEN
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_glucosa);
    $sql4->bindValue(2,$num_orden_exa_glucosa);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_colesterol);
        $sql6->bindValue(3,$num_orden_exa_colesterol);
        $sql6->execute();

    }

}
public function editar_examenes_colesterol($resultado,$observaciones_colesterol,$id_pac_exa_colesterol,$num_orden_exa_colesterol,$fecha){    
    $conectar=parent::conexion();

    if ($resultado>=0 and $resultado<=190) {
        $estado="Bueno";
    }elseif($resultado>=191 and $resultado<=250){
        $estado="Intermedio";
    }elseif($resultado>251){
        $estado="Malo";
    }

     ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_colesterol);
    $sql->bindValue(2,$num_orden_exa_colesterol);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from colesterol where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_colesterol);
    $sql4->bindValue(2,$num_orden_exa_colesterol);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }


    $sql2="update colesterol set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observaciones_colesterol);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_colesterol);
    $sql2->bindValue(5,$num_orden_exa_colesterol);
    $sql2->execute();

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_colesterol);
    $sql6->bindValue(3,$num_orden_exa_colesterol);
    $sql6->execute();

}
#######################SHOW DATA COLESTEROL####################

public function show_datos_colesterol($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from colesterol where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
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
    /////////////////////GET ESTADO DE LA ORDEN
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_glucosa);
    $sql4->bindValue(2,$num_orden_exa_glucosa);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_glucosa);
        $sql6->bindValue(3,$num_orden_exa_glucosa);
        $sql6->execute();

    }

}

public function editar_examenes_glucosa($resultado,$observacione_glucosa,$id_pac_exa_glucosa,$num_orden_exa_glucosa,$fecha){
    $conectar=parent::conexion();
        if ($resultado>=75 and $resultado <=115) {
        $estado="Bueno";
    }elseif(($resultado>=56 && $resultado<=74) or ($resultado>115 && $resultado<=150)){
        $estado="Intermedio";
    }elseif(($resultado>150) or ($resultado<55)){
        $estado="Malo";
    }


    ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_glucosa);
    $sql->bindValue(2,$num_orden_exa_glucosa);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from glucosa where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_glucosa);
    $sql4->bindValue(2,$num_orden_exa_glucosa);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }

    $conectar=parent::conexion();
    $sql2="update glucosa set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observacione_glucosa);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_glucosa);
    $sql2->bindValue(5,$num_orden_exa_glucosa);
    $sql2->execute();

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_glucosa);
    $sql6->bindValue(3,$num_orden_exa_glucosa);
    $sql6->execute();


}

/////////////GET DATOS GLUCOSA PARA FUNCION SHOW DATA
public function show_datos_glucosa($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from glucosa where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

//////////////REGISTRAR EXAMEN EXOFARINGEO
public function buscar_existe_exo($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql= "select*from exofaringeo where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}
public function editar_examenes_exo($aisla,$sensible,$resiste,$id_paciente,$numero_orden,$refiere){
    $conectar=parent::conexion();
    $sql2="update exofaringeo set aisla=?,sensible=?,resiste=?,refiere=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$aisla);
    $sql2->bindValue(2,$sensible);
    $sql2->bindValue(3,$resiste);
    $sql2->bindValue(4,$refiere);
    $sql2->bindValue(5,$id_paciente);
    $sql2->bindValue(6,$numero_orden);
    $sql2->execute();
}


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

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='exofaringeo';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden);
    $sql3->execute();
}
public function show_datos_exofaringeo($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from exofaringeo where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
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
    
    if (($hb_hemato>=12.5 && $hb_hemato<=17) &&($gb_hemato>=4500 && $gb_hemato<=10500)&&($plaquetas_hemato>=150000 && $plaquetas_hemato<= 400000)) {
        $estado="Bueno";
    }else{
        $estado="Malo";
    }



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

    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_paciente);
    $sql4->bindValue(2,$numero_orden);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_paciente);
        $sql6->bindValue(3,$numero_orden);
        $sql6->execute();

    }
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

    if (($hb_hemato>=12 && $hb_hemato<=17) &&($gb_hemato>=4500 && $gb_hemato<=10500)&&($plaquetas_hemato>=150000 && $plaquetas_hemato<= 400000)) {
        $estado="Bueno";
    }elseif(($hb_hemato<12) or ($gb_hemato<=4500 && $gb_hemato>=10500) or ($plaquetas_hemato<=150000 or $plaquetas_hemato>=40000)){
        $estado="Malo";
    }


        ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from hemograma where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_paciente);
    $sql4->bindValue(2,$numero_orden);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }

    

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

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_paciente);
    $sql6->bindValue(3,$numero_orden);
    $sql6->execute();

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

    $hematies_hecess=preg_replace("/[[:space:]]/"," ",trim($hematies_heces));
    $leucocitos_hecess=preg_replace("/[[:space:]]/"," ",trim($leucocitos_heces));
    $activos_hecess=preg_replace("/[[:space:]]/"," ",trim($activos_heces));
    $quistes_hecess = preg_replace("/[[:space:]]/"," ",trim($quistes_heces));
    $metazoarios_hecess=preg_replace("/[[:space:]]/"," ",trim($metazoarios_heces));

    $conectar=parent::conexion();
        if (($hematies_hecess=="No se observan" or $hematies_hecess=="no se observan") && ($leucocitos_hecess=="No se observan" or $leucocitos_hecess=="no se observan") &&($activos_hecess=="No se observan" or $activos_hecess=="no se observan") && ($quistes_hecess=="No se observan" or $quistes_hecess=="no se observan") && ($metazoarios_hecess=="No se observan" or $metazoarios_hecess=="no se observan")) {
        $estado="Bueno";
     }else{
        $estado="Malo";
     }  

    $sql2="insert into heces values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$numero_orden_paciente);
    $sql2->bindValue(2,$color_heces); 
    $sql2->bindValue(3,$consistencia_heces);
    $sql2->bindValue(4,$mucus_heces); 
    $sql2->bindValue(5,$macroscopicos_heces);
    $sql2->bindValue(6,$microscopicos_heces); 
    $sql2->bindValue(7,$hematies_hecess);
    $sql2->bindValue(8,$leucocitos_hecess); 
    $sql2->bindValue(9,$activos_hecess);
    $sql2->bindValue(10,$quistes_hecess);
    $sql2->bindValue(11,$metazoarios_hecess);
    $sql2->bindValue(12,$protozoarios_heces);
    $sql2->bindValue(13,$observaciones_heces);
    $sql2->bindValue(14,$id_paciente);
    $sql2->bindValue(15,$estado);
    $sql2->execute();
    #ACTUALIZA EL ESTADO DE DETALLE ORDEN ITEM
    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='heces';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden_paciente);
    $sql3->execute();

/////////////////////GET ESTADO DE LA ORDEN
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_paciente);
    $sql4->bindValue(2,$numero_orden_paciente);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_paciente);
        $sql6->bindValue(3,$numero_orden_paciente);
        $sql6->execute();

    }


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
public function editar_examen_heces($numero_orden_paciente,$color_heces,$consistencia_heces,$mucus_heces,$macroscopicos_heces,$microscopicos_heces,$hematies_heces,$leucocitos_heces,$activos_heces,$quistes_heces,$metazoarios_heces,$protozoarios_heces,$observaciones_heces,$id_paciente,$tratamiento_heces,$diagnostico_heces){

    $conectar=parent::conexion();

    $hematies_hecess=preg_replace("/[[:space:]]/"," ",trim($hematies_heces));
    $leucocitos_hecess=preg_replace("/[[:space:]]/"," ",trim($leucocitos_heces));
    $activos_hecess=preg_replace("/[[:space:]]/"," ",trim($activos_heces));
    $quistes_hecess = preg_replace("/[[:space:]]/"," ",trim($quistes_heces));
    $metazoarios_hecess=preg_replace("/[[:space:]]/"," ",trim($metazoarios_heces));

    $conectar=parent::conexion();
        if (($hematies_hecess=="No se observan" or $hematies_hecess=="no se observan") && ($leucocitos_hecess=="No se observan" or $leucocitos_hecess=="no se observan") &&($activos_hecess=="No se observan" or $activos_hecess=="no se observan") && ($quistes_hecess=="No se observan" or $quistes_hecess=="no se observan") && ($metazoarios_hecess=="No se observan" or $metazoarios_hecess=="no se observan")) {
        $estado="Bueno";
     }else{
        $estado="Malo";
     }

    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden_paciente);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from heces where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_paciente);
    $sql4->bindValue(2,$numero_orden_paciente);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    } 

    $sql2="update heces set color=?,consistencia=?,mucus=?,macroscopicos=?,microscopicos=?,hematies=?,leucocitos=?,protozoarios=?,activos=?,quistes=?,metazoarios=?,observaciones=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$color_heces);
    $sql2->bindValue(2,$consistencia_heces);
    $sql2->bindValue(3,$mucus_heces);
    $sql2->bindValue(4,$macroscopicos_heces);
    $sql2->bindValue(5,$microscopicos_heces);
    $sql2->bindValue(6,$hematies_hecess);
    $sql2->bindValue(7,$leucocitos_hecess);
    $sql2->bindValue(8,$protozoarios_heces);
    $sql2->bindValue(9,$activos_hecess);
    $sql2->bindValue(10,$quistes_hecess);
    $sql2->bindValue(11,$metazoarios_hecess);
    $sql2->bindValue(12,$observaciones_heces);
    $sql2->bindValue(13,$estado);
    $sql2->bindValue(14,$id_paciente);
    $sql2->bindValue(15,$numero_orden_paciente);    
    $sql2->execute();

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_paciente);
    $sql6->bindValue(3,$numero_orden_paciente);
    $sql6->execute();

    $examen = "Heces";
    $sql7 = "insert into diagnosticos values(null,?,?,?,?,?);";
    $sql7 = $conectar->prepare($sql7);
    $sql7->bindValue(1,$examen);
    $sql7->bindValue(2,$diagnostico_heces);
    $sql7->bindValue(3,$tratamiento_heces);
    $sql7->bindValue(4,$id_paciente);
    $sql7->bindValue(5,$numero_orden_paciente);
    $sql7->execute();
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
    $conectar= parent::conexion();
    $esterasas_orinass=preg_replace("/[[:space:]]/"," ",trim($esterasas_orina));
    $nitritos_orinass=preg_replace("/[[:space:]]/"," ",trim($nitritos_orina));
    $sangre_oculta_orinas=preg_replace("/[[:space:]]/"," ",trim($sangre_oculta_orina));
    $bacterias_orinass=preg_replace("/[[:space:]]/"," ",trim($bacterias_orina));

    if (($esterasas_orinass=="Negativo" or $esterasas_orinass=="negativo") && ($nitritos_orinas=="Negativo" or $nitritos_orinas=="negativo") && ($glucosa_orina=="Negativo" or $glucosa_orinas=="negativo") && ($sangre_oculta_orinas=="Negativo" or $sangre_oculta_orinas=="negativo") && ($bacterias_orinas=="No se observan" or $bacterias_orinas=="no se observan")) {
           $estado ="Bueno";
       }else{
        $estado="Malo";
       }   

    $sql2="insert into examen_orina values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $sql2=$conectar->prepare($sql2); 
    //$sql2->bindValue(1,$numero_orden_diario);
    $sql2->bindValue(1,$numero_orden_paciente);
    $sql2->bindValue(2,$color_orina); 
    $sql2->bindValue(3,$olor_orina);
    $sql2->bindValue(4,$aspecto_orina); 
    $sql2->bindValue(5,$densidad_orina); 
    $sql2->bindValue(6,$esterasas_orinass);

    $sql2->bindValue(7,$ph_orina); 
    $sql2->bindValue(8,$proteinas_orina);
    $sql2->bindValue(9,$glucosa_orina); 
    $sql2->bindValue(10,$cetonas_orina); 
    $sql2->bindValue(11,$urobilinogeno_orina);              

    $sql2->bindValue(12,$bilirrubina_orina);
    $sql2->bindValue(13,$sangre_oculta_orinas);
    $sql2->bindValue(14,$cilindros_orina);
    $sql2->bindValue(15,$leucocitos_orina);
    $sql2->bindValue(16,$hematies_orina);

    $sql2->bindValue(17,$epiteliales_orina);
    $sql2->bindValue(18,$filamentos_orina);
    $sql2->bindValue(19,$bacterias_orinass);
    $sql2->bindValue(20,$cristales_orina);
    $sql2->bindValue(21,$observaciones_orina);
    $sql2->bindValue(22,$id_paciente);
    $sql2->bindValue(23,$nitritos_orinass);
    $sql2->bindValue(24,$estado);
              
    $sql2->execute();
     #ACTUALIZA EL ESTADO DE DETALLE ORDEN ITEM
    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='orina';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_paciente);
    $sql3->bindValue(2,$numero_orden_paciente);
    $sql3->execute();

    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_paciente);
    $sql4->bindValue(2,$numero_orden_paciente);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_paciente);
        $sql6->bindValue(3,$numero_orden_paciente);
        $sql6->execute();

    }
    
}
########EDITAR EXAMEN ORINA
public function editar_examen_orina($color_orina,$olor_orina,$aspecto_orina,$densidad_orina,$esterasas_orina,$nitritos_orina,$ph_orina,$proteinas_orina,$glucosa_orina,$cetonas_orina,$urobilinogeno_orina,$bilirrubina_orina,$sangre_oculta_orina,$cilindros_orina,$leucocitos_orina,$hematies_orina,$epiteliales_orina,$filamentos_orina,$bacterias_orina,$cristales_orina,$observaciones_orina,$id_paciente,$numero_orden_paciente,$tratamiento_orina,$diagnostico_orina){

    $conectar=parent::conexion();
    $esterasas_orinass=preg_replace("/[[:space:]]/"," ",trim($esterasas_orina));
    $nitritos_orinass=preg_replace("/[[:space:]]/"," ",trim($nitritos_orina));
    $sangre_oculta_orinas=preg_replace("/[[:space:]]/"," ",trim($sangre_oculta_orina));
    $bacterias_orinass=preg_replace("/[[:space:]]/"," ",trim($bacterias_orina));

    if (($esterasas_orinass=="Negativo" or $esterasas_orinass=="negativo") && ($nitritos_orinass=="Negativo" or $nitritos_orinass=="negativo") && ($glucosa_orina=="Negativo" or $glucosa_orinas=="negativo") && ($sangre_oculta_orinas=="Negativo" or $sangre_oculta_orinas=="negativo") && ($bacterias_orinass=="No se observan" or $bacterias_orinass=="no se observan")) {
           $estado ="Bueno";
       }else{
        $estado="Malo";
       } 

   ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->bindValue(2,$numero_orden_paciente);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    $sql4="select estado from examen_orina where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_paciente);
    $sql4->bindValue(2,$numero_orden_paciente);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }


    $sql2="update examen_orina set color=?,olor=?,aspecto=?,densidad=?,est_leuco=?,ph=?,proteinas=?,glucosa=?,cetonas=?,urobigilogeno=?,bilirrubina=?,sangre_oculta=?,cilindros=?,leucocitos=?,hematies=?,cel_epiteliales=?,filamentos_muco=?,bacterias=?,cristales=?,observaciones=?,nitritos_orina=?,estado=? where id_paciente=? and numero_orden=?;";

    $sql2=$conectar->prepare($sql2);    
    $sql2->bindValue(1,$color_orina);
    $sql2->bindValue(2,$olor_orina);
    $sql2->bindValue(3,$aspecto_orina);
    $sql2->bindValue(4,$densidad_orina);
    $sql2->bindValue(5,$esterasas_orinass);
    $sql2->bindValue(6,$ph_orina);
    $sql2->bindValue(7,$proteinas_orina);
    $sql2->bindValue(8,$glucosa_orina);
    $sql2->bindValue(9,$cetonas_orina);
    $sql2->bindValue(10,$urobilinogeno_orina);
    $sql2->bindValue(11,$bilirrubina_orina);
    $sql2->bindValue(12,$sangre_oculta_orinas);
    $sql2->bindValue(13,$cilindros_orina);
    $sql2->bindValue(14,$leucocitos_orina);
    $sql2->bindValue(15,$hematies_orina);
    $sql2->bindValue(16,$epiteliales_orina);
    $sql2->bindValue(17,$filamentos_orina);
    $sql2->bindValue(18,$bacterias_orinass);
    $sql2->bindValue(19,$cristales_orina);
    $sql2->bindValue(20,$observaciones_orina);
    $sql2->bindValue(21,$nitritos_orinass);
    $sql2->bindValue(22,$estado);
    $sql2->bindValue(23,$id_paciente);
    $sql2->bindValue(24,$numero_orden_paciente);
    $sql2->execute();


    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_paciente);
    $sql6->bindValue(3,$numero_orden_paciente);
    $sql6->execute();

    $examen = "Orina";
    $sql7 = "insert into diagnosticos values(null,?,?,?,?,?);";
    $sql7 = $conectar->prepare($sql7);
    $sql7->bindValue(1,$examen);
    $sql7->bindValue(2,$diagnostico_orina);
    $sql7->bindValue(3,$tratamiento_orina);
    $sql7->bindValue(4,$id_paciente);
    $sql7->bindValue(5,$numero_orden_paciente);
    $sql7->execute();
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
/*==========================INICIO SGOT===============*/
public function buscar_existe_sgot($id_pac_exa_sgot,$num_orden_exa_sgot){
    $conectar= parent::conexion();
    $sql= "select*from sgot where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_sgot);
    $sql->bindValue(2,$num_orden_exa_sgot);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }


public function registar_examenes_sgot($resultado_sgot,$observacione_sgot,$id_pac_exa_sgot,$num_orden_exa_sgot){
    
    $conectar=parent::conexion();

    if ($resultado_sgot>=8 and $resultado_sgot <=33.00) {
        $estado="Bueno";
    }elseif($resultado_sgot>34 && $resultado_sgot<=40){
        $estado="Intermedio";
    }elseif($resultado_sgot>40){
        $estado="Malo";
    }

    $sql2="insert into sgot values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_sgot);
    $sql2->bindValue(2,$num_orden_exa_sgot);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_sgot);
    $sql2->bindValue(5,$observacione_sgot);
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='sgot';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_sgot);
    $sql3->bindValue(2,$num_orden_exa_sgot);
    $sql3->execute();

///////////////////////////GET ESTADO DE LA ORDEN/////////////
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_sgot);
    $sql4->bindValue(2,$num_orden_exa_sgot);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_sgot);
        $sql6->bindValue(3,$num_orden_exa_sgot);
        $sql6->execute();

    }
}

public function editar_examenes_sgot($resultado_sgot,$observacione_sgot,$id_pac_exa_sgot,$num_orden_exa_sgot){

    $conectar=parent::conexion();
    

    if ($resultado_sgot>=8 and $resultado_sgot <=33.00) {
        $estado="Bueno";
    }elseif($resultado_sgot>34 && $resultado_sgot<=40){
        $estado="Intermedio";
    }elseif($resultado_sgot>40){
        $estado="Malo";
    }

    ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_sgot);
    $sql->bindValue(2,$num_orden_exa_sgot);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from sgot where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_sgot);
    $sql4->bindValue(2,$num_orden_exa_sgot);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }


    $sql2="update sgot set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_sgot);
    $sql2->bindValue(2,$observacione_sgot);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_sgot);
    $sql2->bindValue(5,$num_orden_exa_sgot);
    $sql2->execute();

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_sgot);
    $sql6->bindValue(3,$num_orden_exa_sgot);
    $sql6->execute();
}
##################sgor data show##########
public function show_datos_sgot($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from sgot where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

///=========================INICIO SGPT========================
public function buscar_existe_sgpt($id_pac_exa_sgpt,$num_orden_exa_sgpt){
    $conectar= parent::conexion();
    $sql= "select*from sgpt where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_sgpt);
    $sql->bindValue(2,$num_orden_exa_sgpt);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }

public function registar_examenes_sgpt($resultado_sgpt,$observacione_sgpt,$id_pac_exa_sgpt,$num_orden_exa_sgpt){
    
    $conectar=parent::conexion();

    if ($resultado_sgpt>=3 and $resultado_sgpt <=35) {
        $estado="Bueno";
    }elseif($resultado_sgpt>36 && $resultado_sgpt<=42){
        $estado="Intermedio";
    }elseif($resultado_sgpt>43){
        $estado="Malo";
    }

    $sql2="insert into sgpt values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_sgpt);
    $sql2->bindValue(2,$num_orden_exa_sgpt);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_sgpt);
    $sql2->bindValue(5,$observacione_sgpt);
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='sgpt';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_sgpt);
    $sql3->bindValue(2,$num_orden_exa_sgpt);
    $sql3->execute();
    /////////////////////GET ESTADO DE LA ORDEN
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_sgpt);
    $sql4->bindValue(2,$num_orden_exa_sgpt);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_sgpt);
        $sql6->bindValue(3,$num_orden_exa_sgpt);
        $sql6->execute();

}
}
public function editar_examenes_sgpt($resultado_sgpt,$observacione_sgpt,$id_pac_exa_sgpt,$num_orden_exa_sgpt){

    $conectar=parent::conexion();
    
    if ($resultado_sgpt>=3 and $resultado_sgpt <=35) {
        $estado="Bueno";
    }elseif($resultado_sgpt>36 && $resultado_sgpt<=42){
        $estado="Intermedio";
    }elseif($resultado_sgpt>43){
        $estado="Malo";
    }

##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_sgpt);
    $sql->bindValue(2,$num_orden_exa_sgpt);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from sgpt where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_sgpt);
    $sql4->bindValue(2,$num_orden_exa_sgpt);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }

    $sql2="update sgpt set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_sgpt);
    $sql2->bindValue(2,$observacione_sgpt);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_sgpt);
    $sql2->bindValue(5,$num_orden_exa_sgpt);
    $sql2->execute();

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_sgpt);
    $sql6->bindValue(3,$num_orden_exa_sgpt);
    $sql6->execute();
}

##################SGPT SHOW DATA######
public function show_datos_sgpt($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from sgpt where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }
/*==================REGISTRO DE EXAMEN DE BACILOSCOPIA=========*/

public function buscar_existe_baciloscopia($id_pac_exa_baciloscopia,$num_orden_exa_baciloscopia){
    $conectar= parent::conexion();
    $sql= "select*from baciloscopia where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_baciloscopia);
    $sql->bindValue(2,$num_orden_exa_baciloscopia);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function registar_examenes_baciloscopia($resultado,$observaciones_baciloscopia,$id_pac_exa_baciloscopia,$num_orden_exa_baciloscopia){
    if ($resultado=="Positivo" or $resultado=="positivo") {
        $estado="Malo";
    }else{
        $estado="Bueno";
    }


    $conectar=parent::conexion();
    $sql2="insert into baciloscopia values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$num_orden_exa_baciloscopia);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_baciloscopia);
    $sql2->bindValue(5,$observaciones_baciloscopia);
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='baciloscopia';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_baciloscopia);
    $sql3->bindValue(2,$num_orden_exa_baciloscopia);
    $sql3->execute();

    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_baciloscopia);
    $sql4->bindValue(2,$num_orden_exa_baciloscopia);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_baciloscopia);
        $sql6->bindValue(3,$num_orden_exa_baciloscopia);
        $sql6->execute();

    }
}

public function buscar_existe_antigenos($id_pac_exa_antigenos,$num_orden_exa_antigenos){

    $conectar= parent::conexion();
    $sql= "select*from antigenos where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_antigenos);
    $sql->bindValue(2,$num_orden_exa_antigenos);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function registar_examenes_antigenos($muestra_antigenos,$resultado,$observaciones_antigenos,$id_pac_exa_antigenos,$num_orden_exa_antigenos){
    $conectar=parent::conexion();
    date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");
    $sql2="insert into antigenos values(null,?,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$muestra_antigenos);
    $sql2->bindValue(2,$resultado);
    $sql2->bindValue(3,$num_orden_exa_antigenos);
    $sql2->bindValue(4,$id_pac_exa_antigenos);
    $sql2->bindValue(5,$observaciones_antigenos);
    $sql2->bindValue(6,$hoy);
    $sql2->execute();
}

public function editar_examenes_antigenos($muestra_antigenos,$resultado,$observaciones_antigenos,$id_pac_exa_antigenos,$num_orden_exa_antigenos){

    $conectar=parent::conexion();

    $sql2="update antigenos set muestra=?,resultado=?,observaciones=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$muestra_antigenos);
    $sql2->bindValue(2,$resultado);
    $sql2->bindValue(3,$observaciones_antigenos);
    $sql2->bindValue(4,$id_pac_exa_antigenos);
    $sql2->bindValue(5,$num_orden_exa_antigenos);
    $sql2->execute();


}


public function editar_examenes_baciloscopia($resultado,$observaciones_baciloscopia,$id_pac_exa_baciloscopia,$num_orden_exa_baciloscopia){
    $conectar=parent::conexion();
    if ($resultado=="Positivo" or $resultado=="positivo") {
        $estado="Malo";
    }else{
        $estado="Bueno";
    }

    ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_baciloscopia);
    $sql->bindValue(2,$num_orden_exa_baciloscopia);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from baciloscopia where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_baciloscopia);
    $sql4->bindValue(2,$num_orden_exa_baciloscopia);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }


    $sql2="update baciloscopia set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado);
    $sql2->bindValue(2,$observaciones_baciloscopia);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_baciloscopia);
    $sql2->bindValue(5,$num_orden_exa_baciloscopia);
    $sql2->execute();

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_baciloscopia);
    $sql6->bindValue(3,$num_orden_exa_baciloscopia);
    $sql6->execute();
}
#################SHOW DATA BACILOSCOPIa##########
public function show_datos_baciloscopia($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from baciloscopia where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
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
$sql= "select p.nombre,p.empresa,d.examen,d.numero_orden,p.empresa,p.departamento,d.fecha,d.estado,p.id_paciente from pacientes_o as p inner join detalle_item_orden as d on d.id_paciente=p.id_paciente where d.id_paciente=? and d.numero_orden=?;";
$sql=$conectar->prepare($sql);
$sql->bindValue(1,$id_paciente);
$sql->bindValue(2,$numero_orden);
$sql->execute();
return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

/////////////////////////INICIAR EXAMEN RPR
public function buscar_existe_rpr($id_pac_exa_rpr,$num_orden_exa_rpr){
    $conectar= parent::conexion();
    $sql= "select*from rpr where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_rpr);
    $sql->bindValue(2,$num_orden_exa_rpr);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }

public function registar_examenes_rpr($resultado_rpr,$observaciones_rpr,$id_pac_exa_rpr,$num_orden_exa_rpr){

    if($resultado_rpr == "Reactivo" or $resultado_rpr=="REACTIVO" or $resultado_rpr=="Reactivo"){
      $estado="Malo";  
    }else{
    $estado="Bueno";
    }
    $conectar=parent::conexion();


    $sql2="insert into rpr values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_rpr);
    $sql2->bindValue(2,$num_orden_exa_rpr);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_rpr);
    $sql2->bindValue(5,$observaciones_rpr);
    
    $sql2->execute();

    $sql3="update detalle_item_orden set estado='1' where id_paciente=? and numero_orden=? and examen='vdrl';";
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$id_pac_exa_rpr);
    $sql3->bindValue(2,$num_orden_exa_rpr);
    $sql3->execute();

        /////////////////////GET ESTADO DE LA ORDEN
    $sql4="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_rpr);
    $sql4->bindValue(2,$num_orden_exa_rpr);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    if ($estado=="Malo") {
        $esta=$state+1;
        $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
        $sql6=$conectar->prepare($sql6);
        $sql6->bindValue(1,$esta);
        $sql6->bindValue(2,$id_pac_exa_rpr);
        $sql6->bindValue(3,$num_orden_exa_rpr);
        $sql6->execute();

    }
}

public function editar_examenes_rpr($resultado_rpr,$observaciones_rpr,$id_pac_exa_rpr,$num_orden_exa_rpr){

    if($resultado_rpr == "Reactivo" or $resultado_rpr=="REACTIVO" or $resultado_rpr=="Reactivo"){
      $estado="Malo";  
    }else{
    $estado="Bueno";
    }

    $conectar=parent::conexion();
 ##########SELECCIONAR EL ESTADO ACTUAL DE ORDEN#######
    $sql="select estado from detalle_orden where id_paciente=? and numero_orden=?;";           
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_pac_exa_rpr);
    $sql->bindValue(2,$num_orden_exa_rpr);
    $sql->execute();
    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $state=$row["estado"];

    ###############SELECCIONAR ESTADO ACTUAL DEL EXAMEN
    $sql4="select estado from rpr where id_paciente=? and numero_orden=?;";           
    $sql4=$conectar->prepare($sql4);
    $sql4->bindValue(1,$id_pac_exa_rpr);
    $sql4->bindValue(2,$num_orden_exa_rpr);
    $sql4->execute();
    $resultados = $sql4->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $b=>$row){
        $re["est"] = $row["estado"];
    }
    $estado_act=$row["estado"];
    
    if($estado_act=="Malo" and ($estado=="Bueno" or $estado=="Intermedio")) {
          $estado_orden=$state-1;  
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and $estado=="Malo"){
          $estado_orden=$state+1;
    }elseif ($estado_act=="Malo" and $estado=="Malo") {
        $estado_orden=$state;
    }elseif(($estado_act=="Bueno" or $estado_act=="Intermedio") and ($estado=="Bueno" or $estado=="Intermedio")){
        $estado_orden=$state;
    }


    $sql2="update rpr set resultado=?,observacione=?,estado=? where id_paciente=? and numero_orden=?;";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_rpr);
    $sql2->bindValue(2,$observaciones_rpr);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_rpr);
    $sql2->bindValue(5,$num_orden_exa_rpr);
    $sql2->execute();

    $sql6="update detalle_orden set estado=? where id_paciente=? and numero_orden=?;";
    $sql6=$conectar->prepare($sql6);
    $sql6->bindValue(1,$estado_orden);
    $sql6->bindValue(2,$id_pac_exa_rpr);
    $sql6->bindValue(3,$num_orden_exa_rpr);
    $sql6->execute();

}
#################SHOW DATA RPR
public function show_datos_rpr($id_paciente,$numero_orden){
    $conectar= parent::conexion();
    $sql="select*from rpr where id_paciente=? and numero_orden=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->bindValue(2, $numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

public function registrar_hdl($resultado_hdl,$observaciones_hdl,$id_pac_exa_hdl,$num_orden_exa_hdl){
    
    $estado = "";
    $conectar= parent::conexion();
    $sql2="insert into hdl values(null,?,?,?,?,?);";
    $sql2=$conectar->prepare($sql2);
    $sql2->bindValue(1,$resultado_hdl);
    $sql2->bindValue(2,$num_orden_exa_hdl);
    $sql2->bindValue(3,$estado);
    $sql2->bindValue(4,$id_pac_exa_hdl);
    $sql2->bindValue(5,$observaciones_hdl);
    $sql2->execute();

}

}//FIN DE LA CLASE


