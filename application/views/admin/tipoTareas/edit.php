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
            <div class="col-md-32">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar tipo de tarea</h3>
                    </div>
                    <div class="box-body">

                      <!-- COMIENZA FORMULARIO -->
                      <?php echo form_open('common/tipotareas/edit/'.$tipotarea['idTipoTarea'],array("class"=>"form-horizontal")); ?>



<div class="form-group">
    <label for="nombreTipoTarea" class="col-md-3 control-label">Nombre del tipo de tarea: </label>
  <div class="col-md-8">
    <input class="form-control" id="nombreTipoTarea" type="text" name="nombreTipoTarea" value="<?php echo ($this->input->post('nombreTipoTarea') ? $this->input->post('nombreTipoTarea') : $tipotarea['nombreTipoTarea']); ?>"  />
  </div>
</div>

<div class="form-group">
  <label for="descripcionTarea" class="col-md-3 control-label">Descripcion del tipo de tarea: </label>
  <div class="col-md-8">
    <input class="form-control" id="descripcionTarea" type="text" name="descripcionTarea" value="<?php echo ($this->input->post('descripcionTarea') ? $this->input->post('descripcionTarea') : $tipotarea['descripcionTarea']); ?>"  />
  </div>
</div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
      <a href="<?php echo site_url('common/insumos'); ?>" class="btn btn-default btn-flat">Cancelar</a>
  </div>

                    <?php echo form_close(); ?>

                    <!--TERMINA FORMULARIO-->
                    </div>
                  </div>
            </div>
        </div>
    </section>
</div>
