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
              $this->data['existe_tarea_duplicada'] = false;
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
                $this->data['existe_tarea_duplicada'] = false;
                $this->load->library('form_validation');

                $this->form_validation->set_rules('idPlanta','idPlanta','required');
                $this->form_validation->set_rules('idTipoTarea','IdTipoTarea','required');
                $this->form_validation->set_rules('fechaCreacion','FechaCreacion','required');
                $this->form_validation->set_rules('fechaAtencion','FechaAtencion');
                $this->form_validation->set_rules('fechaComienzo','FechaComienzo','required');
                $this->form_validation->set_rules('horaComienzo','horaComienzo','required');
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
                      $this->data['existe_tarea_duplicada'] = ($this->Tareas_model->comprobar_existencia_tarea( $this->input->post('idUmbraculo'),$this->input->post('fechaComienzo'), $this->input->post('idPlanta'),$this->input->post('idTipoTarea')));

                    if (!($this->Tareas_model->comprobar_existencia_tarea( $this->input->post('idUmbraculo'),$this->input->post('fechaComienzo'), $this->input->post('idPlanta'),$this->input->post('idTipoTarea'))))
                    {
                      /*Se agregar tarea porque no existe*/
                      $tareas_id = $this->Tareas_model->add_tareas($params);
                      redirect('common/umbraculos/ver/'.$this->input->post('idUmbraculo'));
                    }
                    else{
                      /*no se agrega*/
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

    function selecciona_umbraculo ()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                $this->load->model('common/Umbraculos_model');
                $this->data['all_umbraculo'] = $this->Umbraculos_model->get_all_umbraculos();

                $this->template->admin_render('admin/tareas/elegir', $this->data);
            }

    }

    function ver_detalles($idTarea)
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                $this->data['insumos_tarea'] = $this->Tareas_model->insumos_tarea($idTarea);
                $this->data['tarea'] = $this->Tareas_model->ver_detalles_tarea($idTarea);
                $this->template->admin_render('admin/tareas/detalles', $this->data);
            }
    }

}
