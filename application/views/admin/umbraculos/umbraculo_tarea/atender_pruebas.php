<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- Estilo del modal -->
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
                      <h3 class="box-title">Tareas <strong></strong></h3>
                  </div>


            <!-- seleccionar insumo -->
            <div class="col-md-6">
              <label for="idInsumo" class="control-label"><span class="text-danger">*</span>Insumo</label>
              <div class="form-group">
                                  <input disabled class="form-control" type="text" name="nombre" id="nombre" value=""/>
                                  <button type="button" class="btn btn-block btn-primary btn-flat'" data-toggle="modal" data-target="#myModal"> <span class="fa fa-plus"></span>Seleccionar Insumo</button>
                                  <span class="text-danger"><?php echo form_error('idInsumo');?></span> <!-- ESTE SERIA EL CAMPO DONDE INFORMARIA EL ERROR-->
                                  <span id="estadoT" class="text-danger"></span><br>
                                  <!-- <span id="estadoL" class="text-danger"></span><br> -->
                                  <!-- <span id="estadoH" class="text-danger"></span><br> -->
                                  <input type="hidden" min="0" name="idPlanta" value="<?php echo $this->input->post('idInsumo'); ?>" class="form-control" id="idInsumo" />
              </div>
<!--CAMPOS QUE VAN A SER ENVIADOS AL CONTROLADOR PARA CARGARSE EN LA 'BD'-->
                      <input type="text" name="idInsumoBD" id="idInsumoBD">
                      <input type="text" name="cantidadBD" id="cantidadBD">
                      <input type="hidden" name="stockBD" id="stockBD">

                      <!--FIN DE CAMPOS OCULTOS-->
            </div>
<!-- footer -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                <a href="<?php echo site_url('common/umbraculos/verTareas/'.$idUmbraculo); ?>" class="btn btn-default btn-flat">Cancelar</a>
            </div>


            <?php echo form_close(); ?>

        </div>
			</div>


      <!-- probando modal-->
      <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div style="overflow-x:auto;" class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Seleccionar Insumos</h4>
              </div>
              <div class="modal-body">
                      <table class="table table-striped table-hover">
                          <tr>
                          <div></div>
                              <th>Nombre</th>
                              <th>Stock</th>
                              <th>Cantidad Requerida</th>
                              <th>Acciones</th>
                          </tr>
                          <?php foreach($insumos as $i){ ?>
                            <div id="insumosSeleccionados">
                              <?php if ($i['active'] == 1): ?>
                                  <tr id="<?php echo 'fila'.$i['idInsumo'];?>">
                                      <td id="nombreInsumo"><?php echo $i['nombreInsumo']; ?></td>
                                      <td > <?php echo $i['cantidad']; ?> </td>
                                      <td> <input  id="<?php echo 'art'.$i['idInsumo'];?>" type="number" min="0" max="<?php echo $i['cantidad']; ?>" name="cantidadUtilizada"  /></td>

                                      <td class="boton">
                                          <button onClick="javascript:cargarDatos(<?php echo $i['idInsumo'];?>);" class="btn btn-info btn-xs"  data-dismiss="modal"> <span class="fa fa-check"></span> Utilizar</button>
                                      </td>
                                  </tr>
                              <?php endif; ?>
                            </div>
                          <?php } ?>
                      </table>
                      <?php echo anchor('common/insumos/add', '<i class="fa fa-plus"> Agregar nuevo Insumo </i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nuevo insumo')); ?>
              </div>
              <div class="modal-footer">
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

<!-- script modal -->
<script>
//FUNCION PARA ABRIR LA VENTANA MODAL
//
    $(document.ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });



/**
 * [cargarDatos description]
 * @param  {[type]} id ES EL ID DE LA PLANTA DENTRO DE LA BD
 * @return {[type]}    [description]
 * @author SAKZEDMK
 */
function cargarDatos(id) {


    // document.getElementById('cantidadBD').value = document.getElementById('fila'+id).cells[2].innerHTML;
    var celda = document.getElementById('fila'+id).cells[2].innerHTML;
    document.getElementById('cantidadBD').value =celda;
    document.getElementById('idInsumoBD').value = id;
}

</script>
