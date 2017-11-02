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
                                    <li class="header">Hay (<?php echo $nro_noti; ?>) nuevas tareas para hoy</li>
                                    <li>
                                        <ul class="menu">
                                            <!-- start task -->
                                            <?php foreach($notificacion as $noti){ ?>
                                            <li>
                                            <!-- <?php echo site_url('common/umbraculos/atenderTarea/'.$noti['idUmbraculo'].'/'.$noti['idTarea']); ?> -->
                                                <a href="<?php echo site_url('common/umbraculos/atenderTarea/'.$noti['idUmbraculo'].'/'.$noti['idTarea']); ?>">
                                                    <strong><?php echo $noti['nombreTipoTarea'].": ".$noti['descripcionTarea'];; ?></strong>
                                                    Umbráculo: <?php echo $noti['nombreUmbraculo']; ?><br>
                                                    Sobre planta: <?php echo $noti['nombrePlanta']; ?><br>
                                                    Hora de comienzo prevista: <?php echo $noti['horaComienzo']; ?>
                                                </a>
                                            </li>
                                            <?php } ?>
                                            <!-- end task -->
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#"><?php echo lang('header_view_all'); ?></a></li>
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
                            <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
<?php endif; ?>

                        </ul>
                    </div>
                </nav>
            </header>
