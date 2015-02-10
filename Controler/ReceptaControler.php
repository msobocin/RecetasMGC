<?php
require_once 'controler/BD.php';

class ReceptaControler extends BD {
	
	public function save($recepta){
		$exito = false;
		try {
			$this->connectBD();
			$sentencia = $this->_link->prepare ( "INSERT INTO `receptasmcg`.`platos` (`nombre`,`preparacion`,`tiempo`) VALUES (:_nombre, :_preparacion, :_tiempo)" );
			$sentencia->bindParam ( ":_nombre", $recepta->getNombre());
			$sentencia->bindParam ( ":_preparacion", $recepta->__get('_country'));
			$sentencia->bindParam ( ":_tiempo", $recepta->__get('_dob'));
			if($sentencia->execute ()){
				$exito = true;
			}
			$this->disconnectBD();
		} catch ( PDOException $e ) {
			throw  $e;
		}
	
		return $exito;
	}
	
	public function consult() {
		$arrReceptas = array();
		try {
			$this->connectBD();
			$result = $this->_link->query ( "Select id as _id, name as _name, country as _country, dob as _dob, dod as _dod FROM authors" );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'Recepta' );
				
			while ( $author = $result->fetch () ) {
				array_push($arrReceptas, $recepta);
			}
	
			$this->disconnectBD();
		} catch ( Exception $e ) {
			throw  $e;
		}
		return $arrReceptas;
	}

}

?>