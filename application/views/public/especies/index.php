<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Especies</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('user/especies_pla/crear', '<i class="fa fa-plus"></i> '. 'Agregar nueva especie', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nombre Científico</th>
                                            <th>Cuidados</th>
                                            <th>Sustrato</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <?php foreach($especiesSin as $e){ ?>
                                        <tr title="El estado determina, el poder utilizar o no, determinada especie en otros módulos">
                                            <td><?php echo $e['nombreEspecie']; ?></td>
                                            <td><?php echo $e['nombreCientificoEspecie']; ?></td>
                                            <td><?php echo $e['descripcionCuidados']; ?></td>
                                            <td><?php echo $e['descripcionSustrato']; ?></td>
                                            <td>
                                                <?php 
                                                  if ($e['active'] == 1) {
                                                    echo "<a href='".site_url('user/especies_pla/borrado_logico/'.$e['idEspecie'])."'><span class='label label-success'>Activo</span></a>";
                                                  }else{
                                                        echo "<a href='".site_url('user/especies_pla/activado_logico/'.$e['idEspecie'])."'><span class='label label-default'>Inactivo</span></a>";
                                                  }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('user/especies_pla/editar/'.$e['idEspecie']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> <br>
                                            </td>
                                        </tr>
                                        <?php } ?><?php foreach($especiesCon as $e){ ?>
                                        <tr title='Esta especie no se puede desactivar ya que una o mas plantas de la misma se encuentra en un umbraculo'>
                                            <td><?php echo $e['nombreEspecie']; ?></td>
                                            <td><?php echo $e['nombreCientificoEspecie']; ?></td>
                                            <td><?php echo $e['descripcionCuidados']; ?></td>
                                            <td><?php echo $e['descripcionSustrato']; ?></td>
                                            <td>
                                                <?php 
                                                  if ($e['active'] == 1) {
                                                    echo "<a style='pointer-events: none;' href='".site_url('user/especies_pla/borrado_logico/'.$e['idEspecie'])."'><span class='label label-success btn disabled'>Activo</span></a>";
                                                  }else{
                                                        echo "<a href='".site_url('user/especies_pla/activado_logico/'.$e['idEspecie'])."'><span class='label label-default'>Inactivo</span></a>";
                                                  }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('user/especies_pla/editar/'.$e['idEspecie']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> <br>
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