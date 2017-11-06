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
                        <div class="col-md-12 ">
                             <div class="box">
                                <div class="box-header with-border ">
                                    <h3 class="box-title">Detalles de la tarea nro. <?php echo $tarea['idTarea']; ?> </h3>
                                </div>
                                <div class="box-body ">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th >Id de la tarea</th>
                                                <td ><?php echo $tarea['idTarea']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tipo de tarea</th>
                                                <td><?php echo $tipo['nombreTipoTarea']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Estado de la tarea</th>
                                                <td><?php echo $estado['nombreEstado']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Creo la tarea</th>
                                                <td><?php echo $tarea['idUserCreador']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Atendio la tarea</th>
                                                <td><?php echo $tarea['idUserAtencion']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Planta intervenida</th>
                                                <td><?php echo $planta['nombrePlanta']; ?></td><!--esto lo traigo de la consulta y lo ejecuta el controlador-->
                                            </tr>
                                            <tr>
                                                <th>Umbraculo donde se realizo</th>
                                                <td><?php echo $umbraculo['nombreUmbraculo']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Insumo a utilizar</th>
                                                <td><?php echo $insumo['nombreInsumo']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de creacion</th>
                                                <td><?php echo $tarea['fechaCreacion']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Fecha de atencion</th>
                                                <td><?php echo $tarea['fechaAtencion']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Observaciones del especialista</th>
                                                <td><?php echo $tarea['observacionEspecialista']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Observaciones del planificador</th>
                                                <td><?php echo $tarea['observacionCreador']; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                  <a href="<?php echo site_url('common/tareas/remove/'.$tarea['idTarea']); ?>" class="btn btn-danger btn-xl btn-block"><span class="fa fa-trash"></span>Eliminar la tarea <?php echo $tarea['idTarea']; ?></a>

                                </div>
                            </div>



                </section>
            </div>
