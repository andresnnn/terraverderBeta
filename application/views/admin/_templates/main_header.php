<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <header class="main-header">
                <a href="<?php echo site_url('admin/dashboard'); ?>" class="logo">
                    <span class="logo-mini"><?php echo $title_mini; ?></span>
                    <span class="logo-lg"><b>Terra</b><?php echo $title_lg; ?></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">




<?php if ($admin_prefs['tasks_menu'] == TRUE): ?>
                            <!-- Tasks -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger"><?php echo $nro_noti; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Hay (<?php echo $nro_noti; ?>) tareas para hoy</li>
                                    <li>
                                        <ul class="menu">
                                            <!-- start task -->
                                            <?php foreach($notificacion as $noti){ ?>
                                            <li>
                                            <!-- <?php echo site_url('common/umbraculos/atenderTarea/'.$noti['idUmbraculo'].'/'.$noti['idTarea']); ?> -->
                                                <a href="<?php echo site_url('common/umbraculos/atenderTarea/'.$noti['idUmbraculo'].'/'.$noti['idTarea']); ?>">
                                                <div class="task-info">
                                                    <strong><?php echo $noti['nombreTipoTarea'].": ".$noti['descripcionTarea'];; ?></strong>
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
                                        </ul>
                                    </li>
                                </ul>
                            </li>

<?php endif; ?>
<?php if ($admin_prefs['user_menu'] == TRUE): ?>
                            <!-- User Account -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $user_login['firstname']." ".$user_login['lastname']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                                        <p><?php echo $user_login['firstname'].$user_login['lastname']; ?><small><?php echo lang('header_member_since'); ?> <?php echo date('d-m-Y', $user_login['created_on']); ?></small></p>
                                    </li>
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Tareas Atendidas</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo site_url('admin/users/profile/'.$user_login['id']); ?>" class="btn btn-default btn-flat"><?php echo lang('header_profile'); ?></a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('auth/logout/admin'); ?>" class="btn btn-default btn-flat"><?php echo lang('header_sign_out'); ?></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

<?php endif; ?>
<?php if ($admin_prefs['ctrl_sidebar'] == TRUE): ?>
                            <!-- Control Sidebar Toggle Button -->
                            <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-question-circle"></i></a></li>
<?php endif; ?>

                        </ul>
                    </div>
                </nav>
            </header>
