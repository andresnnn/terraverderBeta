<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle;
         echo $breadcrumb; ?>
    </section>
<section class="content">

    <table border="1" width="100%">
    <tr>
		<th>IdInsumo</th>
		<th>NombreInsumo</th>
		<th>DescripcionInsumo</th>
		<th>Cantidad</th>
		<th>PuntoDePedido</th>
		<th>Actions</th>
    </tr>

    <tr>
		<td><?php echo $insumo['idInsumo']; ?></td>
		<td><?php echo $insumo['nombreInsumo']; ?></td>
		<td><?php echo $insumo['descripcionInsumo']; ?></td>
		<td><?php echo $insumo['cantidad']; ?></td>
		<td><?php echo $insumo['puntoDePedido']; ?></td>

    </tr>

</table>
</section>
</div>
