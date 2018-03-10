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
                        <h3 class="box-title">Detalles Tipo tarea </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Id del tipo de tarea</th>
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
                  </div>
                </div>
              </div>
            </section>
</div>
