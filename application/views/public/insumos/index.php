<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">

                <section id="main-content" class="content-header">
                    <h3 class="box-title">Administración Insumos</h3>
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                        <?php  
                                        if ($permisos['idGrupo'] == 2) {
                                            echo "<h3 class='box-title'>";
                                            echo anchor('user/insumos_pla/crear', '<i class="fa fa-plus"></i> '. 'Agregar nuevo insumo', array('class' => 'btn btn-block btn-primary btn-flat'));
                                            echo "</h3>";
                                        }
                                        ?>
                                </div>

                                <div class="box-body">
                                <!-- CONTENIDO TABLA -->
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nombre Insumo</th>
                                        <th>Descripcion Insumo</th>
                                        <th>Cantidad</th>
                                    <?php if ($permisos['idGrupo'] == 2) { ?>
                                        <th>Punto De Pedido</th>
                                        <th>Estado</th>
                                    <?php } ?>
                                        <th>Acciones</th>
                                    </tr>
                                    <?php foreach($insumo as $i){ ?>
                                    <tr>
                                        <td><?php echo $i['nombreInsumo']; ?></td>
                                        <td><?php echo $i['descripcionInsumo']; ?></td>
                                        <td><?php echo $i['cantidad']; ?></td>
                                        <?php if ($permisos['idGrupo'] == 2) { ?>
                                            <td><?php echo $i['puntoDePedido']; ?></td>
                                            <td title='El estado determina, el poder utilizar o no, determinado insumoi en otros módulos'>
                                            <?php 

                                            if ($i['active'] == 1) {
                                                echo "<a href='".site_url('user/insumos_pla/borrado_logico/'.$i['idInsumo'])."'><span class='label label-success'>Activo</span></a>";
                                            }else{
                                                echo "<a href='".site_url('user/insumos_pla/activado_logico/'.$i['idInsumo'])."'><span class='label label-default'>Inactivo</span></a>";
                                            }
                                            ?>
                                            </td>

                                        <?php } ?>

                                        <td>
                                            <a href="<?php echo site_url('user/insumos_pla/profile/'.$i['idInsumo']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a>
                                            <?php 
                                                if ($permisos['idGrupo'] == 2) {
                                                    echo "<a href='".site_url('user/insumos_pla/edit/'.$i['idInsumo'])."' class='btn btn-info btn-xs'><span class='fa fa-pencil'></span> Editar</a>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                    <!-- CONTENIDO TABLA -->

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            