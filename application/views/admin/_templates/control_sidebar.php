<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-yelp"></i></a></li>
                </ul>

                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Ayuda</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="<?php echo base_url('upload/manual_usuario.pdf'); ?>" target="_blank">
                                    Ver manual de uso
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="control-sidebar-bg"></div>
