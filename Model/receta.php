<?php

class Receta{
private $_id;
private $_nombre;
private $_ingredientes;
private $_preparacion;
private $_tiempo;

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
	$this->_ingredientes = $ingredientes;
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



}



?>