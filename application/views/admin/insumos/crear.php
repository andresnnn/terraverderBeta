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
                        <h3 class="box-title">Nuevo insumo</h3>
                    </div>
                    <div class="box-body">

                      <!-- COMIENZA FORMULARIO -->
                      <?php echo form_open('common/insumos/crear',array('class' => 'form-horizontal', 'id')); ?>

                    <div class="form-group">
                  		<label for="nombreInsumo" class="col-md-3 control-label" class="col-sm-2 control-label">Nombre del Insumo: </label>
                  		<div class="col-md-8">
                  			<input type="text" name="nombreInsumo" value="<?php echo $this->input->post('nombreInsumo'); ?>" class="form-control" id="nombreInsumo" />
                        <span class="text-danger"><?php echo form_error('nombreInsumo');?></span>
                  		</div>
                  	</div>

	<div class="form-group">
		<label for="descripcionInsumo" class="col-md-3 control-label">Descripcion del Insumo: </label>
		<div class="col-md-8">
			<input type="text" name="descripcionInsumo" value="<?php echo $this->input->post('descripcionInsumo'); ?>" class="form-control" id="descripcionInsumo" />
      <span class="text-danger"><?php echo form_error('descripcionInsumo');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="cantidad" class="col-md-3 control-label">Cantidad: </label>
		<div class="col-md-8">
			<input type="number" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" class="form-control" id="cantidad" />
      <span class="text-danger"><?php echo form_error('cantidad');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="puntoDePedido" class="col-md-3 control-label">Punto de Pedido: </label>
		<div class="col-md-8">
			<input type="number" name="puntoDePedido" value="<?php echo $this->input->post('puntoDePedido'); ?>" class="form-control" id="puntoDePedido" />
      <span class="text-danger"><?php echo form_error('puntoDePedido');?></span>
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
