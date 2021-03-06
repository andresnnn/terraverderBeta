<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Tareas extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
                /* Title Page :: Common */
                $this->load->model('common/Tareas_model');
                /* Load :: Common */
                $this->lang->load('admin/tareas');
                /* Title Page :: Common */
                $this->page_title->push(lang('menu_tarea'));
                $this->data['pagetitle'] = $this->page_title->show();
    }

    /*
     * Listing of tareas
     */
    function index()
    {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                // $data['tarea'] = $this->Tareas_model->get_all_tarea();
        // $data['_view'] = 'tareas/index';
        // $this->load->view('layouts/main',$data);
                $this->data['tarea'] = $this->Tareas_model->listar_tareas();

                /* Load Template */
                
                
                $this->template->admin_render('admin/tareas/index', $this->data);
                
         
                
            }
    }


    /*
     * Listing of tareas
     */
    function indexFilter5()
    {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();

                # code...
                $this->data['tarea'] = $this->Tareas_model->listar_tareas_fecha_prev();
                /* Load Template */
                $this->template->admin_render('admin/tareas/index', $this->data);


            }
    }
            /*
         * Listing of tareas
         */
        function indexFilter1()
        {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
                {
                    redirect('auth/login', 'refresh');
                }
                else
                {
                    /* Breadcrumbs */
                    $this->data['breadcrumb'] = $this->breadcrumbs->show();
                    # code...
                    $this->data['tarea'] = $this->Tareas_model->listar_tareas_activa();
                    /* Load Template */
                    $this->template->admin_render('admin/tareas/index', $this->data);
                }
        }


        function indexFilter2()
        {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
                {
                    redirect('auth/login', 'refresh');
                }
                else
                {
                    /* Breadcrumbs */
                    $this->data['breadcrumb'] = $this->breadcrumbs->show();
                    # code...
                    $this->data['tarea'] = $this->Tareas_model->listar_tareas_inactiva();
                    /* Load Template */
                    $this->template->admin_render('admin/tareas/index', $this->data);
                }
        }


        function indexFilter4()
        {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
                {
                    redirect('auth/login', 'refresh');
                }
                else
                {
                    /* Breadcrumbs */
                    $this->data['breadcrumb'] = $this->breadcrumbs->show();
                    # code...
                    $this->data['tarea'] = $this->Tareas_model->listar_tareas_incompleta();
                    /* Load Template */
                    $this->template->admin_render('admin/tareas/index', $this->data);
                }
        }


    /*consulta de insumos*/
    public function search_keyword(){
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
          $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $keyword=$_POST['keyword'];
        $seleccion=$_POST['seleccion'];
        if ($seleccion==null) {
          if(isset($keyword)and !empty($keyword)){
        /* insumos consulta*/
        $this->data['tarea'] = $this->Tareas_model->get_all_tarea_search($keyword);
          }
          else {
            /* insumos consulta*/
            $this->data['insumo'] = $this->Insumos_model->get_all_insumo();
          }
          }
          elseif ($seleccion==fechaPrevista) {
            # code...
            $this->data['tarea'] = $this->Tareas_model->listar_tareas_fecha_prev();
          }
            /* Load Template */
          $this->template->admin_render('admin/insumos/index', $this->data);
        }
     }

    /*
     AGREGAR TAREA DENTRO DE UMBRACULO
     */
