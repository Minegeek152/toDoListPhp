<?php 

class MembreGateway{

	private $con;

	function __construct(Connection $con){
		$this->con=$con;
	}
}

?>