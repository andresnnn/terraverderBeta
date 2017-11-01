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
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear nuevo Umbráculo</h3>
                    </div>
                                <div class="box-body">
                                    <?php echo form_open('common/umbraculos/crear'); ?>
                                                <div class="box-body">
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <label for="nombreUmbraculo" class="control-label"><span class="text-danger"></span>Nombre</label>
                                                            <div class="form-group">
                                                                <input type="text" name="nombreUmbraculo" value="<?php echo $this->input->post('nombreUmbraculo'); ?>" class="form-control" id="nombreUmbraculo" />
                                                                <span class="text-danger"><?php echo form_error('nombreUmbraculo');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="anchoUmbraculo_m" class="control-label"><span class="text-danger"></span>Ancho (m<sup>2</sup>)</label>
                                                            <div class="form-group">
                                                                <input type="number" step="any" name="anchoUmbraculo_m" value="<?php echo $this->input->post('anchoUmbraculo_m'); ?>" class="form-control" id="anchoUmbraculo_m" />
                                                                <span class="text-danger"><?php echo form_error('anchoUmbraculo_m');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="largoUmbraculo_m" class="control-label"><span class="text-danger"></span>Largo (m<sup>2</sup>)</label>
                                                            <div class="form-group">
                                                                <input type="number" step="any" name="largoUmbraculo_m" onChange="completar();" value="<?php echo $this->input->post('largoUmbraculo_m'); ?>" class="form-control" id="largoUmbraculo_m" />
                                                                <span class="text-danger"><?php echo form_error('largoUmbraculo_m');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="unidadEspacioTotal_m2" class="control-label"><span class="text-danger"></span>Espacio Total (m<sup>2</sup>)</label>
                                                            <div class="form-group">
                                                                <input disabled type="number" step="any" name="unidadEspacioTotal_m2" value="<?php echo $this->input->post('unidadEspacioTotal_m2'); ?>" class="form-control" id="unidadEspacioTotal_m2" />
                                                                <span class="text-danger"><?php echo form_error('unidadEspacioTotal_m2');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="unidadEspacioDisponible_m2" class="control-label">Espacio Disponible (m<sup>2</sup>)</label>
                                                            <div class="form-group">
                                                                <input disabled type="number" step="any" name="unidadEspacioDisponible_m2" value="<?php echo $this->input->post('unidadEspacioDisponible_m2'); ?>" class="form-control" id="unidadEspacioDisponible_m2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="temperaturaUmbraculo" class="control-label"><span class="text-danger"></span>Temperatura (°)</label>
                                                            <div class="form-group">
                                                                <input type="text" name="temperaturaUmbraculo" value="<?php echo $this->input->post('temperaturaUmbraculo'); ?>" class="form-control" id="temperaturaUmbraculo" />
                                                                <span class="text-danger"><?php echo form_error('temperaturaUmbraculo');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="luzUmbraculo" class="control-label"><span class="text-danger"></span>Luz (lx)</label>
                                                            <div class="form-group">
                                                                <input type="text" name="luzUmbraculo" value="<?php echo $this->input->post('luzUmbraculo'); ?>" class="form-control" id="luzUmbraculo" />
                                                                <span class="text-danger"><?php echo form_error('luzUmbraculo');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="humedadUmbraculo" class="control-label"><span class="text-danger"></span>Húmedad (%)</label>
                                                            <div class="form-group">
                                                                <input type="text" name="humedadUmbraculo" value="<?php echo $this->input->post('humedadUmbraculo'); ?>" class="form-control" id="humedadUmbraculo" />
                                                                <span class="text-danger"><?php echo form_error('humedadUmbraculo');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="descripcionSustrato" class="control-label">Sustrato</label>
                                                            <div class="form-group">
                                                                <input type="text" name="descripcionSustrato" value="<?php echo $this->input->post('descripcionSustrato'); ?>" class="form-control" id="descripcionSustrato" />
                                                                <span class="text-danger"><?php echo form_error('descripcionSustrato');?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="descripcionUmbraculo" class="control-label"><span class="text-danger"></span>Descripción</label>
                                                            <div class="form-group">
                                                                <textarea name="descripcionUmbraculo" class="form-control" id="descripcionUmbraculo"><?php echo $this->input->post('descripcionUmbraculo'); ?></textarea>
                                                                <span class="text-danger"><?php echo form_error('descripcionUmbraculo');?></span>
                                                            </div>
                                                        </div>
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
<script>

    function completar()
    {
        var ancho = document.getElementById('anchoUmbraculo_m').value;
        var largo = document.getElementById('largoUmbraculo_m').value;
        var tot = ancho * largo;
        document.getElementById('unidadEspacioTotal_m2').value= tot.toFixed(3);
        document.getElementById('unidadEspacioDisponible_m2').value=tot.toFixed(3);

    }
</script>
