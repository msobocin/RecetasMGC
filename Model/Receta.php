<?php
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

class Receta {
	private $_id;
	private $_nombre;
	private $_descripcion;
	private $_ingredientes=array();
	private $_preparacion;
	private $_tiempo;
	private $_personas;
	
	public function setAll($id=0,$nombre="",$descripcion="",$ingredinetes=array(),$preparacion="",$tiempo=0,$personas=0){
		$this->_id=$id;
		$this->_nombre=$nombre;
		$this->_descripcion=$descripcion;
		$this->_ingredientes=$ingredinetes;
		$this->_preparacion=$preparacion;
		$this->_tiempo=$tiempo;
		$this->_personas=$personas;
	}
	
	public function getDescripcion(){
		return $this->_descripcion;
	}
	public function setDescripcion($descripcion){
		$this->_descripcion=$descripcion;
		return $this;
	}
	public function getId() {
		return $this->_id;
	}
	public function setId($id) {
		$this->_id = $id;
		return $this;
	}
	public function getNombre() {
		return $this->_nombre;
	}
	public function setNombre($nombre) {
		$this->_nombre = $nombre;
		return $this;
	}
	public function getIngredientes() {
		return $this->_ingredientes;
	}
	public function setIngredientes($ingredientes) {
		array_push($this->_ingredientes, $ingredientes);
		return $this;
	}
	public function getPreparacion() {
		return $this->_preparacion;
	}
	public function set_preparacion($preparacion) {
		$this->_preparacion = $preparacion;
		return $this;
	}
	public function getTiempo() {
		return $this->_tiempo;
	}
	public function setTiempo($tiempo) {
		$this->_tiempo = $tiempo;
		return $this;
	}
	public function getPersonas() {
		return $this->_personas;
	}
	public function setPersonas($personas) {
		$this->_personas = $personas;
		return $this;
	}
}

?>