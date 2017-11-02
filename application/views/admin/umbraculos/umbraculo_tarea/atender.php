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
              	<h3 class="box-title">Atender Tarea</h3>
            </div>
			<?php echo form_open('common/umbraculos/atenderTarea/'.$idUmbraculo.'/'.$idTarea); ?>
			<div class="box-body">
				<div class="row clearfix">

					<div class="col-md-3">
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
              <input  readonly type="text" name="fechaAtencion" value="<?php echo date('Y-m-d'); ?>" class="has-datepicker form-control" id="fechaAtencion" />
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
        </div>
			</div>
            <!-- seleccionar insumo -->
            <div class="form-group">
                                 <form name="add_name" id="add_name">
                                      <div class="table-responsive">
                                           <table class="table table-bordered" id="dynamic_field">
                                                <tr>
                                                     <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                                     <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                                </tr>
                                           </table>
                                           <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                                      </div>
                                 </form>
                            </div>


<!-- script tabla dinamica -->

<script>
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
      $('#submit').click(function(){
           $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                     alert(data);
                     $('#add_name')[0].reset();
                }
           });
      });
 });
 </script>

      <!-- pie de paginal-->
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
