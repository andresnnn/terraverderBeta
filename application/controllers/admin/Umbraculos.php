<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umbraculos extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
                /* Load :: Common */
        $this->lang->load('admin/umbraculos');
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_umbraculo'));
        $this->data['pagetitle'] = $this->page_title->show();

    }

/** CARGA EL INDEX DE LA SECCION ADMINISTRACIÓN DE UMBRACULOS*/
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


            /* Load Template */
            $this->template->admin_render('admin/umbraculos/index', $this->data);
        }
    }
/*FIN INDEX*/

/**CARGA LA PAGINA PARA CREAR UN NUEVO UMBRACULO*/
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
            $this->template->admin_render('admin/umbraculos/crear', $this->data);
        }
    }
/*FIN CREAR*/

}
