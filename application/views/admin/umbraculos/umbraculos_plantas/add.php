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
                                    <h3 class="box-title">Agregar planta a <strong><?php echo $info_umbraculo['nombreUmbraculo']?></h3>
                                </div>
                                <div class="box-body">
            <?php echo form_open('common/umbraculos/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="idPlanta" class="control-label"><span class="text-danger">*</span>Planta</label>
						<div class="form-group">
							<select name="idPlanta" class="form-control">
								<option value="">Seleccionar planta</option>
								<?php 
								foreach($all_plantas as $planta)
								{
									$selected = ($planta['idPlanta'] == $this->input->post('idPlanta')) ? ' selected="selected"' : "";
									echo '<option value="'.$planta['idPlanta'].'" '.$selected.'>'.$planta['nombrePlanta'].'</option>';
                                    echo "<input type='' name='' value='".($planta['idPlanta'] == $this->input->post('idPlanta'))."'>";
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idPlanta');?></span>
							<?php echo anchor('common/plantas/crear', '<i class="fa fa-plus"></i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nueva planta')); ?>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cantidad" class="control-label"><span class="text-danger">*</span>Cantidad</label>
						<div class="form-group">
							<input type="number" min="0" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" class="form-control" id="cantidad" />
							<span class="text-danger"><?php echo form_error('cantidad');?></span>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<input type="hidden" min="0" name="idUmbraculo" value="<?php echo $id; ?>" class="form-control" id="idUmbraculo" />
							<span class="text-danger"><?php echo form_error('idUmbraculo');?></span>
						</div>
					</div>
				</div>
			</div>

            <!-- INFORMACION VISIBLE DEL UMBRÁCULO-->
			<table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td><?php echo "espacio".$info_umbraculo['unidadEspacioDisponible_m2']; ?></td>
                                                <td><?php echo "temperatura".$info_umbraculo['temperaturaUmbraculo']; ?></td>
                                                <td><?php echo "luz".$info_umbraculo['luzUmbraculo']; ?></td>
                                                <td><?php echo "humedad".$info_umbraculo['humedadUmbraculo']; ?></td>
                                            </tr>

                                        </tbody>
            </table>
            <!-- INFORMACION VISIBLE DEL UMBRÁCULO-->

            <div class="box-footer" style="text-align: center;">
                <button type="submit" class="btn btn-primary btn-flat">Agregar</button>
                <a href="<?php echo site_url('common/umbraculos/ver/'.$id); ?>" class="btn btn-default btn-flat">Cancelar</a>
            </div>  
            <?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>

<script>
    function aplicarFiltro() {

var req = $.ajax({
    url: BASE_URL+"cli/Autorizaciones/set_filtro_autorizaciones",
    type: "POST",
    data:
    {
        'conductor': $("#f-conductor").val(),
        'patente': $("#f-patente").val(),
        'pasajeros': $("#f-pasajeros").val(),
        'puntaje': $("#f-puntaje").val(),
        'autoriza': $("#f-autoriza").val(),
        'origen': $("#f-origen").val(),
        'destino': $("#f-destino").val(),
        'salida': $("#f-salida").val(),
        'arribo': $("#f-arribo").val(),
        'telefono': $("#f-telefono").val(),
        'imei': $("#f-imei").val(),
        'enviado': $("#f-enviado").val(),
        'recibido': $("#f-recibido").val(),
        'latitud': $("#f-latitud").val(),
        'longitud': $("#f-longitud").val()
      },
    dataType: "json",
    ContentType: 'application/json; charset=utf-8',
    traditional: true,
    error: function(ts) { console.log(ts); },
    success: refreshGrid

});
}

function refreshGrid(resultado)
{
  console.log(resultado); //ASÍ PODES VER EN LA CONSOLA CÓMO ESTA LLEGANDO EL OBJETO
  //MANIPULO resultado PARA METER LA INFO EN LA PÁGINA
}
</script>