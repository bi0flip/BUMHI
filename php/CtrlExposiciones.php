<?php 
	include('MdlExposiciones.php');
	$exposicion = new MdlExposiciones();
	if ("$_REQUEST[nombre]" == !null) {
		$exposicion->inicializar("$_REQUEST[nombre]", $_REQUEST['claveSala'], "$_REQUEST[descripcion]", "$_REQUEST[coleccion]", "$_REQUEST[estado]");
		$exposicion->agregarExposicion();
	}else if($_REQUEST['claveExposicion'] == !null){
		$exposicion->eliminarExposicion($_REQUEST['claveExposicion']);
	}
?>