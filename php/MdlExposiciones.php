<?php
	class MdlExposiciones{
		private $nombreExposicion;
		private $Salas_claveSal;
		private $descripcion;
		private $coleccion;
		private $estado;

		public function inicializar($nombreExposicion, $Salas_claveSala, $descripcion, $coleccion, $estado){
			$this->nombreExposicion=$nombreExposicion;
			$this->Salas_claveSala=$Salas_claveSala;
			$this->descripcion=$descripcion;
			$this->coleccion=$coleccion;
			$this->estado=$estado;
		}

		public function conectarBD(){
			$con=mysqli_connect("localhost","root","","bumhi") or
			die("Problemas con la conexion a la base de datos");
			return $con;
		}
		public function listarExposicion($clave){
			$con=$this->conectarBD();
			$registros = mysqli_query($con,"SELECT c.claveExposicion, c.nombreExposicion, c.descripcion, c.coleccion, c.estado
										    FROM cat_exposiciones c, salas s
											WHERE  s.Museos_claveMuseo= '$clave'
											AND s.claveSala = c.Salas_claveSala")or die(mysql_error($con));
			echo'<table class="striped centered responsive-table">
		        	<thead>
		                <tr>
		                    <th data-field="nombre">Nombre exposición</th>
							<th data-field="descripcion">Descripción</th>
		                    <th data-field="coleccion">Colección</th>
		                    <th data-field="estado">Estado</th>
		                    <th data-field="acciones">Acciones</th>
		                </tr>
		            </thead>';
		       echo '<tbody>';
		       		while($reg=mysqli_fetch_array($registros)){
		                echo"<tr><td>".$reg['nombreExposicion']."</td>";
		                echo"<td>".$reg['descripcion']."</td>";
		                echo"<td>".$reg['coleccion']."</td>";
		                echo"<td>".$reg['estado']."</td>";
		                echo'<td><form class="col s12" action="../php/CtrlServicios.php" id="borra" method="post">';
						echo '<td><button class="btn-floating btn-flat waves-effect waves-light blue-grey " name="clave" value="'.$reg["claveExposicion"].'" title="Borrar"><i class="small material-icons">delete</i></button></td>';
						echo "</form></td></tr>";
		            }
		        echo'</tbody>
		       	</table>';
		}
		public function agregarExposicion(){
			$con=$this->conectarBD();
			$con=mysqli_query($con,"INSERT INTO cat_exposiciones(nombreExposicion, Salas_claveSala, descripcion, coleccion, estado) values ('$this->nombreExposicion', $this->Salas_claveSala, '$this->descripcion', '$this->coleccion', '$this->estado')");
			header("location: ../admin/museos.php");
		}
		public function eliminarExposicion($clave){
			mysqli_query($con,"delete from cat_exposiciones where claveExposicion='$clave'") or 
			die("Problemas al borrar: ".mysqli_error($con));
			header("location: ../admin/servicios.php");
		}
		public function cerrarConexion(){
			$con=$this->conectarBD();
			mysqli_close($con);
		}
	}
?>