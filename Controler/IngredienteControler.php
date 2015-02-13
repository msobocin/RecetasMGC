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
		$cuantas = null;
		try {
			$this->connectBD ();
			$result = $this->_link->query ( "SELECT COUNT(id) FROM recetas where id_ingredientes= ".$id );
			
			while ( $i = $result->fetch () ) {
				$cuantas=$i;
			}
				
			$this->disconnectBD ();
		} catch ( Exception $e ) {
			throw $e;
		}
		return $cuantas;
	}
}

?>