function agregarTarea($idUmbraculo)
    {       if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
              $this->data['existe_tarea_duplicada'] = false;
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                /* CARGA LA INFORMACION DE LAS PLANTAS DEL UMBRACULO DONDE SE QUIERE CREAR LA TAREA*/
                    /* Data */
                    $idUmbraculo = (int) $idUmbraculo;
                    $this->data['id'] = $idUmbraculo;

                    /*CARGA LA INFORMACION DE LOS TIPOS DE TAREA REGISTRADAS EN EL SISTEMA*/
                    $this->load->model('admin/Tipotareas_model');
                    $this->data['tipotarea'] = $this->Tipotareas_model->get_all_tipotarea();

                    /*CARGA LA INFORMACION DEL UMBRACULO PARA HACER LAS COMPRACIONES NECESARIAS*/
                    $this->load->model('common/Umbraculos_model');
                    $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);

                    /*CARGA EL PRIMER ESTADO 'No inciada' POR DEFECTO, YA QUE SE ESTÁ CREANDO RECIEN*/
                    $this->load->model('common/Estado_tarea_model');
                    $this->data['estadoDefecto'] = $this->Estado_tarea_model->get_estado_tarea(1);
                    /*CARGA LAS PLANTAS PRESENTES DENTRO DEL UMBRACULO SOBRE EL CUAL SE ESTÁ CREANDO LA TAREA*/
                    $this->load->model('common/Umbraculoplantas_model');
                    $this->data['umbraculo_plantas'] = $this->Umbraculoplantas_model->ver_plantas_umbraculo($idUmbraculo);

                    /* CARGA LA PANTALLA PARA AÑADIR UNA NUEVA TAREA*/
                    $this->template->admin_render('admin/umbraculos/umbraculo_tarea/add', $this->data);
            }
    }
    /*
     AGREGAR CARGAR TAREA A BD
     */
    function add($idUmbraculo)
    {
                $this->data['existe_tarea_duplicada'] = false;
                $this->load->library('form_validation');

                $this->form_validation->set_rules('idPlanta','idPlanta','required');
                $this->form_validation->set_rules('idTipoTarea','IdTipoTarea','required');
                $this->form_validation->set_rules('fechaCreacion','FechaCreacion','required');
                $this->form_validation->set_rules('fechaAtencion','FechaAtencion');
                $this->form_validation->set_rules('fechaComienzo','FechaComienzo','required');
                $this->form_validation->set_rules('horaComienzo','horaComienzo','required');
                $this->form_validation->set_rules('observacionEspecialista','ObservacionEspecialista','max_length[50]');

                if($this->form_validation->run())
                {
                    $params = array(
                        'idTipoTarea' => $this->input->post('idTipoTarea'),
                        'idEstado' => $this->input->post('idEstado'),
                        'idUserAtencion' => $this->input->post('idUserAtencion'),
                        'idUserCreador' => $this->input->post('idUserCreador'),
                        'idPlanta' => $this->input->post('idPlanta'),
                        'idUmbraculo' => $this->input->post('idUmbraculo'),
                        'fechaCreacion' => $this->input->post('fechaCreacion'),
                        'fechaAtencion' => $this->input->post('fechaAtencion'),
                        'fechaComienzo' => $this->input->post('fechaComienzo'),
                        'horaComienzo' => $this->input->post('horaComienzo'),
                        'observacionEspecialista' => $this->input->post('observacionEspecialista'),
                    );
                      $this->data['existe_tarea_duplicada'] = ($this->Tareas_model->comprobar_existencia_tarea( $this->input->post('idUmbraculo'),$this->input->post('fechaComienzo'), $this->input->post('idPlanta'),$this->input->post('idTipoTarea')));

                    if (!($this->Tareas_model->comprobar_existencia_tarea( $this->input->post('idUmbraculo'),$this->input->post('fechaComienzo'), $this->input->post('idPlanta'),$this->input->post('idTipoTarea'))))
                    {
                      /*Se agregar tarea porque no existe*/
                      $tareas_id = $this->Tareas_model->add_tareas($params);
                      redirect('common/umbraculos/ver/'.$this->input->post('idUmbraculo'));
                    }
                    else{
                      /*no se agrega*/
                      redirect('common/umbraculos/ver/'.$this->input->post('idUmbraculo'));
                    }
                }
                else
                {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                                    /* Data */
                    $idUmbraculo = (int) $idUmbraculo;
                    $this->data['id'] = $idUmbraculo;

                    /*CARGA LA INFORMACION DE LOS TIPOS DE TAREA REGISTRADAS EN EL SISTEMA*/
                    $this->load->model('admin/Tipotareas_model');
                    $this->data['tipotarea'] = $this->Tipotareas_model->get_all_tipotarea();

                    /*CARGA LA INFORMACION DEL UMBRACULO PARA HACER LAS COMPRACIONES NECESARIAS*/
                    $this->load->model('common/Umbraculos_model');
                    $this->data['info_umbraculo'] = $this->Umbraculos_model->get_umbraculos($idUmbraculo);

                    /*CARGA EL PRIMER ESTADO 'No inciada' POR DEFECTO, YA QUE SE ESTÁ CREANDO RECIEN*/
                    $this->load->model('common/Estado_tarea_model');
                    $this->data['estadoDefecto'] = $this->Estado_tarea_model->get_estado_tarea(1);
                    /*CARGA LAS PLANTAS PRESENTES DENTRO DEL UMBRACULO SOBRE EL CUAL SE ESTÁ CREANDO LA TAREA*/
                                        $this->load->model('common/Umbraculoplantas_model');
                    $this->data['umbraculo_plantas'] = $this->Umbraculoplantas_model->ver_plantas_umbraculo($idUmbraculo);
                    /* CARGA LA PANTALLA PARA AÑADIR UNA NUEVA TAREA*/
                    $this->template->admin_render('admin/umbraculos/umbraculo_tarea/add', $this->data);
                }
    }

    function selecciona_umbraculo ()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                $this->load->model('common/Umbraculos_model');
                $this->data['all_umbraculo'] = $this->Umbraculos_model->get_all_umbraculos();

                $this->template->admin_render('admin/tareas/elegir', $this->data);
            }

    }

    function ver_detalles($idTarea)
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                $this->data['insumos_tarea'] = $this->Tareas_model->insumos_tarea($idTarea);
                $this->data['tarea'] = $this->Tareas_model->ver_detalles_tarea($idTarea);
                $this->template->admin_render('admin/tareas/detalles', $this->data);
            }
    }
