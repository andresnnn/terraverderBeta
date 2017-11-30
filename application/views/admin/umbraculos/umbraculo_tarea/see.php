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
                                    <h3 class="box-title">Tareas <strong><?php echo $info_umbraculo['nombreUmbraculo']?></strong></h3>
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
                                            <?php foreach($tareas_en_umbraculo as $t){ ?>
                                            <tr>
                                                <td><?php echo $t['nombreTipoTarea']; ?></td>
                                                <td><?php echo $t['nombrePlanta']; ?></td>
                                                <td><?php echo $t['creador']; ?></td>

                                                <td><?php echo $t['fechaCreacion']; ?></td>
                                                <td><?php echo $t['fechaComienzo']; ?></td>
                                                <td><?php echo $t['nombreEstado']; ?></td>

                                                <td>
                                                    <a href="<?php echo site_url('common/umbraculos/ver_detalles_tarea/'.$info_umbraculo['idUmbraculo'].'/'.$t['idTarea']); ?>" class="btn btn-warning btn-primary"><span class="fa fa-eye"></span> Ver</a>
                                                <!-- IF TAREA ESTADO = 1 MUESTRO ESTE BOTON -->
                                                <?php if ($t['idEstado'] == 1 || $t['idEstado'] == 3) {
                                                //echo " <a href= 'atender/'.$u['idTarea'];"
                                                echo anchor('common/umbraculos/atenderTarea/'.$info_umbraculo['idUmbraculo'].'/'.$t['idTarea'], '<i class="fa fa-sign-language"></i> '.'Atender tarea', array('class' => 'btn btn-primary','title'=>'(?) Atender tarea'));
                                                    //echo "<a href= atender/"; echo $t['idTarea'];

                                                  // echo" class='btn btn-danger btn-xs'><span class='fa fa-sign-language'></span> Atender</a>";
                                                } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                    </div>
                                </div>
                              </div>
                            </div>
                </section>
            <div class="box-footer" style="text-align: center;">
                <a href="<?php echo site_url('common/umbraculos/ver/'.$id); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>
            </div>

<script>
    function valorSelect(){
        var porId=document.getElementById("seleccion").value;
        if(porId==1){
            alert("Tareas No Iniciadas");
            window.location.pathname ="<?php echo ('terraverde/common/umbraculos/verTareasNoIniciadas/'.$id); ?>";
        }else if(porId==2){
            alert("Tareas Completas");
            window.location.pathname ="<?php echo ('terraverde/common/umbraculos/verTareasCompletas/'.$id); ?>";
        }else if(porId==3){
            alert("Tareas Incompletas");
            window.location.pathname = "<?php echo ('terraverde/common/umbraculos/verTareasIncompletas/'.$id); ?>"
        }else if(porId==0){
            alert("Todas las tareas");
            window.location.pathname = "<?php echo ('terraverde/common/umbraculos/verTareas/'.$id); ?>";
        }
    }
    </script>
