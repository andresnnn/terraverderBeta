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

                         <div class="box-body">
                         <section class="content">

                <table class="table table-striped table-hover">
                    <tr>
                      <th>IdTarea</th>
                      <th>IdTipoTarea</th>
                      <th>IdEstado</th>

                      <th>IdPlanta</th>
                      <th>IdUmbraculo</th>


                      <th>Operaciones</th>
                    </tr>
                    <?php foreach($tarea as $t){ ?>
                    <tr>
                      <td><?php echo $t['idTarea']; ?></td>
                      <td><?php echo $t['idTipoTarea']; ?></td>
                      <td><?php echo $t['idEstado']; ?></td>

                      <td><?php echo $t['idPlanta']; ?></td>
                      <td><?php echo $t['idUmbraculo']; ?></td>


                        <td>
                            <a href="<?php echo site_url('common/tareas/profile/'.$t['idTarea']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-eye"></span> Ver Tarea</a>
                            <a href="<?php echo site_url('common/tareas/edit/'.$t['idTarea']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Modificar</a>
                            <a href="<?php echo site_url('common/tareas/remove/'.$t['idTarea']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                         </div>
                    </div>
                </section>
            </div>
