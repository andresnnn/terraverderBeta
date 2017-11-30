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
                                    <h3 class="box-title"><?php echo anchor('common/tareas/selecciona_umbraculo', '<i class="fa fa-plus"></i> '. 'Crear nueva tarea', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                    <div class="box-body">
                                    <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Tipo tarea</th>
                                                <th>Planta</th>
                                                <th>Creador</th>

                                                <th>Fecha Creación</th>
                                                <th>Fecha Prevista</th>
                                                <th>Progreso Tarea</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                            <?php foreach($tarea as $t){ ?>
                                            <tr>
                                                <td><?php echo $t['nombreTipoTarea']; ?></td>
                                                <td><?php echo $t['nombrePlanta']; ?></td>
                                                <td><?php echo $t['creador']; ?></td>

                                                <td><?php echo $t['fechaCreacion']; ?></td>
                                                <td><?php echo $t['fechaComienzo']; ?></td>
                                                <td><?php echo $t['nombreEstado']; ?></td>
                                                <!-- Borrado logico en activo -->
                                                <td><?php
                                                if ($t['active'] == 1) {
                                                    echo "<a href='".site_url('common/tareas/borrado_logico/'.$t['idTarea'])."'><span class='label label-success'>Activo</span></a>";
                                                }else{
                                                    echo "<a href='".site_url('common/tareas/activado_logico/'.$t['idTarea'])."'><span class='label label-default'>Inactivo</span></a>";
                                                }
                                                ?></td>

                                                <td>
                                                    <a href="<?php echo site_url('common/tareas/ver_detalles/'.$t['idTarea']); ?>" class="btn btn-warning btn-primary"><span class="fa fa-eye"></span> Ver</a>
                                                </td>

                                            </tr>
                                            <?php } ?>
                                    </table>
                                    </div>
                                </div>
                              </div>
                            </div>
                </section>
            </div>
