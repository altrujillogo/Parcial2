<?php
 
class curso extends object_standard
{
	//attributes
	protected $id;
	protected $nombre;
	protected $facultad;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("id" => array(), "nombre" => array(), "facultad" => array()); 
	}
	public function getId()
	{
		return $id;
	}
		public function getNombre()
	{
		return $nombre;
	}

	public function primary_key()
	{
		return array("id");
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