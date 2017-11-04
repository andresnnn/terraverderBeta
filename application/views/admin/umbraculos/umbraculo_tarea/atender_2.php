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
                      <h3 class="box-title">Tareas <strong></strong></h3>
                  </div>
                      <div class="box-body">
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
                                  <td><?php echo $t['idTarea']; ?></td>
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
                      </div>
                  </div>
                </div>
              </div>


  <div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Atender Tarea</h3>
            </div>
			<?php echo form_open('common/umbraculos/atenderTarea/'.$idUmbraculo.'/'.$idTarea); ?>
			<div class="box-body">
				<div class="row clearfix">

					<div class="col-md-6">
						<label for="idEstado" class="control-label">Estado Tarea</label>
						<div class="form-group">
							<select name="idEstado" class="form-control">
								<option value="">select estado_tarea</option>
								<?php
								foreach($estados as $estado_tarea)
								{
									$selected = ($estado_tarea['idEstado'] ) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_tarea['idEstado'].'" '.$selected.'>'.$estado_tarea['nombreEstado'].'</option>';
								}
								?>
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
<?php foreach($tarea as $t){ ?>
      <div class="col-md-6">
            <label for="observacionEspecialista" class="control-label">ObservacionEspecialista</label>
            <div class="form-group">
              <textarea  type="text" name="observacionEspecialista" value="<?php echo ($this->input->post('observacionEspecialista') ? $this->input->post('observacionEspecialista') : $t['observacionEspecialista']); ?>" class="form-control" id="observacionEspecialista" /> </textarea>
            </div>
          </div>
<?php } ?>

            <!-- seleccionar insumo -->
            <div class="col-md-6">
              <label for="idInsumo" class="control-label"><span class="text-danger">*</span>Insumo</label>
              <div class="form-group">
                <!-- <input disabled class="form-control" type="text" name="nombre" id="nombre" value=""/> -->
                <button type="button" class="btn btn-block btn-primary btn-flat'" data-toggle="modal" data-target="#myModal"> <span class="fa fa-plus"></span>Seleccionar Insumo</button>
                <span class="text-danger"><?php echo form_error('idInsumo');?></span> <!-- ESTE SERIA EL CAMPO DONDE INFORMARIA EL ERROR-->
                <span id="estadoT" class="text-danger"></span><br>
                <input type="hidden" min="0" name="idInsumo" value="<?php echo $this->input->post('idInsumo'); ?>" class="form-control" id="idInsumo" />
              </div>
            </div>
            <!-- <div id="resultado">-->
            <!-- <?php include('consulta.php');?> -->
          <!-- </div> -->
        </div>
			</div>

      <!-- probando modal-->
      <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div style="overflow-x:auto;" class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Seleccionar Insumos</h4>
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
                              <?php if ($i['active'] == 1): ?>
                                  <tr id="<?php echo 'fila'.$i['idInsumo'];?>">
                                      <td id="nombreInsumo"><?php echo $i['nombreInsumo']; ?></td>
                                      <td > <?php echo $i['cantidad']; ?> </td>
                                      <td> <input  id="<?php echo 'canti'.$i['idInsumo'];?>" type="number" min="0" max="<?php echo $i['cantidad']; ?>" name="cantidadUtilizada"  /></td>

                                      <td class="boton">
                                          <button onClick="javascript:cargarDatos(<?php echo $i['idInsumo'];?>);" class="btn btn-info btn-xs"  data-dismiss="modal"> <span class="fa fa-check"></span> Utilizar</button>
                                      </td>
                                  </tr>
                              <?php endif; ?>
                            </div>
                          <?php } ?>
                      </table>
                      <?php echo anchor('common/insumos/crear', '<i class="fa fa-plus"> Agregar nuevo Insumo </i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nuevo insumo')); ?>
              </div>
              <div class="modal-footer">
              </div>
            </div>

          </div>
        </div>
      </div>
<!-- pie de pagina -->
      <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
          <a href="<?php echo site_url('common/umbraculos/verTareas/'.$idUmbraculo); ?>" class="btn btn-default btn-flat">Cancelar</a>
      </div>


			<?php echo form_close(); ?>


    </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
              <h3 class="box-title">Insumo para agregar</h3>
          </div>

<!--CAMPOS QUE VAN A SER ENVIADOS AL CONTROLADOR PARA CARGARSE EN LA 'BD'-->
<!-- common/umbraculos/agregarInsumoTarea/'.$idUmbraculo.'/'.$idTarea -->
          <form name="insumo_tarea" action="" onsubmit="enviarDatosInsumos(); return false">
          <div class="box-body">
    				<div class="row clearfix">
    					<div class="col-md-6">
              <label> Nro del insumo: </label>
              <input type="text" name="idInsumoBD" id="idInsumoBD">
              </div>

          <div class="col-md-6">
          <label> Cantidad Utilizada: </label>
          <input type="text" name="cantidadBD" id="cantidadBD">
          <input type="hidden" name="idTarea" id="idTarea" value="<?php echo $idTarea ?>">

          <button type="submit"> Agregar </button>
              </div>
              </div>
              </div>
          </form>
      </div>
    </div>
</div>
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

<!-- script ajax -->
<script>
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {

	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}

if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

//Función para recoger los datos del formulario y enviarlos por post
function enviarDatosInsumos(){
  var cantidad=document.getElementById('cantidadBD').value ;
  var idInsumo=document.getElementById('idInsumoBD').value;
  var idTarea=document.getElementById('idTarea').value;
  alert("hola");

  ajax=objetoAjax();

  ajax.open("POST", 'common/umbraculos/agregarInsumoTarea/'.$idUmbraculo.'/'.$idTarea,true);

  ajax.onreadystatechange=function() {

  	if (ajax.readyState==4) {

		divResultado.innerHTML = ajax.responseText

	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("cantidad="+cantidad+"&idInsumo="+idInsumo+"&idTarea="+idTarea)
}
</script>


<!-- script modal -->
<script>
//FUNCION PARA ABRIR LA VENTANA MODAL
//
    $(document.ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });



/**
 * [cargarDatos description]
 * @param  {[type]} id ES EL ID DE LA PLANTA DENTRO DE LA BD
 * @return {[type]}    [description]
 * @author SAKZEDMK
 */
function cargarDatos(id) {
    document.getElementById('cantidadBD').value = document.getElementById('canti'+id).value;
    document.getElementById('idInsumoBD').value = id;
}

</script>
