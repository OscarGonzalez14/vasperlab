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

  }elseif ($_POST['empresa']=='Plegadizo') {
    $html="
      <option value='CONTROL DE CALIDAD'>CONTROL DE CALIDAD</option>
      <option value='COMPENSACION Y BENEFICIOS'>COMPENSACION Y BENEFICIOS</option>
      <option value='CONTABILIDAD DE COSTOS'>CONTABILIDAD DE COSTOS</option>
      <option value='CONTABILIDAD GENERAL'>CONTABILIDAD GENERAL</option>
      <option value='CREDITOS Y COBROS'>CREDITOS Y COBROS</option>
      <option value='INFORMATICA - ES'>INFORMATICA - ES</option>
      <option value='MANUFACTURA CAJAS PLEGADIZAS'>MANUFACTURA CAJAS PLEGADIZAS</option>
      <option value='PLANIFICACION CAJAS PLEGADIZAS'>PLANIFICACION CAJAS PLEGADIZAS</option>
      <option value='PREPRENSA'>PREPRENSA</option>
      <option value='SISTEMAS INTEGRADOS DE GESTION'>SISTEMAS INTEGRADOS DE GESTION</option>
      <option value='VENTAS CAJAS PLEGADIZAS'>VENTAS CAJAS PLEGADIZAS</option>
      <option value='GERENCIA REGIONAL DE RECURSOS HUMANOS'>GERENCIA REGIONAL DE RECURSOS HUMANOS</option>
      <option value='ACABADO CAJAS PLEGADIZAS'> ACABADO CAJAS PLEGADIZAS</option>
      <option value='COMPRAS LOCALES'>COMPRAS LOCALES</option>
      <option value='CORTE E IMPRESION CAJAS PLEGADIZAS'>CORTE E IMPRESION CAJAS PLEGADIZAS</option>
      <option value='COMPRAS POR IMPORTACION'>COMPRAS POR IMPORTACION</option>
      <option value=' DESPACHO CAJAS PLEGADIZA'> DESPACHO CAJAS PLEGADIZA</option>
      <option value='INVENTARIOS'>INVENTARIOS</option>
      <option value='TROQUELADO CAJAS PLEGADIZAS'>TROQUELADO CAJAS PLEGADIZAS</option>
      <option value='MANTENIMIENTO MECANICO PLEGADIZAS'>MANTENIMIENTO MECANICO PLEGADIZAS</option>
      <option value='SEGURIDAD Y SALUD OCUPACIONAL'>SEGURIDAD Y SALUD OCUPACIONAL</option>
      <option value='PREPRENSA CAJAS PLEGADIZAS'>PREPRENSA CAJAS PLEGADIZAS</option>
      <option value='AUDITORIA INTERNA'>AUDITORIA INTERNA</option>
    ";
    echo $html;
  }elseif ($_POST['empresa']=='Flexible') {
    $html="
      <option value='AUDITORIA INTERNA'>AUDITORIA INTERNA</option>
      <option value='COMPENSACION Y BENEFICIOS'>COMPENSACION Y BENEFICIOS</option>
      <option value='CONTABILIDAD DE COSTOS'>CONTABILIDAD DE COSTOS</option>
      <option value='CONTABILIDAD GENERAL'>CONTABILIDAD GENERAL</option>
      <option value='CONTROL DE CALIDAD CELPAC'>CONTROL DE CALIDAD CELPAC</option>
      <option value='CREDITOS Y COBROS'>CREDITOS Y COBROS</option>
      <option value='INFORMATICA - ES'>INFORMATICA - ES</option>
      <option value=' MANTENIMIENTO GENERAL E INFRAESTRUCTURA'> MANTENIMIENTO GENERAL E INFRAESTRUCTURA</option>
      <option value='PLANIFICACION CELPAC'>PLANIFICACION CELPAC</option>
      <option value='SISTEMAS INTEGRADOS DE GESTION'>SISTEMAS INTEGRADOS DE GESTION</option>
      <option value='TESORERIA'>TESORERIA</option>
      <option value=' TINTAS CELPAC'> TINTAS CELPAC</option>
      <option value='TECNICO DE VENTAS'>TECNICO DE VENTAS</option>
      <option value='GERENCIA DE FINANZAS'>GERENCIA DE FINANZAS</option>
      <option value='MANUFACTURA CELPAC'>MANUFACTURA CELPAC</option>
      <option value='VENTAS CELPAC'>VENTAS CELPAC</option>
      <option value='GERENCIA REGIONAL DE COMPRAS'>GERENCIA REGIONAL DE COMPRAS</option>
      <option value='GERENCIA REGIONAL DE RECURSOS HUMANOS'>GERENCIA REGIONAL DE RECURSOS HUMANOS</option>
      <option value='GERENCIA TECNICA Y DE PROYECTOS'>GERENCIA TECNICA Y DE PROYECTOS</option>
      <option value='AGENCIA ADUANAL'>AGENCIA ADUANAL</option>
      <option value='CILINDROS CELPAC'>CILINDROS CELPAC</option>
      <option value='CORTE Y ACABADO CELPAC'>CORTE Y ACABADO CELPAC</option>
      <option value='DESPACHO CELPAC'>DESPACHO CELPAC</option>
      <option value='FACTURACION'>FACTURACION</option>
      <option value=' IMPRESION CELPAC'> IMPRESION CELPAC</option>
      <option value='INVENTARIOS'>INVENTARIOS</option>
      <option value='LAMINACION Y EXTRUSION'>LAMINACION Y EXTRUSION</option>
      <option value=' MANTENIMIENTO ELECTRICO CELPAC'> MANTENIMIENTO ELECTRICO CELPAC</option>
      <option value='MANTENIMIENTO MECANICO'>MANTENIMIENTO MECANICO</option>
      <option value=' MANTENIMIENTO MECANICO CELPAC'> MANTENIMIENTO MECANICO CELPAC</option>
      <option value='PREPRENSA CELPAC'>PREPRENSA CELPAC</option>
      <option value='RECLUTAMIENTO Y SELECCION'>RECLUTAMIENTO Y SELECCION</option>
      <option value='SEGURIDAD Y SALUD OCUPACIONAL'>SEGURIDAD Y SALUD OCUPACIONAL</option>

    ";
    echo $html;
  }

    break;

}