<?php

	include('MdlUsuarios.php');

	$usuario = new Usuario();

	$usuario->conectarBD();
	
	if($_REQUEST['clave']==!null){
		
		$usuario->borrarUsuario($_REQUEST['clave']);
		
	}else if ("$_REQUEST[nombre]"==!null){
		
		$usuario->inicializar("$_REQUEST[nombre]","$_REQUEST[contrasena]",
							  "$_REQUEST[correo]",$_REQUEST['rol']);
		$usuario->ingresarUsuario();
	
	}else{
		if($_REQUEST['modi']==!null){
			$usuario->modificarUsuario($_REQUEST['clave']);
		}
		
		
		if("$_REQUEST[opcion1]"=="Modificar"){

			$usuario->modificarUsuario2($_REQUEST['nombreNuevo'],$_REQUEST['nombreViejo'],
								   $_REQUEST['correoNuevo'],$_REQUEST['correoViejo'],
								   $_REQUEST['contrasenaNuevo'],$_REQUEST['contrasenaViejo'],
								   $_REQUEST['rolNuevo'],$_REQUEST['rolViejo']
								   );
			
		}
	}

	$usuario->cerrarConexion();
					
?>