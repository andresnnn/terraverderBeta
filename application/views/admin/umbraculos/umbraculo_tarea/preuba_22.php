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
                      <h3 class="box-title">Tareas <strong></strong></h3>
                  </div>
                      <div class="box-body">
              <table id="productos" class="lista">
                <thead>
                 <tr>
                <th>producto</th>
                <th colspan="2">cantidad</th>
                 <th colspan="2">empaque</th>
                 <th>accion</th>
                 </tr>
                </thead>
                <tbody>
                <tr>
                <td>pollo entero</td>
                <td>3056.500</td>
                <td>kilos</td>
                <td>60</td>
                <td>sacos</td>
                <td><a href="#" onclick="distribuir()">Distribuir</a></td>
                </tr>
                <tr>
                <td>gallina sadia</td>
                <td>6000.000</td>
                <td>kilos</td>
                <td>120</td>
                <td>cajas</td>
                <td><a href="#" onclick="distribuir()">Distribuir</a></td>
                </tr>
                <tr>
                <td>pierna</td>
                 <td>1000.000</td>
                <td>kilos</td>
                <td>20</td>
                <td>cajas</td>
                <td><a href="#" class="distribuir">Distribuir</a></td>
                </tr>
                </tbody>
                </table>
                <table>
                <tr>
                <td>
                <label>Producto:</label>
                </td>
                <td>
                <input type="text" name="producto" id="producto" size="25" value="" readonly>
                </td>
                </tr>
                <tr>
                <td>
                <label>Cantidad:</label>
                </td>
                <td>
                <input type="text" name="cantidad" id="cantidad" size="7" value="">
                <input type="text" name="unidad" id="unidad" size="5" value="" readonly>
                </td>
                </tr>
                <tr>
                <td>
                <label>Empaque:</label>
                </td>
                <td>
                <input type="text" name="nempaque" id="nempaque" size="7" value="">
                <input type="text" name="empaque" id="empaque" size="5" value="" readonly>
                </td>
                </tr>
                </table>
<script>
$(document).ready(function(){
            $('a.distribuir').click(function(){

                var producto = $(this).parents("tr").find("td").eq(1).html();
                var cantidad = $(this).parents("tr").find("td").eq(2).html();
                var unidad = $(this).parents("tr").find("td").eq(3).html();
                var numemp = $(this).parents("tr").find("td").eq(4).html();
                var empaque = $(this).parents("tr").find("td").eq(5).html();

                confirm("Desea eliminar el usuario: " /*+ id + " "*/ + producto + " " + cantidad + " " + numemp );


                $('#producto').val(producto);
                $('#cantidad').val(cantidad);
                $('#unidad').val(unidad);
                $('#nempaque').val(numemp);
                $('#empaque').val(empaque);
            });
        });
</script>


                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
