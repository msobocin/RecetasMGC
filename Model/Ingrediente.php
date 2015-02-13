<?php
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

class Ingrediente {
	private $_id;
	private $_ingrediente;
	private $_unidad;
	private $_cantidad;
	
	public function setAll($id=0,$nombre="",$unidad="",$cantidad="") {
		$this->_id=$id;
		$this->_nombre=$nombre;
		$this->_unidad=$unidad;
		$this->_cantidad=$cantidad;
	}
	
	public function getId(){
		return $this->_id;
	}
	
	public function setId($id){
		$this->_id = $id;
	}
	
	public function getIngrediente(){
		return $this->_ingrediente;
	}
	
	public function setIngrediente($ingrediente){
		$this->_ingrediente = $ingrediente;
	}
	
	public function getUnidad(){
		return $this->_unidad;
	}
	
	public function setUnidad($unidad){
		$this->_unidad = $unidad;
	}
	
	public function getCantidad(){
		return $this->_cantidad;
	}
	
	public function setCantidad($cantidad){
		$this->_cantidad = $cantidad;
	}
	
	
}

?>