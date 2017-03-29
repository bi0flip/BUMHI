<?php
session_start();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

include("conexionBD.php");

$proceso = $conexion->query("SELECT * FROM usuarios 
                            WHERE correo='$correo' 
                                AND contrasena='$contrasena'");
								
								if($resultado = mysqli_fetch_array($proceso)){
									$_SESSION['u_correo'] = $correo;
									header("location: sesion.php");
									//echo"bien";
									
								}
								else{
									header("location: ../iniciarSesion/iniciarSesion.php");
									//echo"mal";
								}

?>
