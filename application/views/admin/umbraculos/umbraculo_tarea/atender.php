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
                      <h3 class="box-title">Tareas <strong></strong></h3>
                  </div>
                      <div class="box-body">
                      <table class="table table-striped table-hover">
                              <tr>
                                  <th>nro de tarea</th>
                                  <th>Tipo tarea</th>
                                  <th>Planta</th>
                                  <th>Umbraculo</th>
                                  <th>Creador</th>

                                  <th>Fecha Creación</th>
                                  <th>Fecha Prevista</th>
                                  <th>Estado Actual </th>

                              </tr>
                              <?php foreach($tarea as $t){ ?>
                              <tr>
                                  <td><?php echo $t['idTarea']; ?></td>
                                  <td><?php echo $t['nombreTipoTarea']; ?></td>
                                  <td><?php echo $t['nombrePlanta']; ?></td>
                                  <td><?php echo $t['nombreUmbraculo']; ?></td>
                                  <td><?php echo $t['creador']; ?></td>
                                  <td><?php echo $t['fechaCreacion']; ?></td>
                                  <td><?php echo $t['fechaComienzo']; ?></td>
                                  <td><?php echo $t['nombreEstado']; ?></td>
                              </tr>
                              <?php } ?>
                      </table>
                      </div>
                  </div>
                </div>
              </div>


  <div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tarea Edit</h3>
            </div>
			<?php echo form_open('common/umbraculos/atenderTarea/'.$idTarea.'/'.$idUmbraculo); ?>
			<div class="box-body">
				<div class="row clearfix">

					<div class="col-md-6">
						<label for="idEstado" class="control-label">Estado Tarea</label>
						<div class="form-group">
							<select name="idEstado" class="form-control">
								<option value="">select estado_tarea</option>
								<?php
								foreach($estados as $estado_tarea)
								{
									$selected = ($estado_tarea['idEstado'] ) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_tarea['idEstado'].'" '.$selected.'>'.$estado_tarea['nombreEstado'].'</option>';
								}
								?>
							</select>
						</div>

					</div>



					<div class="col-md-6">
						<label for="idUserAtencion" class="control-label">Usuario Actual: </label>
            <div class="form-group">
						<?php echo $user_login['firstname']." ".$user_login['lastname']; ?>
						<input type="hidden" name="idUserAtencion" value="<?php echo $user_login['id']; ?>" class="has-datepicker form-control" id="idUserAtencion" />
						</div>
					</div>


          <div class="col-md-6">
						<label for="fechaAtencion" class="control-label"><span class="text-danger">*</span>Fecha Atención</label>
            <div class="form-group">
              <input  readonly type="text" name="fechaAtencion" value="<?php $hoy = getdate(); $d = $hoy['mday']; $M = $hoy['mon']; $y = $hoy['year'];echo $d."-".$M."-".$y; ?>" class="has-datepicker form-control" id="fechaAtencion" />
							<span class="text-danger"><?php echo form_error('fechaAtencion');?></span>
						</div>
          </div>
