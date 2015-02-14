<?php
require_once ('fpdf/fpdf.php');
require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';



class PDF extends FPDF
{
	private $_receta;
	
	public function setReceta($id) {
		$recetaBD=new ReceptaControler();
		$this->_receta=$recetaBD->consultRecetaId($id);
	}
	public function getReceta() {
		return $this->_receta;
	}
	
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('images/logo.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(70);
	    // Title
	    $this->Cell(50,10,$this->_receta->getNombre(),1,0,'C');
	    // Line break
	    $this->Ln(20);
	}
	
	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->setReceta(1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','b',14);
$receta = $pdf->getReceta();
$pdf->Cell(0,10,"Descripcion",0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$receta->getDescripcion(),0,1);
$pdf->SetFont('Times','b',14);
$pdf->Cell(0,10,"Preparacion",0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$receta->getPreparacion(),0,1);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();

?> 