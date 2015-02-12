<?php
require_once 'controler/BD.php';
class ReceptaControler extends BD {
	public function save($recepta) {
		$exito = false;
		try {
			$this->connectBD ();
			$sentencia = $this->_link->prepare ( "INSERT INTO `receptasmcg`.`platos` (`nombre`,`preparacion`,`tiempo`,`cuantas_personas`) VALUES (:_nombre, :_preparacion, :_tiempo,:_personas)" );
			$sentencia->bindParam ( ":_nombre", $recepta->getNombre () );
			$sentencia->bindParam ( ":_preparacion", $recepta->getPreparacion() );
			$sentencia->bindParam ( ":_tiempo", $recepta->getTiempo() );
			$sentencia->bindParam(":_personas", $recepta->getPersonas());
			$lastIdPlato = $this->_link->lastInsertId();
			if ($sentencia->execute ()) {
				$exito = true;
			}
			
			$sentencia = $this->_link->prepare( "INSERT INTO `receptasmcg`.`recetas` (`id_plato`,`id_ingredientes`,`cantidad`) VALUES (:_id_plato, :_id_ingredientes, :_cantidad)");
			foreach ($recepta->getIngredientes() as $ingrediente) {
				$sentencia->bindParam ( ":_id_plato", $lastIdPlato );
				$sentencia->bindParam ( ":_id_ingredientes", $ingrediente->getId() );
				$sentencia->bindParam ( ":_cantidad", $ingrediente->getCantidad() );
				
				if ($sentencia->execute ()) {
					$exito = true;
				}
			}
			
			
			$this->disconnectBD ();
		} catch ( PDOException $e ) {
			throw $e;
		}
		
		return $exito;
	}
	public function consult() {
		$arrReceptas = array ();
		try {
			$this->connectBD ();
			$result = $this->_link->query ( "Select id as _id, name as _name, country as _country, dob as _dob, dod as _dod FROM authors" );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'Recepta' );
			
			while ( $author = $result->fetch () ) {
				array_push ( $arrReceptas, $recepta );
			}
			
			$this->disconnectBD ();
		} catch ( Exception $e ) {
			throw $e;
		}
		return $arrReceptas;
	}
}

?>