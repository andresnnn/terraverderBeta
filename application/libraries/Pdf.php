<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf181/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image('assets/logo.png',90,10,20);
            $this->Ln('25');
            $this->SetFont('Arial','B',20);
            $this->Cell(30);
            $this->Cell(120,10,'Terra Verde',0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(120,10,'Listado General de Tareas',0,0,'C');
            $this->Ln('10');
            $this->SetFont('Arial','I',8);
            $this->Cell(30);
            $this->Cell(120,10,'Este PDF lista todas las tareas del vivero,ordenadas por la fecha de creacion.',0,0,'C');
            $this->Ln('5');
            $hoy = getdate();
            $d = $hoy[mday];
            $m = $hoy[mon];
            $y = $hoy[year]; 
            $this->Cell(180,10,'PDF generado el dia '."$d-$m-$y".' .',0,0,'C');
            $this->Ln(15);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>;