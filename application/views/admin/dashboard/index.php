<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">

                <section class="content-header">
                    <h3 class="box-title">Página principal administración</h3>
                </section>

                <section id="main-content" class="content-header" style="background-image: url(<?php echo base_url('upload/loginbg.png'); ?>);">
                  <div class="row">


                      <div class="col-md-12">
                          <div class="box">
                              <div class="box-header with-border">
                                  <h3 class="box-title">Bienvenido Administrador</h3>
                                  <div class="box-tools pull-right">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  </div>
                              </div>
                              <div class="box-body">
                                <p>Es el sistema por el cual la empresa ha optado por utilizar, para el apoyo en la gestión de sus recursos.</p>

                              </div>
                          </div>
                      </div>
                  </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Usuarios Registrados</span>
                                    <span class="info-box-number"><?php echo $count_users; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tipos de Usuarios</span>
                                    <span class="info-box-number"><?php echo $count_groups; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
