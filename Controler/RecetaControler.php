<?php

/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

require_once 'Controler/BD.php';
require_once 'Model/Receta.php';
require_once 'Model/Ingrediente.php';

class RecetaControler extends BD {
	public function save($receta) {
		$exito = false;
		try {
			$this->connectBD ();
			$sentencia = $this->_link->prepare ( "INSERT INTO `recetasmgc`.`platos` (`nombre`,`descripcion`,`preparacion`,`tiempo`,`cuantas_personas`,`imagen`) VALUES (:_nombre, :_descripcion, :_preparacion, :_tiempo,:_personas, :_imagen)" );
			$sentencia->bindParam ( ":_nombre", $receta->getNombre () );
			$sentencia->bindParam ( ":_descripcion", $receta->getDescripcion() );
			$sentencia->bindParam ( ":_preparacion", $receta->getPreparacion() );
			$sentencia->bindParam ( ":_tiempo", $receta->getTiempo() );
			$sentencia->bindParam(":_personas", $receta->getPersonas());
			$sentencia->bindParam(":_imagen", $receta->getImagen(),PDO::PARAM_LOB);
			
			if ($sentencia->execute ()) {
				$exito = true;
			}
			$lastIdPlato = $this->_link->lastInsertId();
			
			foreach ($receta->getIngredientes() as $ingrediente) {
				$sentencia = $this->_link->prepare( "INSERT INTO `recetasmgc`.`recetas` (`id_plato`,`id_ingredientes`,`cantidad`) VALUES (:_id_plato, :_id_ingredientes, :_cantidad)");
				$sentencia->bindParam ( ":_id_plato", $lastIdPlato );
				$sentencia->bindParam ( ":_id_ingredientes", $ingrediente->getId() );
				$sentencia->bindParam ( ":_cantidad", $ingrediente->getCantidad() );
				
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
			$result = $this->_link->query ( "SELECT `id` as _id, `nombre` as _nombre, `descripcion` as _descripcion, `tiempo` as _tiempo, `cuantas_personas` as _personas, `imagen` as _imagen FROM `platos`" );
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
	
	public function consultRecetaId($id) {
		$receta=null;
		try {
			$this->connectBD ();
			$result = $this->_link->query ( "SELECT `id` as _id, `nombre` as _nombre, `descripcion` as _descripcion, `preparacion` as _preparacion, `tiempo` as _tiempo, `cuantas_personas` as _personas, `imagen` as _imagen FROM `platos` where id=".$id );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'Receta' );
			$receta = $result->fetch ();
			
			$result = $this->_link->query ( "SELECT recetas.`id_ingredientes` as _id, recetas.`cantidad`as _cantidad, ingredientes.ingrediente as _ingrediente, ingredientes.unidad as _unidad FROM `recetas` inner join ingredientes on recetas.id_ingredientes = ingredientes.id WHERE recetas.id_plato = ".$id );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'Ingrediente' );
			
			$arrIngredientes = array();
			while ( $ingrediente = $result->fetch () ) {
				array_push ( $arrIngredientes, $ingrediente);
			}
			$receta->setIngredientes($arrIngredientes);
				
			$this->disconnectBD ();
		} catch ( Exception $e ) {
			throw $e;
		}
		return $receta;
	}
}

?>