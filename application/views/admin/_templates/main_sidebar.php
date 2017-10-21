<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
                        <!-- Elemento -->
                        <li>
                            <a href="<?php echo site_url('/'); ?>">
                                <i class="fa fa-home text-primary"></i> <span>Visitar sitio WEB</span> <!-- QUIZAS HAY QUE BORRARLO! -->
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="header text-uppercase">Navegación</li>
                        <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('admin/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Principal</span>
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="header text-uppercase">Administración usuarios</li>
                        <li class="<?=active_link_controller('users')?>">
                            <a href="<?php echo site_url('admin/users'); ?>">
                                <i class="fa fa-user"></i> <span>Usuarios</span>
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="<?php echo site_url('admin/groups'); ?>">
                                <i class="fa fa-shield"></i> <span>Tipos de usuario</span>
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="header text-uppercase">Administración umbráculos</li>
                        <li class="<?=active_link_controller('umbraculos')?>">
                            <a href="<?php echo site_url('common/umbraculos'); ?>">
                                <i class="fa fa-legal"></i><span>Umbráculos</span>
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="header text-uppercase">Resto</li>
                        <li class="<?=active_link_controller('files')?>">
                            <a href="<?php echo site_url('admin/files'); ?>">
                                <i class="fa fa-file"></i> <span>Archivos</span>
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="<?=active_link_controller('database')?>">
                            <a href="<?php echo site_url('admin/database'); ?>">
                                <i class="fa fa-database"></i> <span>Utilidades Base de datos</span>
                            </a>
                        </li>
                        <!-- Elemento -->

                    </ul>
                </section>
            </aside>
