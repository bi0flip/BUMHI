<?php
	class MdlMuseos{
		//Variables
		
		private $calle;
		private $Cat_Delegaciones_claveDele;
		private $claveMuseo;
		private $cuota;
		private $descripcion;
		private $horarioApertura;
		private $horarioCierre;
		private $nombreMuseo;
		private $numero;
		private $numeroTelefono;
		private $tipo;
		private $Usuarios_clave;
		
		//Inicializar las variables
		public function inicializar($claveMuseo,
									$nombreMuseo,
									$tipo,
									$Cat_Delegaciones_claveDele,
		                            $numeroTelefono,
									$calle,
									$numero,
									$horarioApertura,
									$horarioCierre,
									$cuota,
									$descripcion
									){						
			
			$this->claveMuseo=$claveMuseo;
			$this->nombreMuseo=$nombreMuseo;
			$this->tipo=$tipo;
			$this->Cat_Delegaciones_claveDele=$Cat_Delegaciones_claveDele;
			$this->numeroTelefono=$numeroTelefono;
			$this->calle=$calle;
			$this->numero=$numero;			
			$this->horarioApertura=$horarioApertura;
			$this->horarioCierre=$horarioCierre;
			$this->cuota=$cuota;
			$this->descripcion=$descripcion;
			
			
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
			$registros = mysqli_query($con,"SELECT * FROM museos m, cat_delegaciones c
                                       			where c.claveDele = m.Cat_Delegaciones_claveDele")
			or die(mysql_error($con));
			
			 echo "<table class='striped centered responsive-table'>
							<thead>
                            <tr>
                                <th data-field='id'>Nombre</th>
								<th data-field='id'>Descripcion</th>
								<th data-field='id'>Delegacion</th>
                                <th data-field='acciones'>Acciones</th>
                            </tr>
                            </thead>

                            <tbody>";
			
			while($reg=mysqli_fetch_array($registros)){
				
				echo "<tr><td>".$reg['nombreMuseo']."</td>";
				echo "<td>".$reg['descripcion']."</td>";
				echo "<td>".$reg['nombreDelegacion']."</td>";
				
				
				echo'<form class="col s12" action="../php/CtrlMuseos.php" method="post">';
			    echo"<td><button   value='".$reg['claveMuseo']."' name='claveMuseo'
				title='Borrar' class='btn-floating btn-flat waves-effect waves-light blue-grey'>
				    <i class='small material-icons'>delete</i>
				</button></td>";
				echo"</form>";
				
				echo'<form class="col s12" action="formMuseoM.php" method="post">';
				echo"<td><button  value='".$reg['nombreMuseo']."' name='nombreMuseo'
				title='Editar'  class='btn-floating btn-flat waves-effect waves-light blue-grey' >
				    <i class='tiny material-icons'>mode_edit</i>
			    </button></td>";
                echo"</form>";

                echo'<form class="col s12" action="../admin/museoDetalle.php" method="post">';
				echo"<td><button  value='".$reg['claveMuseo']."' name='clave'
				title='Agregar'  class='btn-floating btn-flat waves-effect waves-light blue-grey' >
				    <i class='tiny material-icons'>add</i>
			    </button></td>";
                echo"</form></tr>";
			}  
			echo" </tbody>";
			echo"</table>";
		}

		public function listarDelegaciones(){
								$con=$this->conectarBD();
								$registros = mysqli_query($con,"SELECT claveDele,nombreDelegacion FROM cat_delegaciones")
								or die(mysql_error($con));
								
						
						
						while($rege=mysqli_fetch_array($registros)){

						echo "<option value=".$rege['claveDele']." >".$rege['nombreDelegacion']."</option>";
							}  
						
					
		}
		
        public function ingresarMuseo(){
			$con=$this->conectarBD();
			$registros=mysqli_query($con, "select * from museos m,cat_delegaciones c
												where m.Cat_Delegaciones_claveDele=c.claveDele") or 
			die("Problemas en el select:".mysqli_error($con));
			 
			if($resultado = mysqli_fetch_array($registros)){
									$con=mysqli_query($con,"INSERT INTO museos(
									
													   nombreMuseo,
													   tipo,
													   Cat_Delegaciones_claveDele,													   
													   numeroTelefono,
													   calle,
													   numero,
													   horarioApertura,
													   horarioCierre,
													   cuota,
													   descripcion
													   
													   
		                                               
													   ) values (

													    '$this->nombreMuseo',
													    '$this->tipo',
													    '$this->Cat_Delegaciones_claveDele',
														'$this->numeroTelefono',
														'$this->calle',
														'$this->numero',
														'$this->horarioApertura',
														'$this->horarioCierre',
														'$this->cuota',
														'$this->descripcion'
															)"
														)or die("Problemas en el select 2:".mysqli_error());
									header("location: ../admin/museos.php");
									//echo"bien";
									
								}
								else{
									//header("location: museos.php");
									echo"mal";
								}
			
		}
		
		
		
		public function borrarMuseo($claveMuseo){
			$con=$this->conectarBD();
				mysqli_query($con,"delete from detalleservicios where Museos_clave_museo='$claveMuseo'");
				mysqli_query($con,"delete from museos where claveMuseo='$claveMuseo'");
				//echo "Se efectuo el borrado del alumno con dicho mail.";
				header("location: ../admin/museos.php");
		}
		
		//Buscar usuario en la base de datos por su correo para modificarlo
		public function modificarMuseo($nombreMuseo){
			$con=$this->conectarBD();

			$registros=mysqli_query($con,"select * from museos 
									where nombreMuseo='$nombreMuseo'") or
			die("Problemas en el select:".mysqli_error($con));
			if ($reg=mysqli_fetch_array($registros)){
				echo 
			'<form class="col s12" action="../php/CtrlMuseos.php" method="post">
                    <div class="row">
					    
                        <div class="input-field col s8 offset-s2">
						<input type="hidden" name="nombreViejo" value="'.$reg['nombreMuseo'].'">
                            <input id="nombreMuseo" type="text" class="validate" name="nombreNuevo" 
							value="'.$reg['nombreMuseo'].'">
                            <label for="nombreMuseo">Nombre</label>
                        </div>
						
						<div class="input-field col s6 offset-s3">
                                <label for="Delegacion">Sala</label>
								<br>
								<br>
								<select class="browser-default" name="Cat_Delegaciones_claveDeleNuevo" >
                    	        <option disabled selected>-Seleccione-</option>';
						
						$con=$con=$this->conectarBD();
						$registross = mysqli_query($con,"SELECT claveDele,nombreDelegacion FROM cat_delegaciones")
						or die(mysqli_error());
						while($rege=mysqli_fetch_array($registross)){

						echo "<option value=".$rege['claveDele']." >".$rege['nombreDelegacion']."</option>";
						}
						
					echo'</select>
					</div>
                        <div class="input-field col s4 offset-s2">
						<input type="hidden" name="tipoViejo" value="'.$reg['tipo'].'">
                            <input id="tipo" type="text" class="validate" name="tipoNuevo" 
							value="'.$reg['tipo'].'">
                            <label for="tipo">Tipo</label>
                        </div>
						
						
                        <div class="input-field col s4">
						<input type="hidden" name="numeroTelefonoViejo" value="'.$reg['numeroTelefono'].'">
                            <input id="numeroTelefono" type="number" class="validate" name="numeroTelefonoNuevo" 
							value="'.$reg['numeroTelefono'].'">
                            <label for="numeroTelefono">Numero de telefono</label>
                        </div>
                        <div class="input-field col s4 offset-s2">
						<input type="hidden" name="calleViejo" value="'.$reg['calle'].'">
                            <input id="calle" type="text" class="validate" name="calleNuevo" 
							value="'.$reg['calle'].'">
                            <label for="calle">Calle</label>
                        </div>
                        <div class="input-field col s4">
						<input type="hidden" name="numeroViejo" value="'.$reg['numero'].'">
                            <input id="numero" type="number" class="validate" name="numeroNuevo" 
							value="'.$reg['numero'].'">
                            <label for="numero">Numero</label>
                        </div>
					
					<div class="input-field col s4 offset-s2">
						<label for="horarioApertura">Hora Apertura</label>
						<input type="hidden" name="horarioAperturaViejo" value="'.$reg['horarioApertura'].'">
                        <input id="horarioApertura" type="text" class="validate" name="horarioAperturaNuevo" 
							value="'.$reg['horarioApertura'].'">
                    </div>
                    <div class="input-field col s4 ">
					<label for="horarioCierre">Hora Cierre</label>
                        <input type="hidden" name="horarioCierreViejo" value="'.$reg['horarioCierre'].'">
                        <input id="horarioCierre" type="text" class="validate" name="horarioCierreNuevo" 
							value="'.$reg['horarioCierre'].'">
                    </div>
                    <div class="input-field col s8 offset-s2">
					     <input type="hidden" name="cuotaViejo" value="'.$reg['cuota'].'">
                        <input id="cuota" type="number" class="validate" name="cuotaNuevo" 
							value="'.$reg['cuota'].'">
                        <label for="cuota">Cuota</label>
                    </div>
                    <div class="input-field col s8 offset-s2">
                    Descripción
					<input type="hidden" name="descripcionViejo" value="'.$reg['descripcion'].'">
                        <input id="descripcion" class="materialize-textarea" name="descripcionNuevo" 
							value="'.$reg['descripcion'].'"></input>
                        
                    </div>
					
                    <div class="col offset-s5">
								
                                    <button class="btn waves-effect waves-light blue-grey" type="submit" name="opcion1" value="Modificar">Registrar
                                        <i class="material-icons right">send</i>
                                    </button>
                </div>
            </form><br>';
            echo '<br><div class="col offset-s5">
                
                <a class="btn waves-effect waves-light blue-grey" href="../admin/museos.php">Cancelar
                    <i class="material-icons right">close</i>
                </a>
            </div>';
			}

		}
		
		
		
		
		public function modificarMuseo2($nombreNuevo,$nombreViejo,
										$Cat_Delegaciones_claveDeleNuevo,
										$tipoNuevo,$tipoViejo,
										$numeroTelefonoNuevo,$numeroTelefonoViejo,
										$calleNuevo,$calleViejo,
										$numeroNuevo,$numeroViejo,
										$horarioAperturaNuevo,$horarioAperturaViejo,
										$horarioCierreNuevo,$horarioCierreViejo,
										$cuotaNuevo,$cuotaViejo,
										$descripcionNuevo,$descripcionViejo){
											
			$con=$this->conectarBD();
			$registros=mysqli_query($con,"
			update museos
				set  nombreMuseo='$nombreNuevo',
				     Cat_Delegaciones_claveDele='$Cat_Delegaciones_claveDeleNuevo',
					 tipo='$tipoNuevo',
					 numeroTelefono='$numeroTelefonoNuevo',
					 calle='$calleNuevo',
					 numero='$numeroNuevo',
					 horarioApertura='$horarioAperturaNuevo',
					 horarioCierre='$horarioCierreNuevo',
					 cuota='$cuotaNuevo',
					 descripcion='$descripcionNuevo'
				    
				 where nombreMuseo='$nombreViejo'
				       
		    ")
				or die(mysqli_error($con));
				header("location: ../admin/museos.php");
		}
		

		//Cerrar la conexion a la base de datos
		public function cerrarConexion(){
			$con=$this->conectarBD();
			mysqli_close($con);
		}
	} 
 ?>