<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipotareas extends Admin_Controller{

    public function __construct()
    {
      parent::__construct();
              /*carga del modelo*/
      $this->load->model('admin/Tipotareas_model');
              /* Load :: Common */
      $this->lang->load('admin/tipotareas');
      /* Title Page :: Common */
      $this->page_title->push(lang('menu_tipotarea'));
      $this->data['pagetitle'] = $this->page_title->show();

    }

    /*
     * Listing of tipotarea
     */
    public function index()
    {
      if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
      {
          redirect('auth/login', 'refresh');
      }
      else
      {
          /* Breadcrumbs */
          $this->data['breadcrumb'] = $this->breadcrumbs->show();
          /* insumos consulta*/
          $this->data['tipotarea'] = $this->Tipotareas_model->get_all_tipotarea();
          /* Load Template */
          $this->template->admin_render('admin/tipotareas/index', $this->data);

      }
    }

    /*
     * Adding a new tipotarea
     */
    function add()
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

            $tipotarea_id = $this->Tipotarea_model->add_tipotarea($params);
            redirect('common/tipotareas/index');
        }
        else
        {
            $data['_view'] = 'tipotarea/add';
            $this->load->view('admin/tipotarea/index',$data);
        }
    }

    /*
     * Editing a tipotarea
     */
    function edit($idTipoTarea)
    {
        // check if the tipotarea exists before trying to edit it
        $data['tipotarea'] = $this->Tipotarea_model->get_tipotarea($idTipoTarea);

        if(isset($data['tipotarea']['idTipoTarea']))
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

                $this->Tipotarea_model->update_tipotarea($idTipoTarea,$params);
                redirect('tipotarea/index');
            }
            else
            {
                $data['_view'] = 'tipotarea/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tipotarea you are trying to edit does not exist.');
    }

    /*
     * Deleting tipotarea
     */
    function remove($idTipoTarea)
    {
        $tipotarea = $this->Tipotarea_model->get_tipotarea($idTipoTarea);

        // check if the tipotarea exists before trying to delete it
        if(isset($tipotarea['idTipoTarea']))
        {
            $this->Tipotarea_model->delete_tipotarea($idTipoTarea);
            redirect('tipotarea/index');
        }
        else
            show_error('The tipotarea you are trying to delete does not exist.');
    }

}
