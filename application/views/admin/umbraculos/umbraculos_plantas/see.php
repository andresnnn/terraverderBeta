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
                                    <table style="text-align: center;" class="table table-striped table-hover">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nombre Científico</th>
                                            <th>Espacio Unitario Aprox.</th>
                                            <th>Cantidad</th>
                                            <th>Espacio Total Aprox.</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <?php foreach($umbraculo_plantas as $u){ ?>
                                        <tr>
                                            <td><?php echo $u['nombrePlanta']; ?></td>
                                            <td><?php echo $u['nombreCientificoPlanta']; ?></td>
                                            <td><?php echo $u['unidadEspacioPlanta_m2']; ?> cm<sup>2</sup></td>
                                            <td><?php echo $u['cantidad']; ?></td>
                                            <td><?php echo ($u['unidadEspacioPlanta_m2']*$u['cantidad'])/10000;?> m<sup>2</sup></td>
                                            <td>
                                                <!-- BOTON QUE LLAMA AL CONTROLADOR Y CAPTURA LA NUEVA CANTIDAD DE PLANTAS CON SU RESPECTIVO
                                                ESPACIO OCUPADO, Y LA ACTUALIZA DENTRO DE LA 'BD' -->
                                                <a href="<?php echo site_url('common/plantas/ver/'.$u['idPlanta']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver Cuidados</a>

                                                <button type="button" onClick="crearFormulario(<?php echo $u['cantidad']?>,<?php echo $info_umbraculo['idUmbraculo'];?>,<?php echo $u['idPlanta'];?>,<?php echo $u['unidadEspacioPlanta_m2'];?>,<?php echo $info_umbraculo['unidadEspacioDisponible_m2']?>);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#s" data-id="<?php echo $u['idPlanta']; ?>"> <span class="fa fa-refresh"> </span> Actualizar Cantidad</button>


                                                <!--MODAL PARA ACTUALIZAR LA CANTIDAD DE LA PLANTA-->

                                  <!-- Modal -->
                                  <div class="modal fade" id="s" role="dialog">
                                    <div style="overflow-x:auto;" class="modal-dialog modal-lg">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Actualizar cantidad de la planta seleccionada:</h4>
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
                                                    <!--Espacio disponible en umbráculo-->
                                                    <input type="hidden" name="disponibleU" id="disponibleU">
                                                    <!--Cantidad usada como punto de comparación-->
                                                    <input type="hidden" name="cantiActualPlanta" id="cantiActualPlanta">

                                                    <!-- CAMPOS QUE LLEGAN AL CONTROLADOR PARA SUBIR A LA 'BD' -->
                                                    <input type="hidden" name="dipoActualizada" id="dipoActualizada"> <!--Nuevo espacio para almacenar en BD-->
                                                    <input type="hidden" name="dipoSumaActualizada" id="dipoSumaActualizada"> <!--Nuevo espacio para almacenar en BD-->
                                                    <!--FIN CAMPOS OCULTOS <input type="text" name="resu" id="resu" value="">-->
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
                                  <!-- fin modal -->


                                                <button id="boton" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $u['idPlanta']; ?>" data-id="<?php echo $u['idPlanta']; ?>">Borrar</button>
                                                <!-- Modal -->
                    <div class="modal fade" id="<?php echo $u['idPlanta']; ?>" role="dialog" >
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Atención</h4>
                          </div>
                          <div class="modal-body">



                            <p>¿Está seguro de querer quitar la planta <?php echo $u['nombrePlanta']; ?> del umbráculo ?</p>

                          </div>
                          <div class="modal-footer">
                            <!-- ELIMINA UNA PLANTA DENTRO DEL UMBRACULO Y DEBE DE REESTABLECER EL ESPACIO QUE SE DESOCUPA
                                                DENTRO DEL MISMO -->
                            <?php echo form_open('common/umbraculos/sacar_planta_umbraculo/'.$u['idUmbraculo'].'/'.$u['idPlanta']); ?>
                            <input type="hidden" id="nuevaCantidad" name="nuevaCantidad" value="<?php echo $info_umbraculo['unidadEspacioDisponible_m2']+($u['unidadEspacioPlanta_m2']*$u['cantidad'])/10000;?>">
                            <!--ESTE ES EL CAMPO QUE LLEVA EL VALOR CON EL ESPACIO REESTABLECIDO-->
                            <button type="submit" class="btn btn-danger btn-flat">Aceptar</button> <br>
                            <?php echo form_close(); ?>
                            <button type="button" class="btn btn-flat" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--fin modal -->




                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    </div>
                                </div>






                </section>
            <div class="box-footer" style="text-align: center;">
                <a href="<?php echo site_url('common/umbraculos/ver/'.$id); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>
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
    document.getElementById('msjError').innerHTML = "";
}

