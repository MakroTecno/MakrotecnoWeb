<?php 
	/* 
		Mapear la url ingresada en el navegador
		1 - Controlador
		2 - Metodo
		3 - Parametro
	*/

	class Core 
	{
		protected $controlador = 'Panel';
		protected $metodo = 'index';
		protected $parametros = [];
		public function __construct()
		{
			$url = $this->getUrl();
			//print_r($this->getUrl());
			//Si el archivo existe, la inicial la convierte a mayuscula
			if(file_exists('../app/controllers/' .ucwords($url[0]) .'.php'))
			{
				//Si existe se setea como controlador por defecto
				$this->controlador = ucwords($url[0]);
				unset($url[0]);
			}
			//Requerir el controlador nuevo
			require_once '../app/controllers/' . $this->controlador .'.php';
			$this->controlador = new $this->controlador;

			/* Segunda parte del manejo de la URL que son los metodos, se verifica si un metodo existe */
			if(isset($url[1]))
			{
				if(method_exists($this->controlador, $url[1]))
				{
					$this->metodo = $url[1];
					unset($url[1]);
				}
			}
			//obtener los posibles parametros
			$this->parametros = $url ? array_values($url) : [];
			call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
		}
		public function getUrl()
		{
			//Muestra la url
			if(isset($_GET['url']))
			{
				//Cortar los espacios que tenga hacia la derecha la URL
				$url = rtrim($_GET['url'], '/');
				//Esto nos ayuda a que PHP interprete la variable url como una URL
				$url = filter_var($url, FILTER_SANITIZE_URL);
				//El explode se encarga de partir los strings de "/"
				$url = explode('/', $url);
				return $url;
			}
		}
	}
?>