<table border="1" width="100%">
    <tr>
		<th>IdTipoTarea</th>
		<th>NombreTipoTarea</th>
		<th>DescripcionTarea</th>
		<th>Actions</th>
    </tr>
	<?php foreach($tipotarea as $t){ ?>
    <tr>
		<td><?php echo $t['idTipoTarea']; ?></td>
		<td><?php echo $t['nombreTipoTarea']; ?></td>
		<td><?php echo $t['descripcionTarea']; ?></td>
		<td>
            <a href="<?php echo site_url('tipotarea/edit/'.$t['idTipoTarea']); ?>">Edit</a> | 
            <a href="<?php echo site_url('tipotarea/remove/'.$t['idTipoTarea']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
