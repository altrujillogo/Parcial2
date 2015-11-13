<?php

require('configs/include.php');

class c_registrar_parque extends super_controller {
	
	public function display()
	{
		$this->engine->assign('title',$this->gvar['n_index']);
		
		$options['curso']['lvl2']="all";
		$options['estudiante']['lvl2']="all";
		$this->orm->connect();
        $this->orm->read_data(array("curso","estudiante"),$options);


        $cursos=$this->orm->get_objects("curso");
        $estudiantes=$this->orm->get_objects("estudiante");

        $this->engine->assign('cursos',$cursos);
        $this->engine->assign('estudiantes',$estudiantes);

		$this->engine->display('header.tpl');
		$this->engine->display($this->temp_aux);
		$this->engine->display('registrar_parque.tpl');
		$this->engine->display('footer.tpl');

	}
	
	public function run()
	{
		
		try
		{
			if(isset($this->get->option))
			{
				if($this->get->option == 'insert')
				{
					$this->{$this->get->option}();
				}else
				{
					throw_exception("Opcion " . $this->get->option . " no disponible");
				}	
				
			}
		}catch(Exception $e){
			$this->error = 1;
			$this->msg_warning=$e->getMessage();
			$this->temp_aux = 'message.tpl';
			$this->engine->assign('type_warning',$this->type_warning);
			$this->engine->assign('msg_warning',$this->msg_warning);
		}
		
		$this->display();
		
		
	}
	
	public function insert()
	{
		$parque = new parque($this->post);
		if(is_empty($parque->get('codigo')))
        {throw_exception("Error: Llenar el codigo");}
		
		if($parque->get('nivel')<>"alto" AND $parque->get('nivel')<>"bajo")
		{throw_exception("Error: nivel no valido");}

		if($parque->get('municipio')<>"medellin" AND $parque->get('municipio')<>"rionegro" AND $parque->get('municipio')<>"la estrella" AND $parque->get('municipio')<>"copacabana" AND $parque->get('municipio')<>"guatape" )
		{throw_exception("Error: municipio no valido");}


		$this->orm->connect();
        $this->orm->insert_data("normal",$parque);
        $this->orm->close();
		
		$this->type_warning = "success";
        $this->msg_warning = "Parque insertado correctamente";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);
	}
}

$call = new c_registrar_parque();
$call->run();

?>