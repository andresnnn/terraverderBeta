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
                                  <a href="<?php echo site_url('common/tipotareas/remove/'.$t['idTipoTarea']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
                  </td>
                  </tr>
                <?php } ?>
                </table>

            </div>



             </div>
        </div>
    </section>
</div>
