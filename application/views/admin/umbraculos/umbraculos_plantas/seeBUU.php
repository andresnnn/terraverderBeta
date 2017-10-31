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
                                                <!-- BOTON QUE LLAMA AL CONTROLADOR Y CAPTURA LA NUEVA CANTIDAD DE PLANTAS CON SU RESPECTIVO 
                                                ESPACIO OCUPADO, Y LA ACTUALIZA DENTRO DE LA 'BD' -->
                                                <button type="button" onClick="crearFormulario(<?php echo $u['cantidad']?>,<?php echo $info_umbraculo['idUmbraculo'];?>,<?php echo $u['idPlanta'];?>,<?php echo $u['unidadEspacioPlanta_m2'];?>,<?php echo $info_umbraculo['unidadEspacioDisponible_m2']?>);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"> <span class="fa fa-refresh"> </span> Actualizar Cantidad</button>

                                                <!-- ELIMINA UNA PLANTA DENTRO DEL UMBRACULO Y DEBE DE REESTABLECER EL ESPACIO QUE SE DESOCUPA 
                                                DENTRO DEL MISMO -->
                                                <a href="<?php echo site_url('common/umbraculos/sacar_planta_umbraculo/'.$u['idUmbraculo'].'/'.$u['idPlanta']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-minus"> </span> Borrar planta umbráculo</a>
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
                                                                <input style="text-align: center;" onChange="comprobarEspacio();" min="0" type="number" name="cantidad" value="" class="form-control" id="cantidad" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <span style="text-align: center"  class="text-danger" id="msjError"></span>
                                                    <!--CAMPOS OCULTOS-->
                                                    <input type="hidden" value="" name="idUmbraculo" id="idUmbraculo"> 
                                                    <input type="hidden" value="" name="idPlanta" id="idPlanta"> 
                                                    <input type="hidden" name="ocupaPlanta" id="ocupaPlanta">
                                                    <input type="text" name="disponibleU" id="disponibleU">
                                                    <input type="text" name="cantiActualPlanta" id="cantiActualPlanta">

                                                    <!-- CAMPOS QUE LLEGAN AL CONTROLADOR PARA SUBIR A LA 'BD' -->
                                                    <input type="text" name="dipoActualizada" id="dipoActualizada">
                                                    <input type="text" name="resu" id="resu" value="">
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

function crearFormulario(cantidad,umbraculo,planta,dimPlanta,dispU)
{
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('idUmbraculo').value = umbraculo;
    document.getElementById('idPlanta').value = planta;
    document.getElementById('ocupaPlanta').value = dimPlanta;
    document.getElementById('disponibleU').value = dispU;
    document.getElementById('cantiActualPlanta').value = cantidad;
}

function comprobarEspacio()
{
    //var actual = document.getElementById('cantiActualPlanta').value; //Usado como 'bandera' o punto de comparación.-
    var disponibleEU = document.getElementById('disponibleU').value; //'EU' = En umbraculo
    var canti = document.getElementById('cantidad').value; //Campo del formulario
    var ePP = document.getElementById('ocupaPlanta').value; //'EPP' = Espacio por planta

    var espacioTotal= (canti * ePP)/10000; //Conversión de cm2 a mtr2

    document.getElementById('resu').value = espacioTotal;


}

</script>