/* borrado logico*/

  /**
   * DESACTIVA UN tarea, PARA SU UTILIZACIÓN... PERO SI YA ESTÁ UTILIZADO EN ALGÚN tarea, SE MUESTRA SU INFORMACIÓN
   * @param  [type] $idTarea COMO ÚNICO PARAMETRO DE ENTRADA
   * @return [type]           [description]
   * @author SAKZEDMK
   */

   // borrar si no esta tatendida solamente
  function borrado_logico($idTarea)
  {
$estaAtendida=$this->Tareas_model->estaAtendida($idTarea);
if(($estaAtendida)){
    $this->Tareas_model->desactivar_tarea($idTarea);
    }
    redirect('common/tareas/index');
  }

  /**
   * DESACTIVA UN tarea, PARA SU UTILIZACIÓN... PERO SI YA ESTÁ UTILIZADO EN ALGÚN tarea, SE MUESTRA SU INFORMACIÓN
   * @param  [type] $idTarea COMO ÚNICO PARAMETRO DE ENTRADA
   * @return [type]           [description]
   * @author SAKZEDMK
   */
  function activado_logico($idTarea)
  {
    $this->Tareas_model->activar_tarea($idTarea);
    redirect('common/tareas/index');
  }
    
  /*esta funcion genera un pdf de todas las tareas */
    
   public function generaPDF()
  {
    $this->load->library('pdf');
    $tarea = $this->Tareas_model->listar_tareas();
    /*$this->data['tarea'] = $this->Tareas_model->listar_tareas();*/

    $this->pdf = new Pdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    
    $this->pdf->SetTitle("Listado general de tareas");
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
    $this->pdf->Cell(40,7,'TAREA','TBL',0,'C','1');
    $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PLANTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'UMBRACULO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREACION','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PREVISTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREADOR','TBR',0,'C','1');
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 0;
    foreach ($tarea as $t) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      $x++; 
      // Se imprimen los datos de cada alumno
      //$this->pdf->Cell(25,5,$t->observacionEspecialista,'B',0,'L',0);
      $this->pdf->Cell(40,5,$t['nombreTipoTarea'],'BL',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreEstado'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombrePlanta'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreUmbraculo'],'B',0,'C',0);    
      $this->pdf->Cell(25,5,$t['fechaCreacion'],'B',0,'C',0); 
      $this->pdf->Cell(25,5,$t['fechaComienzo'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['creador'],'BR',0,'C',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
    }
      $this->pdf->Ln(7);
      $this->pdf->Cell(57,5,'En total hay '.$x.' tareas creadas en el Vivero.','',0,'C',0);
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
      $nombre ="Lista general de tareas - ".date("d/m/Y") . ".pdf";
      $this->pdf->Output($nombre, 'D');
    /*$this->pdf->Output("Lista general de tareas.pdf", 'D');*/
  }
  /*esta funcion genera un pdf de todas las tareas */
    
    
     /*esta funcion genera un pdf de todas las tareas completas */
    
   public function generaPDFcompletas()
  {
    $this->load->library('pdfc');
    $tarea = $this->Tareas_model->listar_tareas_completas();
    /*$this->data['tarea'] = $this->Tareas_model->listar_tareas();*/

    $this->pdf = new Pdfc();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Listado general de tareas completas");
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
    $this->pdf->Cell(40,7,'TAREA','TBL',0,'C','1');
    $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PLANTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'UMBRACULO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREACION','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PREVISTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREADOR','TBR',0,'C','1');
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($tarea as $t) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      //$this->pdf->Cell(25,5,$t->observacionEspecialista,'B',0,'L',0);
      $this->pdf->Cell(40,5,$t['nombreTipoTarea'],'BL',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreEstado'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombrePlanta'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreUmbraculo'],'B',0,'C',0);    
      $this->pdf->Cell(25,5,$t['fechaCreacion'],'B',0,'C',0); 
      $this->pdf->Cell(25,5,$t['fechaComienzo'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['creador'],'BR',0,'C',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
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
      $nombre ="Lista general de tareas completas - ".date("d/m/Y") . ".pdf";
      $this->pdf->Output($nombre, 'D');
    /*$this->pdf->Output("Lista general de tareas completas.pdf", 'D');*/
  }
  /*esta funcion genera un pdf de todas las tareas completas */
    
        /*esta funcion genera un pdf de todas las tareas completas */
    
   public function generaPDFincompletas()
  {
    $this->load->library('pdfi');
    $tarea = $this->Tareas_model->listar_tareas_incompletasPDF();
    /*$this->data['tarea'] = $this->Tareas_model->listar_tareas();*/

    $this->pdf = new Pdfi();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Listado general de tareas incompletas");
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
    $this->pdf->Cell(40,7,'TAREA','TBL',0,'C','1');
    $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PLANTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'UMBRACULO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREACION','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PREVISTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREADOR','TBR',0,'C','1');
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($tarea as $t) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      //$this->pdf->Cell(25,5,$t->observacionEspecialista,'B',0,'L',0);
      $this->pdf->Cell(40,5,$t['nombreTipoTarea'],'BL',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreEstado'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombrePlanta'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreUmbraculo'],'B',0,'C',0);    
      $this->pdf->Cell(25,5,$t['fechaCreacion'],'B',0,'C',0); 
      $this->pdf->Cell(25,5,$t['fechaComienzo'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['creador'],'BR',0,'C',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
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
      $nombre ="Lista general de tareas incompletas - ".date("d/m/Y") . ".pdf";
      $this->pdf->Output($nombre, 'D');
    /*$this->pdf->Output("Lista general de tareas incompletas.pdf", 'D');*/
  }
  /*esta funcion genera un pdf de todas las tareas incompletas */
    
          /*esta funcion genera un pdf de todas las tareas completas */
    
   public function generaPDFnoiniciadas()
  {
    $this->load->library('pdfna');
    $tarea = $this->Tareas_model->listar_tareas_noiniciadasPDF();
    /*$this->data['tarea'] = $this->Tareas_model->listar_tareas();*/

    $this->pdf = new Pdfna();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Listado general de tareas no iniciadas");
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
    $this->pdf->Cell(40,7,'TAREA','TBL',0,'C','1');
    $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PLANTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'UMBRACULO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREACION','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PREVISTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREADOR','TBR',0,'C','1');
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($tarea as $t) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      //$this->pdf->Cell(25,5,$t->observacionEspecialista,'B',0,'L',0);
      $this->pdf->Cell(40,5,$t['nombreTipoTarea'],'BL',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreEstado'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombrePlanta'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreUmbraculo'],'B',0,'C',0);    
      $this->pdf->Cell(25,5,$t['fechaCreacion'],'B',0,'C',0); 
      $this->pdf->Cell(25,5,$t['fechaComienzo'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['creador'],'BR',0,'C',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
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
      $nombre ="Lista general de tareas no iniciadas - ".date("d/m/Y") . ".pdf";
      $this->pdf->Output($nombre, 'D');
    /*$this->pdf->Output("Lista general de tareas no iniciadas.pdf", 'D');*/
  }
  /*esta funcion genera un pdf de todas las tareas no iniciadas */
    
    /*esta funcion genera un pdf de una tarea seleccionada */
    
   public function generaTareaPDF($idTarea)
  {
    if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                $tarea = $this->Tareas_model->ver_detalles_tarea($idTarea);
                //$this->data['tarea'] = $this->Tareas_model->ver_detalles_tarea($idTarea);
                $insumos_tarea = $this->Tareas_model->insumos_tarea($idTarea);
                //$this->data['insumos_tarea'] = $this->Tareas_model->insumos_tarea($idTarea);
                //$this->template->admin_render('admin/tareas/detalles', $this->data);
                $this->load->library('pdfsolo');
   

    $this->pdf = new Pdfsolo();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Detalles de la tarea id");
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
    /*$this->pdf->Cell(25,7,'TAREA','TBL',0,'C','1');
    $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PLANTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'UMBRACULO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREACION','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PREVISTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,$tarea['nombreTarea'],'TBR',0,'C','1');*/
    $this->pdf->Ln(5);
    // La variable $x se utiliza para mostrar un número consecutivo           
    foreach ($tarea as $t) {
      $this->pdf->Cell(100,5,'Detalles de la tarea: ','',0,'L',1);$this->pdf->Ln(7);
      $this->pdf->Cell(40,5,'Tipo de tarea: ','',0,'C',0);$this->pdf->Cell(30,5,$t['nombreTipoTarea'],'',0,'L',0);$this->pdf->Ln(7);
      $this->pdf->Cell(40,5,'Descripcion de la tarea: ','',0,'C',0);$this->pdf->Cell(100,5,$t['descripcionTarea'],'',0,'L',0);$this->pdf->Ln(7);
      $this->pdf->Cell(40,5,'Umbraculo: ','',0,'C',0);$this->pdf->Cell(30,5,$t['nombreUmbraculo'],'',0,'L',0);$this->pdf->Ln(10);
      $this->pdf->Cell(100,5,'Informacion de la planta: ','',0,'L',1);$this->pdf->Ln(7);
      $this->pdf->Cell(40,5,'Nombre: ','',0,'C',0);$this->pdf->Cell(30,5,$t['nombrePlanta'],'',0,'L',0);$this->pdf->Ln(7);
      $this->pdf->Cell(40,5,'Nombre Cientifico: ','',0,'C',0);$this->pdf->Cell(30,5,$t['nombreCientificoPlanta'],'',0,'L',0);$this->pdf->Ln(10);
      $this->pdf->Cell(100,5,'Otors detalles de la tarea: ','',0,'L',1);$this->pdf->Ln(7);
      $this->pdf->Cell(40,5,'Creador: ','',0,'C',0);$this->pdf->Cell(30,5,$t['Creador'],'',0,'L',0);$this->pdf->Ln(7);
      $this->pdf->Cell(40,5,'Atendio: ','',0,'C',0);$this->pdf->Cell(30,5,$t['Atendio'],'',0,'L',0);$this->pdf->Ln(7);
        $this->pdf->Cell(40,5,'Fecha creacion: ','',0,'C',0);$this->pdf->Cell(30,5,$t['fechaCreacion'],'',0,'L',0);$this->pdf->Ln(7);
        $this->pdf->Cell(40,5,'Fecha prevista: ','',0,'C',0);$this->pdf->Cell(30,5,$t['fechaComienzo'],'',0,'L',0);$this->pdf->Ln(7);
        $this->pdf->Cell(40,5,'Fecha atencion: ','',0,'C',0);$this->pdf->Cell(30,5,$t['fechaAtencion'],'',0,'L',0);$this->pdf->Ln(7);
        $this->pdf->Cell(40,5,'Estado de la tarea: ','',0,'C',0);$this->pdf->Cell(30,5,$t['nombreEstado'],'',0,'L',0);$this->pdf->Ln(10);
        $this->pdf->Cell(100,5,'Insumos utilizados en la tarea: ','',0,'L',1);$this->pdf->Ln(10);
        $this->pdf->Cell(50,7,'Insumo','TBL',0,'C','1');
        $this->pdf->Cell(50,7,'Cantidad','TBR',0,'C','1');
        $this->pdf->Ln(7);
        foreach ($insumos_tarea as $i) {
        $this->pdf->Cell(50,5,$i['nombreInsumo'],'BL',0,'C',0);
        $this->pdf->Cell(50,5,$i['cantidadUtilizado'],'BR',0,'C',0);
        $this->pdf->Ln(5);
        }
      //Se agrega un salto de linea
     
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
      $nombre ="Detalles Tarea - ".date("d/m/Y") . ".pdf";
      $this->pdf->Output($nombre, 'I');          
    /*$this->pdf->Output("Detalles Tarea.pdf", 'I');*/
            }
  }
  /*esta funcion genera un pdf de una tarea seleccionada */
    
      /*esta funcion genera un pdf de las tareas de un umbraculo */
    
   public function generaPDFUmbraculo($idUmbraculo)
  {
    if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
            {
                redirect('auth/login', 'refresh');
            }
            else
            {
                /* Breadcrumbs */
                $this->data['breadcrumb'] = $this->breadcrumbs->show();
                $tarea = $this->Tareas_model-> obtener_tareas_umbraculo_pdf($idUmbraculo);
                //$this->data['tarea'] = $this->Tareas_model->ver_detalles_tarea($idTarea);
                //$insumos_tarea = $this->Tareas_model->insumos_tarea($idTarea);
                //$this->data['insumos_tarea'] = $this->Tareas_model->insumos_tarea($idTarea);
                //$this->template->admin_render('admin/tareas/detalles', $this->data);
                $this->load->library('pdfUmbraculo');
   

    $this->pdf = new PdfUmbraculo();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Tareas del umbraculo id");
    $this->pdf->SetLeftMargin(30);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(143,188,143);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 8);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
    $this->pdf->Ln(6);          
    $this->pdf->Cell(25,7,'TAREA','TBL',0,'C','1');
    $this->pdf->Cell(25,7,'ESTADO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PLANTA','TB',0,'C','1');
    //$this->pdf->Cell(25,7,'UMBRACULO','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREACION','TB',0,'C','1');
    $this->pdf->Cell(25,7,'PREVISTA','TB',0,'C','1');
    $this->pdf->Cell(25,7,'CREADOR','TBR',0,'C','1');
    $this->pdf->Ln(7);
    $x = 0;            
    // La variable $x se utiliza para mostrar un número consecutivo           
    foreach ($tarea as $t) {
      $x++;
      $this->pdf->Cell(25,5,$t['nombreTipoTarea'],'BL',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombreEstado'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['nombrePlanta'],'B',0,'C',0);
      //$this->pdf->Cell(25,5,$t['nombreUmbraculo'],'B',0,'C',0);    
      $this->pdf->Cell(25,5,$t['fechaCreacion'],'B',0,'C',0); 
      $this->pdf->Cell(25,5,$t['fechaComienzo'],'B',0,'C',0);
      $this->pdf->Cell(25,5,$t['creador'],'BR',0,'C',0);
      $this->pdf->Ln(5);
        }
      $this->pdf->Ln(7);
      if ($x!=0){
      $this->pdf->Cell(57,5,'En total hay '.$x.' tareas creadas en el '.$t['nombreUmbraculo'].'.','',0,'C',0);         
      }else if ($x==0){
         $this->pdf->Cell(57,5,'Este umbraculo no posee tareas','',0,'C',0); 
      }
      //Se agrega un salto de linea
     
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
      $nombre ="Tareas del Umbraculo - ".date("d/m/Y") . ".pdf";
      $this->pdf->Output($nombre, 'I');
    /*$this->pdf->Output("Tareas del Umbraculo.pdf", 'I');*/
            
  }
  /*esta funcion genera un pdf de un umbraculo seleccionado */

}
