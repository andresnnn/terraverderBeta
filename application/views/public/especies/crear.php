<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Especies</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Bienvenido</h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                    <?php echo form_open('user/especies_pla/crear'); ?>
                                        <div class="box-body">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <label for="nombreEspecie" class="control-label"><span class="text-danger">*</span>Nombre</label>
                                                    <div class="form-group">
                                                        <input type="text" name="nombreEspecie" value="<?php echo $this->input->post('nombreEspecie'); ?>" class="form-control" id="nombreEspecie" />
                                                        <span class="text-danger"><?php echo form_error('nombreEspecie');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="nombreCientificoEspecie" class="control-label"><span class="text-danger">*</span>Nombre Científico</label>
                                                    <div class="form-group">
                                                        <input type="text" name="nombreCientificoEspecie" value="<?php echo $this->input->post('nombreCientificoEspecie'); ?>" class="form-control" id="nombreCientificoEspecie" />
                                                        <span class="text-danger"><?php echo form_error('nombreCientificoEspecie');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="luzMax" class="control-label"><span class="text-danger">*</span>Luz Max (lx)</label>
                                                    <div class="form-group">
                                                        <input type="text" name="luzMax" value="<?php echo $this->input->post('luzMax'); ?>" class="form-control" id="luzMax" />
                                                        <span class="text-danger"><?php echo form_error('luzMax');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="luzMin" class="control-label"><span class="text-danger">*</span>Luz Min (lx)</label>
                                                    <div class="form-group">
                                                        <input type="text" name="luzMin" value="<?php echo $this->input->post('luzMin'); ?>" class="form-control" id="luzMin" />
                                                        <span class="text-danger"><?php echo form_error('luzMin');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="humedadMax" class="control-label"><span class="text-danger">*</span>Humedad Máx (%)</label>
                                                    <div class="form-group">
                                                        <input type="text" name="humedadMax" value="<?php echo $this->input->post('humedadMax'); ?>" class="form-control" id="humedadMax" />
                                                        <span class="text-danger"><?php echo form_error('humedadMax');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="humedadMin" class="control-label"><span class="text-danger">*</span>Humedad Mín (%)</label>
                                                    <div class="form-group">
                                                        <input type="text" name="humedadMin" value="<?php echo $this->input->post('humedadMin'); ?>" class="form-control" id="humedadMin" />
                                                        <span class="text-danger"><?php echo form_error('humedadMin');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="temperaturaMax" class="control-label"><span class="text-danger">*</span>Temperatura Máx (°C)</label>
                                                    <div class="form-group">
                                                        <input type="text" name="temperaturaMax" value="<?php echo $this->input->post('temperaturaMax'); ?>" class="form-control" id="temperaturaMax" />
                                                        <span class="text-danger"><?php echo form_error('temperaturaMax');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="temperaturaMin" class="control-label"><span class="text-danger">*</span>Temperatura Mín (°C)</label>
                                                    <div class="form-group">
                                                        <input type="text" name="temperaturaMin" value="<?php echo $this->input->post('temperaturaMin'); ?>" class="form-control" id="temperaturaMin" />
                                                        <span class="text-danger"><?php echo form_error('temperaturaMin');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="descripcionCuidados" class="control-label"><span class="text-danger">*</span>Cuidados</label>
                                                    <div class="form-group">
                                                        <textarea name="descripcionCuidados" class="form-control" id="descripcionCuidados"><?php echo $this->input->post('descripcionCuidados'); ?></textarea>
                                                        <span class="text-danger"><?php echo form_error('descripcionCuidados');?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="descripcionSustrato" class="control-label">Sustrato</label>
                                                    <div class="form-group">
                                                        <textarea name="descripcionSustrato" class="form-control" id="descripcionSustrato"><?php echo $this->input->post('descripcionSustrato'); ?></textarea>
                                                        <span class="text-danger"><?php echo form_error('descripcionSustrato');?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                                            <a href="<?php echo site_url('user/especies_pla'); ?>" class="btn btn-default btn-flat">Cancelar</a>
                                        </div>  
                                        <?php echo form_close(); ?>
                                    <!-- FIN CONTENIDO-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>