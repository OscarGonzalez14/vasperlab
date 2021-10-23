 <style>
    #tamModal_hemo{
      max-width: 95% !important;
    }
     #head_hemo{
        color: white;
        text-align: center;
    }
</style>

<script>  
    $.ajax({
      url:"ajax/examenes.php?op=show_hemograma_data",
      method:"POST",
      data:{id_paciente:id_paciente,numero_orden:numero_orden},
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
        $("#gr_hemato").val(data.gr_hemato);
        $("#ht_hemato").val(data.ht_hemato);
        $("#hb_hemato").val(data.hb_hemato);
        $("#vcm_hemato").val(data.vcm_hemato);
        $("#cmhc_hemato").val(data.cmhc_hemato);
        $("#hcm_hemato").val(data.hcm_hemato);
        $("#gota_hema").val(data.gota_hema);
        $("#gb_hemato").val(data.gb_hemato);
        $("#linfocitos_hemato").val(data.linfocitos_hemato);
        $("#monocitos_hemato").val(data.monocitos_hemato);
        $("#eosinofilos_hemato").val(data.eosinofilos_hemato);
        $("#basinofilos_hemato").val(data.basinofilos_hemato);
        $("#banda_hemato").val(data.banda_hemato);
        $("#segmentados_hemato").val(data.segmentados_hemato);
        $("#metamielo_hemato").val(data.metamielo_hemato);
        $("#mielocitos_hemato").val(data.mielocitos_hemato);
        $("#blastos_hemato").val(data.blastos_hemato);
        $("#plaquetas_hemato").val(data.plaquetas_hemato);
        $("#reti_hemato").val(data.reti_hemato);
        $("#eritro_hemato").val(data.eritro_hemato);
        $("#otros_hema").val(data.otros_hema);
        $("#id_paciente_hematologia").val(data.id_paciente);
        $("#n_orden_hematologia").val(data.numero_orden);

      }
    });
</script>

<div class="modal fade bd-example-modal-lg" id="cathemograma">
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
            <td colspan="100" style="text-align: center;" class="bg-info">HEMATOLOGIA</td>
          </tr>
           <tr>
            <td colspan="100" style="text-align: center;" class="bg-light"><b><span style="color: blue">PACIENTE:</span>&nbsp;<span id="paciente_exa" class="paciente_exa"></span></b></td>
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
                  <td colspan="15" style="width: 15%"><input type="text" class="form-control" id="plaquetas_hemato" style="text-align: right;"></td>
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

      <input type="hidden" id="id_paciente_hematologia" value="<?php echo $id_paciente;?>">
      <input type="hidden" id="n_orden_hematologia" value="<?php echo $n_orden;?>">
      <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" onClick="GuardarHemograma();" id="guardar_hemo">Guardar</button>
      </div>
      <div class="row" id="edit_exa_hemo" style="margin-bottom: 8px">
        <div class="col-md-1"></div>
        <div class="col-md-4" style="margin-left: 10px"><button type="button" class="btn btn-block btn-danger btn-flat pull-left" onClick="finalizar_hemograma();">Finalizar</button></div>
        <div class="col-md-3" style="width: 100%"></div>
        <div class="col-md-3"><button type="button" class="btn btn-block btn-success btn-flat pull-left" onClick="GuardarHemograma();">Agregar</button></div>
        <div class="col-md-1"></div>
      </div>

    </div>
  </div>
</div>

<script>  
 Number.prototype.format = function(n, x, s, c) {
                let re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                    num = this.toFixed(Math.max(0, ~~n));
                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
            };
            // Restricts input for the given textbox to the given inputFilter.
            function setInputFilter(textbox, inputFilter) {
                ["input"].forEach(function(event) {
                    textbox.addEventListener(event, function() {
                        if (this.id === "gr_hemato" || this.id === "gb_hemato" || this.id === "plaquetas_hemato") {
                            if (this.value !== "") {
                                let str = this.value;
                                let oldstr= str.substring(0, str.length - 1);
                                let millares = ",";
                                let decimales = ".";
                                str = str.split(millares).join("");
                                if (isNaN(str)) {
                                    this.value = oldstr;
                                } else {
                                    let numero = parseInt(str);
                                    this.value = numero.format(0, 3, millares, decimales);
                                }
                            }
                        }
                    });
                });
            }
            setInputFilter(document.getElementById("gr_hemato"), function(value) {
                //declare an object RegExp
                let regex = new RegExp(/^-?\d*$/);
                //test the regexp
                return regex.test(value);
            });

            setInputFilter(document.getElementById("gb_hemato"), function(value) {
                //declare an object RegExp
                let regex = new RegExp(/^-?\d*$/);
                //test the regexp
                return regex.test(value);
            });
            setInputFilter(document.getElementById("plaquetas_hemato"), function(value) {
                //declare an object RegExp
                let regex = new RegExp(/^-?\d*$/);
                //test the regexp
                return regex.test(value);
            });


</script>