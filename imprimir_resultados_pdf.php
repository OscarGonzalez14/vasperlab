<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

//require_once("modelos/Reporteria.php");
/*$reporteria=new Reporteria();
$id_paciente =$_GET["id_paciente"];
$n_orden =$_GET["n_orden"];

$datos_det_orden_paciente = $reporteria->get_detalle_orden_pacientes($_GET["id_paciente"],$_GET["n_orden"]);
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
HHHHH
<div style="margin-top:0px;height:200px" >
<?php
$categoria="quimica";
if ($categoria=="quimica") {
  require_once("plantillas/quimica.php");
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