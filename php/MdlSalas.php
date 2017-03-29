<?php
/**
* 
*/
class MdlSalas{
	//Variables
	private $nombreSala;
	private $museo;
	private $Museos_claveMuseo;
	private $temporal;
	private $fechaInicio;
	private $fechaFinal;
	private $descripcion;

	//Metododos
	public function inicializar($nombreSala, $Museos_claveMuseo,
								$temporal, $fechaInicio, $fechaFinal, $descripcion){
		$this->nombreSala=$nombreSala;
		$this->Museos_claveMuseo=$Museos_claveMuseo;
		$this->temporal=$temporal;
		$this->fechaInicio=$fechaInicio;
		$this->fechaFinal=$fechaFinal;
		$this->descripcion=$descripcion;
	}

	public function conectarBD(){
		$con=mysqli_connect("localhost","root","","bumhi") or
			die("Problemas con la conexion a la base de datos");
			return $con;
	}

	public function listarSalas($clave){
		$con=$this->conectarBD();
		$registros = mysqli_query($con,"SELECT *
										FROM salas
										where Museos_claveMuseo = '$clave'")or die(mysql_error($con));
		echo '<table class="striped centered responsive-table">
            <thead>
                <tr>
                    <th data-field="nombre">Nombre</th>
                    <th data-field="temp">Temporal</th>
                    <th data-field="ini">Fecha inicio</th>
                    <th data-field="fin">Fecha final</th>
                    <th data-field="des">Descripcion</th>
                    <th data-field="acciones">Acciones</th>
                </tr>
            </thead>
            <tbody>';
	            while($reg=mysqli_fetch_array($registros)){
	                echo '<tr>
	                    <td>'.$reg['nombreSala'].'</td>';
	                    echo'<td>'.$reg['temporal'].'</td>';
	                    echo'<td>'.$reg['fechaInicio'].'</td>';
	                    echo'<td>'.$reg['fechaFinal'].'</td>';
	                    echo'<td>'.$reg['descripcion'].'</td>';
	                    echo'<td><form class="col s12" action="../php/CtrlSalas.php" method="post">';
						echo'<td><button class="btn-floating btn-flat waves-effect waves-light blue-grey " name="claveSala" value="'.$reg["claveSala"].'" title="Borrar"><i class="small material-icons">delete</i></button></td></form>';
						echo'<td><form class="col s12" action="../admin/formExposicion.php" method="post">';
						echo'<td><button class="btn-floating btn-flat waves-effect waves-light blue-grey " name="claveSala" value="'.$reg["claveSala"].'" title="Agregar exposición"><i class="small material-icons">add</i></button></td></form></tr>';
	            }
	        echo'</tbody>
        </table>';
	}

	public function agregarSala(){
		$con=$this->conectarBD();

		$con=mysqli_query($con,"INSERT INTO salas(nombreSala, Museos_claveMuseo, temporal, fechaInicio, fechaFinal, descripcion) values ('$this->nombreSala', $this->Museos_claveMuseo, '$this->temporal', '$this->fechaInicio', '$this->fechaFinal', '$this->descripcion')");
		
		header("location: ../admin/museos.php");
	}

	public function eliminarSala($clave){
		$con=$this->conectarBD();
		mysqli_query($con,"delete from cat_exposiciones where Salas_claveSala='$clave'");
		mysqli_query($con,"delete from salas where claveSala='$clave'") or 
		die("Problemas en el select:".mysqli_error($con));
		header("location: ../admin/museos.php");
		
	}

	public function cerrarConexion(){
		$con=$this->conectarBD();
		mysqli_close($con);
	}
}
?>