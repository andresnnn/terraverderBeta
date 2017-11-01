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
                    redirect('common/insumos/index');
                }
                else
                {

                    $this->template->admin_render('admin/insumos/crear', $this->data);
                }



        }
    }

    /*
   * Editing a insumo
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
              redirect('common/insumos/index');
          }
          else
          {
            //  $data['_view'] = 'insumo/edit';
            $this->template->admin_render('admin/insumos/edit', $this->data);
            //  $this->load->view('admin/insumos/edit',$this->data);
          }
      }
      else
          show_error('El insumo que se intenta editar no existe.');
  }

  /*
   * Deleting insumo
   */
  function remove($idInsumo)
  {
      $insumo = $this->Insumos_model->get_insumo($idInsumo);

      // check if the insumo exists before trying to delete it
      if(isset($insumo['idInsumo']))
      {
          $this->Insumos_model->delete_insumo($idInsumo);
          $this->Insumos_model->delete_insumo($idInsumo);
           redirect('common/insumos/index');


      }
      else
          show_error('El insumo que se intenta borrar no existe.');
  }

  function profile($idInsumo)
  {

    /* Breadcrumbs */
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      // check if the insumo exists before trying to edit it
      $this->data['insumo'] = $this->Insumos_model->get_insumo($idInsumo);
      $this->template->admin_render('admin/insumos/profile', $this->data);

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
    redirect('common/insumos/index');
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
    redirect('common/insumos/index');
  }

  }
