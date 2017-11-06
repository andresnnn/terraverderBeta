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
                                    <h3 class="box-title">Detalles Tarea</h3>
                                </div>
                                <div class="box-body">
                                	<?php foreach ($tarea as $t) { ?>
                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Tipo de tarea</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['nombreTipoTarea']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->
                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Descripción tarea</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['descripcionTarea']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->
                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Umbráculo</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['nombreUmbraculo']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->
                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Información Planta</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo "Nombre: ".$t['nombrePlanta']; ?>" class="form-control">
											<input disabled type="text" value="<?php echo "Nombre científico: ".$t['nombreCientificoPlanta']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->
                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Usuario creador</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['Creador']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->

                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Fecha creación</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['fechaCreacion']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->

                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Estado tarea</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['nombreEstado']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->
                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Fecha atención</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['fechaAtencion']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->
                                	<!--CAJA-->
                                	<div class="col-md-6">
										<label class="control-label">Usuario atendió</label>
										<div class="form-group">
											<input disabled type="text" value="<?php echo $t['Atendio']; ?>" class="form-control">
										</div>
                                	</div>
                                	<!--FIN CAJA-->
                                	<div class="col-md-6">
									<?php if ($t['idEstado'] == 1 || $t['idEstado'] == 3) {

										echo '<label class="control-label">Atender tarea</label><div class="form-group">';
                                        echo anchor('common/umbraculos/atenderTarea/'.$t['idUmbraculo'].'/'.$t['idTarea'], '<i class="fa fa-sign-language"></i> '.'Atender tarea', array('class' => 'btn btn-primary','title'=>'(?) Atender tarea'));

                                        echo '</div>';
                                    } ?>
                                	<?php } ?>
                                	</div>
                                	<!--FIN CAJA-->
                              </div>
                            </div>
                            </div>
                </section>
            <div class="box-footer" style="text-align: center;">
                <a href="<?php echo site_url('common/umbraculos/verTareas/'.$idUmbraculo); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>
            </div>