<?php

require('configs/include.php');

class c_promedio_calificaciones extends super_controller {
	
	public function display()
	{
		$this->engine->assign('title',$this->gvar['n_index']);
		
		$options['calificacion']['lvl2']="alto";
		$this->orm->connect();
        $this->orm->read_data(array("calificacion"),$options);


        $calificaciones=$this->orm->get_objects("calificacion");
        $total=0;
        $suma=0;
        print_r($calificaciones);
        foreach ($calificaciones as $cal) {
        	$suma=$suma + $calificaciones->get('valor');
        	$total=$total+1;
        }

        $this->engine->assign('promedio',$suma/$total);


		$this->engine->display('header.tpl');
		$this->engine->display($this->temp_aux);
		$this->engine->display('promedio_calificaciones.tpl');
		$this->engine->display('footer.tpl');

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

$call = new c_promedio_calificaciones();
$call->run();

?>