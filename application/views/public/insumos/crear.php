<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      



            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Insumos</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Crear nuevo insumo</h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                 <?php echo form_open('user/insumos_pla/crear',array('class' => 'form-horizontal', 'id')); ?>

			                      <div class="form-group">
			                  		<label for="nombreInsumo" class="col-md-3 control-label">Nombre</label>
			                  		<div class="col-md-8">
			                  			<input type="text" name="nombreInsumo" value="<?php echo $this->input->post('nombreInsumo'); ?>" class="form-control" id="nombreInsumo" />
			                  		</div>
			                  	</div>
								<div class="form-group">
									<label for="descripcionInsumo" class="col-md-3 control-label">Descripción</label>
									<div class="col-md-8">
										<input type="text" name="descripcionInsumo" value="<?php echo $this->input->post('descripcionInsumo'); ?>" class="form-control" id="descripcionInsumo" />
									</div>
								</div>
								<div class="form-group">
									<label for="cantidad" class="col-md-3 control-label">Cantidad</label>
									<div class="col-md-8">
										<input type="number" min="0" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" class="form-control" id="cantidad" />
									</div>
								</div>
								<div class="form-group">
									<label for="puntoDePedido" class="col-md-3 control-label">Punto de Pedido</label>
									<div class="col-md-8">
										<input type="text" name="puntoDePedido" value="<?php echo $this->input->post('puntoDePedido'); ?>" class="form-control" id="puntoDePedido" />
									</div>
								</div>

							  <div class="box-footer">
							      <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
							      <a href="<?php echo site_url('user/insumos_pla'); ?>" class="btn btn-default btn-flat">Cancelar</a>
							  </div>
                    		<?php echo form_close(); ?>
                                    <!-- FIN CONTENIDO-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

