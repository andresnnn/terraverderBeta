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
                                    <h3 class="box-title"><?php echo anchor('common/plantas/crear', '<i class="fa fa-plus"></i> '. lang('plantas_create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>

                         <div class="box-body">
                         <section class="content">

                <table class="table table-striped table-hover">
                    <tr>
                      <th>IdTarea</th>
                      <th>IdTipoTarea</th>
                      <th>IdEstado</th>
                      <th>IdUserAtencion</th>
                      <th>IdUserCreador</th>
                      <th>IdPlanta</th>
                      <th>IdUmbraculo</th>
                      <th>FechaCreacion</th>
                      <th>FechaAtencion</th>
                      <th>FechaHoraComienzo</th>
                      <th>ObservacionEspecialista</th>
                      <th>Actions</th>
                    </tr>
                    <?php foreach($tarea as $t){ ?>
                    <tr>
                      <td><?php echo $t['idTarea']; ?></td>
                      <td><?php echo $t['idTipoTarea']; ?></td>
                      <td><?php echo $t['idEstado']; ?></td>
                      <td><?php echo $t['idUserAtencion']; ?></td>
                      <td><?php echo $t['idUserCreador']; ?></td>
                      <td><?php echo $t['idPlanta']; ?></td>
                      <td><?php echo $t['idUmbraculo']; ?></td>
                      <td><?php echo $t['fechaCreacion']; ?></td>
                      <td><?php echo $t['fechaAtencion']; ?></td>
                      <td><?php echo $t['fechaHoraComienzo']; ?></td>
                      <td><?php echo $t['observacionEspecialista']; ?></td>


                        <td>
                            <a href="<?php echo site_url('common/plantas/editar/'.$p['idPlanta']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('plantas/remove/'.$p['idPlanta']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                         </div>
                    </div>
                </section>
            </div>
