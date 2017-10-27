<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>
                        <!--CAMPOS OCULTOS DATOS DE LA PLANTA SELECCIONADA-->
                                    <div id="camposOcultos">
                                    <input type="hidden" name="tam" id="tam" value=""/>
                                    <input type="hidden" name="lMax" id="lMax" value=""/>
                                    <input type="hidden" name="lMin" id="lMin" value=""/>
                                    <input type="hidden" name="hMax" id="hMax" value=""/>
                                    <input type="hidden" name="hMin" id="hMin" value=""/>
                                    <input type="hidden" name="tMax" id="tMax" value=""/>
                                    <input type="hidden" name="tMin" id="tMin" value=""/>
                                    <input type="hidden" name="nomC" id="nomC" value=""/>
                                    </div>
                        <!--FIN CAMPO OCULTO ENVIA ID PLANTA-->
                        <!-- INFORMACION OCULTA DEL UMBRÁCULO-->
                                    <input type="hidden" id="espacio" value="<?php echo $info_umbraculo['unidadEspacioDisponible_m2']; ?>">
                                    <input type="hidden" id="temperatura" value="<?php echo $info_umbraculo['temperaturaUmbraculo']; ?>">
                                    <input type="hidden" id="luz" value="<?php echo $info_umbraculo['luzUmbraculo']; ?>">
                                    <input type="hidden" id="humedad" value="<?php echo $info_umbraculo['humedadUmbraculo']; ?>">
                        <!-- FIN INFORMACION OCULTA DEL UMBRÁCULO-->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Agregar planta a <strong><?php echo $info_umbraculo['nombreUmbraculo']?> </strong></h3>
                                </div>

                                <div class="box-body">
            <?php echo form_open('common/umbraculos/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="idPlanta" class="control-label"><span class="text-danger">*</span>Planta</label>
						<div class="form-group">
                                <input disabled class="form-control" type="text" name="nombre" id="nombre" value=""/>                            
                                <span class="text-danger"><?php echo form_error('idPlanta');?></span> <!-- ESTE SERIA EL CAMPO DONDE INFORMARIA EL ERROR-->
                                <span id="estadoT" class="text-danger"></span><br>
                                <span id="estadoL" class="text-danger"></span><br>
                                <span id="estadoH" class="text-danger"></span><br>
                                <button type="button" class="btn btn-block btn-primary btn-flat'" data-toggle="modal" data-target="#myModal"> <span class="fa fa-plus"></span>Seleccionar planta</button>
                                <input type="hidden" min="0" name="idPlanta" value="<?php echo $this->input->post('idPlanta'); ?>" class="form-control" id="idPlanta" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="cantidad" class="control-label"><span class="text-danger">*</span>Cantidad</label>
						<div class="form-group">
							<input onChange="comprobarEspacio();" type="number" min="1" name="cantidad" value="<?php echo $this->input->post('cantidad'); ?>" class="form-control" id="cantidad" />
							<span class="text-danger"><?php echo form_error('cantidad');?></span>
                            <span id="estadoEPP" class="text-danger"></span>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<input type="hidden" min="0" name="idUmbraculo" value="<?php echo $id; ?>" class="form-control" id="idUmbraculo" />
							<span class="text-danger"><?php echo form_error('idUmbraculo');?></span>
						</div>
					</div>
				</div>
			</div>
            <div class="box-footer" style="text-align: center;">
                <button id="bnAdd" type="submit" class="btn btn-primary btn-flat">Agregar</button>
                <a href="<?php echo site_url('common/umbraculos/ver/'.$id); ?>" class="btn btn-default btn-flat">Cancelar</a>
            </div>  
            <?php echo form_close(); ?>
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
          <h4 class="modal-title"><span class="fa fa-tencent-weibo"></span> Seleccionar planta</h4>
        </div>
        <div class="modal-body">
                <table class="table table-striped table-hover">
                    <tr>
                    <div></div>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Unidades Espacio cm<sup>2</sup></th>
                        <th>Máx lx.</th>
                        <th>Min lx.</th>
                        <th>Máx húmedad</th>
                        <th>Min húmedad</th>
                        <th>Máx temp.</th>
                        <th>Mín temp.</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($all_plantas as $p){ ?>
                    <tr id="<?php echo 'fila'.$p['idPlanta'];?>">
                        <td id="numero"><?php echo $p['nombrePlanta']; ?></td> 
                        <td><?php echo $p['nombreEspecie']; ?></td>
                        <td><?php echo $p['unidadEspacioPlanta_m2']; ?></td>
                        <td><?php echo $p['luzMax']; ?></td>
                        <td><?php echo $p['luzMin']; ?></td>
                        <td><?php echo $p['humedadMax']; ?></td>
                        <td><?php echo $p['humedadMin']; ?></td>
                        <td><?php echo $p['temperaturaMax']; ?></td>
                        <td><?php echo $p['temperaturaMin']; ?></td>
                        <td class="boton">
                            <button onClick="javascript:cargarDatos(<?php echo $p['idPlanta'];?>);comprobarCondiciones();" class="btn btn-info btn-xs"  data-dismiss="modal"> <span class="fa fa-check"></span> Seleccionar</button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <?php echo anchor('common/plantas/crear', '<i class="fa fa-plus"> Agregar nueva planta</i> ', array('class' => 'btn btn-block btn-primary btn-flat','title' => 'Registrar nueva planta')); ?>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  
</div>
                </section>
            </div>


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
    document.getElementById('nombre').value = document.getElementById('fila'+id).cells[0].innerHTML;
    document.getElementById('nomC').value = document.getElementById('fila'+id).cells[1].innerHTML;
    document.getElementById('tam').value = document.getElementById('fila'+id).cells[2].innerHTML;
    document.getElementById('lMax').value = document.getElementById('fila'+id).cells[3].innerHTML;
    document.getElementById('lMin').value = document.getElementById('fila'+id).cells[4].innerHTML;
    document.getElementById('hMax').value = document.getElementById('fila'+id).cells[5].innerHTML;
    document.getElementById('hMin').value = document.getElementById('fila'+id).cells[6].innerHTML;
    document.getElementById('tMax').value = document.getElementById('fila'+id).cells[7].innerHTML;
    document.getElementById('tMin').value = document.getElementById('fila'+id).cells[8].innerHTML;
    document.getElementById('idPlanta').value = id;
}

    function comprobarCondiciones(){

        /* SI LAS CONDICIONES SON CORRECTAS NO APARECE NINGUN MENSAJE, Y EL BOTON DE AGREGAR ESTA HABILITADO*/
        document.getElementById('estadoT').innerHTML = '';
        document.getElementById('estadoL').innerHTML = '';
        document.getElementById('estadoH').innerHTML = '';
        document.getElementById('bnAdd').disabled=false;

        /*SI ALGUNA DE LAS CONDICIONES NO ES COMPATIBLE CON LAS DEL UMBRÁCULO, APARECE ALGUNO DE LOS MENSAJES*/
        /*Y EL BOTON DE AGREGAR ESTARÁ DESHABILITADO*/

        /*PARA COMPROBAR QUE LA TEMPERATURA DEL UMBRACULO SEA CORRECTA*/
        var $tempU = document.getElementById('temperatura').value;
        var $tMx = document.getElementById('tMax').value;
        var $tMn = document.getElementById('tMin').value;
        /**/

        if ($tempU < $tMn || $tempU > $tMx) {
            document.getElementById('estadoT').innerHTML = 'La temperatura del umbráculo, no es la indicada para la especie.';
            document.getElementById('bnAdd').disabled=true;
        }

        /*PARA COMPROBAR QUE LA ILUMINACIÓN DEL UMBRACULO SEA CORRECTA*/
        var $luzU = document.getElementById('luz').value;
        var $lMx = document.getElementById('lMax').value;
        var $lMn = document.getElementById('lMin').value;
        /**/
        if ($luzU<$lMn || $luzU > $lMx) {
            document.getElementById('estadoL').innerHTML = 'La iluminación del umbráculo, no es la adecuada para esta especie.';
            document.getElementById('bnAdd').disabled=true;
        }
        /*PARA COMPROBAR QUE LA HUMEDAD DEL UMBRACULO SEA CORRECTA*/   
        var $humU = document.getElementById('humedad').value;
        var $hMx = document.getElementById('hMax').value;
        var $hMn = document.getElementById('hMin').value;
        if ($humU<$hMn || $humU > $hMx) {
            document.getElementById('estadoH').innerHTML = 'La humedad dentro del umbráculo, no es la adecuada para esta especie.';
            document.getElementById('bnAdd').disabled=true;
        }
    }

    function comprobarEspacio(){
        var $eppDisponible = document.getElementById('espacio').value;
        var $tamPlanta = document.getElementById('tam').value;
        var $cantidadPlanta = document.getElementById('cantidad').value;

        /*MULTIPLICO EL ESPACIO EN cm2 QUE OCUPA LA PLANTA SELECCIONADA, POR LA CANTIDAD A PREFERENCIA*/
        var $eppCT = ($tamPlanta * $cantidadPlanta)/10000; /*se divide por 10000, para transformar de cm2 a mt2*/

        /*REALIZO LA COMPARACION*/
        if ($eppCT > $eppDisponible)
        {
            /*SI LA CANTIDAD QUE INGRESO EXCEDE A LA DISPONIBILIDAD REAL*/
            /*MUESTRA MENSAJE & DESHABILITA BOTÓN AGREGAR*/
            document.getElementById('estadoEPP').innerHTML = 'Espacio dentro del umbráculo insuficiente';
            document.getElementById('bnAdd').disabled=true;
        } else if ($eppCT <= $eppDisponible)
        {
            /*SI LA CANTIDAD QUE SE DESEA INGRESAR ES VÁLIDA*/
            /*LIMPIO MENSAJE ERROR & HABILITO BOTÓN*/
            document.getElementById('estadoEPP').innerHTML = '';
            document.getElementById('bnAdd').disabled=false;
            $eppDisponible=-$eppCT;
            /*ESTE SERÍA EL VALOR CON EL CUAL ACTUALIZO EN LA BD, SOBRE ESE UMBRÁCULO*/
        }

        /*SI LA CANTIDAD INGRESA*/


            
    }


</script>