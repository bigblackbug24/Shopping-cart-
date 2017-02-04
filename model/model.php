<?php
class Model extends PDO {
	
	private $dbHandler;
	
	public function __construct(){
		$this->dbHandler = new PDO('mysql:host='.DBHOST.';dbname='.DATABASENAME, USER, PASS);	
		return $this->dbHandler;
	}
	
	public function getConfig($key){
		$stmt=$this->dbHandler->prepare("select value from settings where field='".$key."'");
		$stmt->execute();
		$output=$stmt->fetch(PDO::FETCH_ASSOC);
		return $output['value'];
	}
	
}

?>