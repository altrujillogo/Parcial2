<?php
 
class calificacion extends object_standard
{
	//attributes
	protected $parque;
	protected $valor;
	protected $hora;

	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("parque" => array(), "valor" => array(), "hora" => array()); 
	}

	public function primary_key()
	{
		return array("hora");
	}
	
	public function relational_keys($class, $rel_name)
	{
		switch($class)
		{		
		    default:
			break;
		}
	}
}

?>