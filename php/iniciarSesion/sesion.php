<!DOCTYPE html>
<html>
<head>
<title>sesion</title>
</head>
<body>
<?php
		    session_start();
			
			if(isset($_SESSION['u_correo'])){
				header("location: ../../admin/indexAdmin.php");
				
				echo"<a href='../iniciarSesion/cerrar_sesion.php' >Cerrar Sesion</a>";
			}
			else{
				header("location: ../iniciarSesion/iniciarSesion.php");
			}
		
		?>
</body>
</html>