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
                                      <label class="control-label">Fecha Prevista</label>
                                      <div class="form-group">
                                          <input disabled type="text" value="<?php echo $t['fechaComienzo']; ?>" class="form-control">
                                      </div>
                                  </div>
                                  <!--FIN CAJA-->
                                  <!--CAJA-->
                                  <div class="col-md-6">
                                      <label class="control-label">Hora Prevista</label>
                                      <div class="form-group">
                                          <input disabled type="text" value="<?php echo $t['horaComienzo']; ?>" class="form-control">
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
                                    }elseif ($t['idEstado'] == 2) {
                                        echo '<label class="control-label">Observaciones</label><div class="form-group">';
                                        echo '<textarea disabled class="form-control">'.$t['observacionEspecialista'].'</textarea>';
                                    } ?>
                                	<?php } ?>
                                	</div>
                                	<!--FIN CAJA-->
                                                                        <!--CAJA CON TABLA DE INSUMOS UTILIZADOS-->
                                    <div class="col-md-6">
                                    <label class="control-label">Insumos utilizados</label>
                                    <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Cantidad Utilizada</th>
                                            </tr>
                                            <?php foreach($insumos_tarea as $it){ ?>
                                            <tr>
                                                <td><?php echo $it['nombreInsumo']; ?></td>
                                                <td><?php echo $it['descripcionInsumo']; ?></td>
                                                <td><?php echo $it['cantidadUtilizado']; ?></td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                    </div>
                                    <!--FIN DE CAJA INSUMOS-->
                              </div>
                            </div>
                            </div>
                </section>
            <div class="box-footer" style="text-align: center;">
                <a href="<?php echo site_url('common/tareas'); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>
            </div>
