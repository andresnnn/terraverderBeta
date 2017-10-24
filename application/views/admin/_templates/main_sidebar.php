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
                                <i class="fa fa-tree"></i><span>Umbráculos</span>
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="header text-uppercase">Administración especies & plantas</li>

<!--                         <li class="<?=active_link_controller('umbraculos')?>">
                            <a href="<?php echo site_url('common/umbraculos'); ?>">
                                <i class="fa fa-tree"></i><span>Umbráculos</span>
                            </a>-->
                             <li class="<?php echo site_url('common/especies'); ?>">
                                <a href="<?php echo site_url('common/especies'); ?>">
                                    <i class="fa fa-pagelines"></i><span>Especies de planta</span>
                                </a>
                            </li>
                            <li class="<?php echo site_url('common/plantas'); ?>">
                                <a href="<?php echo site_url('common/plantas'); ?>">
                                    <i class="fa fa-tencent-weibo"></i><span>Ver plantas registradas</span>
                                </a>
                            </li>
                        </li>
                        <!-- Elemento -->
                        <li class="header text-uppercase">Administración insumos</li>
                        <li class="<?=active_link_controller('insumos')?>">
                            <a href="<?php echo site_url('common/insumos'); ?>">
                                <i class="fa fa-shopping-basket"></i><span>Insumos</span>
                            </a>
                        </li>
                        <!-- Elemento -->
                        <li class="header text-uppercase">Administración tarea</li>
                        <li class="<?=active_link_controller('common/tarea')?>">
                            <a href="<?php echo site_url('common/tarea'); ?>">
                                <i class="fa fa-user"></i> <span>Tareas</span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('common/tipoTarea')?>">
                            <a href="<?php echo site_url('common/tipoTarea'); ?>">
                                <i class="fa fa-user"></i> <span>Tipo de Tareas</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
