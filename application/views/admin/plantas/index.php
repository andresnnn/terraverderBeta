<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Plantas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('plantas/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdPlanta</th>
						<th>IdEspecie</th>
						<th>UnidadEspacioPlanta M2</th>
						<th>DescripcionPlanta</th>
						<th>NombreCientificoPlanta</th>
						<th>NombrePlanta</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($plantas as $p){ ?>
                    <tr>
						<td><?php echo $p['idPlanta']; ?></td>
						<td><?php echo $p['idEspecie']; ?></td>
						<td><?php echo $p['unidadEspacioPlanta_m2']; ?></td>
						<td><?php echo $p['descripcionPlanta']; ?></td>
						<td><?php echo $p['nombreCientificoPlanta']; ?></td>
						<td><?php echo $p['nombrePlanta']; ?></td>
						<td>
                            <a href="<?php echo site_url('plantas/edit/'.$p['idPlanta']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('plantas/remove/'.$p['idPlanta']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>