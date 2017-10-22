<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>

    </section>


      <?php echo form_open('admin/insumos/stock',array('class' => 'form-horizontal', 'id')); ?>


        <div class="form-group">
          
          <label class="col-sm-2 control-label"> Stock Actual: </label>
          <div class="col-sm-10">
          <input disabled class="col-sm-10" type="text" name="cantidad" value="<?php echo ($this->input->post('cantidad') ? $this->input->post('cantidad') : $insumo['cantidad']); ?>" />
          </div>
          <span class="col-sm-10"><?php echo form_error('cantidad');?></span>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">* Incrementar stock: </label>
        <div class="col-sm-10">
        <input class="col-sm-10" type="text" name="incrementoCantidad" value="<?php echo
         $this->input->post('incrementoCantidad'); ?>" />
        </div>
        <span ><?php echo form_error('nombreInsumo');?></span>
      </div>


      <div class="btn-group">
      <button class='btn btn-primary btn-flat' type="submit">Guardar</button>
      </div>


</div>
