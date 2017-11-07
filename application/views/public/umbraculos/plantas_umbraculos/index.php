<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>      
            <div class="wrapper">
                <section id="main-content" class="content-header">
                 <h3 class="box-title">Administración Umbráculos</h3>
                 
                    <div class="row">
                        <div class="col-md-12">
                    </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Plantas en umbráculo</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nombre Científico</th>
                                            <th>Espacio Unitario Aprox.</th>
                                            <th>Cantidad</th>
                                            <th>Espacio Total Aprox.</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <?php foreach($umbraculo_plantas as $u){ ?>
                                        <tr>
                                            <td><?php echo $u['nombrePlanta']; ?></td>
                                            <td><?php echo $u['nombreCientificoPlanta']; ?></td>
                                            <td><?php echo $u['unidadEspacioPlanta_m2']; ?> cm<sup>2</sup></td>
                                            <td><?php echo $u['cantidad']; ?></td>
                                            <td><?php echo ($u['unidadEspacioPlanta_m2']*$u['cantidad'])/10000;?> m<sup>2</sup></td>
                                            <td>
                                                <!-- BOTON QUE LLAMA AL CONTROLADOR Y CAPTURA LA NUEVA CANTIDAD DE PLANTAS CON SU RESPECTIVO 
                                                ESPACIO OCUPADO, Y LA ACTUALIZA DENTRO DE LA 'BD' -->
                                                <button type="button" onClick="nuevoFormulario(<?php echo $u['cantidad']?>,<?php echo $info_umbraculo['idUmbraculo'];?>,<?php echo $u['idPlanta'];?>,<?php echo $u['unidadEspacioPlanta_m2'];?>,<?php echo $info_umbraculo['unidadEspacioDisponible_m2']?>);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"> <span class="fa fa-refresh"> </span> Actualizar Cantidad</button>

                                                <!-- ELIMINA UNA PLANTA DENTRO DEL UMBRACULO Y DEBE DE REESTABLECER EL ESPACIO QUE SE DESOCUPA 
                                                DENTRO DEL MISMO -->
                                                <?php echo form_open('user/umbraculos_pla/sacar_planta_umbraculo/'.$u['idUmbraculo'].'/'.$u['idPlanta']); ?>
                                                <input type="hidden" id="nuevaCantidad" name="nuevaCantidad" value="<?php echo $info_umbraculo['unidadEspacioDisponible_m2']+($u['unidadEspacioPlanta_m2']*$u['cantidad'])/10000;?>"> 
                                                <!--ESTE ES EL CAMPO QUE LLEVA EL VALOR CON EL ESPACIO REESTABLECIDO-->
                                                <button type="submit" class="btn btn-danger btn-xs"><span class="fa fa-minus"> </span> Borrar planta umbráculo</button>
                                                 <?php echo form_close(); ?>
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
                <a href="<?php echo site_url('user/umbraculos_pla/ver/'.$id); ?>" class="btn btn-default btn-flat">Volver</a>
            </div>  
            </div>
            </div>

              <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>


<script>


function nuevoFormulario(cantidad,umbraculo,planta,dimPlanta,dispU)
{
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('idUmbraculo').value = umbraculo;
    document.getElementById('idPlanta').value = planta;
    document.getElementById('ocupaPlanta').value = dimPlanta;
    document.getElementById('disponibleU').value = dispU;
    document.getElementById('cantiActualPlanta').value = cantidad;
    document.getElementById('msjError').innerHTML = ""; 
}

function verificarEspacio() 
{ 

    var disponibleActual = document.getElementById('disponibleU').value; 
    var canti = document.getElementById('cantidad').value; 
    var ePP = document.getElementById('ocupaPlanta').value; 
    var cantiActual = document.getElementById('cantiActualPlanta').value;
 
    var espacioTotal= (canti * ePP)/10000; /* ESPACIO QUE OCUPA LA PLANTA, CONVERTIDO A mtr2*/
 
 /*document.getElementById('resu').value = espacioTotal.toFixed(4); */
    
    /**
     SI EL ESPACIO QUE OCUPA EL CJTO DE PLANTAS ES MAYOR QUE EL DISPONIBLE Y SE QUIEREN AÑADIR PLANTAS
     SE MUESTRA ERROR, Y DESHABILITA EL BOTON 'Agregar'
     */
    if (espacioTotal > disponibleActual && canti > cantiActual)  
    { 
        document.getElementById('msjError').innerHTML = "El espacio dentro del umbráculo es insuficiente"; 
        document.getElementById('guardar').disabled=true; 
    }
    /**
     SI EL ESPACIO QUE OCUPA EL CJTO DE PLANTAS ES MAYOR QUE EL DISPONIBLE Y SE QUIEREN AÑADIR PLANTAS
     SE MUESTRA ERROR, Y DESHABILITA EL BOTON 'Agregar'
     */
    if (espacioTotal > disponibleActual && canti <= cantiActual)  
    { 
        document.getElementById('msjError').innerHTML = ""; 
        document.getElementById('guardar').disabled=false; 
        var diferencia = cantiActual - canti;
        var liberado = (diferencia*ePP)/10000; 
        /*document.getElementById('resu').value =liberado;*/
        var newValor = parseFloat(disponibleActual) + parseFloat(liberado);
        document.getElementById('dipoActualizada').value = newValor.toFixed(4);
    }
    /*
    SI HAY ESPACIO DISPONIBLE, Y LA SE AÑADEN PLANTAS.
      SE RESTA ESPACIO DISPONIBLE EN EL UMBRÁCULO
     */
    if (espacioTotal < disponibleActual && canti > cantiActual)  
    { 
        var ocupado = parseFloat(disponibleActual) - parseFloat(espacioTotal);
        document.getElementById('dipoActualizada').value = ocupado.toFixed(4);
        document.getElementById('msjError').innerHTML = ""; 
        document.getElementById('guardar').disabled=false; 
    } 

    /*
    SI HAY ESPACIO DISPONIBLE Y SE QUITAN PLANTAS.
     SE SUMA EL ESPACIO LIBERADO POR TAL ACCIÓN
     */
    if (espacioTotal < disponibleActual && canti <= cantiActual)  
    { 
        var diferencia = cantiActual - canti;
        var liberado = (diferencia*ePP)/10000; 
        var newValor = parseFloat(disponibleActual) + parseFloat(liberado);
        document.getElementById('dipoActualizada').value = newValor.toFixed(4);
        document.getElementById('msjError').innerHTML = ""; 
        document.getElementById('guardar').disabled=false; 
    } 
    if (espacioTotal == disponibleActual || canti == cantiActual)  
    { 
        document.getElementById('msjError').innerHTML = ""; 
        document.getElementById('guardar').disabled=false; 
    } 
} 

</script>