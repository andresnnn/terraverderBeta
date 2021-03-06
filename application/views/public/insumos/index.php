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
                                    <div class="pull-right">
                                    <button type="button"  title="Presiona para generar un PDF con los insumos del vivero." class="btn btn-danger btn-filter" onclick="valorSelect(11)" data-target="pdfInsumos"><span class="fa fa-file-pdf-o"></span>  PDF de Insumos</button>
                                    </div>        
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
                                        <?php if($i['cantidad'] >= $i['puntoDePedido']){ 
						echo "<td>".$i['nombreInsumo']."</td>";
                        }else{
                         echo "<td title='Este insumo necesita ser repuesto, ya que paso su punto de pedido.'><span style='color:red;' class='fa fa-warning'></span> ".$i['nombreInsumo']."</td>";
                        }?>
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

            <script>
            function valorSelect(valor){
                   if (valor==11) {
                     window.location.pathname ="<?php echo ('terraverde/user/insumos_pla/generaPDInsumos'); ?>";
                   }
              }
            </script>
            