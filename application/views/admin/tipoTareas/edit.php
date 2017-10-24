<?php echo form_open('tipotarea/edit/'.$tipotarea['idTipoTarea']); ?>

	<div>
		<span class="text-danger">*</span>NombreTipoTarea : 
		<input type="text" name="nombreTipoTarea" value="<?php echo ($this->input->post('nombreTipoTarea') ? $this->input->post('nombreTipoTarea') : $tipotarea['nombreTipoTarea']); ?>" />
		<span class="text-danger"><?php echo form_error('nombreTipoTarea');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>DescripcionTarea : 
		<input type="text" name="descripcionTarea" value="<?php echo ($this->input->post('descripcionTarea') ? $this->input->post('descripcionTarea') : $tipotarea['descripcionTarea']); ?>" />
		<span class="text-danger"><?php echo form_error('descripcionTarea');?></span>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>