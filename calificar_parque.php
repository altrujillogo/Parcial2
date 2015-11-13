<?php

require('configs/include.php');

class c_calificar_parque extends super_controller {
	
	public function display()
	{
		$this->engine->assign('title',$this->gvar['n_index']);
		
		$options['parque']['lvl2']="all";
		$this->orm->connect();
        $this->orm->read_data(array("parque"),$options);


        $parques=$this->orm->get_objects("parque");
        

        $this->engine->assign('parques',$parques);


		$this->engine->display('header.tpl');
		$this->engine->display($this->temp_aux);
		$this->engine->display('calificar_parque.tpl');
		$this->engine->display('footer.tpl');

	}

	public function calificar()
	{
		
		$this->post->hora=date("y-m-d");
		$calificacion = new calificacion($this->post);
		
		
		// if(is_empty($parque->get('codigo')))
  //       {throw_exception("Error: Llenar el codigo");}
		
		// if($parque->get('nivel')<>"alto" AND $parque->get('nivel')<>"bajo")
		// {throw_exception("Error: nivel no valido");}

		// if($parque->get('municipio')<>"medellin" AND $parque->get('municipio')<>"rionegro" AND $parque->get('municipio')<>"la estrella" AND $parque->get('municipio')<>"copacabana" AND $parque->get('municipio')<>"guatape" )
		// {throw_exception("Error: municipio no valido");}


		$this->orm->connect();
        $this->orm->insert_data("normal",$calificacion);
        $this->orm->close();
		
		$this->type_warning = "success";
        $this->msg_warning = "Calificacion insertada correctamente";
        
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);
	}
	
	public function run()
	{
		
		try
		{
			if(isset($this->get->option))
			{
				if($this->get->option == 'calificar')
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
	

}

$call = new c_calificar_parque();
$call->run();

?>