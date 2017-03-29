<?php
	class Usuario{
		//Variables
		
		private $nombre;
		private $contrasena;
		private $correo;
		private $rol;

		//Inicializar las variables
		public function inicializar($nombre,$contrasena,$correo,$rol){
			$this->nombre=$nombre;
			$this->contrasena=$contrasena;
			$this->correo=$correo;
			$this->rol=$rol;
		}

		//Conectar con la base de datos
		public function conectarBD(){
			$con=mysqli_connect("localhost","root","","bumhi") or
			die("Problemas con la conexion a la base de datos");
			return $con;
		}

		

		//Listar los datos de la tabla usuarios
		public function listarDatos(){
			$con=$this->conectarBD();
			$registros = mysqli_query($con,"SELECT * FROM usuarios")
			or die(mysql_error($con));
			
			 echo "<table class='striped centered responsive-table'>";
							echo"<thead>";
                            echo"<tr>";
                                echo"<th data-field='id'>Nombre</th>";
                                echo"<th data-field='name'>Correo</th>";
                                echo"<th data-field='price'>Rol</th>";
                                echo"<th data-field='acciones'>Acciones</th>";
                           echo" </tr>";
                           echo" </thead>";

                            echo"<tbody>";
			
			while($reg=mysqli_fetch_array($registros)){
				
				echo "<tr><td>".$reg['nombre']."</td>";
				echo "<td>".$reg['correo']."</td>";
				echo "<td>".$reg['rol']."</td>";
				echo'<form class="col s12" action="../php/CtrlUsuarios.php" method="post">';
			    echo"<td><button   value='".$reg['clave']."' name='clave'
				title='Borrar' class='btn-floating btn-flat waves-effect waves-light blue-grey'>
				    <i class='small material-icons'>delete</i>
				</button></td>";
				echo"</form>";
				
				echo'<form class="col s12" action="../php/CtrlUsuarios.php" method="post">';
				echo"<td><button  value='".$reg['clave']."' name='modi'
				title='Editar'  class='btn-floating btn-flat waves-effect waves-light blue-grey' >
				    <i class='tiny material-icons'>mode_edit</i>
			    </button></td>";
                echo"</form>";
				
				echo"</tr>";
				
			}   echo"</tbody></table>";
			
		}

		//Insertar un nuevo usuario en la base de datos
		public function ingresarUsuario(){
			$con=$this->conectarBD();
			$con=mysqli_query($con,"INSERT INTO usuarios(nombre,contrasena,correo,rol) values 
			('$this->nombre','$this->contrasena','$this->correo','$this->rol')");
			
			if($resultado = mysqli_fetch_array($con)){
									
									header("location: ../admin/usuarios.php");
									//echo"bien";
									
								}
								else{
									header("location: ../admin/usuarios.php");
									//echo"mal";
								}
			
		}
		
		
		public function borrarUsuario($clave){
			$con=$this->conectarBD();
			$registros=mysqli_query($con, "select * from usuarios 
			where clave='$clave'") or 
			die("Problemas en el select:".mysqli_error($con));
			if ($reg=mysqli_fetch_array($registros)){
				mysqli_query($con,"delete from usuarios where clave='$clave'") or 
				die("Problemas en el select:".mysqli_error($con));
				//echo "Se efectuo el borrado del alumno con dicho mail.";
				header("location: ../admin/usuarios.php");
			}else{
				echo "no existe clave.";
			}
		}
		
		//Buscar alumno en la base de datos por su correo para modificarlo
		public function modificarUsuario($clave){
			$con=$this->conectarBD();
			$registros=mysqli_query($con,"select clave from usuarios
									where clave='$clave'") or
			die("Problemas en el select:".mysqli_error($con));
			if ($reg=mysqli_fetch_array($registros)){
				echo '<form action="../php/CtrlUsuarios.php" method="post">
						INGRESE NOMBRE:
						<input type="text" name="nombreNuevo" value="'.$reg['nombre'].'">
						<br>
						<input type="hidden" name="nombreViejo" value="'.$reg['nombre'].'">
						
						INGRESE CORREO:
						<input type="text" name="correoNuevo" value="'.$reg['correo'].'">
						<br>
						<input type="hidden" name="correoViejo" value="'.$reg['correo'].'">
						
						INGRESE CONTRASEÑA:
						<input type="text" name="contrasenaNuevo" value="'.$reg['contrasena'].'">
						<br>
						<input type="hidden" name="contrasenaViejo" value="'.$reg['contrasena'].'">
						
						INGRESE ROL:
						<input type="text" name="rolNuevo" value="'.$reg['rol'].'">
						<br>
						<input type="hidden" name="rolViejo" value="'.$reg['rol'].'">
						
						<input type="submit" name="opcion1" value="Modificar">
						</form>';	
			}else{
				echo "No existe ";
			}

		}
		
		//Modificar el correo del alumno 
		public function modificarUsuario2($nombreNuevo,$nombreViejo,$correoNuevo,$correoViejo,
		                           $contrasenaNuevo,$contrasenaViejo,$rolNuevo,$rolViejo){
			$con=$this->conectarBD();
			$registros=mysqli_query($con,"update usuarios
				set  nombre='$nombreNuevo',correo='$correoNuevo',contrasena='$contrasenaNuevo',
				     rol='$rolNuevo'
				where mail='$mailViejo'  ,nombre='$nombreViejo' ,correo='correoViejo',
				      contrasena='$contrasenaViejo', rol='$rolViejo' ")
				or die(mysqli_error($con));
				echo "usuario modificado";
		}

		//Cerrar la conexion a la base de datos
		public function cerrarConexion(){
			$con=$this->conectarBD();
			mysqli_close($con);
		}
	} 
 ?>