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
                                            
                                        </div>
                                            <div class="box-body">
                                                
                                                <form >
                                        <label>Estado de Tareas:</label><br>    
                                    <select name="seleccion" id="seleccion" onchange="valorSelect()">
                                    <option selected disabled>Filtra el estado de las tareas</option>
                                        <option value="1">No iniciada</option>
                                        <option value="3">Incompleta</option>
                                        <option value="2">Completa</option>
                                        <option value="0">Todas</option>
                                    </select>
                                    </form>
                                                
                                            <table class="table table-striped table-hover">
                                                    <tr>
                                                        <th>Tipo tarea</th>
                                                        <th>Planta</th>
                                                        <th>Creador</th>

                                                        <th>Fecha Creación</th>
                                                        <th>Fecha Prevista</th>
                                                        <th>Estado</th>
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

                                                        <td>
                                                            <a href="<?php echo site_url('user/tareas_pla/ver_detalles/'.$t['idTarea']); ?>" class="btn btn-warning btn-primary"><span class="fa fa-eye"></span> Ver</a>
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
    function valorSelect(){
        var porId=document.getElementById("seleccion").value;
        if(porId==1){
            alert("Tareas No Iniciadas");
            window.location.pathname = 'terraverde/user/tareas_pla/indexNoIniciada/';
        }else if(porId==2){
            alert("Tareas Completas");
            window.location.pathname ='terraverde/user/tareas_pla/indexCompleta/';
        }else if(porId==3){
            alert("Tareas Incompletas");
            window.location.pathname = 'terraverde/user/tareas_pla/indexIncompleta/';
        }else if(porId==0){
            alert("Todas las tareas");
            window.location.pathname = 'terraverde/user/tareas_pla/index/';
        }
    }
    </script>
