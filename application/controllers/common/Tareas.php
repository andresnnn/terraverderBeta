<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Tareas extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
                /* Title Page :: Common */
                $this->load->model('common/Tareas_model');
                /* Load :: Common */
                $this->lang->load('admin/tareas');
                /* Title Page :: Common */
                $this->page_title->push(lang('menu_tarea'));
                $this->data['pagetitle'] = $this->page_title->show();
    }

    /*
     * Listing of tareas
     */
    function index()
    {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                // $data['tarea'] = $this->Tareas_model->get_all_tarea();

        // $data['_view'] = 'tareas/index';
        // $this->load->view('layouts/main',$data);

                $this->data['tarea'] = $this->Tareas_model->listar_tareas();
                /* Load Template */
                $this->template->admin_render('admin/tareas/index', $this->data);

            }
    }

    /*
     AGREGAR TAREA DENTRO DE UMBRACULO
     */
function agregarTarea($idUmbraculo)
    {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                /* CARGA LA INFORMACION DE LAS PLANTAS DEL UMBRACULO DONDE SE QUIERE CREAR LA TAREA*/
                    /* Data */
                    $idUmbraculo = (int) $idUmbraculo;
                    $this->data['id'] = $idUmbraculo;

                    /*CARGA LA INFORMACION DE LOS TIPOS DE TAREA REGISTRADAS EN EL SISTEMA*/
                    $this->load->model('admin/Tipotareas_model');
                    $this->data['tipotarea'] = $this->Tipotareas_model->get_all_tipotarea();

                    /*CARGA LA INFORMACION DEL UMBRACULO PARA HACER LAS COMPRACIONES NECESARIAS*/
                    $this->load->model('common/Umbraculos_model');
                    $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);

                    /*CARGA EL PRIMER ESTADO 'No inciada' POR DEFECTO, YA QUE SE ESTÁ CREANDO RECIEN*/
                    $this->load->model('common/Estado_tarea_model');
                    $this->data['estadoDefecto'] = $this->Estado_tarea_model->get_estado_tarea(1);
                    /*CARGA LAS PLANTAS PRESENTES DENTRO DEL UMBRACULO SOBRE EL CUAL SE ESTÁ CREANDO LA TAREA*/
                    $this->load->model('common/Umbraculoplantas_model');
                    $this->data['umbraculo_plantas'] = $this->Umbraculoplantas_model->ver_plantas_umbraculo($idUmbraculo);

                    /* CARGA LA PANTALLA PARA AÑADIR UNA NUEVA TAREA*/
                    $this->template->admin_render('admin/umbraculos/umbraculo_tarea/add', $this->data);
            }
    }
    /*
     AGREGAR CARGAR TAREA A BD
     */
    function add($idUmbraculo)
    {
                $this->load->library('form_validation');

                $this->form_validation->set_rules('idTipoTarea','IdTipoTarea','required');
                $this->form_validation->set_rules('fechaCreacion','FechaCreacion','required');
                $this->form_validation->set_rules('fechaAtencion','FechaAtencion');
                $this->form_validation->set_rules('fechaComienzo','FechaComienzo');
                $this->form_validation->set_rules('observacionEspecialista','ObservacionEspecialista','max_length[50]');

                if($this->form_validation->run())
                {
                    $params = array(
                        'idTipoTarea' => $this->input->post('idTipoTarea'),
                        'idEstado' => $this->input->post('idEstado'),
                        'idUserAtencion' => $this->input->post('idUserAtencion'),
                        'idUserCreador' => $this->input->post('idUserCreador'),
                        'idPlanta' => $this->input->post('idPlanta'),
                        'idUmbraculo' => $this->input->post('idUmbraculo'),
                        'fechaCreacion' => $this->input->post('fechaCreacion'),
                        'fechaAtencion' => $this->input->post('fechaAtencion'),
                        'fechaComienzo' => $this->input->post('fechaComienzo'),
                        'horaComienzo' => $this->input->post('horaComienzo'),
                        'observacionEspecialista' => $this->input->post('observacionEspecialista'),
                    );
                    if ($this->Tareas_model->comprobar_existencia_tarea( $this->input->post('idUmbraculo'),$this->input->post('fechaComienzo'), $this->input->post('idPlanta'),$this->input->post('idTipoTarea')))
                    {
                      $tareas_id = $this->Tareas_model->add_tareas($params);
                      redirect('common/umbraculos/ver/'.$this->input->post('idUmbraculo'));
                    }
                    else{
                      echo "error";
                      redirect('common/umbraculos/ver/'.$this->input->post('idUmbraculo'));



                    }
                }
                else
                {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                                    /* Data */
                    $idUmbraculo = (int) $idUmbraculo;
                    $this->data['id'] = $idUmbraculo;

                    /*CARGA LA INFORMACION DE LOS TIPOS DE TAREA REGISTRADAS EN EL SISTEMA*/
                    $this->load->model('admin/Tipotareas_model');
                    $this->data['tipotarea'] = $this->Tipotareas_model->get_all_tipotarea();

                    /*CARGA LA INFORMACION DEL UMBRACULO PARA HACER LAS COMPRACIONES NECESARIAS*/
                    $this->load->model('common/Umbraculos_model');
                    $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);

                    /*CARGA EL PRIMER ESTADO 'No inciada' POR DEFECTO, YA QUE SE ESTÁ CREANDO RECIEN*/
                    $this->load->model('common/Estado_tarea_model');
                    $this->data['estadoDefecto'] = $this->Estado_tarea_model->get_estado_tarea(1);
                    /*CARGA LAS PLANTAS PRESENTES DENTRO DEL UMBRACULO SOBRE EL CUAL SE ESTÁ CREANDO LA TAREA*/
                                        $this->load->model('common/Umbraculoplantas_model');
                    $this->data['umbraculo_plantas'] = $this->Umbraculoplantas_model->ver_plantas_umbraculo($idUmbraculo);
                    /* CARGA LA PANTALLA PARA AÑADIR UNA NUEVA TAREA*/
                    $this->template->admin_render('admin/umbraculos/umbraculo_tarea/add', $this->data);
                }
    }





    /*
     * Editing a tareas
     */
