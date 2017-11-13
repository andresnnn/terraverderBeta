<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Umbráculos</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tareas en <strong><?php echo $info_umbraculo['nombreUmbraculo'] ?></strong></h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                    <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Tipo tarea</th>
                                                <th>Planta</th>
                                                <th>Creador</th>

                                                <th>Fecha Creación</th>
                                                <th>Fecha Prevista</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                            <?php foreach($tareas_en_umbraculo as $t){ ?>
                                            <tr>
                                                <td><?php echo $t['nombreTipoTarea']; ?></td>
                                                <td><?php echo $t['nombrePlanta']; ?></td>
                                                <td><?php echo $t['creador']; ?></td>

                                                <td><?php echo $t['fechaCreacion']; ?></td>
                                                <td><?php echo $t['fechaComienzo']; ?></td>
                                                <td><?php echo $t['nombreEstado']; ?></td>

                                                <td>
                                                    <a href="<?php echo site_url('user/tareas_pla/ver_detalles/'.$t['idTarea']); ?>" class="btn btn-warning btn-primary"><span class="fa fa-eye"></span> Ver</a>

                                                <?php 
                                                if ($permisos['idGrupo'] == 3) {
                                                    if ($t['idEstado'] == 1 || $t['idEstado'] == 3) {
                                                    echo anchor('user/umbraculos_pla/atenderTarea/'.$info_umbraculo['idUmbraculo'].'/'.$t['idTarea'], '<i class="fa fa-sign-language"></i> '.'Atender tarea', array('class' => 'btn btn-primary','title'=>'(?) Atender tarea'));
                                                    } 
                                                }
                                                ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                    <!-- FIN CONTENIDO-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="box-footer" style="text-align: center;">
                    <a href="<?php echo site_url('user/umbraculos_pla/ver/'.$id); ?>" class="btn btn-default btn-flat">Volver</a>
                </div>
            </div>