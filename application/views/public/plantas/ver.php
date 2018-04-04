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
                                    <h3 class="box-title">Detalles planta</h3>
                                </div>
                                    <div class="box-body">
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Nombre</label>
                                                <div class="form-group">
                                                    <p><?php echo ($detalles['nombrePlanta']); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Nombre Científico</label>
                                                <div class="form-group">
                                                    <p><?php echo ($detalles['nombreCientificoPlanta']); ?></p>
                                                </div>
                                                </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Especie</label>
                                                <div class="form-group">
                                                    <p><?php echo ($detalles['nombreEspecie']); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Descripción planta</label>
                                                <div class="form-group">
                                                    <p><?php echo ($detalles['descripcionPlanta']); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Unidades de espacio que ocupa m<sup>2</sup></label>
                                                <div class="form-group">
                                                    <p><?php echo ($detalles['unidadEspacioPlanta_m2']*0.0001); ?> m<sup>2</sup></p>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Cuidados según especie</label>
                                                <div class="form-group">
                                                    <p><?php echo ($detalles['descripcionCuidados']); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Rango de luz según especie</label>
                                                <div class="form-group">
                                                    <p><?php echo ("Desde ".$detalles['luzMin']."lx - Hasta".$detalles['luzMax']."lx"); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Rango de humedad según especie</label>
                                                <div class="form-group">
                                                    <p><?php echo ("Desde ".$detalles['humedadMin']."% - Hasta".$detalles['humedadMax']."%"); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Rango de temperatura según especie</label>
                                                <div class="form-group">
                                                    <p><?php echo ("Desde ".$detalles['temperaturaMin']."°C - Hasta".$detalles['temperaturaMax']."°C"); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nombrePlanta" class="control-label">Sustrato recomendado según especie</label>
                                                <div class="form-group">
                                                    <p><?php echo ($detalles['descripcionSustrato']); ?></p>
                                                </div>
                                            </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <a href="<?=$_SERVER['HTTP_REFERER'] ?>" class="btn btn-default btn-flat">Volver</a>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>