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
		Plantum : 
		<select name="idPlanta">
			<option value="">Seleccionar planta</option>
			<?php 
			foreach($umbraculo_plantas as $plantum)
			{
				$selected = ($plantum['idPlanta'] == $this->input->post('idPlanta')) ? ' selected="selected"' : "";

				echo '<option value="'.$plantum['idPlanta'].'" '.$selected.'>'.$plantum['nombrePlanta'].'</option>';
			} 
			?>
		</select>
	</div>
	<div>
		Umbraculo : 
<input type="text" name="fechaCreacion" value="<?php echo $id; ?>" />
	</div>
	<div>
		<span class="text-danger">*</span>FechaCreacion : 
		<input type="datetime-local" name="fechaCreacion" value="<?php echo $this->input->post('fechaCreacion'); ?>" />
		<span class="text-danger"><?php echo form_error('fechaCreacion');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>FechaHoraComienzo : 
		<input type="time" name="fechaHoraComienzo" value="<?php echo $this->input->post('fechaHoraComienzo'); ?>" />
		<span class="text-danger"><?php echo form_error('fechaHoraComienzo');?></span>
	</div>
	<div>
		ObservacionEspecialista : 
		<textarea  name="observacionEspecialista" value="<?php echo $this->input->post('observacionEspecialista'); ?>"></textarea>
		<span class="text-danger"><?php echo form_error('observacionEspecialista');?></span>
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>
