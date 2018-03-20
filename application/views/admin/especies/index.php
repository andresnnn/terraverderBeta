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
                                    <h3 class="box-title"><?php echo anchor('common/especies/crear', '<i class="fa fa-plus"></i> '. lang('especies_create_umbraculo'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                    <div class="pull-right">
              							<div class="btn-group">
              								<button type="button" class="btn btn-success btn-filter" onclick="valorSelect(1)" data-target="Activados">Activados</button>
              								<button type="button" class="btn btn-warning btn-filter" onclick="valorSelect(2)" data-target="cancelado">Desactivados</button>
              								<a href="<?php echo site_url('common/especies/'); ?>" class="btn btn-default btn-filter">Todos</a>
              							</div>
              						</div>
                          <!-- <div><form action="<?php echo site_url('common/insumos/search_keyword');?>" method = "post">
                          <br>
                              <div class="form-group">
                          <div class="col-md-8">
                            <input type="text" name = "keyword" id="keyword" placeholder="Buscar especie..." class="form-control"/>

                            </div><button type="submit"  name="search" id="search" class="btn btn-default btn-m"><span class="fa fa-search"></span></button>
                            </div>
                          </form></div> -->
                                </div>

                         <div class="box-body">
                         <section class="content">



		                <table class="table table-striped table-hover">
		                    <tr>
								<th>Nombre</th>
								<th>Nombre Científico</th>
								<th>Cuidados</th>
								<th>Sustrato</th>
								<th>Estado<a title="El estado define el activado o desactivado de especies y plantas" href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn fa fa-info-circle fa-lg "></a></th>
								<th>Acciones</th>
		                    </tr>
		                    <?php foreach($especiesSin as $e){ ?>
		                    <tr title="El estado Inactivo inhabilita el uso de la especie en otros módulos y el estado Activo lo habilita">
								<td><?php echo $e['nombreEspecie']; ?></td>
								<td><?php echo $e['nombreCientificoEspecie']; ?></td>
								<td><?php echo $e['descripcionCuidados']; ?></td>
								<td><?php echo $e['descripcionSustrato']; ?></td>
								<td>
									<?php
									  if ($e['active'] == 1) {
									  	echo "<a href='".site_url('common/especies/borrado_logico/'.$e['idEspecie'])."'><span class='label label-success'>Activo</span></a>";
									  }else{
									        echo "<a href='".site_url('common/especies/activado_logico/'.$e['idEspecie'])."'><span class='label label-default'>Inactivo</span></a>";
									  }
									?>
								</td>
								<td>
		                            <a href="<?php echo site_url('common/especies/editar/'.$e['idEspecie']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> <br>
<!-- 		                           <a href="<?php echo site_url('especies/remove/'.$e['idEspecie']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a> -->
		                        </td>
		                    </tr>
		                    <?php } ?>

                            <?php foreach($especiesCon as $e){ ?>
		                    <tr title='Las acciones de inactivar o editar estan deshabilitados porque la especie esta asociada a una planta dentro de un Umbraculo'>
								<td><?php echo $e['nombreEspecie']; ?></td>
								<td><?php echo $e['nombreCientificoEspecie']; ?></td>
								<td><?php echo $e['descripcionCuidados']; ?></td>
								<td><?php echo $e['descripcionSustrato']; ?></td>
								<td>
									<?php
									  if ($e['active'] == 1) {
									  	echo "<a style='pointer-events: none;' href='".site_url('common/especies/borrado_logico/'.$e['idEspecie'])."'><span class='label label-success  btn disabled'>Activo</span></a>";
									  }else{
									        echo "<a href='".site_url('common/especies/activado_logico/'.$e['idEspecie'])."'><span class='label label-default'>Inactivo</span></a>";
									  }
									?>
								</td>
								<td>
		                            <a style='pointer-events: none;' href="<?php echo site_url('common/especies/editar/'.$e['idEspecie']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> <br>
<!-- 		                           <a href="<?php echo site_url('especies/remove/'.$e['idEspecie']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a> -->
		                        </td>
		                    </tr>
		                    <?php } ?>

		                </table>
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
                    <h4 class="modal-title" id="myModalLabel">Información sobre el activado / desactivado de especies y plantas</h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <br>
                    <h3 class="media-heading">Se pueden desactivar tanto las especies como las plantas, es decir, desactivar no significa borrarlas sino que se bloquea su uso, entonces no se pueden crear plantas de una especie desactivada, etc. Si se desactiva una especie se desactivan automáticamente las plantas pertenecientes a la misma, se mostrara un mensaje de especie desactivada en el modulo de plantas, luego al reactivar la especie quedan desactivadas las plantas, hay que reactivarlas en el modulo de plantas.<br><br> ! Las especies, que mediante una planta, esten en un umbraculo no se podran desactivar ¡</h3>
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
<script>
            function valorSelect(valor){

                   if (valor==1) {
                     window.location.pathname ="<?php echo ('terraverde/common/especies/indexFilter1'); ?>";
                   }

                   else if (valor==2) {
                     window.location.pathname ="<?php echo ('terraverde/common/especies/indexFilter2'); ?>";
                   }



            }
                       </script>
