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
			
			$result = $this->_link->query ( "SELECT COUNT(id) as cuantas FROM recetas where id_ingredientes = ".$id );
			$cuantas=implode(",", $result->fetch (PDO::FETCH_ASSOC));
			
			$this->disconnectBD ();
		} catch ( Exception $e ) {
			throw $e;
		}
		return $cuantas;
	}
}

?>