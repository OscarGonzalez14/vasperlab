<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

require_once("modelos/Reporteria.php");
$reporteria=new Reporteria();
$id_paciente =$_GET["id_paciente"];
$n_orden =$_GET["numero_orden"];
$categoria =$_GET["categoria"];
$paciente =$_GET["nombre"];

/*$datos_det_orden_paciente = $reporteria->get_detalle_orden_pacientes($_GET["id_paciente"],$_GET["n_orden"]);
$datos_item_examenes = $reporteria->datos_item_examenes($_GET["id_paciente"],$_GET["n_orden"]);
$get_categorias = $reporteria->get_categorias($_GET["id_paciente"],$_GET["n_orden"]);*/

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style>
      html{
        margin-top: 0;
        margin-left: 28px;
        margin-right:20px; 
        margin-bottom: 0;
    }
    .stilot1{
       border: 1px solid black;
       padding: 5px;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
       border-collapse: collapse;
       text-align: center;
    }

    .stilot2{
       border: 1px solid black;
       text-align: center;
       font-size: 11px;
       font-family: Helvetica, Arial, sans-serif;
    }
    .stilot3{
       text-align: center;
       font-size: 11px;
       font-family: Helvetica, Arial, sans-serif;
    }

    .table2 {
       border-collapse: collapse;
    }
   </style>
  </head>
  <body>

<div style="margin-top:0px;height:200px" >
  <table style="width: 100%;">
   <tr>
      <td width="10%"><h1 style="text-align: left; margin-right:20px;"><img src="images/vasperlogo.png" width="100" height="50"/></h1></td>

    <td width="60%">
       <table style="width:95%;">
           <tr>
             <td style="text-align:center; font-size:16px"><strong>LABORATORIO CLINICO VASPER</strong> || <strong>Lic. Carlos Andrés Vásquez Peraza</strong></td>
           </tr>
           <tr>
              <td style="text-align:center; font-size:12px">Calle Francisco Gavidia y Final Calle Gerardo Barrios #9-A, Ciudad Arce<span id="date"></span><span>Telefonos: 23330-9801&nbsp;&nbsp;</span><br>E-mail: labclinicovasper@gmail.com&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:center; font-size:11px"><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?></span></td>
            </tr>
        </table><!--fin segunda tabla-->
    </td>
    <td width="10%">      
    <table>
      
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna-->
</tr>
</table>
<div>
<?php
//echo $categoria;
if ($categoria=="quimica") {
  require_once("plantillas/quimica.php");
}elseif ($categoria=="heces") {
  require_once("resultados/heces.php");
}
elseif ($categoria=="orina") {
  require_once("resultados/orina.php");
}elseif($categoria=="bacteriologia"){
  require_once("plantillas/bacteriologia.php");
}elseif($categoria=="hemograma"){
  require_once("resultados/hemograma.php");
}
?>
</div>

</body>
</html>
<?php
$salida_html = ob_get_contents();

  //$user=$_SESSION["id_usuario"];

  ob_end_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($salida_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$dompdf->stream('document', array('Attachment'=>'0'));
?>