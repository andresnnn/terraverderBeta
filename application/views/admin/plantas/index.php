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

                <table class="table table-striped">
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre Científico</th>
                        <th>Unidades Espacio</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($plantas as $p){ ?>
                    <tr>
                        <td><?php echo $p['nombrePlanta']; ?></td> 
                        <td><?php echo $p['nombreCientificoPlanta']; ?></td>
                        <td><?php echo $p['unidadEspacioPlanta_m2']; ?></td>
                        <td><?php echo $p['descripcionPlanta']; ?></td>
                       
                        
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