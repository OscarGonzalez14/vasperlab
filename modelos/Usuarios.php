<?php
require_once("config/conexion.php");


class Usuarios extends Conectar{
public function login(){
  $conectar=parent::conexion();
  parent::set_names();
  if(isset($_POST["enviar"])){
//********VALIDACIONES  DE ACCESO*****************
  $password = $_POST["password"];
  $usuario = $_POST["usuario"];
  //$sucursal_login = $_POST["sucursal_login"];

  if(empty($usuario) or empty($password)){
      header("Location:".Conectar::ruta()."index.php?m=2");
      exit();
    }else {
      
      $sql= "select * from usuarios_vasper where usuario=? and password=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usuario);
        $sql->bindValue(2, $password);
        $sql->execute();
        $resultado = $sql->fetch();

    if(is_array($resultado) and count($resultado)>0){
        $_SESSION["id_usuario"] = $resultado["id_usuario"];           
        $_SESSION["usuario"] = $resultado["usuario"];
        header("Location:".Conectar::ruta()."resultados_empresarial.php");

      exit();
    } else {                         
    //si no existe el registro entonces le aparece un mensaje
    header("Location:".Conectar::ruta()."index.php?m=1");
    exit();
    } 
  }//cierre del else
  }//condicion enviar
}///FIN FUNCION LOGIN


public function login_u(){
  $conectar=parent::conexion();
  parent::set_names();

  if(isset($_POST["enviar_dos"])){ 
//********VALIDACIONES  DE ACCESO*****************
  $contrasena = $_POST["contrasena"];
  $user = $_POST["user"];
  //$sucursal_login = $_POST["sucursal_login"];

  if(empty($user)){
      header("Location: login.php?m=2");
      exit();
    }else {
        $_SESSION["usuario"] = 'indufoam';

      
      /*$sql="select * from usuarios_vasper where usuario=? and password=?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $user);
        $sql->bindValue(2, $contrasena);
        $sql->execute();
        $resultado = $sql->fetch();*/

    /*if(is_array($resultado) and count($resultado)>0){
        $_SESSION["id_usuario"] = $resultado["id_usuario"];*/           

        header("Location: examenes.php");

     /* exit();
    } else {                         
    //si no existe el registro entonces le aparece un mensaje
    header("Location: login.php?m=1");
    exit();
    } */
  }//cierre del else
  }//condicion enviar
}///FIN FUNCION LOGIN


public function login_usuarios(){
  $conectar=parent::conexion();
  parent::set_names();
    if(isset($_POST["enviar"])){
  //*****************VALIDACIONES  DE ACCESO*****************
        //$password = $_POST["pwd"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
//********************FIN VALIDACIONES  DE ACCESO************

        

        if(empty($usuario) and empty($password)){

        header("Location:index.php");
        exit();
        }else {

        $sql= "select * from usuarios_vasper where usuario=? and password=?;";

          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $usuario);
          $sql->bindValue(2, $password);               
          $sql->execute();
          $resultado = $sql->fetch();
          if(is_array($resultado) and count($resultado)>0){
          $_SESSION["nombres"] = $resultado["nombres"];
          $_SESSION["usuario"] = $resultado["usuario"];
        header("Location: resultados_empresarial.php");

              exit();


          } else {
                          
               //si no existe el registro entonces le aparece un mensaje
                          header("Location: index.php");
              exit();
            } 
                  
        }//cierre del else


}//condicion enviar
        }    

}
