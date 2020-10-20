<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <input id="departamento" value="rh">
<script type="text/javascript">
  const examenes = {
    rh:["sangre","hemoglobina","bilirrubina","otro_Exa"],
    informatica:["orina","acido urico","baciloscopia","exa_info"]
  }
var key = document.getElementById("departamento").value;
console.log(examenes[key]); // samantha
//var departamento="rh";
var detalles = [];
detalles.push(examenes[key]);

</script>

<?php
$cadena=" hola mundo  como estan";
$text_clear= preg_replace("/[[:space:]]/"," ",trim($cadena));

echo $cadena."<br>";
echo $text_clear;
?>
</body>
</html> 
