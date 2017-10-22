<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle;
         echo $breadcrumb; ?>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo insumo</h3>
                    </div>
                    <div class="box-body">


    <?php echo form_open('admin/insumos/edit/'.$insumo['idInsumo']); ?>

    	<div>
    		<span class="text-danger">*</span>NombreInsumo :
    		<input type="text" name="nombreInsumo" value="<?php echo ($this->input->post('nombreInsumo') ? $this->input->post('nombreInsumo') : $insumo['nombreInsumo']); ?>" />
    		<span class="text-danger"><?php echo form_error('nombreInsumo');?></span>
    	</div>
    	<div>
    		<?php echo lang('insumos_stock');?>:
    		<input disabled type="text" name="cantidad" value="<?php echo ($this->input->post('cantidad') ? $this->input->post('cantidad') : $insumo['cantidad']); ?>" />
    		<span class="text-danger"><?php echo form_error('cantidad');?></span>
    	</div>
      
    	<div>
    		<?php echo lang('insumos_point');?>:
    		<input type="text" name="puntoDePedido" value="<?php echo ($this->input->post('puntoDePedido') ? $this->input->post('puntoDePedido') : $insumo['puntoDePedido']); ?>" />
    		<span class="text-danger"><?php echo form_error('puntoDePedido');?></span>
    	</div>
    	<div>
    		<span class="text-danger">*</span> <?php echo lang('insumos_description');?>:
    		<textarea name="descripcionInsumo"><?php echo ($this->input->post('descripcionInsumo') ? $this->input->post('descripcionInsumo') : $insumo['descripcionInsumo']); ?></textarea>
    		<span class="text-danger"><?php echo form_error('descripcionInsumo');?></span>
    	</div>

      <div class="btn-group">
      <button class='btn btn-primary btn-flat' type="submit">Guardar</button>
      </div>

    <?php echo form_close(); ?>

            </div>
          </div>
        </div>
      </div>
  </section>



</div>
