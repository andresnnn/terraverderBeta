<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración tipo tarea</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Detalle tipo tarea</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Id Insumo</th>
                                                <td><?php echo $tipotarea['idTipoTarea']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nombre Insumo</th>
                                                <td><?php echo $tipotarea['nombreTipoTarea']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Descripción</th>
                                                <td><textarea style="width:100%" disabled><?php echo $tipotarea['descripcionTarea']; ?></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                                                <div class="box-footer">
                                  <a href="<?php echo site_url('user/tipostareas_pla'); ?>" class="btn btn-default btn-flat">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>