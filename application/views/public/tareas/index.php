<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="wrapper">
    <section id="main-content" class="content-header">
     <h3 class="box-title">Administración Tareas</h3>

        <div class="row">
            <div class="col-md-12">
        </div>
            <div class="col-md-12">
                <div class="box">

                        <!-- CONTENIDO -->
                            <div class="box-header with-border">
                            <?php
                            if ($permisos['idGrupo'] == 2) {
                                echo "<h3 class='box-title'>";
                                echo anchor('user/tareas_pla/selecciona_umbraculo', '<i class=\"fa fa-plus\"></i> '. 'Crear nueva tarea', array('class' => 'btn btn-block btn-primary btn-flat'));
                                echo "</h3>";
                            }
                            ?>
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
                      <button type="button" class="btn btn-success btn-filter" onclick="valorSelect(1)" data-target="Activados">Activados</button>
                      <button type="button" class="btn btn-warning btn-filter" onclick="valorSelect(2)" data-target="Desactivados">Desactivados</button>
                      <!-- <button type="button" class="btn btn-default btn-filter" data-target="completas">Tareas completas </button> -->

                      <button onclick="valorSelect(4)" type="button" class="btn btn-default btn-filter" data-target="incompletas">Tareas incompletas </button>
                      <button type="button" class="btn btn-default btn-filter" onclick="valorSelect(5)">Ordenar por fechas previstas</button>
                      <a href="<?php echo site_url('user/tareas_pla/'); ?>" class="btn btn-default btn-filter">Todos</a>
                    </div>
                  </div>
                            </div>
                                <div class="box-body">
                                <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Tipo tarea</th>
                                            <th>Planta</th>
                                            <th>Creador</th>

                                            <th>Fecha Creación</th>
                                            <th>Fecha Prevista</th>
                                            <th>Progreso Tarea </th>
                                            <?php if ($permisos['idGrupo'] == 2) { ?>
                                            <th>Estado</th>
                                            <?php } ?>
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
                                              <?php if ($permisos['idGrupo'] == 2) { ?>
                                              <td><?php
                                              if ($t['active'] == 1) {
                                                  echo "<a href='".site_url('user/tareas_pla/borrado_logico/'.$t['idTarea'])."'><span class='label label-success'>Activo</span></a>";
                                              }else{
                                                  echo "<a href='".site_url('user/tareas_pla/activado_logico/'.$t['idTarea'])."'><span class='label label-default'>Inactivo</span></a>";
                                              }}
                                              ?></td>

                                            <td>
                                                <a href="<?php echo site_url('user/tareas_pla/ver_detalles/'.$t['idTarea']); ?>" class="btn btn-warning btn-primary"><span class="fa fa-eye"></span> Ver</a>
                                                <a href="<?php echo site_url('user/tareas_pla/generaTareaPDF/'.$t['idTarea']); ?>" class="btn btn-danger btn-primary" title="Presiona para generar un PDF con los detalles de la tarea."><span class="fa fa-file-pdf-o"></span> PDF Tarea</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                </table>
                        <!-- FIN CONTENIDO-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
function valorSelect(valor){
if(valor==5){
window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/indexFilter5'); ?>";
}
else if (valor==1) {
window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/indexFilter1'); ?>";
}

else if (valor==2) {
window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/indexFilter2'); ?>";
}

else if (valor==4) {
window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/indexFilter4'); ?>";
}
else if (valor==45) {
          window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/generaPDF'); ?>";
        }
      else if (valor==46) {
          window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/generaTareaPDF'); ?>";
        }
     else if (valor==47) {
          window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/generaPDFcompletas'); ?>";
        }
     else if (valor==48) {
          window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/generaPDFincompletas'); ?>";
        }
     else if (valor==49) {
          window.location.pathname ="<?php echo ('terraverde/user/tareas_pla/generaPDFnoiniciadas'); ?>";
        }

}
</script>
