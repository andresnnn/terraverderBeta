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
          // check if the insumo exists before trying to edit it
          $this->data['insumo'] = $this->Insumos_model->get_insumo($idInsumo);

          if(isset($this->data['insumo']['idInsumo']))
          {
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

                  $this->Insumos_model->update_insumo($idInsumo,$params);
                  redirect('user/insumos_pla');
              }
              else
              {
                $this->template->user_render('public/insumos/edit', $this->data);
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
                  // check if the insumo exists before trying to edit it
                  $this->data['insumo'] = $this->Insumos_model->get_insumo($idInsumo);
                  $this->template->user_render('public/insumos/profile', $this->data);

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
      /*esta funcion genera un pdf de todas los insumos */
   
   public function generaPDInsumos()
  {
    $this->load->library('pdfinsumos');
    $tarea = $this->Insumos_model->get_all_insumo();
    /*$this->data['tarea'] = $this->Tareas_model->listar_tareas();*/

    $this->pdf = new Pdfinsumos();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Listado general de insumos");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(143,188,143);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 8);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
    //$this->pdf->Cell(15,7,'n','TBL',0,'C','1');
    $this->pdf->Cell(40,7,'NOMBRE','TBL',0,'C','1');
    $this->pdf->Cell(85,7,'DESCRIPCION','TB',0,'C','1');
    $this->pdf->Cell(30,7,'CANTIDAD STOCK','TB',0,'C','1');
    $this->pdf->Cell(30,7,'PUNTO de PEDIDO','TBR',0,'C','1');
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($tarea as $t) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      //$this->pdf->Cell(25,5,$t->observacionEspecialista,'B',0,'L',0);
        if($t['cantidad']>=$t['puntoDePedido']){
      $this->pdf->Cell(40,5,$t['nombreInsumo'],'BL',0,'C',0);
      $this->pdf->Cell(85,5,$t['descripcionInsumo'],'B',0,'C',0);
      $this->pdf->Cell(30,5,$t['cantidad'],'B',0,'C',0);
      $this->pdf->Cell(30,5,$t['puntoDePedido'],'BR',0,'C',0);    
      $this->pdf->Ln(5);
        }else{
            $this->pdf->SetFillColor(255, 160, 122);
           $this->pdf->Cell(40,5,$t['nombreInsumo'],'TBL',0,'C',1);
      $this->pdf->Cell(85,5,$t['descripcionInsumo'],'TB',0,'C',1);
      $this->pdf->Cell(30,5,$t['cantidad'],'TB',0,'C',1);
      $this->pdf->Cell(30,5,$t['puntoDePedido'],'TBR',0,'C',1);    
      $this->pdf->Ln(5); 
        }
        
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
      ob_end_clean();
    $this->pdf->Output("Lista general de insumos.pdf", 'D');
  }
  /*esta funcion genera un pdf de todos los insumos */

}