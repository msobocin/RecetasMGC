<?php 
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';

// $ingrediente = new Ingrediente();
// // $ingrediente2 = new Ingrediente();
// $receta = new Receta();

// $ingrediente->setAll(1,"Azucar","kg/kgs","3/4");

// $arrIngredientes = array();
// array_push($arrIngredientes,clone $ingrediente);

// $ingrediente->setAll(2,"Vodka","litro/s","5");
// array_push($arrIngredientes,clone $ingrediente);

// $receta->setAll(0,"Vodka con Azucar",$arrIngredientes,"Mesclar azucar con vodka!",0,2);

$recetaBD = new ReceptaControler();
// $recetaBD->save($receta);
$arrRecetas=$recetaBD->consultRecetaId(1);
$recetaBD->consult();

// foreach ($arrRecetas as $receta) {
	echo $arrRecetas->getNombre();
	foreach ($arrRecetas->getIngredientes() as $ingrediente) {
		echo $ingrediente->getIngrediente();
	}
// }


?>