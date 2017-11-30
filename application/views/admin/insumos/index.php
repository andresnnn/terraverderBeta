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
                        <h3 class="box-title"><?php echo anchor('common/insumos/crear', '<i class="fa fa-plus"></i> '. lang('insumos_create_insumos'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                        <div><form action="<?php echo site_url('common/insumos/search_keyword');?>" method = "post">
                        <br>
                            <div class="form-group">
                        <div class="col-md-8">
                          <input type="text" name = "keyword" id="keyword" placeholder="Buscar insumo..." class="form-control"/>
                          
                          </div><button type="submit"  name="search" id="search" class="btn btn-default btn-m"><span class="fa fa-search"></span></button>    
                          </div>
                        </form></div>
                    </div>

                    <div>

                    <div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Stock disponible</th>
						<th>Punto De Pedido</th>
                        <th>Estado</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($insumo as $i){ ?>
                    <tr>
						<td><?php echo $i['nombreInsumo']; ?></td>
						<td><?php echo $i['descripcionInsumo']; ?></td>
						<td><?php echo $i['cantidad']; ?></td>
						<td><?php echo $i['puntoDePedido']; ?></td>
                        <td title="El estado determina, el poder utilizar o no, determinado insumoi en otros módulos">
                        <?php
                        if ($i['active'] == 1) {
                            echo "<a href='".site_url('common/insumos/borrado_logico/'.$i['idInsumo'])."'><span class='label label-success'>Activo</span></a>";
                        }else{
                            echo "<a href='".site_url('common/insumos/activado_logico/'.$i['idInsumo'])."'><span class='label label-default'>Inactivo</span></a>";
                        }
                        ?>
                        </td>
						<td>
                            <a href="<?php echo site_url('common/insumos/profile/'.$i['idInsumo']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-eye"></span> Ver</a>
                            <a href="<?php echo site_url('common/insumos/edit/'.$i['idInsumo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
<!--                             <a href="<?php echo site_url('common/insumos/remove/'.$i['idInsumo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>



             </div>
        </div>
    </section>
</div>
