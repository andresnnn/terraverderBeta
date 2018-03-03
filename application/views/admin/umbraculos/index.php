<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
</script>
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" id="existe_elemento_umbraculo" name="existe_elemento_umbraculo" value="<?php echo $existe_elemento_umbraculo?>" />
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('common/umbraculos/crear', '<i class="fa fa-plus"></i> '. lang('umbraculos_create_umbraculo'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>

                         <div class="box-body">
                         <section class="content">


                    <table class="table table-striped table-hover" >

                    <?php foreach($umbraculossin as $u){ ?>
                    <tr>
                    <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-maroon"><i class="fa fa-leaf"></i></span>
                                        <div class="info-box-content">
                                            <b>Nombre: </b><?php echo $u['nombreUmbraculo']; ?><br>
                                            <b>Descripción: </b><?php echo $u['descripcionUmbraculo']; ?><br>
                                            <b>Temperatura: </b> <?php echo $u['temperaturaUmbraculo']."°C";?><br>
                                                            <b>Humedad: </b> <?php echo $u['humedadUmbraculo']."%";?><br>
                                                            <b>Espacio Disponible: </b> <?php echo $u['unidadEspacioDisponible_m2'];?>m<sup>2</sup><br>
                                                            <br>
                                            <b>Acciones: </b><br>
                                            <a href="<?php echo site_url('common/umbraculos/ver/'.$u['idUmbraculo']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a>
                                            <a href="<?php echo site_url('common/umbraculos/editar/'.$u['idUmbraculo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                                            
                                            <button title="Si el umbraculo no posee tareas ni plantas podra ser borrado"  type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#questionModal"><span class="fa fa-trash"></span> Borrar</button>
                                            
                                            <!-- <a href="<?php echo site_url('common/umbraculos/remove/'.$u['idUmbraculo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a> --><br><br>
                                            
                                            <p style="font-style:italic; font-size:13px;">Presione editar para analizar si existen plantas incompatibles dentro del <?php echo $u['nombreUmbraculo']; ?>.</p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                                                              <!-- Modal -->
                    <div class="modal fade" id="questionModal" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Atención</h4>
                          </div>
                          <div class="modal-body">
                            <p>¿Está seguro de querer eliminar el umbráculo seleccionado?</p>
                          </div>
                          <div class="modal-footer">
                            <a onclick="javascript:borrarUmbraculo(<?php echo $u['idUmbraculo'];?>);"  href="<?php echo site_url('common/umbraculos/remove/'.$u['idUmbraculo']); ?>" class="btn btn-danger btn-flat"><span class="fa fa-trash"></span> Borrar</a>
                            <button type="button" class="btn btn-flat" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </tr>
                    <?php } ?>
                </table>
                             
                             
                             
                <table class="table table-striped table-hover" >

                    <?php foreach($umbraculoscon as $z){ ?>
                    <tr>
                    <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-maroon"><i class="fa fa-leaf"></i></span>
                                        <div class="info-box-content">
                                            <b>Nombre: </b><?php echo $z['nombreUmbraculo']; ?><br>
                                            <b>Descripción: </b><?php echo $z['descripcionUmbraculo']; ?><br>
                                            <b>Temperatura: </b> <?php echo $z['temperaturaUmbraculo']."°C";?><br>
                                                            <b>Humedad: </b> <?php echo $z['humedadUmbraculo']."%";?><br>
                                                            <b>Espacio Disponible: </b> <?php echo $z['unidadEspacioDisponible_m2'];?>m<sup>2</sup><br>
                                                            <br>
                                            <b>Acciones: </b><br>
                                            <a href="<?php echo site_url('common/umbraculos/ver/'.$z['idUmbraculo']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a>
                                            <a href="<?php echo site_url('common/umbraculos/editar/'.$z['idUmbraculo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                                            
                                            
                                            
                                            <button disabled title="Si el umbraculo posee tareas y/o plantas no podra ser borrado" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#questionModal"><span class="fa fa-trash"></span> Borrar</button>
                                            
                                            <!-- <a href="<?php echo site_url('common/umbraculos/remove/'.$z['idUmbraculo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a> --><br><br>
                                            
                                            <p style="font-style:italic; font-size:13px;">Presione editar para analizar si existen plantas incompatibles dentro del <?php echo $z['nombreUmbraculo']; ?>.</p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                                                              <!-- Modal -->
                    <div class="modal fade" id="questionModal" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Atención</h4>
                          </div>
                          <div class="modal-body">
                            <p>¿Está seguro de querer eliminar el umbráculo seleccionado?</p>
                          </div>
                          <div class="modal-footer">
                            <a onclick="javascript:borrarUmbraculo(<?php echo $z['idUmbraculo'];?>);"  href="<?php echo site_url('common/umbraculos/remove/'.$z['idUmbraculo']); ?>" class="btn btn-danger btn-flat"><span class="fa fa-trash"></span> Borrar</a>
                            <button type="button" class="btn btn-flat" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </tr>
                    <?php } ?>
                </table>
                             
                             
                         </div>
                    </div>
                </section>
            </div>
            <script>
            function borrarUmbraculo(idUmbraculo){
              $.post(base_url+'common/umbraculos/remove', {
                idUmbraculo:idUmbraculo
              }, function(response,status){
               } );

            var existe_elemento_umbraculo =document.getElementById('existe_elemento_umbraculo').value;
            if((existe_elemento_umbraculo==true)){
              alert("Solo se puede borrar umbraculos sin elementos");
            }
            else if (existe_elemento_umbraculo==false) {
              alert("Recuerda que solo se borran los umbraculos sin plantas y sin tareas.");
            }


            }
                
                
            </script>
