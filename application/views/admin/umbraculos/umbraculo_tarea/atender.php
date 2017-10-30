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
			<div class="box-header with-border">
             <h3 class="box-title">Atender tarea de <strong>></strong></h3>
            </div>
            <?php echo form_open('atender/'.$id); ?>
          	<div class="box-body">

              <label for="fechaComienzo" class="col-md-3 control-label">Fecha Prevista</label>
          		<div class="col-md-8">
          			<input readonly type="text" name="fechaComienzo" value="<?php echo ($this->input->post('fechaComienzo') ? $this->input->post('fechaComienzo') : $tarea['fechaComienzo']); ?>" class="form-control" id="fechaComienzo" />
          		</div>

              <div class="col-md-6">

						<label for="idEstado" class="control-label">Estado Tarea</label>
						<div class="form-group">
							<select name="idEstado" class="form-control">
								<option value="">select estado tarea</option>
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
						<label for="idTipoTarea" class="control-label"><span class="text-danger">*</span>Tipotarea</label>
        </div>
            <div class="box-footer" style="text-align: center;">
                <button type="submit" class="btn btn-primary btn-flat">Agregar</button>
                <a href="<?php echo site_url('common/umbraculos/ver/'.$id); ?>" class="btn btn-default btn-flat">Cancelar</a>
            </div>
            </div>
            <?php echo form_close(); ?>
                         </div>
                    </div>
                  </div>
             </div>
                </section>
            </div>
