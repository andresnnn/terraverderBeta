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
                                    <h3 class="box-title" style="text-align: center;"><i class="ion-android-home" style="font-size:25px;"></i>  Detalles del <strong><?php echo $info_umbraculo['nombreUmbraculo']?></h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Nombre</th>
                                                <td><?php echo $info_umbraculo['nombreUmbraculo']; ?></td>
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
                                <div class="box-footer" style="text-align: center;" title="Volver a vista administración de umbráculos">
                                    
                                    
                                </div>
                            </div>
                    <!--CAJA CONDICIONES-->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="ion-thermometer" style="font-size:25px;"></i>  Condiciones Ambientales</h3>
                                </div>
                            <div class="box-body">
                                    <div class="box-body">
                                                <table class="table table-striped table-hover">
                                                
                                        
                                            <!--barra de progreso temperatura-->
                                           <div class="progress-group">
                                                <span class="progress-text">Temperatura: : </span> <?php echo $info_umbraculo['temperaturaUmbraculo']?>
                                               °C</span>
                                                <div class="progress" title="Temperatura dentro del umbráculo">
                                                    <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  $info_umbraculo['temperaturaUmbraculo'];?>%" ><strong><?php echo $info_umbraculo['temperaturaUmbraculo']; ?> °C</strong>         </div>
                                                </div>
                                            </div>
                                            <!--barra de progreso iluminacion-->
                                        
                                           <!--barra de progreso iluminacion-->
                                           <div class="progress-group">
                                               <span class="progress-text">Luminosidad: : </span> <?php echo $info_umbraculo['luzUmbraculo']?>
                                               Lux</span>
                                                <div class="progress" title="Iluminación dentro del umbráculo">
                                                    <div class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  $info_umbraculo['luzUmbraculo'];?>%" ><strong><?php echo $info_umbraculo['luzUmbraculo']; ?> LUX</strong>         </div>
                                                </div>
                                            </div>
                                            <!--barra de progreso iluminacion-->
                                        
                                         <!--barra de progreso humedad-->
                                            <div class="progress-group">
                                                <span class="progress-text">Humedad: </span> <?php echo $info_umbraculo['humedadUmbraculo']?>
                                               %</span>
                                                <div class="progress" title="Húmedad dentro del umbráculo">
                                                    <div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  $info_umbraculo['humedadUmbraculo'];?>%" ><strong><?php echo $info_umbraculo['humedadUmbraculo']; ?> % / 100 %</strong>         </div>
                                                </div>
                                            </div>
                                            <!--barra de progreso humedad-->
                                                    
                                        
                                            <div class="progress-group">
                                                <span class="progress-text">Espacio disponible</span>
                                                <span class="progress-number"><strong>
                                                <?php echo $info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2']); ?>m<sup>2</sup>
                                                </strong>/<?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?>m<sup>2</sup></span>

                                                <div class="progress" title="Espacio disponible dentro del umbráculo">
                                                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="<?php echo $info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2']); ?>" aria-valuemin="0" aria-valuemax="<?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?>" 
                                                    style="width: 
                                                    <?php echo ($info_umbraculo['unidadEspacioTotal_m2']+($info_umbraculo['unidadEspacioDisponible_m2']-$info_umbraculo['unidadEspacioTotal_m2'])*-100.000)/$info_umbraculo['unidadEspacioTotal_m2']; ?>%" ><strong><?php echo $info_umbraculo['unidadEspacioDisponible_m2']; ?> M<sup>2 </sup>de  <?php echo $info_umbraculo['unidadEspacioTotal_m2']; ?>  M<sup>2 </sup></strong> </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            </div>
                         </div>
                    <!--FIN CAJA CONDICIONES-->
                    <!-- CAJA PLANTAS-->
                        <div class="box col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="ion-leaf" style="font-size:25px;"></i> Plantas</h3>
                                </div>
                                <div class="box-body">
                              
                                           <table class="table table-striped table-hover table-condensed">
                                            <tr class="info">
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Cantidad</th>
                                            </tr>
                                                <?php foreach($umbraculo_plantas as $u){ ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $u['nombrePlanta']; ?></td>
                                                    <td class="text-center"><?php echo $u['cantidad']; ?></td>
                                                </tr>
                                                <?php } ?>
                                        </table>

                                            <div>
                                                <table class="table table-striped table-hover">
                                                    <td><h3 class="box-title"><?php echo anchor('common/umbraculos/verPlantas/'.$id, '<i class="fa fa-eye"></i> '.'Ver plantas', array('class' => 'btn btn-lg btn-block btn-primary btn-flat','title'=>'(?) Ver todas las plantas dentro del umbráculo')); ?></h3></td
                                                    >
                                                      <td><h3 class="box-title">
                                                      <?php echo anchor('common/umbraculos/agregarPlanta/'.$id, '<i class="fa fa-plus"></i> '.'Agregar planta', array('class' => 'btn btn-lg btn-block btn-primary btn-flat','title'=>'(?) Agregar una nueva planta dentro de este umbráculo')); ?>
                                                      </h3></td>
                                                </table>
                                            </div>
                                   
                            </div>
                        </div>
                    </div>
                    <!--FIN CAJA PLANTAS-->

                    <!--CAJA TAREAS-->

                    <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="ion-erlenmeyer-flask" style="font-size:25px;"></i> Tareas</h3>
                                </div>
                                <div class="box-body">
                                        <table class="table table-striped table-hover">
                                            <tr class="info">
                                                <th class="text-center">Tipo tarea</th>
                                                <th class="text-center">Planta</th>
                                                <th class="text-center">Creador</th>
                                                <th class="text-center">Fecha creación</th>
                                                <th class="text-center">Fecha prevista</th>
                                                <th class="text-center">Estado</th>
                                            </tr>
                                            <?php foreach($tareas as $t){ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $t['nombreTipoTarea']; ?></td>
                                                <td class="text-center"><?php echo $t['nombrePlanta']; ?></td>
                                                <td class="text-center"><?php echo $t['creador']; ?></td>
                                                <td class="text-center"><?php echo $t['fechaCreacion']; ?></td>
                                                <td class="text-center"><?php echo $t['fechaComienzo']; ?></td>
                                                <td class="text-center"><?php echo $t['nombreEstado']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                            <div>
                                                <table class="table table-striped table-hover">
                                                    
                                                    <td ><h3 class="box-title"><?php echo anchor('common/Umbraculos/verTareas/'.$id,'<i class="fa fa-eye"></i> '.'Ver Todas las tareas', array('class' => 'btn btn-lg btn-primary btn-flat')); ?></h3></td
                                                    >
                                                    <td ><h3 class="box-title"><?php echo anchor('common/Tareas/agregarTarea/'.$id, '<i class="fa fa-plus"></i> '.'Agregar tarea', array('class' => 'btn btn-lg btn-block btn-primary btn-flat')); ?></h3></td>
                                                     <td><h3 class="box-title"><?php echo anchor('common/umbraculos/removeTarea/'.$id, '<i class="fa fa-plus"></i> '.'Borrar tareas', array('class' => 'btn btn-lg btn-block btn-danger btn-flat')); ?></h3></td>
                                                     
                                                </table>
                                                
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
                    <!--FIN CAJA TAREAS-->
                          <h3 class="box-title text"><?php echo anchor('common/umbraculos/removeUmbraculo/'.$id,'Borrar Umbraculo     '.'<i class="ion-trash-a" style="font-size:25px;"></i> ', array('class' => 'btn btn-block btn-danger btn-lg btn-flat')); ?></h3>
                            <h3 class="box-title "><?php echo anchor('common/umbraculos/editar/'.$id,'Editar Umbraculo     '.'<i class="ion-wrench" style="font-size:25px;"></i> ', array('class' => 'btn btn-block btn-info btn-lg btn-flat')); ?></h3>
                            <a href="<?php echo site_url('common/umbraculos'); ?>" class="btn btn-lg btn-default btn-flat">Volver atrás</a>
                </section>
                   
            </div>

