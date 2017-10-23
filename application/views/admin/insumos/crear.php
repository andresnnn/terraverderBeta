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
                        <h3 class="box-title">Nuevo insumo</h3>
                    </div>
                    <div class="box-body">

                      <!-- COMIENZA FORMULARIO -->
                      <?php echo form_open('common/insumos/crear',array('class' => 'form-horizontal', 'id')); ?>

                      <div class="form-group">

                        <label class="col-sm-2 control-label">*Nombre del Insumo: </label>
                        <div class="col-sm-10">
                        <input class="col-sm-10" type="text" name="nombreInsumo" value="<?php echo
                         $this->input->post('nombreInsumo'); ?>" />
                        </div>
                        <span ><?php echo form_error('nombreInsumo');?></span>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">*Cantidad: </label>
                        <div class="col-sm-10">
                        <input class="col-sm-10" type="text" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" />
                        </div>
                        <span class="col-sm-10"><?php echo form_error('cantidad');?></span>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">PuntoDePedido: </label>
                        <div class="col-sm-10">
                        <input class="col-sm-10"
                         type="text" name="puntoDePedido" value="<?php echo $this->input->post('puntoDePedido'); ?>" />
                       </div>
                        <span class="col-sm-10"><?php echo form_error('puntoDePedido');?></span>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">* <?php echo lang('insumos_description')?> :</label>
                        <div class="col-sm-10">

                        <textarea class = "col-sm-10" name="descripcionInsumo"><?php echo $this->input->post('descripcionInsumo'); ?></textarea>
                        </div>
                        <span class="col-sm-10"><?php echo form_error('descripcionInsumo');?></span>
                      </div>
                      <div class="btn-group">
                      <button class='btn btn-primary btn-flat' type="submit">Guardar</button>
                    </div>
                    <?php echo form_close(); ?>

                    <!--TERMINA FORMULARIO-->
                    </div>
                  </div>
            </div>
        </div>
    </section>
</div>
