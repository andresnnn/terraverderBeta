<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Plantas</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('user/plantas_pla/crear', '<i class="fa fa-plus"></i> '.'Agregar nueva planta', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nombre Científico</th>
                                            <th>Unidades Espacio</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <?php foreach($plantasCon as $p){ ?>
                                        <tr>
                                            <td><?php echo $p['nombrePlanta']; ?></td> 
                                            <td><?php echo $p['nombreCientificoPlanta']; ?></td>
                                            <td><?php echo $p['unidadEspacioPlanta_m2']; ?>cm<sup>2</sup></td>
                                            <td><?php echo $p['descripcionPlanta']; ?></td>
                                            <td title='Esta planta no se puede desactivar ya que una o mas plantas de la misma se encuentra en un umbraculo'>
                                                <?php
                                if ($p['pa'] == 1 and $p['ea'] == 1) {
                                    echo "<a style='pointer-events: none;' href='".site_url('user/plantas_pla/borrado_logico/'.$p['idPlanta'])."'><span class='label label-success btn disabled'>Activo</span></a>";
                                }else if( $p['ea'] == 0 and $p['pa'] == 1){
                                    echo "<a><span class='label label-default'>Especie ".$p['nombreEspecie']." desactivada</span></a>";
                                }else if( $p['ea'] == 0 and $p['pa'] == 0){
                                    echo "<a><span class='label label-default'>Especie ".$p['nombreEspecie']." desactivada</span></a>";
                                } else if ($p['pa'] == 0 and $p['ea'] == 1){
                                    echo "<a href='".site_url('user/plantas_pla/activado_logico/'.$p['idPlanta'])."'><span class='label label-default'>Inactivo</span></a>";
                                }
                                
                            ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('user/plantas_pla/ver/'.$p['idPlanta']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a> 
                                                <a href="<?php echo site_url('user/plantas_pla/editar/'.$p['idPlanta']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php foreach($plantasSin as $p){ ?>
                                        <tr>
                                            <td><?php echo $p['nombrePlanta']; ?></td> 
                                            <td><?php echo $p['nombreCientificoPlanta']; ?></td>
                                            <td><?php echo $p['unidadEspacioPlanta_m2']; ?>cm<sup>2</sup></td>
                                            <td><?php echo $p['descripcionPlanta']; ?></td>
                                            <td title="El estado determina, el poder utilizar o no, determinada planta en otros módulos">
                                                <?php
                                if ($p['pa'] == 1 and $p['ea'] == 1) {
                                    echo "<a href='".site_url('user/plantas_pla/borrado_logico/'.$p['idPlanta'])."'><span class='label label-success'>Activo</span></a>";
                                }else if( $p['ea'] == 0 and $p['pa'] == 1){
                                    echo "<a><span class='label label-default'>Especie ".$p['nombreEspecie']." desactivada</span></a>";
                                }else if( $p['ea'] == 0 and $p['pa'] == 0){
                                    echo "<a><span class='label label-default'>Especie ".$p['nombreEspecie']." desactivada</span></a>";
                                } else if ($p['pa'] == 0 and $p['ea'] == 1){
                                    echo "<a href='".site_url('user/plantas_pla/activado_logico/'.$p['idPlanta'])."'><span class='label label-default'>Inactivo</span></a>";
                                }
                                
                            ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('user/plantas_pla/ver/'.$p['idPlanta']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a> 
                                                <a href="<?php echo site_url('user/plantas_pla/editar/'.$p['idPlanta']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    <!-- FIN CONTENIDO--> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>