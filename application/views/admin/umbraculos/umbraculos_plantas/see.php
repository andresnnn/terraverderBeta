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
                                            <!--"crearFormulario(<?php echo $info_umbraculo['idUmbraculo'];?>,<?php echo $u['idPlanta'];?>,<?php echo $u['nombrePlanta'];?>,<?php echo $u['cantidad'];?>,<?php echo $u['unidadEspacioPlanta_m2'];?>,<?php echo $info_umbraculo['unidadEspacioDisponible_m2']?>)"
                                            -->

                                                <button type="button" onClick="crearFormulario(<?php echo $u['cantidad']?>,<?php echo $info_umbraculo['idUmbraculo'];?>,<?php echo $u['idPlanta'];?>);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"> <span class="fa fa-refresh"></span>Actualizar Cantidad</button>
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
                                                                <input style="text-align: center;" min="0" type="number" name="cantidad" value="" class="form-control" id="cantidad" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <input type="hidden" value="" name="idUmbraculo" id="idUmbraculo"> <!--LE ENVIO COMO OCULTO-->
                                                    <input type="hidden" value="" name="idPlanta" id="idPlanta"> <!--LE ENVIO COMO OCULTO-->
                                                </div>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-success btn-flat">
                                                        <i class="fa fa-check"></i> Guardar
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


function crearFormulario(cantidad,umbraculo,planta)
{
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('idUmbraculo').value = umbraculo;
    document.getElementById('idPlanta').value = planta;
}

</script>