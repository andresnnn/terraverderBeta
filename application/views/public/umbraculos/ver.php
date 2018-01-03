<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
<section id="main-content" class="content-header">
                    <div class="row">
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Detalles <strong><?php echo $info_umbraculo['nombreUmbraculo']?></h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Nombre</th>
                                                <td><?php echo $info_umbraculo['nombreUmbraculo']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sustrato</th>
                                                <td><textarea style="width:100%" disabled><?php echo $info_umbraculo['descripcionSustrato']; ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <th>Descripción</th>
                                                <td><textarea style="width:100%" disabled><?php echo $info_umbraculo['descripcionUmbraculo']; ?></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-footer" style="text-align: center;" title="Volver a vista administración de umbráculos">
                                    <a href="<?php echo site_url('user/umbraculos_pla'); ?>" class="btn btn-default btn-flat">Volver atrás</a>
                                </div>
                            </div>
                    <!--CAJA CONDICIONES-->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Condiciones</h3>
                                </div>
                            <div class="box-body">
                                    <div class="box-body">
                                                <table class="table table-striped table-hover">
                                                <tr>
                                                    <td>Temperatura <strong><?php echo $info_umbraculo['temperaturaUmbraculo']; ?>°C</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Iluminación <strong><?php echo $info_umbraculo['luzUmbraculo']; ?> lx.</strong></td>
                                                </tr>
                                                </table><br>
                                             <div class="progress-group">
                                                <span class="progress-text">Húmedad (%)</span>
                                                <span class="progress-number"><strong><?php echo $info_umbraculo['humedadUmbraculo']; ?></strong>/100</span>

                                                <div class="progress" title="Húmedad dentro del umbráculo">
                                                    <div class="progress-bar progress-bar-aqua" role="progressbar" style="width: <?php echo $info_umbraculo['humedadUmbraculo']; ?>%" ></div>
                                                </div>
                                            </div>
                                            <div class="progress-group">
                                                <span class="progress-text">Espacio disponible</span>
                                                <span class="progress-number"><strong>
                                                <?php echo $info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2']); ?>m<sup>2</sup>
                                                </strong>/<?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?>m<sup>2</sup></span>

                                                <div class="progress" title="Espacio disponible dentro del umbráculo">
                                                    <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="<?php echo $info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2']); ?>" aria-valuemin="0" aria-valuemax="<?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?>" 
                                                    style="width: 
                                                    <?php echo ($info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2'])*-100.000)/$info_umbraculo['unidadEspacioTotal_m2']; ?>%" ></div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            </div>
                         </div>
                    <!--FIN CAJA CONDICIONES-->
                    <!-- CAJA PLANTAS-->
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Plantas</h3>
                                </div>
                                <div class="box-body">
                                <div class="box-body">
                                           <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                            </tr>
                                                <?php foreach($umbraculo_plantas as $u){ ?>
                                                <tr>
                                                    <td><?php echo $u['nombrePlanta']; ?></td>
                                                    <td><?php echo $u['cantidad']; ?></td>
                                                </tr>
                                                <?php } ?>
                                        </table>

                                            <div>
                                                <table>
                                                    <td><h3 class="box-title"><?php echo anchor('user/umbraculos_pla/verPlantas/'.$id, '<i class="fa fa-eye"></i> '.'Ver plantas', array('class' => 'btn btn-block btn-primary btn-flat','title'=>'(?) Ver todas las plantas dentro del umbráculo')); ?></h3></td
                                                    >
                                                      <td><h3 class="box-title">
                                                      <?php echo anchor('user/umbraculos_pla/agregarPlanta/'.$id, '<i class="fa fa-plus"></i> '.'Agregar planta', array('class' => 'btn btn-block btn-primary btn-flat','title'=>'(?) Agregar una nueva planta dentro de este umbráculo')); ?>
                                                      </h3></td>
                                                </table>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--FIN CAJA PLANTAS-->

                    <!--CAJA TAREAS-->

                    <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tareas</h3>
                                </div>
                                <div class="box-body">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Tipo tarea</th>
                                                <th>Planta</th>
                                                <th>Creador</th>
                                                <th>Fecha creación</th>
                                                <th>Fecha prevista</th>
                                                <th>Estado</th>
                                            </tr>
                                            <?php foreach($tareas as $t){ ?>
                                            <tr>
                                                <td><?php echo $t['nombreTipoTarea']; ?></td>
                                                <td><?php echo $t['nombrePlanta']; ?></td>
                                                <td><?php echo $t['creador']; ?></td>
                                                <td><?php echo $t['fechaCreacion']; ?></td>
                                                <td><?php echo $t['fechaComienzo']; ?></td>
                                                <td><?php echo $t['nombreEstado']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                            <div>
                                                <table>
                                                    <td><h3 class="box-title"><?php echo anchor('user/Umbraculos_pla/verTareas/'.$id,'<i class="fa fa-eye"></i> '.'Ver Todas las tareas', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3></td
                                                    >
                                                    <?php if ($permisos['idGrupo'] == 2) { ?>
                                                    <td><h3 class="box-title"><?php echo anchor('user/Tareas_pla/agregarTarea/'.$id, '<i class="fa fa-plus"></i> '.'Agregar tarea', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3></td>
                                                    <?php  }?>
                                                    <td><h3 title="Presiona para generar un PDF con las tareas del umbraculo." class="box-title"><?php echo anchor('user/tareas_pla/generaPDFUmbraculo/'.$id, '<i class="fa fa-file-pdf-o"></i> '.'PDF Tareas del Umbraculo', array('class' => 'btn btn-block btn-danger btn-flat')); ?></h3></td>
                                                </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FIN CAJA TAREAS-->
                </section>
            </div>