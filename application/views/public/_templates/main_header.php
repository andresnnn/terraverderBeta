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
                                                <a href="<?php echo site_url('user/tareas_pla/ver_detalles/'.$noti['idTarea']); ?>">
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
                    <?php if ($permisos['idGrupo'] == 2){?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-theme"><?php echo $nro_faltantes; ?></span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Hay (<?php echo $nro_faltantes; ?>) eventos detectados</p>
                            </li>
                            <li>
                                            <!-- start alerta -->
                                            <?php foreach($insumos_faltantes as $insumo){ ?>
                                            <li>
                                                <!--<a href="<?php echo site_url('common/tareas/ver_detalles/'.$noti['idTarea']); ?>">-->
                                                <a href="<?php echo site_url('user/insumos_pla/profile/'.$insumo['idInsumo']); ?>">
                                                <strong>¡Atención! Insumo bajo de stock</strong>
                                                <div class="task-info">
                                                Insumo: <?php echo $insumo['nombreInsumo']; ?> <br>
                                                Decripción insumo:<?php echo $insumo['descripcionInsumo']; ?> <br>
                                                </div>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <!-- end alerta-->
                            </li>
                        </ul>
                    </li>
                            <?php } ?>
            </div>
            <div style="align-items: center" class="top-menu">
            	<ul class="nav pull-right top-menu">

                <!--DROPDOWN PARA CUENTA USER-->
                <li class="dropdown">
                        <a data-toggle="dropdown" class="logout dropdown-toggle" href="index.html#">
                                    <span class="hidden-xs"><?php echo $user_login['firstname']." ".$user_login['lastname']; ?></span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green "></div>
                            <li>
                                <p class="green">Acciones</p>
                            </li>
                            <li><a class="logout" href="<?php echo site_url('auth/login'); ?>">Salir</a></li>
                            <?php  
                                        if ($permisos['idGrupo'] == 2) {
                                            echo '<li><a href="'.base_url('upload/manual_planificador1.pdf').'" target="_blank">Manual Planificador <span class="fa fa-file-pdf-o"></span> </a></li>';
                                        }
                                       else if ($permisos['idGrupo'] == 3) {
                                            echo '<li><a href="'.base_url('upload/manual_especialista1.pdf').'" target="_blank">Manual Especialista <span class="fa fa-file-pdf-o"> </span></a></li>';
                                        }
                            ?>
                        </ul>
                </li>
                    <!--<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-question-circle"></i></a></li>-->
                <!--FIN DROPDOWN PARA CUENTA USER-->
            	</ul>
            </div>
        </header>

