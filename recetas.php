<?php 
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */
require_once 'Controler/RecetaControler.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';
require_once 'View/libHTML.php';
require_once 'View/RecetaView.php';
head();

		$recetaControl = new RecetaControler ();
		$recetas = $recetaControl->consult ();
		if (isset($_REQUEST['receta'])) {
			echo "la receta";
		}else{
			$recetaView = new RecetaView();
			$recetaView->view($recetas);
		}
 footer();             

?>
