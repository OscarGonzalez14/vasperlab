<?php
$items_hemograma = $reporteria->get_items_hemograma($_GET["id_paciente"],$_GET["numero_orden"]);
?>

<table width="100%">
  <tr>
      <td colspan="100" style="color:black;font-size:12px;font-family: Helvetica, Arial, sans-serif;width:100%"><strong>PACIENTE: <?php echo $paciente?><strong></td>
    </tr>
    <tr><td style="text-align: center;width: 100%" colspan="100">
      <span style="color: red;font-size: 15px;text-align: center"><strong>HEMOGRAMA</strong></span>
    </td></tr>
    <tr>
      <td colspan="33">
        <table class="table2" width="100%">

                <tr>
                  <td colspan="30" style="width: 30%;text-align: center;"><b>LINEA ROJA</b></td>
                  <?php for($i=0;$i<sizeof($items_hemograma);$i++){ ?>               
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">G.R. x mm<sup>3</sup></td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["gr_hemato"];?></span></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Ht %</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["ht_hemato"];?></span></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Hb g/dl</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["hb_hemato"];?></span></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">V.C.M fl</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["vcm_hemato"];?></span></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">H.C.M Pg</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["hcm_hemato"];?></span></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">C.M.H.C g/dl</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["cmhc_hemato"];?></span></td>
                </tr>
              <tr>
                  <td colspan="30" style="width: 30%;text-align: center" class="stilot1">GOTA GRUESA</td>
                </tr>
                <tr>
                  <td colspan="30" style="width: 100%;" class="stilot1">
                    <textarea id="gota_hema"  class="form-control" rows="7" style="visibility: hidden;"></textarea>
                </td>
        </table>
      </td><!--COLUMNA 1-->
      <td colspan="33">

      <table class="table2" width="100%">
        <tr><td colspan="30" style="width: 30%;text-align: center;color: black"><b>LINEA BLANCA</b></td></tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">G.B. x mm<sup>3</sup></td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["gb_hemato"];?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Linfocitos</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["linfocitos_hemato"]."%";?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Monocitos</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["monocitos_hemato"]."%";?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Eosinófilos</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["eosinofilos_hemato"]."%";?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Basinófilos</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["basinofilos_hemato"]."%";?></td>
                </tr>
                <tr><td colspan="30" style="width: 30%;text-align: center;"><b>NEUTROFILOS</b></td></tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">En Banda</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["banda_hemato"]."%";?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Segmentados</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["segmentados_hemato"]."%";?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Metamielo Neutro</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["metamielo_hemato"];?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Mielocitos</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["mielocitos_hemato"];?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Blastos</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["blastos_hemato"];?></td>
                </tr>            

        </table>
      </td><!--COLUMNA2-->
      <td colspan="33">

          <table width="100%" class="table2">
              <tr><td colspan="30" style="width: 30%;text-align: center;" class="stilot1">VARIOS</td></tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Plaquetas</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["plaquetas_hemato"];?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Reticulocitos</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["reti_hemato"];?></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%" class="stilot1">Eritrosedimentación</td>
                  <td colspan="15" style="width: 15%" class="stilot1"><span><?php echo $items_hemograma[$i]["eritro_hemato"];?></td>
                </tr>
                <tr><td colspan="30" style="width: 30%;text-align: center;" class="stilot1"><b>OTROS</b></td></tr>
                <tr>
                  <td colspan="30" style="width: 100%;" class="stilot1">
                    <textarea id="otros_hema"  class="form-control" rows="12"></textarea>
                  </td>
                </tr>
              </table>
            </td><!--VARIOS OTROS-->
          </tr>
        </table>

      </td><!--COLUMNA3-->
    </tr>

</table>
   <?php } ?>
