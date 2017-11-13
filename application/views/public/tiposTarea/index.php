<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      



            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración tipo tarea</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('user/Tipostareas_pla/add', '<i class="fa fa-plus"></i> '. lang('tipotareas_create_tipotareas'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                        <table class="table table-striped">
                                          <tr>
                                          <th>Nombre</th>
                                          <th>Descripción</th>
                                          <th>Acciones</th>
                                          </tr>
                                          <?php foreach($tipotarea as $t){ ?>
                                          <tr>
                                          <td><?php echo $t['nombreTipoTarea']; ?></td>
                                          <td><?php echo $t['descripcionTarea']; ?></td>
                                          <td>
                                                <a href="<?php echo site_url('user/Tipostareas_pla/profile/'.$t['idTipoTarea']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a>
                                                <a href="<?php echo site_url('user/Tipostareas_pla/edit/'.$t['idTipoTarea']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
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
            </div>