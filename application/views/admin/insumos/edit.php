<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<script language="JavaScript">
var contador=  "<?php echo  $insumo['cantidad']; ?>";
function incrementar() {
if(contador==999)
alert('Maximo permitido alcanzado: 999');
else {

document.getElementById("cantidad").value= contador++;
}
}
function decrementar() {
if(contador<0)
alert('Minimo permitido alcanzado: 0');
else {
document.getElementById("cantidad").value= contador--;
}
}

</script>
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
                        <h3 class="box-title"><?php echo lang('insumos_edit_insumos');?></h3>
                    </div>
                    <div class="box-body">
                      <!-- COMIENZA FORMULARIO -->
                      <?php
                      $attributes = array('name' => 'formulario');
                      echo form_open('common/insumos/edit/'.$insumo['idInsumo'], $attributes); ?>

    	<div class="form-group">
    		<label class='col-sm-2 control-label' >*<?php echo lang('insumos_name');?>:</label>
        <div class="col-sm-10">
          <input class="col-sm-10" type="text" name="nombreInsumo" value="<?php echo ($this->input->post('nombreInsumo') ? $this->input->post('nombreInsumo') : $insumo['nombreInsumo']); ?>" />
        </div>
    		<span class="text-danger"><?php echo form_error('nombreInsumo');?></span>
    	</div>

      <div class="form-group">
        <div class="col-sm-10">
        <label class='col-sm-1 control-label' >*<?php echo lang('insumos_stock');?>:</label>
        <input class="col-sm-1" type="button" onClick="incrementar()" value="+">
    		<input  class="col-sm-1" readonly="readonly" type="number" id="cantidad" name="cantidad"  value = "<?php echo  $insumo['cantidad']; ?>" />
         <input class="col-sm-1" type="button" onClick="decrementar()" value="-">
        </div>
      </div>
    		<span class="text-danger"><?php echo form_error('cantidad');?></span>

    	<div class="form-group">
    		<?php echo lang('insumos_point');?>:
    		<input type="text" name="puntoDePedido" value="<?php echo ($this->input->post('puntoDePedido') ? $this->input->post('puntoDePedido') : $insumo['puntoDePedido']); ?>" />
    		<span class="text-danger"><?php echo form_error('puntoDePedido');?></span>
    	</div>

    	<div class="form-group">
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
