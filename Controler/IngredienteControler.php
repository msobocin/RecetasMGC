<?php
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

require_once 'Controler/BD.php';
require_once 'Model/Ingrediente.php';

class IngredienteControler extends BD {
	public function consultCuantas($id) {
		$cuantas = 0;
		try {
			$this->connectBD ();
			$result = $this->_link->query ( "SELECT `id` as _id, `nombre` as _nombre, `descripcion` as _descripcion, `tiempo` as _tiempo, `cuantas_personas` as _pesonas FROM `platos`" );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'Receta' );
				
			while ( $receta = $result->fetch () ) {
				array_push ( $arrReceta, $receta);
			}
				
			$this->disconnectBD ();
		} catch ( Exception $e ) {
			throw $e;
		}
		return $arrReceta;
	}
}

?>