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
                        <h3 class="box-title">Editar especie</h3>
                    </div>
                                <div class="box-body">
			<?php echo form_open('common/especies/editar/'.$especie['idEspecie']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombreEspecie" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="nombreEspecie" value="<?php echo ($this->input->post('nombreEspecie') ? $this->input->post('nombreEspecie') : $especie['nombreEspecie']); ?>" class="form-control" id="nombreEspecie" />
							<span class="text-danger"><?php echo form_error('nombreEspecie');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombreCientificoEspecie" class="control-label"><span class="text-danger">*</span>Nombre Científico</label>
						<div class="form-group">
							<input type="text" name="nombreCientificoEspecie" value="<?php echo ($this->input->post('nombreCientificoEspecie') ? $this->input->post('nombreCientificoEspecie') : $especie['nombreCientificoEspecie']); ?>" class="form-control" id="nombreCientificoEspecie" />
							<span class="text-danger"><?php echo form_error('nombreCientificoEspecie');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="luzMax" class="control-label"><span class="text-danger">*</span>Luz Máx (lx)</label>
						<div class="form-group">
							<input type="text" name="luzMax" value="<?php echo ($this->input->post('luzMax') ? $this->input->post('luzMax') : $especie['luzMax']); ?>" class="form-control" id="luzMax" />
							<span class="text-danger"><?php echo form_error('luzMax');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="luzMin" class="control-label"><span class="text-danger">*</span>Luz Mín (lx)</label>
						<div class="form-group">
							<input type="text" name="luzMin" value="<?php echo ($this->input->post('luzMin') ? $this->input->post('luzMin') : $especie['luzMin']); ?>" class="form-control" id="luzMin" />
							<span class="text-danger"><?php echo form_error('luzMin');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="humedadMax" class="control-label"><span class="text-danger">*</span>Humedad Máx (%)</label>
						<div class="form-group">
							<input type="text" name="humedadMax" value="<?php echo ($this->input->post('humedadMax') ? $this->input->post('humedadMax') : $especie['humedadMax']); ?>" class="form-control" id="humedadMax" />
							<span class="text-danger"><?php echo form_error('humedadMax');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="humedadMin" class="control-label"><span class="text-danger">*</span>Humedad Mín (%)</label>
						<div class="form-group">
							<input type="text" name="humedadMin" value="<?php echo ($this->input->post('humedadMin') ? $this->input->post('humedadMin') : $especie['humedadMin']); ?>" class="form-control" id="humedadMin" />
							<span class="text-danger"><?php echo form_error('humedadMin');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="temperaturaMax" class="control-label"><span class="text-danger">*</span>Temperatura Máx (°C)</label>
						<div class="form-group">
							<input type="text" name="temperaturaMax" value="<?php echo ($this->input->post('temperaturaMax') ? $this->input->post('temperaturaMax') : $especie['temperaturaMax']); ?>" class="form-control" id="temperaturaMax" />
							<span class="text-danger"><?php echo form_error('temperaturaMax');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="temperaturaMin" class="control-label"><span class="text-danger">*</span>Temperatura Mín (°C)</label>
						<div class="form-group">
							<input type="text" name="temperaturaMin" value="<?php echo ($this->input->post('temperaturaMin') ? $this->input->post('temperaturaMin') : $especie['temperaturaMin']); ?>" class="form-control" id="temperaturaMin" />
							<span class="text-danger"><?php echo form_error('temperaturaMin');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcionCuidados" class="control-label"><span class="text-danger">*</span>Cuidados</label>
						<div class="form-group">
							<textarea name="descripcionCuidados" class="form-control" id="descripcionCuidados"><?php echo ($this->input->post('descripcionCuidados') ? $this->input->post('descripcionCuidados') : $especie['descripcionCuidados']); ?></textarea>
							<span class="text-danger"><?php echo form_error('descripcionCuidados');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcionSustrato" class="control-label">Sustrato</label>
						<div class="form-group">
							<textarea name="descripcionSustrato" class="form-control" id="descripcionSustrato"><?php echo ($this->input->post('descripcionSustrato') ? $this->input->post('descripcionSustrato') : $especie['descripcionSustrato']); ?></textarea>
							<span class="text-danger"><?php echo form_error('descripcionSustrato');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary btn-flat">Guardar</button>
				<a href="<?php echo site_url('common/especies'); ?>" class="btn btn-default btn-flat">Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>