<?php 

	/* Inicializar las librerias */
	require_once 'config/config.php';
	//Autoload
	spl_autoload_register(function($nombreClass){
		require_once 'library/' .$nombreClass. '.php';
	});
?>