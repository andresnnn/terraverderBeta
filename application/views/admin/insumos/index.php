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
                        <h3 class="box-title"><?php echo anchor('admin/insumos/crear', '<i class="fa fa-plus"></i> '. lang('insumos_create_insumos'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>

                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><?php echo lang('insumos_name');?></th>
                                    <th><?php echo lang('insumos_stock');?></th>
                                    <th><?php echo lang('insumos_point');?></th>
                                </tr>
                            </thead>
                            <tbody>
<?php foreach ($insumo as $i):?>
                                <tr>
                                    <td><?php echo $i['nombreInsumo']; ?></td>
                                    <td><?php echo $i['cantidad']; ?></td>
                                    <td><?php echo $i['puntoDePedido']; ?></td>
                                    <td>
                                        <?php echo anchor('admin/insumos/edit/'.$i['idInsumo'], lang('actions_edit'));
                                        echo " | ";?>
                                        <?php echo anchor('admin/insumos/profile/'.$i['idInsumo'], lang('actions_see')); ?>
                                    </td>
                                </tr>
<?php endforeach;?>
                            </tbody>
                        </table>
                    </div>


             <div class="box-body">
             <section class="content">



             </div>
        </div>
    </section>
</div>
