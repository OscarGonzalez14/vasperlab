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
$cod_emp =$_GET["cod_emp"];

$data = $reporteria->get_detalle_orden_pacientes($_GET["id_paciente"]);

foreach ($data as $key) {
  $edad = $key["edad"];
}

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
        margin-right:30px; 
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
       border-radius: 1em;
       /*overflow: hidden;*/
       /*font-family: Helvetica, Arial, sans-serif;*/

    }

    .cladse_table {
    border: 1px solid black;
    border-radius: 15px;
    -moz-border-radius: 20px;
    padding: 2px;
    border-collapse: collapse;
}

</style>

  </head>
  <body>

<div style="margin-top:0px;height:200px" >
  <table style="width: 100%;">
   <tr>
      <td width="25%"><h1 style="text-align:left;"><img src="images/vasperoficial.jpg" width="200" height="75"/></h1></td>
      <td width="75%">
       <table style="width:100%;" class="clase_table">
           <tr>
             <td style="text-align:center; font-size:16px"><strong>LABORATORIO CLINICO VASPER</strong> || <strong>Lic. Carlos Andrés Vásquez Peraza</strong></td>
           </tr>
           <tr>
              <td style="text-align:center; font-size:13px">Calle Francisco Gavidia y Final Calle Gerardo Barrios #9-A, Ciudad Arce.&nbsp;<span id="date"></span><br>
              <span>Telefonos: 2330-9801&nbsp;&nbsp;</span><br>E-mail: labclinicovasper@gmail.com&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:center; font-size:11px">
            </tr>
        </table><!--fin segunda tabla-->
    </td>
      
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
//echo "Hola Mundo";
}elseif ($categoria=="heces") {
  require_once("resultados/heces.php");  
}elseif ($categoria=="orina") {
  require_once("resultados/orina.php");
}elseif($categoria=="bacteriologia"){
  require_once("plantillas/bacteriologia.php");
}elseif($categoria=="hemograma"){
  require_once("resultados/hemograma.php");
}elseif ($categoria=="inmunologia") {
  require_once("resultados/antigenos.php");
}elseif ($categoria=="antigenos_dos") {
  require_once("resultados/antigenos_dos.php");
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