/*    function edit($idTarea)
    {
        // check if the tareas exists before trying to edit it
        $data['tareas'] = $this->Tareas_model->get_tareas($idTarea);

        if(isset($data['tareas']['idTarea']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('idTipoTarea','IdTipoTarea','required');
            $this->form_validation->set_rules('fechaCreacion','FechaCreacion','required');
            $this->form_validation->set_rules('fechaAtencion','FechaAtencion','required');
            $this->form_validation->set_rules('fechaComienzo','fechaComienzo','required');
            $this->form_validation->set_rules('observacionEspecialista','ObservacionEspecialista','max_length[50]');

            if($this->form_validation->run())
            {
                $params = array(
                    'idTipoTarea' => $this->input->post('idTipoTarea'),
                    'idEstado' => $this->input->post('idEstado'),
                    'idUserAtencion' => $this->input->post('idUserAtencion'),
                    'idUserCreador' => $this->input->post('idUserCreador'),
                    'idPlanta' => $this->input->post('idPlanta'),
                    'idUmbraculo' => $this->input->post('idUmbraculo'),
                    'fechaCreacion' => $this->input->post('fechaCreacion'),
                    'fechaAtencion' => $this->input->post('fechaAtencion'),
                    'fechaComienzo' => $this->input->post('fechaComienzo'),
                    'observacionEspecialista' => $this->input->post('observacionEspecialista'),
                );

                $this->Tareas_model->update_tareas($idTarea,$params);
                redirect('tareas/index');
            }
            else
            {
                $this->load->model('Tipotarea_model');
                $data['all_tipotarea'] = $this->Tipotarea_model->get_all_tipotarea();

                $this->load->model('Estado tarea_model');
                $data['all_estado tarea'] = $this->Estado tarea_model->get_all_estado tarea();

                $this->load->model('User_model');
                $data['all_users'] = $this->User_model->get_all_users();
                $data['all_users'] = $this->User_model->get_all_users();

                $this->load->model('Plantum_model');
                $data['all_planta'] = $this->Plantum_model->get_all_planta();

                $this->load->model('Umbraculo_model');
                $data['all_umbraculo'] = $this->Umbraculo_model->get_all_umbraculo();

                $data['_view'] = 'tarea/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tareas you are trying to edit does not exist.');
    } */

    /*
     * Deleting tareas
     */
/*    function remove($idTarea)
    {
        $tareas = $this->Tareas_model->get_tareas($idTarea);

        // check if the tareas exists before trying to delete it
        if(isset($tareas['idTarea']))
        {
            $this->Tareas_model->delete_tareas($idTarea);
            redirect('tareas/index');
        }
        else
            show_error('The tareas you are trying to delete does not exist.');
    }*/
     function profile($idTarea)
      {
          if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
          {
              redirect('auth/login', 'refresh');
          }
          else
          {
              /* Breadcrumbs */
              $this->data['breadcrumb'] = $this->breadcrumbs->show();

              /* Data */
              $idTarea = (int) $idTarea;


  /*aca cargo los modelos e invoco a sus funciones- joins*/
               $this->data['tarea'] = $this->Tareas_model->get_tareas($idTarea);
              /* $this->data['planta'] = $this->Plantas_model->get_nombre_planta($idTarea);*/
               $this->data['planta'] = $this->Tareas_model->get_plantas_nombre($idTarea);/*con esto veo el nombre de la planta de la tarea*/
                /*$this->data['planta'] = $this->Plantas_model->get_planta($idTarea);*/
                 $this->data['umbraculo'] = $this->Tareas_model->get_umbraculo_nombre($idTarea);
                $this->data['tipo'] = $this->Tareas_model->get_tipotarea_nombre($idTarea);
              $this->data['estado'] = $this->Tareas_model-> get_estadoTarea_nombre($idTarea);
              $this->data['user'] = $this->Tareas_model-> get_users_nombre($idTarea);
              /*$this->data['insumo'] = $this->Insumotarea_model-> get_insumotarea($idTarea);*/

              /* CARGAR INFORMARCION */
             // $this->load->view('admin/umbraculos/umbraculos_plantas/index',$this->data);

              /* Load Template */
              $this->template->admin_render('admin/tareas/ver', $this->data);
          }
      }

}
