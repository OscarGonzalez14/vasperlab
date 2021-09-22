<?php
$datos_antigenos = $reporteria->get_data_antigenos($_GET["id_paciente"],$_GET["numero_orden"]);
?>
<style>    
      .round_table {                   
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 15px;
        -moz-border-radius: 20px;
        padding: 2px;
        -webkit-border-radius: 5px;
      }
      

      .round_table {                   
         border-collapse: separate;
         border-spacing: 0;
         border: 1px solid #0275d8;        
         padding: 2px;
        }

      .round_table_dos {                   
         border-collapse: separate;
         border-spacing: 0;
         border: 1px solid #707070;        
         padding: 2px;
        }
                                                   
      .round_table_dos {                   
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 8px;
        -moz-border-radius: 20px;
        padding: 2px;
        -webkit-border-radius: 5px;
      }     

            
        th {
          border-left:solid black 1px;
          border-top:solid black 1px;
        }    
        th {               
          border-top: none;
        }
        /*ESTOY HAY QUE MODIFICAR*/
         #watermark {
        position: fixed;
        top: 7.5%;
        margin-left: 4.5%;
        width: 100%;
        opacity: .080;    
        z-index: -1000;
      }
</style>  
<?php for($i=0;$i<sizeof($datos_antigenos);$i++){ ?>

           <div id="watermark">
             <img src="images/vasperoficial.jpg" width="700" height="300"/>
            </div>
        
            <table class=round_table width="100%" style="font-size: 14px; margin-top:2px">        
                <tr>
                    <td colspan="40" style="border-bottom: 1px solid #0275d8;border-left:0px;width: 40%/*font-family: Courier, monospace*/"><span style="margin-left:5px;color:#034f84">Paciente:</span><br><span style="margin-left:5px"><?php echo ucwords(strtolower($paciente));?></span></td>
                    <td width="20" style="border-bottom: : 1px solid #0275d8;border-left:1px solid #0275d8;width: 20%/*font-family: Courier, monospace*/"><span style="margin-left:5px;color:#034f84">Edad</span><br> <span style="margin-left:5px;"><?php echo $datos_antigenos[$i]["edad"]." años";?></span></td>
                    <td width="20" style="border-bottom: : 1px solid #0275d8;border-left:1px solid #0275d8;width: 20%/*font-family: Courier, monospace*/"><span style="margin-left:5px;color:#034f84">Género</span><br> <span style="margin-left:5px;"> <?php echo $datos_antigenos[$i]["genero"];?></span></td>
                    <td width="20" style="border-bottom: : 1px solid #0275d8;border-left:1px solid #0275d8;width: 20%/*font-family: Courier, monospace*/"><span style="margin-left:5px;color:#034f84">Fecha nac.</span><br> <span style="margin-left:5px;"><?php echo date("d-m-Y",strtotime($datos_antigenos[$i]["fecha_nacimiento"]));?></span></td>
                    
                </tr>
                <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
                <tr>
                  <td colspan="40" style="border-left:0px;width: 40%;"><span style="margin-left:5px;color:#034f84">Medico que refiere:</span><br><span style="margin-left:5px"><?php echo $datos_antigenos[$i]["observaciones"].".";?></span></td>
                  <td width="20" style="border-left:1px solid #0275d8;width: 20%;border-left:1px solid #0275d8/*font-family: Courier, monospace*/"><span style="margin-left:5px;color:#034f84">Fecha/Hora Recibido</span><br> <span style="margin-left:5px;"><?php echo $datos_antigenos[$i]["fecha"]?></span></td>
                  <td width="20" style="border-left:1px solid #0275d8;width: 20%;border-left:1px solid #0275d8/*font-family: Courier, monospace*/"><span style="margin-left:5px;color:#034f84">Fecha/Hora Reporte</span><br> <span style="margin-left:5px;"> <?php echo $hoy;?></span></td>
                  <td width="20" style="border-left:1px solid #0275d8;width: 20%/*font-family: Courier, monospace*/"><span style="margin-left:5px;color:#034f84"> Identificación</span><br> <span style="margin-left:5px;"><?php echo $datos_antigenos[$i]["cod_emp"];?></span></td>
                </tr>   
            </table>
<div style="margin-top: 45px">
<table class="table2" width="100%" >

<br>
    <tr>
      <td style="color: white">H</td>
    </tr>
		<tr>
    <td bgcolor="#D3D3D3" colspan="30" style="color:black;font-size:14px;font-family: Helvetica, Arial, sans-serif;width:30%;border: #888888 solid 1px;text-align:center"><span>EXAMEN</span></td>
    <td bgcolor="#D3D3D3" colspan="40" style="color:black;font-size:14px;font-family: Helvetica, Arial, sans-serif;width:40%;border: #888888 solid 1px;text-align:center"><span class="Estilo11">RESULTADO</span></td>
    <td bgcolor="#D3D3D3" colspan="30" style="color:black;font-size:14px;font-family: Helvetica, Arial, sans-serif;width:30%;border: #888888 solid 1px;text-align:center"><span class="Estilo11">MUESTRA</span></td>
</tr>

<tr style="font-size:16px" class="even_row">
    <td style="text-align: center;width:30%;text-transform: uppercase;font-family: Courier, monospace;font-size: 14px;border: #888888 solid 1px;padding: 8px" colspan="30"><strong>Antigenos para Covid-19</strong></td>
    <td style="text-align: center;width:40%;text-transform: uppercase;font-family: Courier, monospace;font-size: 14px;border: #888888 solid 1px;padding: 8px" colspan="40"><b><span class="" style="padding: 14px"><?php echo $datos_antigenos[$i]["resultado"];?></span></b></td>
    <td style="text-align: center;width:30%;text-transform: uppercase;font-family: Courier, monospace;font-size: 14px;border: #888888 solid 1px;padding: 8px" colspan="30"><?php echo $datos_antigenos[$i]["muestra"];?></td>
</tr>


<?php
  }
