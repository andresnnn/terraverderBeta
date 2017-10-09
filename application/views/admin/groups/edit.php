<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                <h3>Tipos de usuario</h3>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Editar tipo de usuario</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-edit_group')); ?>
                                        <div class="form-group">
                                        <label  class="col-sm-2 control-label">Nombre tipo usuario </label>
                                            <div class="col-sm-10">
                                                <?php echo form_input($group_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Descripción tipo usuario</label>
                                            <div class="col-sm-10">
                                                <?php echo form_input($group_description); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label">Color tipo usuario</label>
                                            <div class="col-sm-3">
                                                <?php echo form_input($group_bgcolor); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => 'Guardar')); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => 'Borrar todo')); ?>
                                                    <?php echo anchor('admin/groups', 'Cancelar', array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>

