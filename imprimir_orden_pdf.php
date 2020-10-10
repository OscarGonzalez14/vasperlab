<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

require_once("modelos/Reporteria.php");
$reporteria=new Reporteria();
$id_paciente =$_GET["id_paciente"];
$n_orden =$_GET["n_orden"];

$datos_det_orden_paciente = $reporteria->get_detalle_orden_pacientes($_GET["id_paciente"],$_GET["n_orden"]);
$datos_item_examenes = $reporteria->datos_item_examenes($_GET["id_paciente"],$_GET["n_orden"]);

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

<div style="margin-top:10px;height:200px" >
  <table width="100%" class="table2">
    <tr>
      <?php

  for($i=0;$i<sizeof($datos_det_orden_paciente);$i++){

?>
  <td colspan="15" style="color:black;font-size:11px;font-family: Helvetica, Arial, sans-serif;width: 15%" class="stilot1"><strong>CÓDIGO:</strong> <?php echo $datos_det_orden_paciente[$i]["cod_emp"];?></td>

    <td colspan="25" style="color:black;font-family: Helvetica, Arial, sans-serif;width: 25%" class="stilot1"><strong>NOMBRE:</strong> <?php echo $datos_det_orden_paciente[$i]["nombre"];?></td>

    <td colspan="25" style="color:black;font-family: Helvetica, Arial, sans-serif;width: 25%" class="stilot1"><strong>EMPRESA:</strong> <?php echo $datos_det_orden_paciente[$i]["empresa"];?></td>
    <td colspan="35" style="color:black;font-size:11px;font-family: Helvetica, Arial, sans-serif;width: 35%" class="stilot1"><strong>DEPARTAMENTO:</strong> <?php echo $datos_det_orden_paciente[$i]["departamento"];?></td>
    <?php
  }
?>
</tr>
<tr>
  <td colspan="100" style="text-align: center" class="stilot1">EXAMENES</td>
</tr>
<tr style="height:50px;">
  <td colspan="100" style="border: 1px solid black;font-family: Helvetica, Arial, sans-serif;font-size: 12px;text-align: center;margin:20px;height: 85px;white-space: wrap;" align="center">
 <?php 
    for ($i=0; $i < sizeof($datos_item_examenes); $i++) {
      $id=$i+1;      
     echo "<b>".$id."."."</b>".ucfirst($datos_item_examenes[$i]["examen"])."&nbsp;&nbsp;&nbsp;";
     if($i == 5){
      echo '<br />';
    }?>
     <?php } ?>     
  </td>
</table>
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