?>
</table>

<p style="font-family: Courier, monospace;font-size: 15px;margin-top:50px">Interpretación del resultado<br>  
<span ><b>NADAL COVID-19 Ag Test</b></span> <br>
<span style="text-align: justify;">Es un inmunoensayo cromotografico de flujo lateral para la detección cualitativa de antígenos de nucleoproteinas virales del SARS-CoV-2 en muestras nasofaríngeas u orofaríngeas humanas. <br>
El test NADAL COVID-19 Ag ha sido diseñado solo para uso profesional de diagnostico in-vitro.</span> <br> <br> 
<b>Rendimiento clínico</b> <br>  
<b>Sensibilidad y especificidad de diagnostico</b> <br> 

El test NADAL COVID-19 Ag se evaluó con muestras clínicas cuyo estado se confirmó mediante RT-PCR. <br><!--Los resultados se muestran en la siguiente tabla:
</p>  

<table width="100%">
    <tr>
    <td colspan="20" style="width: 20%"></td>
    <td colspan="20" style="width: 20%"></td>
    <td colspan="60" style="text-align: center;background: #D3D3D3;width:60%"> RT-PCR</td>
  </tr>
</table>
<table width="100%" class="round_table_dos">

  <tr>
    <td colspan="20" rowspan="4" style="width: 20%;text-align: center;font-size:14px;border-left:0px;"><b>Test NADAL <br> COVID-19 Ag</b></td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;background: #D3D3D3"></td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;background: #D3D3D3">Positivo</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;background: #D3D3D3">Negativo</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;background: #D3D3D3">Total</td>
  </tr>

  <tr>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;background: #D3D3D3">Positivo</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;">150</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;">0</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;">150</td>
  </tr>

    <tr>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;background: #D3D3D3">Negativo</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;">37</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;">161</td>
    <td colspan="20" style="width: 20%;text-align: center;border-bottom: 1px solid #707070;border-left:solid 1px #707070;">198</td>
  </tr>

  <tr>
    <td colspan="20" style="width: 20%;text-align: center;border-left:solid 1px #707070;background: #D3D3D3">Total</td>
    <td colspan="20" style="width: 20%;text-align: center;border-left:solid 1px #707070;">187</td>
    <td colspan="20" style="width: 20%;text-align: center;border-left:solid 1px 
    #707070;">161</td>
    <td colspan="20" style="width: 20%;text-align: center;border-left:solid 1px #707070;">348</td>
  </tr>
</table>-->
  <!--=========fin pruebas=========-->
 <!-- <br>
  <p style="font-family: Courier, monospace;font-size: 15px;">
    <b>Sensibilidad de Diagnostico:</b> 80,2%(73,9%-85,3%)<br>
    <b>Especificidad de Diagnostico:</b> >99,9% (97,7% - 100%)<br>
    <b>Concordancia general:</b> 89,4%(85,7%-92,2%)<br>
    <span>Sensibilidad para las muestras de PCR fuertemente positivas con un valor Ct de &lt; 30 es del 97,6%(93,1%-99,2%)</span> <br>
    *95% de intervalo de confianza.
  </p>-->
  <br>
  <br><br>
  <br>
  <br>
  <br>

Licenciado(a):
<div style="display:block;margin-top:15px;"></div>
 </div>
 