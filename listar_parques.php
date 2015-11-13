<?php

require('configs/include.php');

class c_listar_parques extends super_controller {
	
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
		$this->engine->display('listar_parques.tpl');
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
	

}

$call = new c_listar_parques();
$call->run();

?>