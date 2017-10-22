<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Planta Edit</h3>
            </div>
			<?php echo form_open('plantas/edit/'.$planta['idPlanta']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idEspecie" class="control-label">Especie</label>
						<div class="form-group">
							<select name="idEspecie" class="form-control">
								<option value="">select especie</option>
								<?php 
								foreach($all_especies as $especie)
								{
									$selected = ($especie['idEspecie'] == $planta['idEspecie']) ? ' selected="selected"' : "";

									echo '<option value="'.$especie['idEspecie'].'" '.$selected.'>'.$especie['idEspecie'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="unidadEspacioPlanta_m2" class="control-label"><span class="text-danger">*</span>UnidadEspacioPlanta M2</label>
						<div class="form-group">
							<input type="text" name="unidadEspacioPlanta_m2" value="<?php echo ($this->input->post('unidadEspacioPlanta_m2') ? $this->input->post('unidadEspacioPlanta_m2') : $planta['unidadEspacioPlanta_m2']); ?>" class="form-control" id="unidadEspacioPlanta_m2" />
							<span class="text-danger"><?php echo form_error('unidadEspacioPlanta_m2');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcionPlanta" class="control-label"><span class="text-danger">*</span>DescripcionPlanta</label>
						<div class="form-group">
							<input type="text" name="descripcionPlanta" value="<?php echo ($this->input->post('descripcionPlanta') ? $this->input->post('descripcionPlanta') : $planta['descripcionPlanta']); ?>" class="form-control" id="descripcionPlanta" />
							<span class="text-danger"><?php echo form_error('descripcionPlanta');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombreCientificoPlanta" class="control-label"><span class="text-danger">*</span>NombreCientificoPlanta</label>
						<div class="form-group">
							<input type="text" name="nombreCientificoPlanta" value="<?php echo ($this->input->post('nombreCientificoPlanta') ? $this->input->post('nombreCientificoPlanta') : $planta['nombreCientificoPlanta']); ?>" class="form-control" id="nombreCientificoPlanta" />
							<span class="text-danger"><?php echo form_error('nombreCientificoPlanta');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombrePlanta" class="control-label"><span class="text-danger">*</span>NombrePlanta</label>
						<div class="form-group">
							<input type="text" name="nombrePlanta" value="<?php echo ($this->input->post('nombrePlanta') ? $this->input->post('nombrePlanta') : $planta['nombrePlanta']); ?>" class="form-control" id="nombrePlanta" />
							<span class="text-danger"><?php echo form_error('nombrePlanta');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>