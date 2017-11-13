<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipostareas_pla extends Public_Controller{

    public function __construct()
    {
      parent::__construct();
      /*carga del modelo*/
      $this->load->model('admin/Tipotareas_model');
      $this->lang->load('admin/tipotareas');
        if (!$this->ion_auth->logged_in() )
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
        }

    }

    /*
     * Listing of tipotarea
     */
    public function index()
    {
      if ( ! $this->ion_auth->logged_in())
      {
          redirect('auth/login', 'refresh');
      }
      else
      {
          /* insumos consulta*/
          $this->data['tipotarea'] = $this->Tipotareas_model->get_all_tipotarea();
          /* Load Template */
          $this->template->user_render('public/tiposTarea/index', $this->data);

      }
    }

    /*
     * Adding a new tipotarea
     */
    public function add()
    {
      if ( ! $this->ion_auth->logged_in())
      {
          redirect('auth/login', 'refresh');
      }
      else
      {

            /* form validation*/
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nombreTipoTarea','NombreTipoTarea','required|max_length[50]');
		$this->form_validation->set_rules('descripcionTarea','DescripcionTarea','required|max_length[255]');

		if($this->form_validation->run())
        {
            $params = array(
				'nombreTipoTarea' => $this->input->post('nombreTipoTarea'),
				'descripcionTarea' => $this->input->post('descripcionTarea'),
            );

            $tipotarea_id = $this->Tipotareas_model->add_tipotarea($params);
            redirect('user/Tipostareas_pla/index');
        }
        else
        {
          $this->template->user_render('public/tipostarea/add', $this->data);
        }
    }
  }

    /*
     * Editing a tipotarea
     */
    function edit($idTipoTarea)
    {
        // check if the tipotarea exists before trying to edit it
        $this->data['tipotarea'] = $this->Tipotareas_model->get_tipotarea($idTipoTarea);

        if(isset($this->data['tipotarea']['idTipoTarea']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nombreTipoTarea','NombreTipoTarea','required|max_length[50]');
			$this->form_validation->set_rules('descripcionTarea','DescripcionTarea','required|max_length[255]');

			if($this->form_validation->run())
            {
                $params = array(
					'nombreTipoTarea' => $this->input->post('nombreTipoTarea'),
					'descripcionTarea' => $this->input->post('descripcionTarea'),
                );

                $this->Tipotareas_model->update_tipotarea($idTipoTarea,$params);
                redirect('user/Tipostareas_pla');
            }
            else
            {
                  $this->template->user_render('public/tipostarea/edit', $this->data);
            }
        }
        else
            show_error('The tipotarea you are trying to edit does not exist.');
    }

    function profile($idTipoTarea)
    {
        // check if the insumo exists before trying to edit it
        $this->data['tipotarea'] = $this->Tipotareas_model->get_tipotarea($idTipoTarea);
        $this->template->user_render('public/tipostarea/profile', $this->data);

    }

}