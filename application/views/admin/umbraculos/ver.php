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
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Detalles umbráculo</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Nombre</th>
                                                <td><?php echo $info_umbraculo['nombreUmbraculo']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Ancho</th>
                                                <td><?php echo $info_umbraculo['anchoUmbraculo_m']; ?> m<sup>2</sup></td>
                                            </tr>
                                            <tr>
                                                <th>Largo</th>
                                                <td><?php echo $info_umbraculo['largoUmbraculo_m']; ?> m<sup>2</sup></td>

                                            </tr>
                                            <tr>
                                                <th>Espacio Total</th>
                                                <td><?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?> m<sup>2</sup></td>

                                            </tr>
                                            <tr>
                                                <th>Espacio disponible</th>
                                                <td><?php echo $info_umbraculo['unidadEspacioDisponible_m2']; ?> m<sup>2</sup></td>

                                            </tr>
                                            <tr>
                                                <th>Temperatura</th>
                                                <td><?php echo $info_umbraculo['temperaturaUmbraculo']; ?>°</td>

                                            </tr>
                                            <tr>
                                                <th>Húmedad</th>
                                                <td><?php echo $info_umbraculo['humedadUmbraculo']; ?>%</td>

                                            </tr>
                                            <tr>
                                                <th>Sustrato</th>
                                                <td><textarea style="width:100%" disabled><?php echo $info_umbraculo['descripcionSustrato']; ?></textarea></td>

                                            </tr>
                                            <tr>
                                                <th>Descripción</th>
                                                <td><textarea style="width:100%" disabled><?php echo $info_umbraculo['descripcionUmbraculo']; ?></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                         </div>

                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Informe</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-lg-6">
                                             <div class="progress-group">
                                                <span class="progress-text">Húmedad (%)</span>
                                                <span class="progress-number"><strong><?php echo $info_umbraculo['humedadUmbraculo']; ?></strong>/100</span>
            
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-aqua" role="progressbar" style="width: <?php echo $info_umbraculo['humedadUmbraculo']; ?>%" ></div>
                                                </div>
                                            </div>
                                            <div class="progress-group">
                                                <span class="progress-text">Espacio disponible</span>
                                                <span class="progress-number"><strong><?php echo $info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2']); ?>m<sup>2</sup></strong>/<?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?>m<sup>2</sup></span>
            
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="<?php echo $info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2']); ?>" aria-valuemin="0" aria-valuemax="<?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?>" style="width: <?php echo ($info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2'])*-100)/$info_umbraculo['unidadEspacioTotal_m2']; ?>%" ></div>
                                                </div>
                                            </div>
                                            <div>
                                                <table>
                                                    <td><h3 class="box-title"><?php echo anchor('URL', '<i class="fa fa-eye"></i> '.'Ver plantas', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3></td
                                                    >
                                                    <td><h3 class="box-title"><?php echo anchor('URL', '<i class="fa fa-plus"></i> '.'Agregar planta a umbraculo', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3></td>
                                                    <td><h3 class="box-title"><?php echo anchor('URL','<i class="fa fa-eye"></i> '.'Consultar tareas', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3></td
                                                    >
                                                    <td><h3 class="box-title"><?php echo anchor('URL', '<i class="fa fa-plus"></i> '.'Agregar tarea', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3></td>
                                                </table>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>



