<?php
require_once ('fpdf/fpdf.php');
require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';



class PDF extends FPDF
{
	//Objeto Receta
	private $_receta;
	
	//Setter Receta
	public function setReceta($id) {
		$recetaBD=new RecetaControler();
		$this->_receta=$recetaBD->consultRecetaId($id);
	}
	
	//Recojer la receta
	public function getReceta() {
		return $this->_receta;
	}
	
	// Header de nuestras hojas PDF
	function Header()
	{
	    // Ponemos el logo
	    $this->Image('img/logo.png',10,5,70);
	    // Definimos la fuente del titulo
	    $this->SetFont('Arial','B',15);
	    //celda vacia para no tapar el logo
	    $this->Cell(70);
	    //Ponemos el Titulo de la receta en el header
	    $this->Cell(110,15,utf8_decode($this->_receta->getNombre()),1,0,'C');
	    $this->Ln(20);
	}
	
	//Footer
	function Footer()
	{
	    
	    $this->SetY(-15);
	
	    $this->SetFont('Arial','I',8);
	
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}


$pdf = new PDF();

//Recoger ID de la receta a mostrar
$recetaid=$_REQUEST['id'];

$pdf->setReceta($recetaid);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','b',14);

//recogemos la receta (redundante)
$receta = $pdf->getReceta();

//printamos la descripcion
$pdf->Cell(180,10,"Descripcion",1,1,"C");
$pdf->SetFont('Times','',12);
$pdf->MultiCell(180,10,utf8_decode($receta->getDescripcion()),1,1);
$pdf->SetFont('Times','b',14);

$pdf->Ln(10);

//printamos los ingredientes
$pdf->Cell(180,10,"Ingredientes",1,1,"C");
$pdf->SetFont('Times','',12);
//Printar ingredientes
foreach ($receta->getIngredientes() as $ingrediente) {
	
	$pdf->Cell(180,10,"              -".utf8_decode($ingrediente->getIngrediente()).": ".$ingrediente->getCantidad()." ".$ingrediente->getUnidad(),2,1); 
}

$pdf->SetFont('Times','b',14);

$pdf->Ln(10);

//printar preparación
$pdf->Cell(180,10,"Preparacion",1,1,"C");
$pdf->SetFont('Times','',12);
$pdf->MultiCell(180,10,utf8_decode($receta->getPreparacion()),1,1);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);

$pdf->Ln(10);
$pdf->SetFont('Times','b',14);

//printar tiempo
$pdf->Cell(90,10,"Tiempo",1,0,"C");
$receta = $pdf->getReceta();
$pdf->Cell(90,10,"Comensales",1,1,"C");
$pdf->SetFont('Times','',12);
$pdf->Cell(90,10,$receta->getTiempo()." Horas",0,0,"C");
$pdf->SetFont('Times','',12);
$pdf->Cell(90,10,$receta->getPersonas()." Personas",0,1,"C");


//devolvemos el PDF
$pdf->Output();
?> 