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
                             <div class="box ">
                                <div class="box-header with-border ">
                                    <h3 class="box-title col-md-12"><?php echo anchor('common/umbraculos/crear', '<i class="fa fa-plus"></i> '. lang('umbraculos_create_umbraculo'), array('class' => 'btn btn-block btn-primary btn-flat btn-lg')); ?></h3>
                                </div>

                         <div class="box-body">
                         <section class="content">

                    <table class="table table-striped table-hover" >
                    <?php foreach($umbraculos as $u){ ?>
                    <tr>
                      <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h2><b><?php echo $u['nombreUmbraculo']; ?></b></h2>
                            <p><b><?php echo $u['descripcionUmbraculo']; ?></b></p>
                            <p>Temperatura: <b><?php echo $u['temperaturaUmbraculo']; ?> &deg;C</b></p>
                            <p>Humedad: <b><?php echo $u['humedadUmbraculo']; ?> %</b></p>
                            <p>Luminosidad: <b><?php echo $u['luzUmbraculo']; ?> LUX</b></p>
                            <p>Espacio Disponible: <b><?php echo $u['unidadEspacioDisponible_m2']; ?> M<sup>2</b></sup></p>
                          </div>
                          <div class="icon" style="color:#66cc91;">
                            <i class="fa fa-leaf fa-lg"></i>
                          </div>
                          <div class="small-box bg-green">
                            <button type="button" class=" btn btn-default dropdown-toggle btn-block small-box bg-green " data-toggle="dropdown"><h4><b>Acciones</b></h4></button>
                            <ul class="dropdown-menu  col-md-12 " >
                              <li><a href="<?php echo site_url('common/umbraculos/ver/'.$u['idUmbraculo']); ?>" class="btn btn-default btn-lg"><span class="fa fa-eye"></span>Ingresar al umbraculo - <?php echo $u['nombreUmbraculo']; ?></a></li>
                              <li><a href="<?php echo site_url('common/umbraculos/editar/'.$u['idUmbraculo']); ?>" class="btn btn-default btn-lg"><span class="fa fa-pencil"></span> Editar el umbraculo - <?php echo $u['nombreUmbraculo']; ?></a></li>
                              <li><a href="<?php echo site_url('umbraculos/remove/'.$u['idUmbraculo']); ?>" class="btn btn-default btn-lg"><span class="fa fa-trash"></span> Borrar el umbraculo - <?php echo $u['nombreUmbraculo']; ?></a></li>
                            </ul>
                          </div>
                        </div>
                      </div><!-- ./col -->







                    </tr>

                    <?php } ?>

                </table>




                         </div>
                    </div>
                </section>
            </div>
