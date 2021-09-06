<?php 

	class Controller 
	{
		public function modelo($modelo)
		{
			//Requiere un modelo y luego lo instancia
			require_once '../app/models/' .$modelo. '.php';
			return new $modelo();
		}
		public function vista($vista, $datos = '')
		{
			//Primero valida si existe una vista, luego la trae
			if(file_exists('../app/views/' .$vista. '.php'))
			{
				require_once '../app/views/' .$vista. '.php';
			}else {
				die('La vista no existe');
			}
		}
	}

?>