<?php
  
switch($_GET["op"]){

////////////////////////COMBOX DINAMICOS PARA DEPARTAMENTOS
case 'select_departamento':

  if ($_POST['empresa']=='Corrugado') {
    $html="
      <option value='AUDITORIA INTERNA'>AUDITORIA INTERNA</option>
      <option value='COMPENSACION Y BENEFICIOS'>COMPENSACION Y BENEFICIOS</option>
      <option value='CREDITOS Y COBROS'>CREDITOS Y COBROS</option>      
      <option value='CONTABILIDAD GENERAL'>CONTABILIDAD GENERAL</option>
      <option value='CONTROL DE CALIDAD'>CONTROL DE CALIDAD</option>
      <option value='DEPARTAMENTO DE INFORMATICA - ES'>DEPARTAMENTO DE INFORMATICA - ES</option>
      <option value='SISTEMAS INTEGRADOS DE GESTION'>SISTEMAS INTEGRADOS DE GESTION</option>
      <option value='MANTENIMIENTO GENERAL E INFRAESTRUCTURA'>MANTENIMIENTO GENERAL E INFRAESTRUCTURA</option>
      <option value='PLANIFICACION CAJAS Y BOLSAS'>PLANIFICACION CAJAS Y BOLSAS</option>
      <option value='DIRECCION FINANCIERA'>DIRECCION FINANCIERA</option>
      <option value='DEPARTAMENTO DE TESORERIA'>DEPARTAMENTO DE TESORERIA</option>
      <option value='GERENCIA DE MANUFACTURA CAJAS Y BOLSAS'>GERENCIA DE MANUFACTURA CAJAS Y BOLSAS</option>
      <option value='DIRECCION FINANCIERA'>DIRECCION FINANCIERA</option>
      <option value='TESORERIA'>TESORERIA</option>
      <option value='GERENCIA DE MANUFACTURA'>GERENCIA DE MANUFACTURA</option>
      <option value='GERENCIA REGIONAL DE RECURSOS HUMANOS'>GERENCIA REGIONAL DE RECURSOS HUMANOS</option>
      <option value='GERENCIA REGIONAL DE COMPRAS'>GERENCIA REGIONAL DE COMPRAS</option>
      <option value=''></option>
      <option value=''></option>
      <option value=''></option>
      <option value=''></option>
      <option value=''></option>
      <option value=''></option>
      <option value=''></option>
      <option value=''></option>
      ";
    echo $html;

  }

    break;
}