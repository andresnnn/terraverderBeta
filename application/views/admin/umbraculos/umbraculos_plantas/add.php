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
                          <button type="button" class="btn btn-block btn-primary btn-flat'" data-toggle="modal" data-target="#myModal">Seleccionar planta</button>
<!-- 							<select name="idPlanta" class="form-control">
								<option value="">Seleccionar planta</option>
								<?php 
								foreach($all_plantas as $planta)
								{
									$selected = ($planta['idPlanta'] == $this->input->post('idPlanta')) ? ' selected="selected"' : "";
									echo '<option value="'.$planta['idPlanta'].'" '.$selected.'>'.$planta['nombrePlanta'].'</option>';
								} 

								?>
							</select>
							<span class="text-danger"><?php echo form_error('idPlanta');?></span>
							<?php echo anchor('common/plantas/crear', '<i class="fa fa-plus"></i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nueva planta')); ?> -->
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
<!-- probando modal-->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Seleccionar planta</h4>
        </div>
        <div class="modal-body">
                          <table class="table table-striped table-hover">
                    <tr>
                    <div></div>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Unidades Espacio</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($all_plantas as $p){ ?>
                    <tr>
                        <td><?php echo $p['nombrePlanta']; ?></td> 
                        <td><?php echo $p['nombreEspecie']; ?></td>
                        <td><?php echo $p['unidadEspacioPlanta_m2']; ?>cm<sup>2</sup></td>
                        <td>
                            <button class="btn btn-info btn-xs"  data-dismiss="modal"> <span class="fa fa-check"></span> Seleccionar</button>
<!--                             <a href="<?php echo site_url('common/plantas/editar/'.$p['idPlanta']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('plantas/remove/'.$p['idPlanta']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <?php echo anchor('common/plantas/crear', '<i class="fa fa-plus"></i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nueva planta')); ?>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  
</div>
                </section>
            </div>


  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>


<script>
$(document.ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>