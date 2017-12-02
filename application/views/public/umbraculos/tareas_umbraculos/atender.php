<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
</script>
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Umbráculos</h3>

                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Estado actual tarea</h3>
                                </div>
                                <div class="box-body">
                                    <!-- CONTENIDO -->
                                    <table class="table table-striped table-hover">
                                            <tr>
                                                <th>nro de tarea</th>
                                                <th>Tipo tarea</th>
                                                <th>Planta</th>
                                                <th>Umbraculo</th>
                                                <th>Creador</th>
                                                <th>Fecha Creación</th>
                                                <th>Fecha Prevista</th>
                                                <th>Estado Actual </th>

                                            </tr>
                                            <?php foreach($tarea as $t){ ?>
                                            <tr>
                                                <td><input readonly type="text" name="idTarea" id="idTarea" value="<?php echo $idTarea ?>"></td>
                                                <td><?php echo $t['nombreTipoTarea']; ?></td>
                                                <td><?php echo $t['nombrePlanta']; ?></td>
                                                <td><?php echo $t['nombreUmbraculo']; ?></td>
                                                <td><?php echo $t['creador']; ?></td>
                                                <td><?php echo $t['fechaCreacion']; ?></td>
                                                <td><?php echo $t['fechaComienzo']; ?></td>
                                                <td><?php echo $t['nombreEstado']; ?></td>
                                            </tr>

                                            <?php } ?>
                                    </table>
                                    <!-- FIN CONTENIDO-->

                                    <!-- atencion de la tarea -->
                                      <div class="row">
                                        <div class="col-md-12">
                                          	<div class="box box-info">
                                                <div class="box-header with-border">
                                                  	<h3 class="box-title">Atender Tarea</h3>
                                                </div>
                                    			<?php echo form_open('user/umbraculos_pla/atenderTarea/'.$idUmbraculo.'/'.$idTarea); ?>
                                    			<div class="box-body">
                                    				<div class="row clearfix">

                                    					<div class="col-md-6">
                                    						<label for="idEstado" class="control-label">Estado Tarea</label>
                                    						<div class="form-group">
                                    							<select name="idEstado" class="form-control">
                                    								<option value="">  Selecciona un estado de la tarea </option>
                                    								<?php
                                    								foreach($estados as $estado_tarea)
                                    								{
                                    									$selected = ($estado_tarea['idEstado'] ) ? ' selected="selected"' : "";

                                    									echo '<option value="'.$estado_tarea['idEstado'].'" '.$selected.'>'.$estado_tarea['nombreEstado'].'</option>';
                                    								}	?>
                                    							</select>
                                    						</div>
                                    					</div>

                                    					<div class="col-md-6">
                                    						<label for="idUserAtencion" class="control-label">Usuario Actual: </label>
                                                <div class="form-group">
                                    						<?php echo $user_login['firstname']." ".$user_login['lastname']; ?>
                                    						<input type="hidden" name="idUserAtencion" value="<?php echo $user_login['id']; ?>" class="has-datepicker form-control" id="idUserAtencion" />
                                    						</div>
                                    					</div>

                                              <div class="col-md-6">
                                    						<label for="fechaAtencion" class="control-label"><span class="text-danger">*</span>Fecha Atención</label>
                                                <div class="form-group">
                                                  <input  readonly type="text" name="fechaAtencion" value="<?php echo date('Y-m-d'); ?>" class="has-datepicker form-control" id="fechaAtencion" />
                                    							<span class="text-danger"><?php echo form_error('fechaAtencion');?></span>
                                    						</div>
                                              </div>
                                              <div class="col-md-6">
                                                <label for="horaAtencion" class="control-label"><span class="text-danger">*</span>Hora Atención</label>
                                                <div class="form-group">
                                                  <input  readonly type="text" name="horaAtencion" value="<?php echo date('H:i:s', time() - date('Z')); ?>" class="has-datepicker form-control" id="horaAtencion" />
                                                  <span class="text-danger"><?php echo form_error('horaAtencion');?></span>
                                                </div>
                                              </div>
                                    <?php foreach($tarea as $t){ ?>
                                          <div class="col-md-6">
                                                <label for="observacionEspecialista" class="control-label">ObservacionEspecialista</label>
                                                <div class="form-group">
                                                  <textarea  type="text" name="observacionEspecialista" value="<?php echo ($this->input->post('observacionEspecialista') ? $this->input->post('observacionEspecialista') : $t['observacionEspecialista']); ?>" class="form-control" id="observacionEspecialista" /> </textarea>
                                                </div>
                                              </div>
                                    <?php } ?>
                                            </div>
                                    			</div>
                                          <!-- pie de pagina -->
                                          <div class="box-footer">
                                              <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                                              <a href="<?php echo site_url('user/umbraculos_pla/verTareas/'.$idUmbraculo); ?>" class="btn btn-default btn-flat">Cancelar</a>
                                          </div>
                                          <!-- fin pie pag -->
                                    			<?php echo form_close(); ?>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- fin atender tarea -->

                                    <!-- insumos utilizados en la tarea -->
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                  <h3 class="box-title">Insumos utilizados en la tarea</h3>
                                              </div>
                                              <div class="box-body">
                                                <div class="row clearfix">
                                              <!-- boton para ver insumos -->
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <button type="button" id=modal_ver name=modal_ver class="btn btn-warning btn-block btn-primary btn-flat " data-toggle="modal" data-target="#myModal2"> <span class="fa fa-eye"></span>Ver insumos utilizados</button>
                                                  <span class="text-danger"><?php echo form_error('idInsumo');?></span>
                                                  <input type="hidden" min="0" name="idInsumo" value="<?php echo $this->input->post('idInsumo'); ?>" class="form-control" id="idInsumo" />
                                                </div>
                                              </div>
                                              <!-- fin boton -->
                                              <!-- boton seleccionar insumo -->
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <button type="button" class="btn btn-block btn-primary btn-flat'" data-toggle="modal" data-target="#myModal"> <span class="fa fa-plus"></span>Agregar Insumo Utilizado </button>
                                                  <span class="text-danger"><?php echo form_error('idInsumo');?></span> <!-- ESTE SERIA EL CAMPO DONDE INFORMARIA EL ERROR-->
                                                  <span id="estadoT" class="text-danger"></span><br>
                                                  <input type="hidden" min="0" name="idInsumo" value="<?php echo $this->input->post('idInsumo'); ?>" class="form-control" id="idInsumo" />
                                                </div>
                                              </div>
                                              <!-- fin boton seleccionar insumo -->
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- fin insumos utilizados -->

                                    <!-- modal seleccionar insumos para agregar-->
                                    <div class="container">
                                      <!-- Modal -->
                                      <div class="modal fade" id="myModal" role="dialog">
                                        <div style="overflow-x:auto;" class="modal-dialog modal-lg">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Agregar Insumo utilizado </h4>
                                            </div>
                                            <div class="modal-body">
                                                    <table class="table table-striped table-hover">
                                                        <tr>
                                                        <div></div>
                                                            <th>Nombre</th>
                                                            <th>Stock</th>
                                                            <th>Cantidad Requerida</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                        <?php foreach($insumos as $i){ ?>
                                                          <div id="insumosSeleccionados">

                                                                <tr id="<?php echo 'fila'.$i['idInsumo'];?>">
                                                                    <td id="nombreInsumo"><?php echo $i['nombreInsumo']; ?></td>
                                                                    <td > <input readonly id="<?php echo 'stock'.$i['idInsumo'];?>" value="<?php echo $i['cantidad']; ?>" /> </td>
                                                                    <td> <input  id="<?php echo 'canti'.$i['idInsumo'];?>" value="1" type="number" min="1" max="<?php echo $i['cantidad']; ?>" name="cantidadUtilizada" onchange="javascript:stockMax(<?php echo $i['idInsumo'];?>);" /></td>

                                                                    <td class="boton">
                                                                        <button onClick="javascript:cargarDatos(<?php echo $i['idInsumo'];?>);" class="btn btn-info btn-xs"  data-dismiss="modal"> <span class="fa fa-check"></span> Agregar</button>
                                                                    </td>
                                                                </tr>

                                                          </div>
                                                        <?php } ?>
                                                    </table>
                                                    <?php echo anchor('user/insumos_pla/crear', '<i class="fa fa-plus"> Agregar nuevo Insumo </i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nuevo insumo')); ?>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                    <!-- termina modal -->
                                    <!-- modal para ver insumos de la tarea-->
                                    <div class="container">
                                      <!-- Modal -->
                                      <div class="modal fade" id="myModal2" role="dialog">
                                        <div style="overflow-x:auto;" class="modal-dialog modal-lg">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Insumos utilizados en la tarea</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <table class="table table-striped table-hover">
                                                        <tr>
                                                        <div></div>
                                                            <th>Nombre</th>
                                                            <th>Cantidad Utilizada</th>
                                                            <th> Stock del Insumo <th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                        <?php foreach($insumosTarea as $i){ ?>
                                                          <div id="insumosSeleccionados">
                                                                <tr id="<?php echo 'filaBorrar'.$i['idInsumo'];?>">
                                                                    <td id="nombreInsumo"><?php echo $i['nombreInsumo']; ?></td>
                                                                    <td > <input readonly type="number" id="<?php echo 'cantBorrar'.$i['idInsumo'];?>" value="<?php echo $i['cantidadUtilizado']; ?>" /> </td>
                                                                    <td > <input readonly type="number" id="<?php echo  'stockBorrar'.$i['idInsumo'];?>" value="<?php echo $i['cantidad']; ?>" /> </td>
                                                                    <td class="boton">
                                                                        <button onClick="javascript:borrarInsumoTarea(<?php echo $i['idInsumo'];?>);" class="btn btn-danger btn-xs"  data-dismiss="modal"> <span class="fa fa-trash"></span> Borrar</button>
                                                                    </td>
                                                                </tr>
                                                          </div>
                                                        <?php } ?>
                                                    </table>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- fin del modal -->
                                    </section>
                                    </div>

                                    <!-- Estilo del modal -->
                                    <style>
                                    .modal-header, h4, .close {
                                        background-color: #5cb85c;
                                        color:white !important;
                                        text-align: center;
                                        font-size: 30px;
                                    }
                                    .modal-footer {
                                        background-color: #f9f9f9;
                                    }
                                    </style>
                                    <script
                                    src="https://code.jquery.com/jquery-2.1.3.min.js"
                                    integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM="
                                    crossorigin="anonymous"></script>
                                    <!-- script modal -->
                                    <script>
                                    function consultaInsumoTarea(idTarea){}



                                    function stockMax(id){
                                        var $valor =  document.getElementById('canti'+id).value;
                                        var $valorMax= document.getElementById('canti'+id).max;
                                        var $valorMin = document.getElementById('canti'+id).min;
                                        var $cantReq = $valorMax-$valor;
                                        document.getElementById('canti'+id).value=parseInt($valor);
                                      if ($cantReq<0) {
                                        document.getElementById('canti'+id).value=$valorMax;
                                        alert("La cantidad requerida no debe superar el stock");
                                      }
                                      else if ($cantReq>$valorMax) {
                                        document.getElementById('canti'+id).value=1;
                                      alert("La cantidad requerida no debe ser negativa");
                                      }
                                      else if ($cantReq==$valorMax) {
                                        document.getElementById('canti'+id).value=1;
                                        alert("La cantidad requerida debe ser mayor a cero");
                                      }
                                    }
                                    function borrarInsumoTarea(idInsumo) {
                                      var confirmacion = confirm("¿Esta seguro de borrar el insumo de la tarea?");
                                      if (confirmacion == true){
                                    var idTarea =  $('#idTarea').val();
                                    var cantidad = parseInt($('#cantBorrar'+idInsumo).val());
                                    var actualStock = parseInt($('#stockBorrar'+idInsumo).val());
                                    var nuevoStock =parseInt(cantidad+actualStock);
                                    $.post(base_url+'user/umbraculos_pla/borrarInsumoTarea', {
                                      idInsumo:idInsumo, idTarea:idTarea, nuevoStock:nuevoStock
                                    }, function(response,status){
                                    alert("Borrado Correctamente"); } );
                                    }
                                    }

                                    function cargarDatos(idInsumo) {
                                      var idTarea =  $('#idTarea').val();
                                      var cantidad = $('#canti'+idInsumo).val();
                                      var actualStock = $('#stock'+idInsumo).val();
                                      var nuevoStock = $('#stock'+idInsumo).val()-$('#canti'+idInsumo).val();
                                      if(nuevoStock<0){
                                        nuevoStock=0;
                                        cantidad = nuevoStock;
                                        }
                                        $.post(base_url+'user/umbraculos_pla/agregarInsumoTarea', {
                                          cantidad:cantidad, idInsumo:idInsumo, idTarea:idTarea, nuevoStock:nuevoStock
                                        }, function(response,status){
                                        alert("Agregado Correctamente"); } );
                                        }




                                    </script>
