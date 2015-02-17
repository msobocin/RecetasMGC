<?php
require_once ('fpdf/fpdf.php');
require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';



class PDF extends FPDF
{
	private $_receta;
	
	public function setReceta($id) {
		$recetaBD=new RecetaControler();
		$this->_receta=$recetaBD->consultRecetaId($id);
	}
	public function getReceta() {
		return $this->_receta;
	}
	
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('img/logo.png',10,5,70);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(70);
	    // Title
	    $this->Cell(110,15,utf8_decode($this->_receta->getNombre()),1,0,'C');
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

//Recoger ID de la receta a mostrar
$recetaid=$_REQUEST['id'];

$pdf->setReceta($recetaid);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','b',14);

$receta = $pdf->getReceta();

$pdf->Cell(180,10,"Descripcion",1,1,"C");
$pdf->SetFont('Times','',12);
$pdf->MultiCell(180,10,utf8_decode($receta->getDescripcion()),1,1);
$pdf->SetFont('Times','b',14);

$pdf->Ln(10);

$pdf->Cell(180,10,"Ingredientes",1,1,"C");
$pdf->SetFont('Times','',12);
//Printar ingredientes
foreach ($receta->getIngredientes() as $ingrediente) {
	
	$pdf->Cell(180,10,"              -".utf8_decode($ingrediente->getIngrediente()).": ".$ingrediente->getCantidad()." ".$ingrediente->getUnidad(),2,1); 
}

$pdf->SetFont('Times','b',14);

$pdf->Ln(10);

$pdf->Cell(180,10,"Preparacion",1,1,"C");
$pdf->SetFont('Times','',12);
$pdf->MultiCell(180,10,utf8_decode($receta->getPreparacion()),1,1);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);

$pdf->Ln(10);
$pdf->SetFont('Times','b',14);

$pdf->Cell(90,10,"Tiempo",1,0,"C");
$receta = $pdf->getReceta();
$pdf->Cell(90,10,"Comensales",1,1,"C");
$pdf->SetFont('Times','',12);
$pdf->Cell(90,10,$receta->getTiempo()." Horas",0,0,"C");
$pdf->SetFont('Times','',12);
$pdf->Cell(90,10,$receta->getPersonas()." Personas",0,1,"C");



$pdf->Output();
?> 