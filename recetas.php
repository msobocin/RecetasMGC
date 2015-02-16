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
		$recetaView = new RecetaView();
		$recetas = $recetaControl->consult ();
		if (isset($_REQUEST['receta'])) {
			$receta = $recetaControl->consultRecetaId($_REQUEST['receta']);
			$recetaView->viewReceta($receta);
		}else{
			$recetas = $recetaControl->consult ();
			$recetaView->view($recetas);
		}
 footer();             

?>
