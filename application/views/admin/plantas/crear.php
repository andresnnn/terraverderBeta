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
                        <h3 class="box-title">Nueva planta</h3>
                    </div>
                                <div class="box-body">
                                
            <?php echo form_open('common/plantas/crear'); ?>
          	<div class="box-body">
          			<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombrePlanta" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="nombrePlanta" value="<?php echo $this->input->post('nombrePlanta'); ?>" class="form-control" id="nombrePlanta" />
							<span class="text-danger"><?php echo form_error('nombrePlanta');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombreCientificoPlanta" class="control-label"><span class="text-danger">*</span>Nombre Científico</label>
						<div class="form-group">
							<input type="text" name="nombreCientificoPlanta" value="<?php echo $this->input->post('nombreCientificoPlanta'); ?>" class="form-control" id="nombreCientificoPlanta" />
							<span class="text-danger"><?php echo form_error('nombreCientificoPlanta');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idEspecie" class="control-label">Especie</label>
						<div class="form-group">
							<select name="idEspecie" class="form-control" required>
								<option value="">Seleccionar especie</option>
								<?php 
								foreach($all_especies as $especie)
								{	if ($especie['active'] ==1) 
										{
											$selected = ($especie['idEspecie'] == $this->input->post('idEspecie')) ? ' selected="selected"' : "";

											echo '<option value="'.$especie['idEspecie'].'" '.$selected.'>'.$especie['nombreEspecie'].'</option>';
										} 
								}
								?>
							</select>
							<?php echo anchor('common/especies/crear', '<i class="fa fa-plus"></i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nueva especie')); ?>
						</div>
					</div>
					<div class="col-md-6">
						<label for="unidadEspacioPlanta_m2" class="control-label"><span class="text-danger">*</span>Unidades Espacio cm<sup>2</sup></label>
						<div class="form-group">
							<input type="text" name="unidadEspacioPlanta_m2" value="<?php echo $this->input->post('unidadEspacioPlanta_m2'); ?>" class="form-control" id="unidadEspacioPlanta_m2" />
							<span class="text-danger"><?php echo form_error('unidadEspacioPlanta_m2');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcionPlanta" class="control-label"><span class="text-danger">*</span>Descripción</label>
						<div class="form-group">
							<textarea name="descripcionPlanta" class="form-control" id="descripcionPlanta"> </textarea>
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