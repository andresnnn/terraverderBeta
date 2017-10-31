<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Plantas dentro de <strong><?php echo $info_umbraculo['nombreUmbraculo']?></strong></h3>
                                </div>
                                    <div class="box-body">                       
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <?php foreach($umbraculo_plantas as $u){ ?>
                                        <tr>
                                            <td><?php echo $u['nombrePlanta']; ?></td>
                                            <td><?php echo $u['cantidad']; ?></td>
                                            <td>
                                                <button type="button" onClick="crearFormulario(<?php echo $u['cantidad']?>,<?php echo $info_umbraculo['idUmbraculo'];?>,<?php echo $u['idPlanta'];?>,<?php echo $u['unidadEspacioPlanta_m2'];?>,<?php echo $info_umbraculo['unidadEspacioDisponible_m2']?>);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"> <span class="fa fa-refresh"></span>Actualizar Cantidad</button>
                                                <a href="<?php echo site_url('common/umbraculos/sacar_planta_umbraculo/'.$u['idUmbraculo'].'/'.$u['idPlanta']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-minus"></span> Borrar planta umbráculo</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    </div>
                                </div>


                                <!--MODAL PARA ACTUALIZAR LA CANTIDAD DE LA PLANTA-->
                                <div class="container">
                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal" role="dialog">
                                    <div style="overflow-x:auto;" class="modal-dialog modal-lg">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Actualizar cantidad de planta seleccionada</span></h4>
                                        </div>
                                        <div class="modal-body">

                                            <?php echo form_open('common/umbraculos/actalizar_cantidad/'.$info_umbraculo['idUmbraculo'].'/'); ?>
                                                <div class="box-body">
                                                <div align="center">
                                                    <table style="align-items: center;text-align: center;">
                                                        <tr>
                                                            <th style="text-align: center;">CANTIDAD</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input style="text-align: center;" onChange="verificarEspacio();" min="0" type="number" name="cantidad" value="" class="form-control" id="cantidad" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <span style="text-align: center"  class="text-danger" id="msjError"></span>
                                                    <!--CAMPOS OCULTOS-->
                                                    <input type="hidden" value="" name="idUmbraculo" id="idUmbraculo"> 
                                                    <input type="hidden" value="" name="idPlanta" id="idPlanta"> 
                                                    <input type="hidden" name="ocupaPlanta" id="ocupaPlanta">
                                                    <input type="hidden" name="disponibleU" id="disponibleU">
                                                    <input type="text" id="resu" value="">
                                                    <!--FIN CAMPOS OCULTOS-->
                                                </div>
                                                </div>
                                                <div align="center" class="box-footer">
                                                    <button id="guardar" type="submit" class="btn btn-success btn-flat">
                                                        <i class="fa fa-save"></i> Guardar
                                                    </button>
                                                    <button type="close" data-dismiss="modal" class="btn btn-flat">
                                                        <i class="fa fa-cancel"></i> Cancelar
                                                    </button>
                                                </div>              
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  
                                </div>
                </section>
            <div class="box-footer" style="text-align: center;">
                <a href="<?php echo site_url('common/umbraculos/ver/'.$id); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>  
            </div>

              <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>


<script>
//FUNCION PARA ABRIR LA VENTANA MODAL
//
    $(document.ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });


function crearFormulario(cantidad,umbraculo,planta,dimPlanta,dispU)
{
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('idUmbraculo').value = umbraculo;
    document.getElementById('idPlanta').value = planta;
    document.getElementById('ocupaPlanta').value = dimPlanta;
    document.getElementById('disponibleU').value = dispU;
}

function verificarEspacio()
{
    var actual = document.getElementById('disponibleU').value;
    var canti = document.getElementById('cantidad').value;
    var ePP = document.getElementById('ocupaPlanta').value;

    var espacioTotal= (canti * ePP)/10000;

    document.getElementById('resu').value = espacioTotal;
    if (espacioTotal > actual) 
    {
        document.getElementById('msjError').innerHTML = "El espacio dentro del umbráculo es insuficiente";
        document.getElementById('guardar').disabled=true;
    }
    if (espacioTotal < actual) 
    {
        document.getElementById('msjError').innerHTML = "";
        document.getElementById('guardar').disabled=false;
    }
    if (espacioTotal == actual) 
    {
        document.getElementById('msjError').innerHTML = "";
        document.getElementById('guardar').disabled=false;
    }


}

</script>