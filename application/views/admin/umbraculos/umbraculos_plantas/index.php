<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Umbraculo Plantas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('umbraculo_plantas/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdUmbraculo</th>
						<th>IdPlanta</th>
						<th>Cantidad</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($umbraculo_plantas as $u){ ?>
                    <tr>
						<td><?php echo $u['idUmbraculo']; ?></td>
						<td><?php echo $u['idPlanta']; ?></td>
						<td><?php echo $u['cantidad']; ?></td>
						<td>
                            <a href="<?php echo site_url('umbraculo_plantas/edit/'.$u['idUmbraculo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Borrar</button>
                            <a href="<?php echo site_url('common/plantas/ver/'.$p['idPlanta']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>

                              <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Atención</h4>
                          </div>
                          <div class="modal-body">
                            <p>¿Está seguro de querer eliminar este tipo de tarea?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo site_url('umbraculo_plantas/remove/'.$u['idUmbraculo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
    </div>
</div>