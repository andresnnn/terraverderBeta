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
                                    <h3 class="box-title"><?php echo anchor('common/tareas/selecciona_umbraculo', '<i class="fa fa-plus"></i> '. 'Crear nueva tarea', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                    <div class="pull-right">
              							<div class="btn-group">
                                            <!--boton para generar los pdf-->
                                            <div class="btn-group">
                                                <button type="button" title="Presiona para generar un PDF con las tareas del vivero, podes elejir generar por el estado de las tareas." class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><span class="fa fa-file-pdf-o"></span>  Generar PDF de Tareas <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a onclick="valorSelect(49)">Tareas No Iniciadas</a></li>
                                                    <li><a onclick="valorSelect(48)">Tareas Incompletas</a></li>
                                                    <li><a onclick="valorSelect(47)">Tareas Completas</a></li>
                                                    <li class="divider"></li>
                                                    <li><a onclick="valorSelect(45)">Todas las Tareas</a></li>
                                                </ul>
                                            </div>
                                            <!--boton para generar los pdf-->
                                            <!--<button type="button" class="btn btn-success btn-info" onclick="valorSelect(45)" data-target="Activados">Generar PDF de Tareas</button>-->
              								<button type="button" class="btn btn-success btn-filter" onclick="valorSelect(1)" data-target="Activados">Activados</button>
              								<button type="button" class="btn btn-warning btn-filter" onclick="valorSelect(2)" data-target="Desactivados">Desactivados</button>
                              <!-- <button type="button" class="btn btn-default btn-filter" data-target="completas">Tareas completas </button> -->

                              <button onclick="valorSelect(4)" type="button" class="btn btn-default btn-filter" data-target="incompletas">Tareas incompletas </button>
                              <button type="button" class="btn btn-default btn-filter" onclick="valorSelect(5)">Ordenar por fechas previstas</button>
                              <a href="<?php echo site_url('common/tareas/'); ?>" class="btn btn-default btn-filter">Todos</a>
              							</div>
              						</div>
                          <!-- <div><form action="<?php echo site_url('common/tareas/search_keyword');?>" method = "post">
                          <br>
                            <div "col-md-2">

                                    </div>
                              <div class="form-group">
                          <div class="col-md-8">
                            <input type="text" name = "keyword" id="keyword" placeholder="Buscar tarea..." class="form-control"/>
                            </div> -->



                            <!--<button type="submit"  name="search" id="search" class="btn btn-default btn-m"><span class="fa fa-search"></span></button>-->
                            </div>
                          </form></div>
                                </div>
                                    <div class="box-body">
                                    <table class="table table-striped table-hover">
                                            <tr>
                                                <th>Tipo tarea</th>
                                                <th>Planta</th>
                                                <th>Creador</th>

                                                <th>Fecha Creación</th>
                                                <th>Fecha Prevista</th>
                                                <th>Progreso Tarea</th>
                                                <th>Estado<a title="El estado define el activado o desactivado de tareas no iniciadas" href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn fa fa-info-circle fa-lg "></a></th>
                                                <th>Acciones</th>
                                            </tr>
                                            <?php foreach($tarea as $t){ ?>
                                            <tr>
                                                <td><?php echo $t['nombreTipoTarea']; ?></td>
                                                <td><?php echo $t['nombrePlanta']; ?></td>
                                                <td><?php echo $t['creador']; ?></td>

                                                <td><?php echo $t['fechaCreacion']; ?></td>
                                                <td><?php echo $t['fechaComienzo']; ?></td>
                                                <td><?php echo $t['nombreEstado']; ?></td>
                                                <!-- Borrado logico en activo -->
                                                <td><?php
                                                if ($t['active'] == 1) {
                                                  if ($t['idEstado'] == 1) {
                                                    echo "<a href='".site_url('common/tareas/borrado_logico/'.$t['idTarea'])."'><span class='label label-success'>Activo</span></a>";
                                                  }
                                                    else{
                                                      echo "<a style='pointer-events: none;' href='".site_url('common/tareas/borrado_logico/'.$t['idTarea'])."'><span class='label label-success'>Activo</span></a>";
                                                    }
                                                }else{
                                                    echo "<a href='".site_url('common/tareas/activado_logico/'.$t['idTarea'])."'><span class='label label-default'>Inactivo</span></a>";
                                                }
                                                ?></td>

                                                <td>
                                                    <a href="<?php echo site_url('common/tareas/ver_detalles/'.$t['idTarea']); ?>" class="btn btn-warning btn-primary"><span class="fa fa-eye"></span> Ver</a>
                                                    <a href="<?php echo site_url('common/tareas/generaTareaPDF/'.$t['idTarea']); ?>" class="btn btn-danger btn-primary" title="Presiona para generar un PDF con los detalles de la tarea."><span class="fa fa-file-pdf-o"></span> PDF Tarea</a>
                                                    <!--<button type="button" class="btn btn-success btn-danger" onclick="valorSelect(46)" data-target="Activados">PDF Tarea</button>-->
                                                </td>

                                            </tr>
                                            <?php } ?>
                                    </table>
                                    </div>
                                </div>
                              </div>
                            </div>
                </section>
            </div>





            <script>
 function valorSelect(valor){
        if(valor==5){
          window.location.pathname ="<?php echo ('terraverde/common/tareas/indexFilter5'); ?>";
        }
        else if (valor==1) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/indexFilter1'); ?>";
        }

        else if (valor==2) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/indexFilter2'); ?>";
        }

        else if (valor==4) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/indexFilter4'); ?>";
        }
     else if (valor==45) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/generaPDF'); ?>";
        }
      else if (valor==46) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/generaTareaPDF'); ?>";
        }
     else if (valor==47) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/generaPDFcompletas'); ?>";
        }
     else if (valor==48) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/generaPDFincompletas'); ?>";
        }
     else if (valor==49) {
          window.location.pathname ="<?php echo ('terraverde/common/tareas/generaPDFnoiniciadas'); ?>";
        }

 }
            </script>
