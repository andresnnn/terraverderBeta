<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Umbráculos</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Bienvenido</h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                    <?php foreach($umbraculos as $u){ ?>
                                    <tr>
                                    <div class="row">
                                                <div class="col-md-5 ">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-maroon"><i class="fa fa-leaf"></i></span>
                                                        <div class="info-box-content">
                                                            <b>Nombre: </b><?php echo $u['nombreUmbraculo']; ?><br>
                                                            <b>Descripción: </b><?php echo $u['descripcionUmbraculo']; ?><br>
                                                            <b>Temperatura: </b> <?php echo $u['temperaturaUmbraculo']."°C";?><br>
                                                            <b>Humedad: </b> <?php echo $u['humedadUmbraculo']."%";?><br>
                                                            <b>Espacio Disponible: </b> <?php echo $u['unidadEspacioDisponible_m2'];?>m<sup>2</sup><br>
                                                            <br>
                                                            <a href="<?php echo site_url('user/umbraculos_pla/ver/'.$u['idUmbraculo']); ?>" class="btn btn-warning btn-m"><span class="fa fa-eye"></span> Ver</a>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    </tr>
                                    <?php } ?>
                                    <!-- FIN CONTENIDO-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>