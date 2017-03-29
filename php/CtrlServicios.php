<?php 
	include('MdlServicios.php');

	$servicios = new MdlServicios();

	
	if($_REQUEST['clave']==!null){
		
		$servicios->eliminarServicio($_REQUEST['clave']);
		
	}else if ("$_REQUEST[servicio]"==!null){
		
		$servicios->inicializar("$_REQUEST[servicio]");
	    $servicios->agregarServicio();
	
	}else if($_REQUEST['claveMuseo']==!null){
		$servicios->inicializarDetalle($_REQUEST['claveMuseo'],$_REQUEST['serv'],"$_REQUEST[descripcion]",$_REQUEST['costo']);
		$servicios->agregarDetalleServicio();
	}
 ?>