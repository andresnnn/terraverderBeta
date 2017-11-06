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
                                    <h3 class="box-title">Crear nueva Tarea</h3>
                                </div>
                                    <div class="box-body">
                                                <div class="col-md-6">
                                                    <label for="idUmbraculo" class="control-label">Umbraculo</label>
                                                    <div class="form-group">
                                                        <select id="idUmbraculo" onChange="document.location.href=this.value" name="idUmbraculo" class="form-control">
                                                            <option value=""></option>
                                                            <?php foreach($all_umbraculo as $umbraculo) { ?>
                                                                <option value="agregarTarea/<?php echo $umbraculo['idUmbraculo']; ?>"><?php echo $umbraculo['nombreUmbraculo'];?></option>
                                                            
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                                        
                                    </div>
                                </div>
                              </div>
                            </div>
                </section>
            <div class="box-footer" style="text-align: center;">
                <a href="<?php echo site_url('common/tareas'); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>
            </div>
