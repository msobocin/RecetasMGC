<?php
/**
 * @author Michal
 * @author Grace
 * @author Carlo
 */

class BD {
	protected  $_link;
	
	public function __construct(){
// 		$this->_connectBD();
	}
	
	public function connectBD() {
		try{
			$this->_link = new PDO("mysql:host=localhost;dbname=recetasmgc", "root", "secret");
		
			$this->_link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch (PDOException $e){
			throw  $e;
		}
		
	}
	
	public function disconnectBD() {
		//mysqli::close();
		try {
			$this->_link = null;
		} catch (Exception $e) {
			throw $e;
		}
		
	}
	
// 	public function __getLink(){
// 		return $this->_link;
// 	}
}

?>