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
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tarea Edit</h3>
            </div>
			<?php echo form_open('tareas/edit/'.$tarea['idTarea']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idTipoTarea" class="control-label">Tipotarea</label>
						<div class="form-group">
							<select name="idTipoTarea" class="form-control">
								<option value="">select tipotarea</option>
								<?php
								foreach($all_tipotarea as $tipotarea)
								{
									$selected = ($tipotarea['idTipoTarea'] == $tarea['idTipoTarea']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipotarea['idTipoTarea'].'" '.$selected.'>'.$tipotarea['nombreTipoTarea'].'</option>';
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
								foreach($all_estado_tarea as $estado_tarea)
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
								foreach($all_users as $user)
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
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $tarea['idUserCreador']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['id'].'</option>';
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
								foreach($all_umbraculo as $umbraculo)
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
							<input type="text" name="fechaCreacion" value="<?php echo ($this->input->post('fechaCreacion') ? $this->input->post('fechaCreacion') : $tarea['fechaCreacion']); ?>" class="has-datepicker form-control" id="fechaCreacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechaAtencion" class="control-label">FechaAtencion</label>
						<div class="form-group">
							<input class="has-datepicker form-control" type="date" id="fechaAtencion"  name="fechaAtencion" value="<?php echo ($this->input->post('fechaAtencion') ? $this->input->post('fechaAtencion') : $tarea['fechaAtencion']); ?>" class="has-datepicker form-control" id="fechaAtencion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechaHoraComienzo" class="control-label">FechaComienzo</label>
						<div class="form-group">
							<input type="text" name="fechaComienzo" value="<?php echo ($this->input->post('fechaComienzo') ? $this->input->post('fechaComienzo') : $tarea['fechaComienzo']); ?>" class="has-datepicker form-control" id="fechaComienzo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idPlanta" class="control-label">IdPlanta</label>
						<div class="form-group">
							<input type="text" name="idPlanta" value="<?php echo ($this->input->post('idPlanta') ? $this->input->post('idPlanta') : $tarea['idPlanta']); ?>" class="form-control" id="idPlanta" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="observacionEspecialista" class="control-label">ObservacionEspecialista</label>
						<div class="form-group">
							<textarea name="observacionEspecialista" class="form-control" id="observacionEspecialista"><?php echo ($this->input->post('observacionEspecialista') ? $this->input->post('observacionEspecialista') : $tarea['observacionEspecialista']); ?></textarea>
							<span class="text-danger"><?php echo form_error('observacionEspecialista');?></span>
						</div>
					</div>
				</div>
			</div>

        <div class="box-footer" style="text-align: center;">
            <button type="submit" class="btn btn-primary btn-flat">Agregar</button>
            <a href="<?php echo site_url('common/umbraculos/verTareas/'.$idUmbraculo); ?>" class="btn btn-default btn-flat">Cancelar</a>
        </div>

			<?php echo form_close(); ?>
		</div>
    </div>
</div>
</section>
</div>
