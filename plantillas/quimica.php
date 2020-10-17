<div style="margin-top: 5px">
	<?php
	$array = array('glucosa', 'colesterol');
$array_num = count($array);
for ($i = 0; $i < $array_num; ++$i){
    
    require_once("resultados/".$array[$i].".php");
}
	?>
</div>