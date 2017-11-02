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
                                    <h3 class="box-title">Detalles insumo</h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Código insumo</th>
                                                <td><?php echo $insumo['idInsumo']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nombre</th>
                                                <td><?php echo $insumo['nombreInsumo']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Stock disponible</th>
                                                <td><?php echo $insumo['cantidad']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Punto de Pedido</th>
                                                <td><?php echo $insumo['puntoDePedido'];; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Descripción</th>
                                                <td><textarea style="width:100%" disabled><?php echo $insumo['descripcionInsumo']; ?></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- FIN CONTENIDO-->  
                                <div class="box-footer">
                                  <a href="<?php echo site_url('user/insumos_pla'); ?>" class="btn btn-default btn-flat">Volver</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>