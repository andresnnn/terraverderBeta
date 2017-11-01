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
                        <h3 class="box-title">Editar planta</h3>
                    </div>
                                <div class="box-body">
			<?php echo form_open('common/plantas/editar/'.$planta['idPlanta']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombrePlanta" class="control-label"><span class="text-danger">*</span>NombrePlanta</label>
						<div class="form-group">
							<input type="text" name="nombrePlanta" value="<?php echo ($this->input->post('nombrePlanta') ? $this->input->post('nombrePlanta') : $planta['nombrePlanta']); ?>" class="form-control" id="nombrePlanta" />
							<span class="text-danger"><?php echo form_error('nombrePlanta');?></span>
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
						<label for="unidadEspacioPlanta_m2" class="control-label"><span class="text-danger">*</span>UnidadEspacioPlanta M2</label>
						<div class="form-group">
							<input type="text" name="unidadEspacioPlanta_m2" value="<?php echo ($this->input->post('unidadEspacioPlanta_m2') ? $this->input->post('unidadEspacioPlanta_m2') : $planta['unidadEspacioPlanta_m2']); ?>" class="form-control" id="unidadEspacioPlanta_m2" />
							<span class="text-danger"><?php echo form_error('unidadEspacioPlanta_m2');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcionPlanta" class="control-label"><span class="text-danger">*</span>DescripcionPlanta</label>
						<div class="form-group">
							<textarea name="descripcionPlanta" class="form-control" id="descripcionPlanta"> <?php echo ($this->input->post('descripcionPlanta') ? $this->input->post('descripcionPlanta') : $planta['descripcionPlanta']); ?></textarea>

							<span class="text-danger"><?php echo form_error('descripcionPlanta');?></span>
						</div>
					</div>
				</div>
			</div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                <a href="<?php echo site_url('common/plantas'); ?>" class="btn btn-default btn-flat">Cancelar</a>
            </div> 			
			<?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>