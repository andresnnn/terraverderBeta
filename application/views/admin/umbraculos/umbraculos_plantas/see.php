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
                                    <h3 class="box-title">Plantas dentro de <strong><?php echo $info_umbraculo['nombreUmbraculo']?></strong></h3>
                                </div>
                                    <div class="box-body">                       
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <?php foreach($umbraculo_plantas as $u){ ?>
                                        <tr>
                                            <td><?php echo $u['nombrePlanta']; ?></td>
                                            <td><?php echo $u['cantidad']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('umbraculo_plantas/edit/'.$u['idUmbraculo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-plus"></span> Actualizar Cantidad</a> 
                                                <a href="<?php echo site_url('common/umbraculos/sacar_planta_umbraculo/'.$u['idUmbraculo'].'/'.$u['idPlanta']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-minus"></span> Quitar planta</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    </div>
                                </div>
                </section>
            <div class="box-footer" style="text-align: center;">
                <a href="<?php echo site_url('common/umbraculos/ver/'.$id); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>  
            </div>