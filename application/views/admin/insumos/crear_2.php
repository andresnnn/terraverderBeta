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
                                    <h3 class="box-title"><?php echo lang('insumos_create_insumos'); ?></h3>
                                </div>
                                <div class="box-body">


                                    <?php echo form_open('admin/insumos/crear', array('class' => 'form-horizontal', 'id' => 'form-create_user')); ?>
                                        <div class="form-group">
                                            <?php echo lang('insumos_name', 'nombreInsumo', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input('nombreInsumo'.'nombreInsumo');?>
                                            </div>
                                        </div>

                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
