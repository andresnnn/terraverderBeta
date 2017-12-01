<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umbraculos_pla extends Public_controller {

    public function __construct()
    {
        parent::__construct();
        /* CARGA LA BASE DE DATOS O MODELO*/
                if (!$this->ion_auth->logged_in() )
        {
          redirect('auth/login', 'refresh');
        }
        else
        {
        $this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
        }
        $this->load->model('common/Umbraculos_model');
        $this->load->model('common/Plantas_model');
        $this->load->model('common/Umbraculoplantas_model');
        $this->load->model('common/Tareas_model');
    }



/** CARGA EL INDEX DE LA SECCION ADMINISTRACIÓN DE UMBRACULOS*/
    public function index()
    {
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* CARGO EL LISTADO DE UMBRACULOS*/
            $this->data['umbraculos'] = $this->Umbraculos_model->get_all_umbraculos();
            $this->load->model('common/plantas_model');
            /* carga plantilla */
            $this->template->user_render('public/umbraculos/index', $this->data);

        }
    }

    /**
     * SE ENCARGA DE CARGAR LA VISTA DE DETALLES DEL UMBRÁCULO SELECCIONADO, PARA QUE SE PUEDA OPERAR CON ÉL
     * @param  [type] $idUmbraculo [description]
     * @return [type]              [description]
     * @author SAKZEDMK
     */
            public function ver($idUmbraculo)
            {
                if ( ! $this->ion_auth->logged_in())
                {
                    redirect('auth/login', 'refresh');
                }
                else
                {
                                      /* Data */
                    $this->data['id'] = $idUmbraculo = (int) $idUmbraculo;
                     $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);
                     $this->data['umbraculo_plantas'] = $this->Umbraculoplantas_model->get_umbraculo_plantas_nombre($idUmbraculo);
                     $this->data['tareas'] = $this->Tareas_model->obtener_tareas_umbraculo($idUmbraculo);
                    /* CARGAR INFORMARCION */
                    /* Load Template */
                    $this->template->user_render('public/umbraculos/ver', $this->data);
                }
            }

            /**
             * TIENE COMO OBJETIVO CARGAR UNA VISTA DONDE SE VISULIZARAN TODAS LAS TAREAS REGISTRADAS EN UN DETERMINADO UMBRACULO, CON TODA SU INFORMACIÓN
             * @param  [type] $idUmbraculo [description]
             * @return [type]              [description]
             * @author SAKZEDMK
             */
            public function verTareas($idUmbraculo)
            {
                if ( ! $this->ion_auth->logged_in())
                {
                    redirect('auth/login', 'refresh');
                }
                else
                {
                    /* Data */
                    $this->data['id'] = $idUmbraculo = (int) $idUmbraculo;

                    $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);
                    $this->data['tareas_en_umbraculo'] = $this->Tareas_model->listar_tareas_umbraculo($idUmbraculo);

                    /* Load Template */
                    $this->template->user_render('public/umbraculos/tareas_umbraculos/index', $this->data);

                }
            }
            /**
             * [atenderTarea description]
             * @param  [type] $idUmbraculo [description]
             * @param  [type] $idTarea     [description]
             * @return [type]              [description]
             */
            function atenderTarea($idUmbraculo,$idTarea)
            {
              if ( ! $this->ion_auth->logged_in())
              {
                  redirect('auth/login', 'refresh');
              }
              else
              {
                /* Data */
                $this->data['idTarea'] = $idTarea = (int) $idTarea;
                $this->data['idUmbraculo'] = $idUmbraculo = (int) $idUmbraculo;
                $this->data['estados'] = $this->Tareas_model->all_estado_tareas();
                $this->data['tarea'] = $this->Tareas_model->get_tarea_join($idTarea);
                $this->data['insumos'] = $this->Tareas_model->get_all_insumo();
              /* libreria formulario*/
                  $this->load->library('form_validation');
                  // $this->load->library('form_validation_insumo_tarea');
                  // validaciones
                  $this->form_validation->set_rules('observacionEspecialista','observacionEspecialista','max_length[50]');
                  if($this->form_validation->run())
                        {
                            /* datos para actualizar */
                  $params = array(
                    'fechaAtencion' => $this->input->post('fechaAtencion'),
                    'idEstado' => $this->input->post('idEstado'),
                    'observacionEspecialista' => $this->input->post('observacionEspecialista'),
                    'idUserAtencion' => $this->input->post('idUserAtencion'),
                          );                // actualizar tarea
                  $this->Tareas_model->update_tareas($idTarea,$params);

                  redirect('user/umbraculos_pla/verTareas/'.$idUmbraculo);

                }
                else {
                  /* Load Template */
                  $this->template->user_render('public/umbraculos/tareas_umbraculos/atender',$this->data);
                }
              }
            }

            /**
            *ESTA FUNCION AGREGA A LA TABLA 'UMBRACULO/TAREA'
            **/
            function agregarInsumoTarea()
            {
              //variables POST
              $cantidad=$_POST['cantidad'];
              $idInsumo=$_POST['idInsumo'];
              $idTarea=$_POST['idTarea'];
              $nuevoStock=$_POST['nuevoStock'];
              if($this->Tareas_model->existe_insumo_tarea($idTarea,$idInsumo)){
              $this->Tareas_model->update_cantidad($idInsumo,$nuevoStock);
            $this->Tareas_model->add_insumoTarea($idTarea,$idInsumo,$cantidad);}
            }
            /**
            *ESTA FUNCION AGREGA A LA TABLA 'UMBRACULO/TAREA'
            **/
            function ExisteInsumoTarea()
            {
              //variables POST
              $cantidad=$_POST['cantidad'];
              $idInsumo=$_POST['idInsumo'];
              $idTarea=$_POST['idTarea'];
              $nuevoStock=$_POST['nuevoStock'];
              return $this->Tareas_model->existe_insumo_tarea($idTarea,$idInsumo);

            }

        /**
         * LA FUNCION VER PLANTAS, LISTA TODAS LAS PLANTAS REGISTRADAS EN EL UMBRÁCULO
         * SELECCIONADO
         * @param  [type] $idUmbraculo parametro para la consulta
         * @return [type]              lista de plantas con sus respectivos nombres
         * @author SAKZEDMK
         */
            public function verPlantas($idUmbraculo)
            {
                if ( ! $this->ion_auth->logged_in())
                {
                    redirect('auth/login', 'refresh');
                }
                else
                {
                    /* INFORMACIÓN QUE LLEGA A LA VISTA */
                    $this->data['id'] = $idUmbraculo = (int) $idUmbraculo;
                    $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);
                    $this->data['umbraculo_plantas'] = $this->Umbraculoplantas_model->ver_plantas_umbraculo($idUmbraculo);

                    /* CARGAR PLANTILLA */
                    $this->template->user_render('public/umbraculos/plantas_umbraculos/index', $this->data);
                }
            }

    /**
     * CARGA LA VISTA CON LOS RECURSOS NECESARIOS PARA LA FUNCION AGREGAR
     * @param  [type] $idUmbraculo [description]
     * @return [type]              [description]
     * @author SAKZEDMK
     */
    public function agregarPlanta($idUmbraculo)
    {
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Data */
            $idUmbraculo = (int) $idUmbraculo;
            $this->data['id'] = $idUmbraculo;

            /*CARGA LA INFORMACION DEL UMBRACULO PARA HACER LAS COMPRACIONES NECESARIAS*/
            $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);

            /* CARGAR INFORMARCION DE LAS PLANTAS REGISTRADAS*/
            $this->data['all_plantas'] = $this->plantas_model->plantas_compatibles_params($this->data['info_umbraculo']);

            /* Load Template */
            $this->template->user_render('public/umbraculos/plantas_umbraculos/add_planta', $this->data);
        }
    }
    /**
     * LA FUNCION AGREGAR PLANTA REGISTRA UNA NUEVA PLANTA, CON SU DETERMINADA CANTIDAD DENTRO DEL UMBRÁCULO PREVIAMENTE SELCCIONAD
     * @param  [type] $idUmbraculo [description]
     * @return [type]              [description]
     * @author SAKZEDMK
     */
    function agregar_planta_umbraculo()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idPlanta','IdPlanta','required');
        $this->form_validation->set_rules('cantidad','Cantidad','required');
        $this->form_validation->set_rules('idUmbraculo','idUmbraculo','required');

        if($this->form_validation->run())
        {
            $params = array(
                'idUmbraculo' => $this->input->post('idUmbraculo'),
                'idPlanta' => $this->input->post('idPlanta'),
                'cantidad' => $this->input->post('cantidad'),
            );
            /**COMPROBACIÓN SI EXISTE UNA MISMA PLANTA REGISTRADA**/
            if ($this->Umbraculoplantas_model->esta_registrada($params) == NULL) {
                $umbraculo_plantas_id = $this->Umbraculoplantas_model->add_umbraculo_plantas($params);
                $this->Umbraculos_model->actualizar_espacio_disponible($this->input->post('idUmbraculo'),$this->input->post('nuevoEspacioDisponible'));
                redirect('user/umbraculos_pla/ver/'.$this->input->post('idUmbraculo'));
            }else{
                show_error('La planta ya se encuentra registrada dentro del umbráculo');
                sleep(3);
                redirect('user/umbraculos_pla/ver/'.$this->input->post('idUmbraculo'));
            }
        }
        else
        {
            /* CARGA VISTA CON PLANTILLA */
            $this->template->user_render('public/umbraculos/plantas_umbraculos/add_planta', $this->data);
        }
    }

    /**
     * LA FUNCION SACAR PLANTA, SERÍA RETIRAR PLANTA DE UMBRÁCULO
     * @param  [type] $idUmbraculo ENTRA COMO PARAMETRO DE LA CONSULTA
     * @param  [type] $idPlanta    ENTRA COMO PARAMETRO PARA EL DELETE
     * @return [type]              [description]
     * @author SAKZEDMK
     */
    function sacar_planta_umbraculo($idUmbraculo,$idPlanta)
    {
        $umbraculo_plantas = $this->Umbraculoplantas_model->get_umbraculo_plantas($idUmbraculo);
        $this->Umbraculoplantas_model->retirar_planta_umbraculo($idUmbraculo,$idPlanta);
        $this->Umbraculos_model->actualizar_espacio_disponible($idUmbraculo,$this->input->post('nuevaCantidad'));
        redirect('user/umbraculos_pla/verPlantas/'.$idUmbraculo);
    }

    /**
     * FUNCION PARA ACTUALIZAR LA CANTIDAD DE UNA PLANTA DENTRO DE UN DETERMINADO UMBRACULO
     * SOBRE LA TABLA UMBRACULO/PLANTA
     * Y ACTUALIZA EL NUEVO ESPACIO DISPONIBLE DENTRO DEL UMBRACULO (suma o resta espacio segun la acción)
     * @param  $idUmbraculo
     * @return [type]
     * @author SAKZEDMK
     */
    function actalizar_cantidad()
    {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('cantidad','Cantidad','required|numeric|decimal');
            $this->form_validation->set_rules('unidadEspacioDisponible_m2');
            $planta = $this->input->post('idPlanta');
            $umbraculo = $this->input->post('idUmbraculo');
            $cantidad = $this->input->post('cantidad');
            /*NUEVA CANTIDAD DE UMBRACULO/PLANTA*/
            $this->Umbraculoplantas_model->actualizar_cantidad_planta($umbraculo,$planta,$cantidad);
            /*NUEVA ESPACIO DISPONIBLE DEL UMBRACULO*/
            $this->Umbraculos_model->actualizar_espacio_disponible($umbraculo,$this->input->post('dipoActualizada'));

            redirect('user/umbraculos_pla/verPlantas/'.$umbraculo);
    }


}