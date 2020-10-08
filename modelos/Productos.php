<?php

require_once("../config/conexion.php");


class Productos extends Conectar
{//////inicio de la clase

public function registrar_aro($marca_aros,$modelo_aro,$color_aro,$medidas_aro,$diseno_aro,$materiales_aro,$cat_venta_aros,$categoria_producto){

  $mat_aro='';
  $dis_aro='';

    $conectar= parent::conexion();
    parent::set_names();
    $sql="insert into productos values(null,?,?,?,?,?,?,?,?);";          
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $_POST["modelo_aro"]);
    $sql->bindValue(2, $_POST["marca_aros"]);
    $sql->bindValue(3, $_POST["color_aro"]);
    $sql->bindValue(4, $_POST["medidas_aro"]);
    $sql->bindValue(5, $_POST["categoria_producto"]);
    $sql->bindValue(6, $_POST["materiales_aro"]);
    $sql->bindValue(7, $_POST["diseno_aro"]);;
    $sql->bindValue(8, $_POST["cat_venta_aros"]);
    $sql->execute();
      
}

public function get_aros(){
    $conectar= parent::conexion();         
    $sql= "select*from producto where categoria='aros' order by id_producto DESC;";
    $sql=$conectar->prepare($sql);
    //$sql->bindValue(1, $sucursal_correlativo);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}//////Fin de la clase




