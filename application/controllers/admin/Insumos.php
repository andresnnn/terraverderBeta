<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insumos extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
                /* Load :: Common */
        $this->lang->load('admin/insumos');
        /* Title Page :: Common */
        $this->page_title->push(lang('menu_insumos'));
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


            /* Load Template */
            $this->template->admin_render('admin/insumos/index', $this->data);
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
            $this->template->admin_render('admin/insumos/crear', $this->data);
        }
    }




}
