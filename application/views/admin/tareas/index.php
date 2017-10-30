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
                                    <h3 class="box-title"><?php echo anchor('common/tareas/add', '<i class="fa fa-envira"></i> '. lang('tareas_create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                      
                                </div>

                         <div class="box-body" style="overflow-y:scroll;">
                         <section class="content">

                <table class="table table-striped table-hover">
                    <tr>
                      <th>Id Tarea</th>
                      <th>Tipo de Tarea</th>
                      <th>Estado</th>
                      <th>Planta</th>
                      <th>Umbraculo</th>
                      <th>Acciones</th>




                    </tr>
                    <?php foreach($tarea as $t){ ?>
                    <tr>
                      <td><?php echo $t['idTarea']; ?></td>
                      <td><?php echo $t['nombreTipoTarea']; ?></td>
                      <td><?php echo $t['nombreEstado']; ?></td>
                      <td><?php echo $t['nombrePlanta']; ?></td>
                      <td><?php echo $t['nombreUmbraculo']; ?></td>

                        <td>
                            <a href="<?php echo site_url('common/tareas/atender/'.$t['idTarea']); ?>" class="btn btn-default btn-xs"><span class="fa fa-envira"></span>Atender tarea <?php echo $t['idTarea']; ?></a>
                            <a href="<?php echo site_url('common/tareas/profile/'.$t['idTarea']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-eye"></span> Detalles Tarea <?php echo $t['idTarea']; ?></a>
                            <a href="<?php echo site_url('common/tareas/edit/'.$t['idTarea']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Modificar tarea <?php echo $t['idTarea']; ?></a>
                            <a href="<?php echo site_url('common/tareas/remove/'.$t['idTarea']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Eliminar tarea <?php echo $t['idTarea']; ?></a>

                        </td>
                    </tr>
                    <?php } ?>
                </table>
                         </div>
                    </div>
                </section>
            </div>
