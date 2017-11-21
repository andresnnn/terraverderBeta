<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle;
         echo $breadcrumb; ?>
    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-10">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalles Insumo</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Id Insumo</th>
                                    <td><?php echo $insumo['idInsumo']; ?></td>
                                </tr>
                                <tr>
                                    <th>Nombre Insumo</th>
                                    <td><?php echo $insumo['nombreInsumo']; ?></td>
                                </tr>
                                <tr>
                                    <th>Stock Insumo</th>
                                    <td><?php echo $insumo['cantidad']; ?></td>
                                </tr>
                                <tr>
                                    <th>Punto de Pedido Insumo</th>
                                    <td><?php echo $insumo['puntoDePedido'];; ?></td>
                                </tr>
                                <tr>
                                    <th>Descripción</th>
                                    <td><textarea style="width:100%" disabled><?php echo $insumo['descripcionInsumo']; ?></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="box-footer">
                            <a href="<?php echo site_url('common/insumos/edit/'.$insumo['idInsumo']); ?>" class="btn btn-warning btn-flat"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('common/insumos'); ?>" class="btn btn-default btn-flat">Volver</a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>





</div>
