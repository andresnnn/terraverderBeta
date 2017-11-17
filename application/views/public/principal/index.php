<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      



            <div class="wrapper">
                <section id="main-content" class="content-header" style="background-image: url(<?php echo base_url('upload/loginbg.png'); ?>);">
                 <h1 style="text-shadow: -2px -2px 1px #464646; color: white;" class="box-title">TERRA VERDE</h1>

                    <div class="row">
                        <div class="col-md-12">

                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Bienvenido <?php echo $permisos['Usuario']; ?></h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    TERRAVERDE 
                                    <p>Es el sistema por el cual la empresa ha optado por utilizar, para el apoyo en la gestión de sus recursos.</p>
                                    <p>Mediante su rango de <strong><?php echo $permisos['nombreGrupo']; ?></strong> usted tiene acceso a esta rama del sistema, en el cual se habilitarán las siguientes acciones:</p>

                                    <?php if ($permisos['idGrupo'] == 3) { ?>
                                            <ul>
                                                <li><i class="fa fa-hand-o-right"></i>  Consultar el listado de insumos disponibles dentro del sistema.</li>
                                                <li><i class="fa fa-hand-o-right"></i>  Consultar el listado de tareas en general sobre todos los umbráculos registrados en el mismo.</li>
                                                <li><i class="fa fa-hand-o-right"></i>  Ver las especies & plantas registradas dentro del sistema.</li>
                                                <li><i class="fa fa-hand-o-right"></i>  Consultar el estado de cada umbráculo en general, y realizar las siguientes operaciones en cada uno.</li>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Consultar las plantas dentro.</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Consultar las tareas (Realizadas y Pendientes) dentro del mismo.</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Registrar nuevas plantas</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Retirar plantas, o actualiza la cantidad de las mismas.</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Atender las tareas que esten pendientes, y si es necesario indicar los insumos que se utilizan en cada una.</li>
                                                </ul>
                                            </ul>

                                            <p>Puede consultar el manual de usuario para cualquier duda que pueda surgir. <a target="_blank" href="<?php echo base_url('upload/manual_especialista.pdf'); ?>">Haciendo click aquí</a></p>
                                    <?php }?>

                                    <?php if ($permisos['idGrupo'] == 2) { ?>
                                            <ul>
                                                <li><i class="fa fa-hand-o-right"></i>  Consultar el listado de insumos disponibles dentro del sistema.</li>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Agregar nuevos insumos.</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Modificar cualquier insumo (ajustando una nueva cantidad si es neceasario.</li>  
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Activaro desactivar un insumo (en caso de no contar momentaneamente con este).</li>
                                                </ul>
                                                <li><i class="fa fa-hand-o-right"></i>  Registrar nuevas tareas en el sistema</li>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Registrar & modificar tipos de tareas</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Consultar un informe de las tareas realizadas y pendientes.
                                                </ul>
                                                <li><i class="fa fa-hand-o-right"></i>  Ver las especies & plantas registradas dentro del sistema.</li>
                                                <li><i class="fa fa-hand-o-right"></i>  Consultar el estado de cada umbráculo en general, y realizar las siguientes operaciones en cada uno.</li>
                                                <ul>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Consultar las plantas dentro.</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Consultar las tareas (Realizadas y Pendientes) dentro del mismo.</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Registrar nuevas plantas</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Retirar plantas, o actualiza la cantidad de las mismas.</li>
                                                    <li><i class="fa fa-arrow-circle-right "></i>  Atender las tareas que esten pendientes, y si es necesario indicar los insumos que se utilizan en cada una.</li>
                                                </ul>
                                            </ul>
                                            <p>Puede consultar el manual de usuario para cualquier duda que pueda surgir. <a target="_blank" href="<?php echo base_url('upload/manual_planificador.pdf'); ?>">Haciendo click aquí</a></p>
                                    <?php }?>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>