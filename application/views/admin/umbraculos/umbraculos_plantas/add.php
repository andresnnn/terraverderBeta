<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Umbraculo Plantas Add</h3>
            </div>
            <?php echo form_open('umbraculo_plantas/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="idPlanta" class="control-label"><span class="text-danger">*</span>Planta</label>
						<div class="form-group">
							<select name="idPlanta" class="form-control">
								<option value="">select planta</option>
								<?php 
								foreach($all_plantas as $planta)
								{
									$selected = ($planta['idPlanta'] == $this->input->post('idPlanta')) ? ' selected="selected"' : "";

									echo '<option value="'.$planta['idPlanta'].'" '.$selected.'>'.$planta['idPlanta'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idPlanta');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cantidad" class="control-label"><span class="text-danger">*</span>Cantidad</label>
						<div class="form-group">
							<input type="text" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" class="form-control" id="cantidad" />
							<span class="text-danger"><?php echo form_error('cantidad');?></span>
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