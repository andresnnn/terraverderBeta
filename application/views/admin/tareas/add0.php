
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<head>
 <meta charset="utf-8">
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript">
 $(document).ready(function() {
 $("#provincia").change(function() {
 $("#provincia option:selected").each(function() {

 provincia = $('#provincia').val();
 $.post("<?php echo base_url() ?>common/tareas/llena_localidades", {/*$.post("http://localhost/select_ajax/ciudades/llena_localidades",*/

 provincia : provincia
 }, function(data) {
 $("#localidad").html(data);
 });
 });
 })
 });
 </script>
</head>









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

            <?php echo form_open('common/Tareas/add'); ?>
          	<div class="box-body">
          			<div class="row clearfix">

                  <div class="col-md-12">
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




                  <div class="col-md-12">
        						<label for="idPlanta" class="control-label">Selecciona la Planta</label>
        						<div class="form-group">
        							<select name="idPlanta" class="form-control">
        								<option value="">Selecciona la planta</option>
        								<?php
        								foreach($planta as $p) /*$planta*/
        								{
        									$selected = ($p['idPlanta'] == $this->input->post('idPlanta')) ? ' selected="selected"' : "";

        									echo '<option value="'.$p['idPlanta'].'" '.$selected.'>'.$p['nombrePlanta'].'</option>';
        								}
        								?>
        							</select>

        						</div>

        					</div>

                  <div class="col-md-12">
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



                  <div class="col-md-4">
        						<label for="idPlanta" class="control-label">Selecciona el insumo a utilizar</label>
        						<div class="form-group">
        							<select name="idInsumo" class="form-control">
        								<option value="">Selecciona el insumo</option>
        								<?php
        								foreach($insumo as $i) /*$planta*/
        								{
        									$selected = ($i['idInsumo'] == $this->input->post('idInsumo')) ? ' selected="selected"' : "";

        									echo '<option value="'.$i['idInsumo'].'" '.$selected.'>'.$i['nombreInsumo'].'</option>';
        								}
        								?>
        							</select>

        						</div>

        					</div>


                  <div class="col-md-4">
        						<label for="idPlanta" class="control-label">Selecciona la cantidad del insumo</label>
        						<div class="form-group">
        							<select name="idInsumo" class="form-control">
        								<option value="">Selecciona el insumo</option>
        								<?php
        								foreach($insumo as $i) /*$planta*/
        								{
        									$selected = ($i['idInsumo'] == $this->input->post('idInsumo')) ? ' selected="selected"' : "";

        									echo '<option value="'.$i['idInsumo'].'" '.$selected.'>'.$i['nombreInsumo'].'</option>';
        								}
        								?>
        							</select>

        						</div>
        					</div>

                  <div class="col-md-4">
        						<div class="form-group">
        							<h3 class="box-title"><?php echo anchor('common/insumos/index', '<i class="fa fa-shopping-basket"></i> '. lang('insumos_link'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                    </div>
        					</div>






                  <div class="col-md-12">
                    <label for="fechaHoraComienzo" class="control-label">Selecciona la fecha limite de atencion</label>
                    <div class="form-group">
                      <input type="date" name="dia" id="dia">
                      <span class="text-danger"><?php echo form_error('fechaHoraComienzo');?></span>
                    </div>
                  </div>












					<div class="col-md-12">
						<label for="observacionCreador" class="control-label"><span class="text-danger">*</span>Observaciones para la tarea</label>
						<div class="form-group">
							<textarea name="observacionCreador" class="form-control" id="observacionCreador"> </textarea>
							<span class="text-danger"><?php echo form_error('observacionCreador');?></span>
						</div>
					</div>



          <select name="provincia" id="provincia">
          <?php
          foreach($infoUmbraculo as $fila)
          {

          echo '<option value="'.$fila['idUmbraculo'].'" '.$selected.'>'.$fila['idUmbraculo'].'</option>';

          }
          ?>
          </select>

          <select name="localidad" id="localidad">
         <option value="">Selecciona tu provincía</option>
        </select>






				
			</div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat btn-block">Guardar Tarea</button>
                <a href="<?php echo site_url('common/tareas'); ?>" class="btn btn-warning btn-flat btn-block">Cancelar</a>
            </div>
            <?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>