<?php foreach($tarea as $t){ ?>
      <div class="col-md-6">
            <label for="observacionEspecialista" class="control-label">ObservacionEspecialista</label>
            <div class="form-group">
              <input type="text" name="observacionEspecialista" value="<?php echo ($this->input->post('observacionEspecialista') ? $this->input->post('observacionEspecialista') : $t['observacionEspecialista']); ?>" class="form-control" id="observacionEspecialista" />
            </div>
          </div>
<?php } ?>

            <!-- seleccionar insumo -->
            <div class="col-md-6">
              <label for="idInsumo" class="control-label"><span class="text-danger">*</span>Insumo</label>
              <div class="form-group">
                                  <input disabled class="form-control" type="text" name="nombre" id="nombre" value=""/>
                                  <button type="button" class="btn btn-block btn-primary btn-flat'" data-toggle="modal" data-target="#myModal"> <span class="fa fa-plus"></span>Seleccionar Insumo</button>
                                  <span class="text-danger"><?php echo form_error('idInsumo');?></span> <!-- ESTE SERIA EL CAMPO DONDE INFORMARIA EL ERROR-->
                                  <span id="estadoT" class="text-danger"></span><br>
                                  <span id="estadoL" class="text-danger"></span><br>
                                  <span id="estadoH" class="text-danger"></span><br>
                                  <input type="hidden" min="0" name="idPlanta" value="<?php echo $this->input->post('idInsumo'); ?>" class="form-control" id="idInsumo" />
              </div>
            </div>

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
                <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Seleccionar Insumos </h4>
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
                          <?php foreach($insumos as $p){ ?>
                              <?php if ($p['active'] == 1): ?>
                                  <tr id="<?php echo 'fila'.$p['idInsumo'];?>">
                                      <td id="numero"><?php echo $p['nombreInsumo']; ?></td>
                                      <td><?php echo $p['cantidad']; ?></td>
                                      <td> <input  type="number" name="cantidadUtilizada"  /></td>
                                      <td class="boton">
                                          <button onClick="javascript:cargarDatos(<?php echo $p['idInsumo'];?>);comprobarCantidad();" class="btn btn-info btn-xs"  data-dismiss="modal"> <span class="fa fa-check"></span> Seleccionar</button>
                                      </td>
                                  </tr>
                              <?php endif; ?>
                          <?php } ?>
                      </table>
                      <?php echo anchor('common/plantas/crear', '<i class="fa fa-plus"> Agregar nueva planta</i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nueva planta')); ?>
              </div>
              <div class="modal-footer">
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
          <a href="<?php echo site_url('common/umbraculos/verTareas/'.$idUmbraculo); ?>" class="btn btn-default btn-flat">Cancelar</a>
      </div>


			<?php echo form_close(); ?>
		</div>
    </div>
</div>
</section>
</div>

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
    document.getElementById('nombre').value = document.getElementById('fila'+id).cells[0].innerHTML;
    document.getElementById('cantidad').value = document.getElementById('fila'+id).cells[0].innerHTML;
    document.getElementById('idInsumo').value = id;
}

    function comprobarCantidad(){

        /* SI LAS CONDICIONES SON CORRECTAS NO APARECE NINGUN MENSAJE, Y EL BOTON DE AGREGAR ESTA HABILITADO*/
        // document.getElementById('estadoT').innerHTML = '';
        // document.getElementById('estadoL').innerHTML = '';
        // document.getElementById('estadoH').innerHTML = '';
        // document.getElementById('bnAdd').disabled=false;

        /*SI ALGUNA DE LAS CONDICIONES NO ES COMPATIBLE CON LAS DEL UMBRÁCULO, APARECE ALGUNO DE LOS MENSAJES*/
        /*Y EL BOTON DE AGREGAR ESTARÁ DESHABILITADO*/

        /*PARA COMPROBAR QUE LA TEMPERATURA DEL UMBRACULO SEA CORRECTA*/
        var $stock = document.getElementById('cantidad').value;
        var $cantidadUtilizada = document.getElementById('cantidad').value;

        /**/

        if ($tempU < $tMn || $tempU > $tMx) {
            document.getElementById('estadoT').innerHTML = 'La temperatura del umbráculo, no es la indicada para la especie.';
            document.getElementById('bnAdd').disabled=true;
        }

        /*PARA COMPROBAR QUE LA ILUMINACIÓN DEL UMBRACULO SEA CORRECTA*/
        var $luzU = document.getElementById('luz').value;
        var $lMx = document.getElementById('lMax').value;
        var $lMn = document.getElementById('lMin').value;
        /**/
        if ($luzU<$lMn || $luzU > $lMx) {
            document.getElementById('estadoL').innerHTML = 'La iluminación del umbráculo, no es la adecuada para esta especie.';
            document.getElementById('bnAdd').disabled=true;
        }
        /*PARA COMPROBAR QUE LA HUMEDAD DEL UMBRACULO SEA CORRECTA*/
        var $humU = document.getElementById('humedad').value;
        var $hMx = document.getElementById('hMax').value;
        var $hMn = document.getElementById('hMin').value;
        if ($humU<$hMn || $humU > $hMx) {
            document.getElementById('estadoH').innerHTML = 'La humedad dentro del umbráculo, no es la adecuada para esta especie.';
            document.getElementById('bnAdd').disabled=true;
        }
    }




</script>
