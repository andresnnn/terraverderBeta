<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>

                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-body">
                                    <?php echo form_open('common/tareas/add'); ?>
                                                <div class="box-body">
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <label for="idTipoTarea" class="control-label"><span class="text-danger"></span>Tipo de tarea</label>
                                                            <div class="form-group">
                                                                <input type="text" name="idTipoTarea" value="<?php echo $this->input->post('idTipoTarea'); ?>" class="form-control" id="idTipoTarea" />
                                                                <span class="text-danger"><?php echo form_error('idTipoTarea');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="idEstado" class="control-label"><span class="text-danger"></span>Estado de la tarea</label>
                                                            <div class="form-group">
                                                                <input type="number" name="idEstado" value="<?php echo $this->input->post('idEstado'); ?>" class="form-control" id="idEstado" />
                                                                <span class="text-danger"><?php echo form_error('idEstado');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="idPlanta" class="control-label"><span class="text-danger"></span>Planta</label>
                                                            <div class="form-group">
                                                                <input type="number" name="idPlanta" value="<?php echo $this->input->post('idPlanta'); ?>" class="form-control" id="idPlanta" />
                                                                <span class="text-danger"><?php echo form_error('idPlanta');?></span>
                                                            </div>
                                                        </div>

                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                                                        <a href="<?php echo site_url('common/umbraculos'); ?>" class="btn btn-default btn-flat">Cancelar</a>
                                                    </div>
                                                <?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>
