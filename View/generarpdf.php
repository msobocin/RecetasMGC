<?php
require_once ('fpdf/fpdf.php');
require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';



class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('../images/logo.png',10,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(50,0);
      
      
      //TODO TITULO RECETA
      $this->Cell(135,15,'Recetas MGC',1,0,'C');
      

   }
//Pie de página
	function Footer()
	{

		$this->SetY(-10);

		$this->SetFont('Arial','I',8);

		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Courier','B',24);


$receta=new Receta();

$recetaBD = new ReceptaControler();

$receta= $recetaBD->consultRecetaId(1);

$titulo = $receta -> getNombre();

$pdf -> Cell(50,50,$titulo);

$pdf->Output();

?> 