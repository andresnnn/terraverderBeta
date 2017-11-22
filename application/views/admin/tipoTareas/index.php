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
                        <h3 class="box-title"><?php echo anchor('common/tipotareas/add', '<i class="fa fa-plus"></i> '. lang('tipotareas_create_tipotareas'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                    </div>

            </div>
            <div class="box-body">
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
                    <a href="<?php echo site_url('common/tipotareas/profile/'.$t['idTipoTarea']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a>
                    <a href="<?php echo site_url('common/tipotareas/edit/'.$t['idTipoTarea']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Borrar</button>
                   
                  </td>
                  </tr>
                <?php } ?>
                </table>

            </div>
                  <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Atención</h4>
                          </div>
                          <div class="modal-body">
                            <p>¿Está seguro de querer eliminar este tipo de tarea?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo site_url('common/tipotareas/remove/'.$t['idTipoTarea']); ?>" class="btn btn-danger btn-flat"><span class="fa fa-trash"></span> Borrar</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>


             </div>
        </div>
    </section>
</div>
