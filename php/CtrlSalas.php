<?php 
	include('MdlSalas.php');

	$sala = new MdlSalas();

	if ("$_REQUEST[nombre]"==!null){
		
		$sala->inicializar("$_REQUEST[nombre]", $_REQUEST['claveMuseo'], "$_REQUEST[temporal]", "$_REQUEST[fechaInicio]",
		 "$_REQUEST[fechaFin]", "$_REQUEST[descripcion]");
	    $sala->agregarSala();
	
	}else if($_REQUEST['claveSala'] == !null){
		$sala->eliminarSala($_REQUEST['claveSala']);
	}
?>