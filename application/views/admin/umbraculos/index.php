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
                                    <h3 class="box-title"><?php echo anchor('common/umbraculos/crear', '<i class="fa fa-plus"></i> '. lang('umbraculos_create_umbraculo'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>

                         <div class="box-body">
                         <section class="content">

                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>
                                        <div class="info-box-content">
                                            dfgh
                                        </div>
                                    </div>
                                </div>
                             </div>
                                 
                    <table class="table table-striped table-hover">
                    <tr>

                        <th>Nombre</th>
                        <th>Temperatura Operativa</th>
                        <th>Húmedad</th>
                        <th>Sustrato</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($umbraculos as $u){ ?>
                    <tr>
                        <td><?php echo $u['nombreUmbraculo']; ?></td>
                        <td><?php echo $u['temperaturaUmbraculo']; ?>°</td>
                        <td><?php echo $u['humedadUmbraculo']; ?>%</td>
                        <td><?php echo $u['descripcionSustrato']; ?></td>
                        <td><?php echo $u['descripcionUmbraculo']; ?></td>
                        <td>
                            <a href="<?php echo site_url('common/umbraculos/editar/'.$u['idUmbraculo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('umbraculos/remove/'.$u['idUmbraculo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>   
                         </div>
                    </div>
                </section>
            </div>