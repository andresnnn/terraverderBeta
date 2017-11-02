<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
      <aside class="main-sidebar ">
                        <!-- INFO CUENTA USUARIO -->

                <section id="sidebar" class="sidebar ">
                            <div class=" centered header user-panel" style="padding: 15%;">
                            <div class="image">
                                <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                            </div>
                            <h5 >
                                <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p></h5>
                                <p ><a href="#"><i class="fa fa-circle text-success"></i>En línea</a></p>
                    </div>
                    
                    <ul class="sidebar-menu" style="margin: 2%;">
                        <li >
                            <a href="<?php echo site_url('principal'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Principal</span>
                            </a>
                        </li>
                        <!-- TITULO ELEMENTO-->
                        <li class="text-uppercase">Insumos</li>
                        <!-- Botones links-->
                        <li >
                            <a href="<?php echo site_url('user/insumos_pla'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Consultar Insumos</span>
                            </a>
                        </li>
                        <!-- TITULO ELEMENTO-->
                        <li class="text-uppercase">Tareas</li>
                        <!-- Botones links-->
                         <li>
                            <a href="">
                                <i class="fa fa-tasks"></i> <span>Consultar Tareas</span>
                            </a>
                        </li>
                        <!-- TITULO ELEMENTO-->
                        <li class="text-uppercase">Umbráculos</li>
                        <!-- Botones links-->
                        <li>
                            <a href="">
                                <i class="fa fa-dashboard"></i> <span>Consultar Umbráculos</span>
                            </a>
                        </li>
                        <!-- TITULO ELEMENTO-->
                        <li class="text-uppercase">Especies & Plantas</li>
                        <!-- Botones links-->
                        <li>
                            <a href="<?php echo site_url('user/plantas_pla'); ?>">
                                <i class="fa fa-tasks"></i> <span>Plantas</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/especies_pla'); ?>">
                                <i class="fa fa-tasks"></i> <span>Especies de planta</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>