<?php
 
class parque extends object_standard
{
	//attributes
	protected $codigo;
	protected $nombre;
	protected $municipio;
	protected $nivel;

	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("codigo" => array(), "nombre" => array(), "municipio" => array(), "nivel" => array()); 
	}

	public function primary_key()
	{
		return array("codigo");
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