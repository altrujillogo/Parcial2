<?php
 
class matricula extends object_standard
{
	//attributes
	protected $id;
	protected $nota_final;
	protected $curso;
	protected $estudiante;

	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata()
	{
		return array("id" => array(), "nota_final" => array(), "curso" => array("foreign_name" => "c_m","foreign"=>"curso","foreign_attribute"=>"id"), "estudiante" => array("foreign_name" => "e_m","foreign"=>"estudiante","foreign_attribute"=>"id")); 
	}

	public function primary_key()
	{
		return array("id");
	}
	
	public function relational_keys($class, $rel_name)
	{
		switch($class)
		{	
			case "curso":
				switch($rel_name){
					case "c_m":
						return	array("curso");
						break;
				}
			break;
			case "estudiante":
				switch($rel_name){
					case "e_m":
						return	array("estudiante");
						break;
				}
			break;
		    default:
			break;
		}
	}
}

?>