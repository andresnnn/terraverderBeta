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
                            <a href="<?php echo site_url('umbraculo_plantas/remove/'.$u['idUmbraculo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>