<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insumos extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
                /*carga del modelo*/
        $this->load->model('admin/Insumos_model');
                /* Load :: Common */
        $this->lang->load('admin/insumos');
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_insumo'));
        $this->data['pagetitle'] = $this->page_title->show();

    }

/** index */
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
            $this->data['insumo'] = $this->Insumos_model->get_all_insumo();
            /* Load Template */
            $this->template->admin_render('admin/insumos/index', $this->data);
          //  $this->load->view('admin/insumos/index',$data);
        }
    }
    /* crear */
    public function crear()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();


            /* Load Template */
          /*  $this->template->admin_render('admin/insumos/crear', $this->data);*/

            /* add form*/
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
                    redirect('admin/insumos/index');
                }
                else
                {

                    $this->template->admin_render('admin/insumos/crear', $this->data);
                }



        }
    }




}
