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
                                    <?php echo form_open('common/Tipotarea/add'); ?>
                                                <div class="box-body">
                                                    <div class="row clearfix">

                                                        <div class="col-md-6">
                                                            <label for="nombreTipoTarea" class="control-label"><span class="text-danger"></span>Nombre del tipo de tarea</label>
                                                            <div class="form-group">
                                                                <input type="text" name="nombreTipoTarea" value="<?php echo $this->input->post('nombreTipoTarea'); ?>" class="form-control" id="nombreTipoTarea" />
                                                                <span class="text-danger"><?php echo form_error('nombreTipoTarea');?></span>
                                                            </div>
                                                        </div>

																												<div class="col-md-6">
                                                            <label for="descripcionTarea" class="control-label"><span class="text-danger"></span>Descripcion de la tarea</label>
                                                            <div class="form-group">
                                                                <input type="text" name="descripcionTarea" value="<?php echo $this->input->post('descripcionTarea'); ?>" class="form-control" id="descripcionTarea" />
                                                                <span class="text-danger"><?php echo form_error('descripcionTarea');?></span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary btn-flat btn-block">Guardar el tipo de Tarea</button>
                                                        <a href="<?php echo site_url('common/tipoTarea'); ?>" class="btn btn-default btn-flat btn-block">Cancelar</a>
                                                    </div>
                                                <?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>
