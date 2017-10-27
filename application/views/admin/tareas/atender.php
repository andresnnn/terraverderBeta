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
            <div class="col-md-32">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Atender la tarea nro. <?php echo $tarea['idTarea']; ?></h3>
                    </div>
                    <div class="box-body">

                      <!-- COMIENZA FORMULARIO -->
                      <?php echo form_open('common/tareas/edit/'.$tarea['idTarea'],array("class"=>"form-horizontal")); ?>

                      <div class="form-group">
		<label for="idTarea" class="col-md-3 control-label">idTarea</label>
		<div class="col-md-8">
			<input type="text" name="idTarea" value="<?php echo ($this->input->post('idTarea') ? $this->input->post('idTarea') : $tarea['idTarea']); ?>" class="form-control" id="idTarea" />
		</div>
	</div>
	<div class="form-group">
		<label for="idTipoTarea" class="col-md-3 control-label">tipo de tarea</label>
		<div class="col-md-8">
			<input type="text" name="idTipoTarea" value="<?php echo ($this->input->post('idTipoTarea') ? $this->input->post('idTipoTarea') : $tarea['idTipoTarea']); ?>" class="form-control" id="idTipoTarea" />
		</div>
	</div>


  <div class="box-footer">
      <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
      <a href="<?php echo site_url('common/tareas'); ?>" class="btn btn-default btn-flat">Cancelar</a>
  </div>

                    <?php echo form_close(); ?>

                    <!--TERMINA FORMULARIO-->
                    </div>
                  </div>
            </div>
        </div>
    </section>
</div>




















<!--
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tarea Edit</h3>
            </div>
			<?php /*echo form_open('tareas/edit/'.$tarea['idTarea']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idTipoTarea" class="control-label">Tipotarea</label>
						<div class="form-group">
							<select name="idTipoTarea" class="form-control">
								<option value="">select tipotarea</option>
								<?php
								/*foreach($all_tipotarea as $tipotarea)
								{
									$selected = ($tipotarea['idTipoTarea'] == $tarea['idTipoTarea']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipotarea['idTipoTarea'].'" '.$selected.'>'.$tipotarea['idTipoTarea'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idEstado" class="control-label">Estado Tarea</label>
						<div class="form-group">
							<select name="idEstado" class="form-control">
								<option value="">select estado_tarea</option>
								<?php
								/*foreach($all_estado_tarea as $estado_tarea)
								{
									$selected = ($estado_tarea['idEstado'] == $tarea['idEstado']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_tarea['idEstado'].'" '.$selected.'>'.$estado_tarea['idEstado'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idUserAtencion" class="control-label">User</label>
						<div class="form-group">
							<select name="idUserAtencion" class="form-control">
								<option value="">select user</option>
								<?php
								/*foreach($all_users as $user)
								{
									$selected = ($user['id'] == $tarea['idUserAtencion']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['id'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idUserCreador" class="control-label">User</label>
						<div class="form-group">
							<select name="idUserCreador" class="form-control">
								<option value="">select user</option>
								<?php
								/*foreach($all_users as $user)
								{
									$selected = ($user['id'] == $tarea['idUserCreador']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['id'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idPlanta" class="control-label">Plantum</label>
						<div class="form-group">
							<select name="idPlanta" class="form-control">
								<option value="">select plantum</option>
								<?php
								/*foreach($all_planta as $plantum)
								{
									$selected = ($plantum['idPlanta'] == $tarea['idPlanta']) ? ' selected="selected"' : "";

									echo '<option value="'.$plantum['idPlanta'].'" '.$selected.'>'.$plantum['idPlanta'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idUmbraculo" class="control-label">Umbraculo</label>
						<div class="form-group">
							<select name="idUmbraculo" class="form-control">
								<option value="">select umbraculo</option>
								<?php
								/*foreach($all_umbraculo as $umbraculo)
								{
									$selected = ($umbraculo['idUmbraculo'] == $tarea['idUmbraculo']) ? ' selected="selected"' : "";

									echo '<option value="'.$umbraculo['idUmbraculo'].'" '.$selected.'>'.$umbraculo['idUmbraculo'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechaCreacion" class="control-label">FechaCreacion</label>
						<div class="form-group">
							<input type="text" name="fechaCreacion" value="<?php /*echo ($this->input->post('fechaCreacion') ? $this->input->post('fechaCreacion') : $tarea['fechaCreacion']); ?>" class="has-datepicker form-control" id="fechaCreacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechaAtencion" class="control-label">FechaAtencion</label>
						<div class="form-group">
							<input type="text" name="fechaAtencion" value="<?php /*echo ($this->input->post('fechaAtencion') ? $this->input->post('fechaAtencion') : $tarea['fechaAtencion']); ?>" class="has-datepicker form-control" id="fechaAtencion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechaHoraComienzo" class="control-label">FechaHoraComienzo</label>
						<div class="form-group">
							<input type="text" name="fechaHoraComienzo" value="<?php /*echo ($this->input->post('fechaHoraComienzo') ? $this->input->post('fechaHoraComienzo') : $tarea['fechaHoraComienzo']); ?>" class="has-datepicker form-control" id="fechaHoraComienzo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="observacionEspecialista" class="control-label">ObservacionEspecialista</label>
						<div class="form-group">
							<input type="text" name="observacionEspecialista" value="<?php /*echo ($this->input->post('observacionEspecialista') ? $this->input->post('observacionEspecialista') : $tarea['observacionEspecialista']); ?>" class="form-control" id="observacionEspecialista" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>
			<?php /*echo form_close(); ?>
		</div>
    </div>
</div>
-->
