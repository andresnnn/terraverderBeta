<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración tipo tarea</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Editar tipo tarea</h3>
                                </div>
                                <div class="box-body">
                                  <!-- COMIENZA FORMULARIO -->
                                  <?php echo form_open('user/Tipostareas_pla/edit/'.$tipotarea['idTipoTarea'],array("class"=>"form-horizontal")); ?>
                                                <div class="form-group">
                                                    <label for="nombreTipoTarea" class="col-md-3 control-label">Nombre del tipo de tarea: </label>
                                                  <div class="col-md-8">
                                                    <input class="form-control" id="nombreTipoTarea" type="text" name="nombreTipoTarea" value="<?php echo ($this->input->post('nombreTipoTarea') ? $this->input->post('nombreTipoTarea') : $tipotarea['nombreTipoTarea']); ?>"  />
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="descripcionTarea" class="col-md-3 control-label">Descripcion del tipo de tarea: </label>
                                                  <div class="col-md-8">
                                                    <input class="form-control" id="descripcionTarea" type="text" name="descripcionTarea" value="<?php echo ($this->input->post('descripcionTarea') ? $this->input->post('descripcionTarea') : $tipotarea['descripcionTarea']); ?>"  />
                                                  </div>
                                                </div>
                                                  <div class="box-footer">
                                                      <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                                                      <a href="<?php echo site_url('user/Tipostareas_pla'); ?>" class="btn btn-default btn-flat">Cancelar</a>
                                                  </div>
                                    <?php echo form_close(); ?>
                                    <!--TERMINA FORMULARIO-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>