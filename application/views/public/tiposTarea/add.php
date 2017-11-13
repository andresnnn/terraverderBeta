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
                                    <h3 class="box-title">Crear nuevo tipo tarea</h3>
                                </div>
                                <div class="box-body">
                            <!-- COMIENZA FORMULARIO -->
                            <?php echo form_open('user/Tipostareas_pla/add',array('class' => 'form-horizontal', 'id')); ?>

                                <div class="form-group">
                                    <label for="nombreTipoTarea" class="col-md-3 control-label">* Nombre del Tipo de Tarea: </label>
                                    <div class="col-md-8">
                                        <input type="text" name="nombreTipoTarea" value="<?php echo $this->input->post('nombreTipoTarea'); ?>" class="form-control" id="nombreTipoTarea" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcionTarea" class="col-md-3 control-label">* Descripcion Tipo de Tarea: </label>
                                    <div class="col-md-8">
                                        <input type="text" name="descripcionTarea" value="<?php echo $this->input->post('descripcionTarea'); ?>" class="form-control" id="descripcionTarea" />
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