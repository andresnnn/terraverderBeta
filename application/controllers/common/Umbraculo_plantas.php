<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Umbraculo_plantas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_plantas'));
        $this->data['pagetitle'] = $this->page_title->show();
        /* CARGA LA BASE DE DATOS O MODELO*/
        $this->load->model('common/Umbraculoplantas_model');
    } 

    /*
    VER PLANTAS DENTRO DEL UMBRACULO
     */
    function index()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
                redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['umbraculo_plantas'] = $this->Umbraculoplantas_model->get_all_umbraculo_plantas();
            /* CARGAR INFORMARCION */
            $this->load->view('admin/umbraculos/umbraculos_plantas/index',$this->data);
        }
        
    }

    /*
     AGREGAR UNA NUEVA PLANTA AL UMBRACULO
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('idPlanta','IdPlanta','required');
		$this->form_validation->set_rules('cantidad','Cantidad','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'idPlanta' => $this->input->post('idPlanta'),
				'cantidad' => $this->input->post('cantidad'),
            );
            
            $umbraculo_plantas_id = $this->Umbraculoplantas_model->add_umbraculo_plantas($params);
            redirect('umbraculo_plantas/index');
        }
        else
        {
			$this->load->model('Umbraculo_model');
			$data['all_umbraculo'] = $this->Umbraculo_model->get_all_umbraculo();

			$this->load->model('Plantas_model');
			$data['all_plantas'] = $this->Plantas_model->get_all_plantas();
            
            $data['_view'] = 'umbraculoplantum/add';
            $this->load->view('layouts/main',$data);
        }
    } 

    /*
     RETIRAR UNA PLANTA DEL UMBRACULO
     */
    function remove($idUmbraculo)
    {
        $umbraculo_plantas = $this->Umbraculoplantas_model->get_umbraculo_plantas($idUmbraculo);

        // check if the umbraculo_plantas exists before trying to delete it
        if(isset($umbraculo_plantas['idUmbraculo']))
        {
            $this->Umbraculoplantas_model->delete_umbraculo_plantas($idUmbraculo);
            redirect('umbraculo_plantas/index');
        }
        else
            show_error('The umbraculo_plantas you are trying to delete does not exist.');
    }
    
}