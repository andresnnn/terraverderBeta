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
                                                      <th>N° Tarea</th>
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
                                    <!-- FIN CONTENIDO-->
  <div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario Atención</h3>
            </div>
            <?php echo form_open('user/umbraculos_pla/atenderTarea/'.$idUmbraculo.'/'.$idTarea); ?>
            <div class="box-body">
                <div class="row clearfix">

                    <div class="col-md-6">
                        <label for="idEstado" class="control-label">Estado Tarea</label>
                        <div class="form-group">
                            <select name="idEstado" class="form-control">

                                <option value=""> Selecciona un estado de la tarea </option>

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
                <button type="button" class="btn btn-block btn-primary btn-flat'" data-toggle="modal" data-target="#myModal"> <span class="fa fa-plus"></span>Seleccionar Insumo</button>
                <span class="text-danger"><?php echo form_error('idInsumo');?></span> <!-- ESTE SERIA EL CAMPO DONDE INFORMARIA EL ERROR-->
                <span id="estadoT" class="text-danger"></span><br>
                <input type="hidden" min="0" name="idInsumo" value="<?php echo $this->input->post('idInsumo'); ?>" class="form-control" id="idInsumo" />
              </div>
            </div>
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
                                      <td > <input readonly id="<?php echo 'stock'.$i['idInsumo'];?>" value="<?php echo $i['cantidad']; ?>" /> </td>
                                      <td> <input  id="<?php echo 'canti'.$i['idInsumo'];?>" value="1" type="number" min="1" max="<?php echo $i['cantidad']; ?>" name="cantidadUtilizada" onchange="javascript:stockMax(<?php echo $i['idInsumo'];?>);" /></td>

                                      <td class="boton">
                                          <button onClick="javascript:cargarDatos(<?php echo $i['idInsumo'];?>);" class="btn btn-info btn-xs"  data-dismiss="modal"> <span class="fa fa-check"></span> Utilizar</button>
                                      </td>
                                  </tr>
                              <?php endif; ?>
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
<!-- pie de pagina -->
      <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
          <a href="<?php echo site_url('user/umbraculos_pla/verTareas/'.$idUmbraculo); ?>" class="btn btn-default btn-flat">Cancelar</a>
      </div>


            <?php echo form_close(); ?>


    </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
              <h3 class="box-title">Agregar insumo a la tarea</h3>
          </div>
<!--formulario para cargar a la base los insumos en la tarea-->

          <?php echo form_open('user/umbraculos_pla/agregarInsumoTarea/'.$idUmbraculo.'/'.$idTarea, array('class'=>'jsform')); ?>

          <div class="box-body">
                    <div class="row clearfix">
              <div id="result"></div>
                <table class="table table-striped table-hover">
                  <tr>
                  <div></div>
                      <th>N° Tarea</th>
                      <th>Cod. Insumo</th>
                      <th>Stock Actual</th>
                      <th>Cantidad Requerida</th>
                      <th>Acciones</th>
                  </tr>
                        <tr>
        <td>  <input readonly type="text" name="idTarea" id="idTarea" value="<?php echo $idTarea ?>"> </td>
        <td>  <input readonly type="text" name="idInsumoBD" id="idInsumoBD"> </td>
        <td> <input readonly type="number" name="nuevoStock" id="nuevoStock" min="0"> </td>
        <input  type="hidden" name="stockActual" id="stockActual" >
        <td>  <input readonly type="text" name="cantRequerida" id="cantRequerida"> </td>
        <td>  <input type="submit"   id="btnAgregar" name="btnAgregar" value="Agregar"> </td>
              </tr>
                </table>
              </div>
              </div>
          <?php echo form_close(); ?>
      </div>
    </div>
</div>
<div id="result"></div>
</section>
</div>
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
<script src="https://code.jquery.com/jquery-2.1.3.min.js" integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>
<!-- script modal -->
<script>
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
    document.getElementById('canti'+id).value=0;
  alert("La cantidad requerida no debe ser menor a cero ");

  }

}

function cargarDatos(id) {
    var $valor =  document.getElementById('canti'+id).value;
    var $stockActual= document.getElementById('stock'+id).value;
    var $cantRequerida = document.getElementById('canti'+id).value;
    var $nuevoStock = document.getElementById('stock'+id).value - document.getElementById('canti'+id).value;
    document.getElementById('idInsumoBD').value = id;
    document.getElementById('stockActual').value = document.getElementById('stock'+id).value;
    document.getElementById('cantRequerida').value = document.getElementById('canti'+id).value;
    if($nuevoStock>=0){
    document.getElementById('nuevoStock').value = $nuevoStock;
    }
    else {

    document.getElementById('nuevoStock').value = 0;

    }

    }


$('form.jsform').on('submit', function(form){
  var cantidad =  $('#cantRequerida').val();
  var idInsumo =  $('#idInsumoBD').val();
  var idTarea =  $('#idTarea').val();
  var nuevoStock = $('#nuevoStock').val();


    form.preventDefault();

    $.post(base_url+'user/umbraculos_pla/agregarInsumoTarea', {
      cantidad:cantidad, idInsumo:idInsumo, idTarea:idTarea, nuevoStock:nuevoStock
    }, function(response,status){
    alert("Insumo agregado"); } );
  });

</script>
