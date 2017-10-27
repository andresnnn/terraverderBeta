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
                                    <h3 class="box-title"><?php echo anchor('common/tipotareas/add', '<i class="fa fa-envira"></i> '. lang('tareas_create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>

                         <div class="box-body" style="overflow-y:scroll;">
                         <section class="content">

                <table class="table table-striped table-hover">
                    <tr>
                      <th>Id Tipo Tarea</th>
                      <th>Nombre Tipo Tarea</th>
                      <th>Descripcion Tarea</th>

                    </tr>
                    <?php foreach($tipotarea as $t){ ?>
                    <tr>
                      <td><?php echo $t['idTipoTarea']; ?></td>
                      <td><?php echo $t['nombreTipoTarea']; ?></td>
                      <td><?php echo $t['descripcionTarea']; ?></td>


                      <td>

                          <a href="<?php echo site_url('common/tipotareas/edit/'.$t['idTipoTarea']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Modificar</a>
                          <a href="<?php echo site_url('common/tipotareas/remove/'.$t['idTipoTarea']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>Eliminar</a>

                      </td>



                    </tr>
                    <?php } ?>
                </table>
                         </div>
                    </div>
                </section>
            </div>
