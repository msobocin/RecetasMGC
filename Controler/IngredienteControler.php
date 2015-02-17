<?php
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

require_once 'Controler/BD.php';
require_once 'Model/Ingrediente.php';

class IngredienteControler extends BD {
	//para calcular cuantas recetas tenemos en bd con este ingredietne
	public function consultCuantas($id) {
		$cuantas = null;
		try {
			$this->connectBD ();
			//nos devuelve numero de recetas que tenemos con este ingrediente
			$result = $this->_link->query ( "SELECT COUNT(id) as cuantas FROM recetas where id_ingredientes = ".$id );
			$cuantas=implode("", $result->fetch (PDO::FETCH_ASSOC));
			
			$this->disconnectBD ();
		} catch ( Exception $e ) {
			throw $e;
		}
		return $cuantas;
	}
	
	//lista de ingredientes
	public function listaIngredientes() {
		$arrIngredientes=array();
		try {
			$this->connectBD();
			//devuelve todos ingredientes
			$result = $this->_link->query ( "SELECT `id` as _id, `ingrediente` as _ingrediente, `unidad` as _unidad FROM `ingredientes`" );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'Ingrediente' );
			//guarda en una array de ingretientes que nos devuelve
			while ( $ingrediente = $result->fetch () ) {
				array_push ( $arrIngredientes, $ingrediente);
			}
			
			$this->disconnectBD();
		} catch (Exception $e) {
			throw $e;
		}
		return $arrIngredientes;
	}
}

?>