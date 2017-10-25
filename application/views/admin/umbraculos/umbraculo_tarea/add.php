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
                                <div class="box-body">
<?php echo form_open('tareas/add'); ?>

	<div>
		<span class="text-danger">*</span>Tipotarea : 
		<select name="idTipoTarea">
			<option value="">select tipotarea</option>
			<?php 
			foreach($all_tipotarea as $tipotarea)
			{
				$selected = ($tipotarea['idTipoTarea'] == $this->input->post('idTipoTarea')) ? ' selected="selected"' : "";

				echo '<option value="'.$tipotarea['idTipoTarea'].'" '.$selected.'>'.$tipotarea['idTipoTarea'].'</option>';
			} 
			?>
		</select>
		<span class="text-danger"><?php echo form_error('idTipoTarea');?></span>
	</div>
	<div>
		estado_tarea : 
		<select name="idEstado">
			<option value="">select estado_tarea</option>
			<?php 
			foreach($all_estado_tarea as $estado_tarea)
			{
				$selected = ($estado_tarea['idEstado'] == $this->input->post('idEstado')) ? ' selected="selected"' : "";

				echo '<option value="'.$estado_tarea['idEstado'].'" '.$selected.'>'.$estado_tarea['idEstado'].'</option>';
			} 
			?>
		</select>
	</div>
	<div>
		User : 
		<select name="idUserAtencion">
			<option value="">select user</option>
			<?php 
			foreach($all_users as $user)
			{
				$selected = ($user['id'] == $this->input->post('idUserAtencion')) ? ' selected="selected"' : "";

				echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['id'].'</option>';
			} 
			?>
		</select>
	</div>
	<div>
		User : 
		<select name="idUserCreador">
			<option value="">select user</option>
			<?php 
			foreach($all_users as $user)
			{
				$selected = ($user['id'] == $this->input->post('idUserCreador')) ? ' selected="selected"' : "";

				echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['id'].'</option>';
			} 
			?>
		</select>
	</div>
	<div>
		Plantum : 
		<select name="idPlanta">
			<option value="">select plantum</option>
			<?php 
			foreach($all_planta as $plantum)
			{
				$selected = ($plantum['idPlanta'] == $this->input->post('idPlanta')) ? ' selected="selected"' : "";

				echo '<option value="'.$plantum['idPlanta'].'" '.$selected.'>'.$plantum['idPlanta'].'</option>';
			} 
			?>
		</select>
	</div>
	<div>
		Umbraculo : 
		<select name="idUmbraculo">
			<option value="">select umbraculo</option>
			<?php 
			foreach($all_umbraculo as $umbraculo)
			{
				$selected = ($umbraculo['idUmbraculo'] == $this->input->post('idUmbraculo')) ? ' selected="selected"' : "";

				echo '<option value="'.$umbraculo['idUmbraculo'].'" '.$selected.'>'.$umbraculo['idUmbraculo'].'</option>';
			} 
			?>
		</select>
	</div>
	<div>
		<span class="text-danger">*</span>FechaCreacion : 
		<input type="text" name="fechaCreacion" value="<?php echo $this->input->post('fechaCreacion'); ?>" />
		<span class="text-danger"><?php echo form_error('fechaCreacion');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>FechaAtencion : 
		<input type="text" name="fechaAtencion" value="<?php echo $this->input->post('fechaAtencion'); ?>" />
		<span class="text-danger"><?php echo form_error('fechaAtencion');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>FechaHoraComienzo : 
		<input type="text" name="fechaHoraComienzo" value="<?php echo $this->input->post('fechaHoraComienzo'); ?>" />
		<span class="text-danger"><?php echo form_error('fechaHoraComienzo');?></span>
	</div>
	<div>
		ObservacionEspecialista : 
		<input type="text" name="observacionEspecialista" value="<?php echo $this->input->post('observacionEspecialista'); ?>" />
		<span class="text-danger"><?php echo form_error('observacionEspecialista');?></span>
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>
