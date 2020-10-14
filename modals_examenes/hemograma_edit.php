 <style>
    #tamModal_hemo{
      max-width: 75% !important;
    }
     #head_hemo{
        color: white;
        text-align: center;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="hemograma_edit">
  <div class="modal-dialog" id="tamModal_hemo">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-primary" id="head_trig">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <table width="100%" class="table-bordered">
          <tr>
            <td colspan="100" style="text-align: center;" class="bg-secondary">HEMATOLOGIA AGREGAR RESULTADOS</td>
          </tr>
           <tr>
            <td colspan="100" style="text-align: center;" class="bg-light"><b><span style="color: blue">PACIENTE:</span>&nbsp;<span id="paciente_exa"></span></b></td>
          </tr>
          <tr>
            <td style="width: 30%;border: 1px solid black;" colspan="30"><!--LINEA ROJA TD-->
              <table width="100%">
                <tr>
                  <td colspan="30" style="width: 30%;text-align: center;"><b>LINEA ROJA</b></td>               
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">G.R. x mm<sup>3</sup></td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="gr_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Ht %</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="ht_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Hb g/dl</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="hb_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">V.C.M fl</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="vcm_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">H.C.M Pg</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="hcm_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">C.M.H.C g/dl</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="cmhc_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="30" style="width: 30%;text-align: center">GOTA GRUESA</td>
                </tr>
                <tr>
                  <td colspan="30" style="width: 100%;">
                    <textarea id="gota_hema"  class="form-control" rows="7"></textarea>
                  </td>
                </tr>        
              </table>
            </td><!--FIN LINEA ROJA TD-->

            <td style="width: 30%;border: 1px solid black;" colspan="30"><!--LINEA BLANCA TD-->
              <table>
              <tr><td colspan="30" style="width: 30%;text-align: center;"><b>LINEA BLANCA</b></td></tr>
                <tr>
                  <td colspan="15" style="width: 15%">G.B. x mm<sup>3</sup></td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="gb_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Linfocitos</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="linfocitos_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Monocitos</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="monocitos_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Eosinófilos</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="eosinofilos_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Basinófilos</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="basinofilos_hemato" style="text-align: right;"></td>
                </tr>
                <tr><td colspan="30" style="width: 30%;text-align: center;"><b>NEUTROFILOS</b></td></tr>
                <tr>
                  <td colspan="15" style="width: 15%">En Banda</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="banda_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Segmentados</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="segmentados_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Metamielo Neutro</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="metamielo_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Mielocitos</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="mielocitos_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Blastos</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="blastos_hemato" style="text-align: right;"></td>
                </tr>     

                <tr>
              </table>
            </td><!--FIN LINEA BLANCA TD-->

            <td><!--VARIOS OTROS-->
              <table>
              <tr><td colspan="30" style="width: 30%;text-align: center;"><b>VARIOS</b></td></tr>
                <tr>
                  <td colspan="15" style="width: 15%">Plaquetas</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="plaquetas_hemato" style="text-align: right;" value="/mm3"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Reticulocitos</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="reti_hemato" style="text-align: right;"></td>
                </tr>
                <tr>
                  <td colspan="15" style="width: 15%">Eritrosedimentación</td>
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="eritro_hemato" style="text-align: right;"></td>
                </tr>
                <tr><td colspan="30" style="width: 30%;text-align: center;"><b>OTROS</b></td></tr>
                <tr>
                  <td colspan="30" style="width: 100%;">
                    <textarea id="otros_hema"  class="form-control" rows="12"></textarea>
                  </td>
                </tr>
              </table>
            </td><!--VARIOS OTROS-->
          </tr>
        </table>
      </div>

      <input type="hidden" id="id_paciente_hematologia" class="id_paciente_exa">
      <input type="hidden" id="n_orden_hematologia" class="num_orden_exa">
      <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
      <!-- Modal footer -->
      <div class="row" id="" style="margin-bottom: 8px">
        <div class="col-md-1"></div>
        <div class="col-md-4" style="margin-left: 10px"><button type="button" class="btn btn-block btn-danger btn-flat pull-left">Finalizar</button></div>
        <div class="col-md-3" style="width: 100%"></div>
        <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat pull-left">Agregar</button></div>
        <div class="col-md-1"></div>
      </div>

    </div>
  </div>
</div>