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
								<th>Estado</th>
								<th>Acciones</th>
		                    </tr>
		                    <?php foreach($especies as $e){ ?>
		                    <tr title="El estado determina, el poder utilizar o no, determinada especie en otros módulos">
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
		                </table>
                         </div>
                    </div>
                </section>
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
