<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Insumos_pla extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
                        /*carga del modelo*/
        $this->load->model('admin/Insumos_model');
        if (!$this->ion_auth->logged_in() )
        {
          redirect('auth/login', 'refresh');
        }
        else
        {
        $this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
        }
    }

    /** INDEX INSUMOS */
    public function index()
    {
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* insumos consulta*/
            $this->data['insumo'] = $this->Insumos_model->get_all_insumo();
            /* CARGA PLANTILLA */
           $this->template->user_render('public/insumos/index',$this->data);
        }
    }

    /* crear */
    public function crear()
    {
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {

            /* form validation */
            $this->load->library('form_validation');

                $this->form_validation->set_rules('nombreInsumo','NombreInsumo','max_length[50]|min_length[4]|required');
                $this->form_validation->set_rules('descripcionInsumo','DescripcionInsumo','max_length[255]|min_length[10]|required');
                $this->form_validation->set_rules('cantidad','Cantidad','is_natural|required|less_than[999]');
                $this->form_validation->set_rules('puntoDePedido','PuntoDePedido','is_natural');

                if($this->form_validation->run())
                {
                    $params = array(
                        'nombreInsumo' => $this->input->post('nombreInsumo'),
                        'cantidad' => $this->input->post('cantidad'),
                        'puntoDePedido' => $this->input->post('puntoDePedido'),
                        'descripcionInsumo' => $this->input->post('descripcionInsumo'),
                    );

                    $insumo_id = $this->Insumos_model->add_insumo($params);
                    redirect('user/insumos_pla');
                }
                else
                {
                    $this->template->user_render('public/insumos/crear', $this->data);
                }
        }
    }

    /**
     * Editando un insumo
     * @param  [type] $idInsumo [description]
     * @return [type]           [description]
     */
      function edit($idInsumo)
      {
        /* Breadcrumbs */
          $this->data['breadcrumb'] = $this->breadcrumbs->show();
          // check if the insumo exists before trying to edit it
          $this->data['insumo'] = $this->Insumos_model->get_insumo($idInsumo);

          if(isset($this->data['insumo']['idInsumo']))
          {
              $this->load->library('form_validation');

        $this->form_validation->set_rules('nombreInsumo','NombreInsumo','max_length[50]|min_length[4]|required');
        $this->form_validation->set_rules('descripcionInsumo','DescripcionInsumo','max_length[255]|min_length[10]|required');
        //$this->form_validation->set_rules('cantidad','Cantidad','is_natural|required|less_than[999]');
        $this->form_validation->set_rules('puntoDePedido','PuntoDePedido','is_natural');

        if($this->form_validation->run())
              {
                  $params = array(
            'nombreInsumo' => $this->input->post('nombreInsumo'),
            'cantidad' => $this->input->post('cantidad'),
            'puntoDePedido' => $this->input->post('puntoDePedido'),
            'descripcionInsumo' => $this->input->post('descripcionInsumo'),
                  );

                  $this->Insumos_model->update_insumo($idInsumo,$params);
                  redirect('user/insumos/index');
              }
              else
              {
                $this->template->user_render('public/insumos_pla/edit', $this->data);
              }
          }
          else
              show_error('El insumo que se intenta editar no existe.');
      }

        /**
         * Consultando un insumo en particular
         * @param  [type] $idInsumo [description]
         * @return [type]           [description]
         */
              function profile($idInsumo)
              {

                /* Breadcrumbs */
                  $this->data['breadcrumb'] = $this->breadcrumbs->show();
                  // check if the insumo exists before trying to edit it
                  $this->data['insumo'] = $this->Insumos_model->get_insumo($idInsumo);
                  $this->template->user_render('public/insumos_pla/profile', $this->data);

              }
  
          /**
           * DESACTIVA UN INSUMO, PARA SU UTILIZACIÓN... PERO SI YA ESTÁ UTILIZADO EN ALGÚN INSUMO, SE MUESTRA SU INFORMACIÓN
           * @param  [type] $idInsumo COMO ÚNICO PARAMETRO DE ENTRADA
           * @return [type]           [description]
           * @author SAKZEDMK
           */
          function borrado_logico($idInsumo)
          {
            $this->Insumos_model->desactivar_insumo($idInsumo);
            redirect('user/insumos_pla/index');
          }

          /**
           * DESACTIVA UN INSUMO, PARA SU UTILIZACIÓN... PERO SI YA ESTÁ UTILIZADO EN ALGÚN INSUMO, SE MUESTRA SU INFORMACIÓN
           * @param  [type] $idInsumo COMO ÚNICO PARAMETRO DE ENTRADA
           * @return [type]           [description]
           * @author SAKZEDMK
           */
          function activado_logico($idInsumo)
          {
            $this->Insumos_model->activar_insumo($idInsumo);
            redirect('user/insumos_pla/index');
          }

}