function verificarEspacio()
{

    var disponibleActual = document.getElementById('disponibleU').value;
    var canti = document.getElementById('cantidad').value;
    var ePP = document.getElementById('ocupaPlanta').value;
    var cantiActual = document.getElementById('cantiActualPlanta').value;

    var espacioTotal= (canti * ePP)/10000; /* ESPACIO QUE OCUPA LA PLANTA, CONVERTIDO A mtr2*/

 /*document.getElementById('resu').value = espacioTotal.toFixed(4); */


    /**
     SI EL ESPACIO QUE OCUPA EL CJTO DE PLANTAS ES MAYOR QUE EL DISPONIBLE Y SE QUIEREN AÑADIR PLANTAS
     SE MUESTRA ERROR, Y DESHABILITA EL BOTON 'Agregar'
     */
    if (espacioTotal > disponibleActual && canti > cantiActual)
    {
        document.getElementById('msjError').innerHTML = "El espacio dentro del umbráculo es insuficiente";
        document.getElementById('guardar').disabled=true;
    }
    /**
     SI EL ESPACIO QUE OCUPA EL CJTO DE PLANTAS ES MAYOR QUE EL DISPONIBLE Y SE QUIEREN AÑADIR PLANTAS
     SE MUESTRA ERROR, Y DESHABILITA EL BOTON 'Agregar'
     */
    else if (espacioTotal > (disponibleActual && canti <= cantiActual))
    {
        document.getElementById('msjError').innerHTML = "";
        document.getElementById('guardar').disabled=false;
        var diferencia = cantiActual - canti;
        var liberado = (diferencia*ePP)/10000;
        /*document.getElementById('resu').value =liberado;*/
        var newValor = parseFloat(disponibleActual) + parseFloat(liberado);
        document.getElementById('dipoActualizada').value = newValor.toFixed(4);
    }
    /*
    SI HAY ESPACIO DISPONIBLE, Y LA SE AÑADEN PLANTAS.
      SE RESTA ESPACIO DISPONIBLE EN EL UMBRÁCULO
     */
    else if (espacioTotal < (disponibleActual && canti > cantiActual))
    {
        var ocupado = parseFloat(disponibleActual) - parseFloat(espacioTotal);
        document.getElementById('dipoActualizada').value = ocupado.toFixed(4);
        document.getElementById('msjError').innerHTML = "";
        document.getElementById('guardar').disabled=false;
    }

    /*
    SI HAY ESPACIO DISPONIBLE Y SE QUITAN PLANTAS.
     SE SUMA EL ESPACIO LIBERADO POR TAL ACCIÓN
     */
    if (espacioTotal < disponibleActual && canti <= cantiActual)
    {
        var diferencia = cantiActual - canti;
        var liberado = (diferencia*ePP)/10000;
        var newValor = parseFloat(disponibleActual) + parseFloat(liberado);
        document.getElementById('dipoActualizada').value = newValor.toFixed(4);
        document.getElementById('msjError').innerHTML = "";
        document.getElementById('guardar').disabled=false;
    }
    if (espacioTotal == disponibleActual || canti == cantiActual)
    {
        document.getElementById('msjError').innerHTML = "";
        document.getElementById('guardar').disabled=false;
    }


}



</script>
