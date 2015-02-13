<?php

/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

require_once 'Controler/BD.php';
require_once 'Model/Receta.php';

class ReceptaControler extends BD {
	public function save($recepta) {
		$exito = false;
		try {
			$this->connectBD ();
			$sentencia = $this->_link->prepare ( "INSERT INTO `recetasmgc`.`platos` (`nombre`,`descripcion`,`preparacion`,`tiempo`,`cuantas_personas`) VALUES (:_nombre, :_descripcion, :_preparacion, :_tiempo,:_personas)" );
			$sentencia->bindParam ( ":_nombre", $recepta->getNombre () );
			$sentencia->bindParam ( ":_preparacion", $recepta->getPreparacion() );
			$sentencia->bindParam ( ":_tiempo", $recepta->getTiempo() );
			$sentencia->bindParam(":_personas", $recepta->getPersonas());
			
			if ($sentencia->execute ()) {
				$exito = true;
			}
			$lastIdPlato = $this->_link->lastInsertId();
			
			foreach ($recepta->getIngredientes() as $ingrediente) {
				$sentencia = $this->_link->prepare( "INSERT INTO `recetasmgc`.`recetas` (`id_plato`,`id_ingredientes`,`cantidad`) VALUES (:_id_plato, :_id_ingredientes, :_cantidad)");
				$sentencia->bindParam ( ":_id_plato", $lastIdPlato );
				$sentencia->bindParam ( ":_id_ingredientes", $ingrediente->getId() );
				$sentencia->bindParam ( ":_cantidad", $ingrediente->getCantidad() );
				echo "cantidad: ".$ingrediente->getCantidad();
				
				if ($sentencia->execute ()) {
					$exito = true;
				}
			}
			
			
			$this->disconnectBD ();
		} catch ( PDOException $e ) {
			$exito=false;
			throw $e;
		}
		
		return $exito;
	}
	public function consult() {
		$arrReceta = array ();
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
	
	public function consultRecetaId() {
		$arrReceta = array ();
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