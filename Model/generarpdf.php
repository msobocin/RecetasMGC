<?
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('../images/logo.png',10,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(50,0);
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


//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Courier','B',24);

$str="Indice de Recetas";
$str = utf8_decode($str);

$pdf-> SetXY(20,20);
$pdf->Cell(200,40,$str);


$pdf-> SetXY(20,40);
$pdf-> SetFont('Times','',12);
$pdf ->Cell(40,100,$str);



$pdf->Output();

?> 