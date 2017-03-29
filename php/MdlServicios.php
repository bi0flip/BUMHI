<?php /**
* 
*/
class MdlServicios{
	//Variables
	private $nombreServicio;
	private $Museos_clave_museo;
	private $Servicios_claveServicios;
	private $descripcion;
	private $costo;
	//Metodos
	//propiedades utilizadas por la entidad servicios
	public function inicializar($nombreServicio){
		$this->nombreServicio=$nombreServicio;
	}

	//Propiedades utilizadas por la entidad detalleservicios
	public function inicializarDetalle($Museos_clave_museo,$Servicios_claveServicios,$descripcion,$costo){
		$this->Museos_clave_museo=$Museos_clave_museo;
		$this->Servicios_claveServicios=$Servicios_claveServicios;
		$this->descripcion=$descripcion;
		$this->costo=$costo;
	}

	//Conexion a la Base de datos
	public function conectarBD(){
			$con=mysqli_connect("localhost","root","","bumhi") or
			die("Problemas con la conexion a la base de datos");
			return $con;
	}

	//Listado de los servicios almacenados en la base de datos
	public function listarServicios(){
		$con=$this->conectarBD();
		$registros = mysqli_query($con,"SELECT * FROM servicios")or die(mysql_error($con));
		echo'<table class="striped centered responsive-table">
            	<thead>
                    <tr>
                        <th data-field="nombre">Nombre</th>
                        <th data-field="acciones">Acciones</th>
                    </tr>
                </thead>';
           echo '<tbody>';
           		while($reg=mysqli_fetch_array($registros)){
                    echo"<tr><td>".$reg['nombreServicio']."</td>";
                    echo'<td><form class="col s12" action="../php/CtrlServicios.php" id="borra" method="post">';
					echo '<td><button class="btn-floating btn-flat waves-effect waves-light blue-grey " name="clave" value="'.$reg["claveServicios"].'" title="Borrar"><i class="small material-icons">delete</i></button></td>';
					echo "</form></td></tr>";
                }
            echo '</tbody>
           	</table>';
	}

	//Agrega un servicio a la base de datos
	public function agregarServicio(){

		$con=$this->conectarBD();

		$con=mysqli_query($con,"INSERT INTO servicios(nombreServicio) values ('$this->nombreServicio')");
								
			header("location: ../admin/servicios.php");
	}

	//Elimina un servicio de la base de datos
	public function eliminarServicio($clave){
		$con=$this->conectarBD();
			mysqli_query($con,"delete from detalleservicios where Servicios_claveServicios='$clave'");
			mysqli_query($con,"delete from servicios where claveServicios='$clave'") or 
			die("Problemas en el select:".mysqli_error($con));
			header("location: ../admin/servicios.php");
	}

	//Agrega un detalle de servicio a la base de datos
	public function agregarDetalleServicio(){
		$con=$this->conectarBD();
		$con=mysqli_query($con,"INSERT INTO detalleservicios(Museos_clave_museo,Servicios_claveServicios,descripcion,costo) values ($this->Museos_clave_museo,$this->Servicios_claveServicios,'$this->descripcion',$this->costo)");
			header("location: ../admin/museos.php");
	}

	//Lista el detalle de los servicios de cada museo 
	public function listarDetalleServicios($cl){
		$con=$this->conectarBD();
		$regi = mysqli_query($con,"SELECT d.Museos_clave_museo,d.Servicios_claveServicios,s.nombreServicio, d.descripcion, d.costo 
								   FROM detalleservicios d, servicios s
								   WHERE d.Museos_clave_museo = '$cl'
								   AND d.Servicios_claveServicios = s.claveServicios")or die(mysql_error($con));
		echo'<table class="striped centered responsive-table">
            	<thead>
                    <tr>
                        <th data-field="Nombre servicio">Nombre servicio</th>
                        <th data-field="Descripcion">Descripción</th>
                        <th data-field="Costo">Costo</th>
                    </tr>
                </thead>';
           echo '<tbody>';
           		while($reg=mysqli_fetch_array($regi)){
                    echo"<tr><td>".$reg['nombreServicio']."</td>";
                    echo"<td>".$reg['descripcion']."</td>";
                    echo"<td>".$reg['costo']."</td>";
                    echo'<td></tr>';
                }
            echo '</tbody>
           	</table>';
	}

	
}
?>