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
                        <h3 class="box-title">Creación de Tarea</h3>
                    </div>
                                <div class="box-body">

            <?php echo form_open('common/tareas/add'); ?>
          	<div class="box-body">
          			<div class="row clearfix">

                  <div class="col-md-6">
        						<label for="idUmbraculo" class="control-label">Selecciona el Umbraculo</label>
        						<div class="form-group">
        							<select name="idUmbraculo" class="form-control">
        								<option value="">Selecciona el umbraculo</option>
        								<?php
        								foreach($infoUmbraculo as $u)
        								{
        									$selected = ($u['idUmbraculo'] == $this->input->post('idUmbraculo')) ? ' selected="selected"' : "";

        									echo '<option value="'.$u['idUmbraculo'].'" '.$selected.'>'.$u['nombreUmbraculo'].'</option>';
        								}
        								?>
        							</select>

        						</div>
        					</div>

                  <div class="col-md-6">
        						<label for="idPlanta" class="control-label">Selecciona la Planta</label>
        						<div class="form-group">
        							<select name="idPlanta" class="form-control">
        								<option value="">Selecciona la planta</option>
        								<?php
        								foreach($planta as $p)
        								{
        									$selected = ($p['idPlanta'] == $this->input->post('idPlanta')) ? ' selected="selected"' : "";

        									echo '<option value="'.$p['idPlanta'].'" '.$selected.'>'.$p['nombrePlanta'].'</option>';
        								}
        								?>
        							</select>

        						</div>
        					</div>




                  <div class="col-md-6">
                    <label for="idTipoTarea" class="control-label">Selecciona el tipo de tarea</label>
                    <div class="form-group">
                      <select name="idTipoTarea" class="form-control">
                        <option value="">Selecciona el tipo</option>
                        <?php
                        foreach($tipotarea as $tp)
                        {
                          $selected = ($tp['idTipoTarea'] == $this->input->post('idTipoTarea')) ? ' selected="selected"' : "";

                          echo '<option value="'.$tp['idTipoTarea'].'" '.$selected.'>'.$tp['nombreTipoTarea'].'</option>';
                        }
                        ?>
                      </select>

                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="fechaHoraComienzo" class="control-label">Selecciona la fecha limite de atencion</label>
                    <div class="form-group">
                      <input type="date" name="dia" id="dia">
                    </div>
                  </div>




					<div class="col-md-12">
						<label for="observacionCreador" class="control-label"><span class="text-danger">*</span>Observaciones para la tarea</label>
						<div class="form-group">
							<textarea name="observacionCreador" class="form-control" id="observacionCreador"> </textarea>
							<span class="text-danger"><?php echo form_error('observacionCreador');?></span>
						</div>
					</div>

				</div>
			</div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat btn-block">Guardar</button>
                <a href="<?php echo site_url('common/plantas'); ?>" class="btn btn-warning btn-flat btn-block">Cancelar</a>
            </div>
            <?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>
