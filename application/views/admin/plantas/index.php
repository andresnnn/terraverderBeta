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
                                    <h3 class="box-title"><?php echo anchor('common/plantas/crear', '<i class="fa fa-plus"></i> '. lang('plantas_create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                    <div class="pull-right">
                            <div class="btn-group">
                              <button type="button" class="btn btn-success btn-filter" onclick="valorSelect(1)" data-target="Activados">Activados</button>
              								<button type="button" class="btn btn-warning btn-filter" onclick="valorSelect(2)" data-target="cancelado">Desactivados</button>

                              <button type="button" class="btn btn-default btn-filter" onclick="valorSelect(3)" data-target="puntoBajo">Ordenar por unidades de espacio</button>
                              <a href="<?php echo site_url('common/plantas'); ?>" class="btn btn-default btn-filter">Todos</a>
                            </div>
                          </div>
                          <!-- <div><form action="<?php echo site_url('common/insumos/search_keyword');?>" method = "post">
                          <br>
                              <div class="form-group">
                          <div class="col-md-8">
                            <input type="text" name = "keyword" id="keyword" placeholder="Buscar plantas..." class="form-control"/>

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
                        <th>Unidades Espacio</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($plantas as $p){ ?>
                    <tr>
                        <td><?php echo $p['nombrePlanta']; ?></td>
                        <td><?php echo $p['nombreCientificoPlanta']; ?></td>
                        <td><?php echo $p['unidadEspacioPlanta_m2']; ?>cm<sup>2</sup></td>
                        <td><?php echo $p['descripcionPlanta']; ?></td>
                        <td title="El estado determina, el poder utilizar o no, determinada planta en otros módulos">
                            <?php
                                if ($p['active'] == 1) {
                                    echo "<a href='".site_url('common/plantas/borrado_logico/'.$p['idPlanta'])."'><span class='label label-success'>Activo</span></a>";
                                }else{
                                    echo "<a href='".site_url('common/plantas/activado_logico/'.$p['idPlanta'])."'><span class='label label-default'>Inactivo</span></a>";
                                }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('common/plantas/ver/'.$p['idPlanta']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a>
                            <a href="<?php echo site_url('common/plantas/editar/'.$p['idPlanta']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
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
                                 window.location.pathname ="<?php echo ('terraverde/common/plantas/indexFilter1'); ?>";
                               }
                               else if (valor==2) {
                                 window.location.pathname ="<?php echo ('terraverde/common/plantas/indexFilter2'); ?>";
                               }

                               else if (valor==3) {
                                 window.location.pathname ="<?php echo ('terraverde/common/plantas/indexFilter3'); ?>";
                               }
                        }
                                   </script>
