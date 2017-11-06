<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Esconder navegador"></div>
              </div>
            <!--logo start-->
            <a class="logo"><b>Terra</b>VERDE<img src="<?php echo base_url('assets/favicon/logo.png'); ?>"></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme"><?php echo $nro_noti; ?></span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Hay (<?php echo $nro_noti; ?>) tareas para hoy</p>
                            </li>
                            <li>
                                            <!-- start task -->
                                            <?php foreach($notificacion as $noti){ ?>
                                            <li>
                                            
                                            <!-- <?php echo site_url('common/umbraculos/atenderTarea/'.$noti['idUmbraculo'].'/'.$noti['idTarea']); ?> -->
                                                <a href="<?php echo site_url('common/umbraculos/atenderTarea/'.$noti['idUmbraculo'].'/'.$noti['idTarea']); ?>">
                                                <div class="task-info">
                                                    <strong><?php echo $noti['nombreTipoTarea'].": ".$noti['descripcionTarea'];; ?></strong><br>
                                                    Umbráculo: <?php echo $noti['nombreUmbraculo']; ?><br>
                                                    Sobre planta: <?php echo $noti['nombrePlanta']; ?><br>
                                                    Hora de comienzo prevista: <?php echo $noti['horaComienzo']; ?>
                                                </div>
                                            <div class="progress progress-striped">

                                                <div class="progress-bar progress-bar-success" role="progressbar" 
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="<?php 
                                                if ($noti['idEstado'] == 1) {
                                                   echo 'width: 1%;';
                                                }elseif($noti['idEstado'] == 3){
                                                    echo 'width: 45%;';
                                                    }elseif($noti['idEstado'] == 2){
                                                    echo 'width: 100%;';
                                                    }
                                                    ?>">
                                                <span class="sr-only">Completada 0%</span>
                                                </div>                           
                                            </div>
                                            <div class="percent">Completada <?php 
                                                if ($noti['idEstado'] == 1) {
                                                   echo '0%';
                                                }elseif($noti['idEstado'] == 3){
                                                    echo '45%';
                                                    }elseif($noti['idEstado'] == 2){
                                                    echo '100%';
                                                    }
                                                    ?></div>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <!-- end task -->
                            </li>
                        </ul>
                    </li>
 
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo site_url('auth/login'); ?>">Salir</a></li>
            	</ul>
            </div>
        </header>