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
                        <h3 class="box-title"><?php echo anchor('common/tipotareas/crear', '<i class="fa fa-plus"></i> '. lang('insumos_create_insumos'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                    </div>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                  <tr>
                  <th>IdTipoTarea</th>
                  <th>NombreTipoTarea</th>
                  <th>DescripcionTarea</th>
                  <th>Actions</th>
                  </tr>
                  <?php foreach($tipotarea as $t){ ?>
                  <tr>
                  <td><?php echo $t['idTipoTarea']; ?></td>
                  <td><?php echo $t['nombreTipoTarea']; ?></td>
                  <td><?php echo $t['descripcionTarea']; ?></td>
                  <td>
                          <a href="<?php echo site_url('tipotarea/edit/'.$t['idTipoTarea']); ?>">Edit</a> |
                          <a href="<?php echo site_url('tipotarea/remove/'.$t['idTipoTarea']); ?>">Delete</a>
                      </td>
                  </tr>
                <?php } ?>
                </table>

            </div>



             </div>
        </div>
    </section>
</div>
