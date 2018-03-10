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
                        <h3 class="box-title">Editar Umbráculo</h3>
                    </div>
                                <div class="box-body">
			<?php echo form_open('common/umbraculos/editar/'.$umbraculos['idUmbraculo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombreUmbraculo" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="nombreUmbraculo" value="<?php echo ($this->input->post('nombreUmbraculo') ? $this->input->post('nombreUmbraculo') : $umbraculos['nombreUmbraculo']); ?>" class="form-control" id="nombreUmbraculo" />
							<span class="text-danger"><?php echo form_error('nombreUmbraculo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="anchoUmbraculo_m" class="control-label"><span class="text-danger">*</span>Ancho (m<sup>2</sup>)</label>
						<div class="form-group">
							<input type="number"  step="any" name="anchoUmbraculo_m" onChange="completar();" value="<?php echo ($this->input->post('anchoUmbraculo_m') ? $this->input->post('anchoUmbraculo_m') : $umbraculos['anchoUmbraculo_m']); ?>" class="form-control" id="anchoUmbraculo_m" />
							<span class="text-danger"><?php echo form_error('anchoUmbraculo_m');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="largoUmbraculo_m" class="control-label"><span class="text-danger">*</span>Largo (m<sup>2</sup>)</label>
						<div class="form-group">
							<input  type="number" step="any" name="largoUmbraculo_m" onChange="completar();" value="<?php echo ($this->input->post('largoUmbraculo_m') ? $this->input->post('largoUmbraculo_m') : $umbraculos['largoUmbraculo_m']); ?>" class="form-control" id="largoUmbraculo_m" />
							<span class="text-danger"><?php echo form_error('largoUmbraculo_m');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label disabled for="unidadEspacioTotal_m2" class="control-label"><span class="text-danger">*</span>EspacioTotal (m<sup>2</sup>)</label>
						<div class="form-group">
							<input readonly type="number" step="any" name="unidadEspacioTotal_m2" value="<?php echo ($this->input->post('unidadEspacioTotal_m2') ? $this->input->post('unidadEspacioTotal_m2') : $umbraculos['unidadEspacioTotal_m2']); ?>" class="form-control" id="unidadEspacioTotal_m2" />
							<span class="text-danger"><?php echo form_error('unidadEspacioTotal_m2');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label disabled for="unidadEspacioDisponible_m2" class="control-label">Espacio Disponible (m<sup>2</sup>)</label>
						<div class="form-group">
							<input readonly type="number" step="any" name="unidadEspacioDisponible_m2" value="<?php echo ($this->input->post('unidadEspacioDisponible_m2') ? $this->input->post('unidadEspacioDisponible_m2') : $umbraculos['unidadEspacioDisponible_m2']); ?>" class="form-control" id="unidadEspacioDisponible_m2" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="temperaturaUmbraculo" class="control-label"><span class="text-danger">*</span>Temperatura (°)</label>
						<div class="form-group">
							<input type="number" name="temperaturaUmbraculo" onChange="analizarCondiciones();" value="<?php echo ($this->input->post('temperaturaUmbraculo') ? $this->input->post('temperaturaUmbraculo') : $umbraculos['temperaturaUmbraculo']); ?>" class="form-control" id="temperaturaUmbraculo" />
							<span class="text-danger"><?php echo form_error('temperaturaUmbraculo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="luzUmbraculo" class="control-label"><span class="text-danger">*</span>Luz (lx)</label>
						<div class="form-group">
							<input type="number"  name="luzUmbraculo" onChange="analizarCondiciones();" value="<?php echo ($this->input->post('luzUmbraculo') ? $this->input->post('luzUmbraculo') : $umbraculos['luzUmbraculo']); ?>" class="form-control" id="luzUmbraculo" />
							<span class="text-danger"><?php echo form_error('luzUmbraculo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="humedadUmbraculo"  class="control-label"><span class="text-danger">*</span>Humedad (%)</label>
						<div class="form-group">
							<input type="number"  max="100" onChange="analizarCondiciones();" name="humedadUmbraculo" value="<?php echo ($this->input->post('humedadUmbraculo') ? $this->input->post('humedadUmbraculo') : $umbraculos['humedadUmbraculo']); ?>" class="form-control" id="humedadUmbraculo" />
							<span class="text-danger"><?php echo form_error('humedadUmbraculo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcionSustrato" class="control-label">Sustrato</label>
						<div class="form-group">
							<input type="text" name="descripcionSustrato" value="<?php echo ($this->input->post('descripcionSustrato') ? $this->input->post('descripcionSustrato') : $umbraculos['descripcionSustrato']); ?>" class="form-control" id="descripcionSustrato" />
							<span class="text-danger"><?php echo form_error('descripcionSustrato');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcionUmbraculo" class="control-label"><span class="text-danger">*</span>Descripción</label>
						<div class="form-group">
							<textarea name="descripcionUmbraculo" class="form-control" id="descripcionUmbraculo"><?php echo ($this->input->post('descripcionUmbraculo') ? $this->input->post('descripcionUmbraculo') : $umbraculos['descripcionUmbraculo']); ?></textarea>
							<span class="text-danger"><?php echo form_error('descripcionUmbraculo');?></span>
						</div>
					</div>
                    
                     <div  class="col-md-8">
                         <label for="descripcionUmbraculo" class="control-label"><span class="fa fa-leaf"> </span> Plantas en el Umbraculo (Compatibilidad) </label><a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn fa fa-info-circle fa-lg "></a>
						<div class="box-body">                       
                                    <table  class="table table-responsive table-sm  table-striped table-hover" >
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Temperatura</th>
                                            <th>Luz</th>
                                            <th>Humedad</th>
                                            <th>Unidad m<sup>2</sup></th>
                                            <th>Cantidad </th>
                                        </tr>
                                        
                                        <tr>
                                            <?php foreach($plantas as $u){ ?>
                                            <td><?php echo $u['nombrePlanta']; ?></td>
                                            <td>( <?php echo $u['temperaturaMin'];?> - <?php echo $u['temperaturaMax'];?> &#8451;)</td>
                                            <td>( <?php echo $u['luzMin'];?> - <?php echo $u['luzMax'];?> LUX)</td>
                                            <td>( <?php echo $u['humedadMin'];?> - <?php echo $u['humedadMax'];?> %)</td>
                                            <td><?php echo ($u['unidadEspacioPlanta_m2']*$u['cantidad'])/10000;?> m<sup>2</sup></td>
                                            <td><?php echo $u['cantidad']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    </div>
						</div>
                    
                    <div class="col-md-4">
						
						<div class="box-body">                       
                                    <table  name="tablita" class="table table-responsive table-sm  table-hover" id="tablita">
                                        <br><br><br>
                                        <tr id="mm">
                                            <?php foreach($plantas as $u){ ?>
                                            <td  colspan="3" id="hola"></td>
                                         </tr>
                                        <?php } ?>
                                    </table>
                                    </div>
						</div>
                    
                   
					</div>
                    
				</div>
			</div>
                                                    <div class="box-footer">
                                                        <button onclick="avisoGuardar();" type="submit" class="btn btn-primary btn-flat" >Guardar</button>
                                                        
                                                        <a href="<?php echo site_url('common/umbraculos'); ?>" class="btn btn-default btn-flat" >Cancelar</a>
                                                    </div> 			
			<?php echo form_close(); ?>
                         </div>
                    </div>
                </section>
            </div>
              <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Compatibilidad de las plantas al editar umbraculo</h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <br>
                    <h3 class="media-heading">A medida que se van cambiando las condiciones del umbraculo (luz,humedad y/o temperatura) se iran indicando las plantas, que se encuentran en el umbraculo, que cumplen las condiciones para quedarse en el umbraculo y las que deberan ser mudadas del mismo. Se mostrara la siguiente informacion:<br><br><span class='fa fa-leaf label label-success'>Planta x condiciones aptas</span><br><br><span class='fa fa-leaf label label-danger'>Planta x condiciones no aptas</span></h3>
                    </center>
                </div>
                <!--<div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-circle btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"> Cerrar</span></button>
                    </center>
                </div>-->
            </div>
        </div>
    </div>  
                
               <!-- Modal -->
    <div class="modal" id="myModalexit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel">Compatibilidad de las plantas al editar umbraculo</h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <br>
                    <h3 class="media-heading">No olvides sacar del umbraculo a las especies de plantas que ya no poseen condiciones aptas para habitar el mismo, las mismas poseen la leyenda de color rojo: Condiciones no aptas.</h3>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                        <button  type="submit" class="btn btn-primary btn-flat" >Guardar</button>
                        <a href="<?php echo site_url('common/umbraculos'); ?>" class="btn btn-default btn-flat" >Cancelar</a>
                    </center>
                </div>
            </div>
        </div>
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
    
    
                                                function analizarCondiciones(){
                                                   
                                                    
                                                    <?php  foreach($plantasComp as $p){ ?>
                                                    <?php reset($p); ?>
                                                    var tabla=document.getElementById("tablita");
                                                    var rowCount = tabla.rows.length;
                                                    var row = tabla.insertRow(rowCount);
                                                    
                                                    var array = <?php echo json_encode($p, JSON_PRETTY_PRINT) ?>;
                                                    var temperatura=document.getElementById('temperaturaUmbraculo').value;
                                                    var humedad=document.getElementById('humedadUmbraculo').value;
                                                    var luz=document.getElementById('luzUmbraculo').value;
                                                    var tempMin=<?php echo $p['temperaturaMin'] ?>;
                                                    var tempMax=<?php echo $p['temperaturaMax'] ?>;
                                                    var humMin=<?php echo $p['humedadMin'] ?>;
                                                    var humMax=<?php echo $p['humedadMax'] ?>;
                                                    var luzMin=<?php echo $p['luzMin'] ?>;
                                                    var luzMax=<?php echo $p['luzMax'] ?>;
                                                   
                                                    
                                                    if (humedad>=humMin && humedad<=humMax && temperatura>=tempMin && temperatura<=tempMax && luz>=luzMin && luz<=luzMax){
                                                    
                                                    
                                                      row.insertCell(0).innerHTML=  "<span class='fa fa-leaf label label-success'> Planta "+array.nombrePlanta+" condiciones aptas</span>";
                                                      tabla.deleteRow(0);
                                                    }else{
                                                      
                                                 row.insertCell(0).innerHTML=  "<span class='fa fa-leaf label label-danger'> Planta "+array.nombrePlanta+" Condiciones no aptas</span>";
                                                       tabla.deleteRow(0);
                                                    } 
                                                    <?php } ?>
                                                   }
    function avisoGuardar(){
        alert('No olvides sacar del umbraculo a las especies de plantas que ya no poseen condiciones aptas para habitar el mismo, las mismas poseen la leyenda de color rojo: Condiciones no aptas.');
    }
    window.onload=analizarCondiciones();
 
</script>