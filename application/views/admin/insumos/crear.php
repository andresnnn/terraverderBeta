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
                      <?php echo form_open('admin/insumos/crear',array('class' => 'form-horizontal')); ?>

                      <div class="form-group">

                        <span class="col-sm-2 control-label">*NombreInsumo :</span>
                        <input class="col-sm-10" type="text" name="nombreInsumo" value="<?php echo $this->input->post('nombreInsumo'); ?>" />
                        <span ><?php echo form_error('nombreInsumo');?></span>
                      </div>
                      <div class="form-group">
                        <span class="col-sm-2 control-label">*Cantidad :</span>
                        <input type="text" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" />
                        <span class="col-sm-10"><?php echo form_error('cantidad');?></span>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2 control-label">PuntoDePedido :</div>

                        <input type="text" name="puntoDePedido" value="<?php echo $this->input->post('puntoDePedido'); ?>" />
                        <span class="col-sm-10"><?php echo form_error('puntoDePedido');?></span>
                      </div>
                      <div class="form-group">
                        <span class="col-sm-2 control-label">*DescripcionInsumo :</span>
                        <textarea name="descripcionInsumo"><?php echo $this->input->post('descripcionInsumo'); ?></textarea>
                        <span class="col-sm-10"><?php echo form_error('descripcionInsumo');?></span>
                      </div>

                      <button type="submit">Save</button>

                    <?php echo form_close(); ?>

                    <!--TERMINA FORMULARIO-->
                    </div>
                  </div>
            </div>
        </div>
    </section>
                    </div>
