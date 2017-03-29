<?php

			include('MdlMuseos.php');

			$museo = new MdlMuseos();

			$museo->conectarBD();
			
			if($_REQUEST['claveMuseo']==!null){
				
				$museo->borrarMuseo($_REQUEST['claveMuseo']);
				
			}else if ("$_REQUEST[nombreMuseo]"==!null){
				
				$museo->inicializar("REQUEST[claveMuseo]",
									"$_REQUEST[nombreMuseo]",
				                    "$_REQUEST[tipo]",
									$_REQUEST['Cat_delegaciones_claveDele'],
									$_REQUEST['numeroTelefono'],
									"$_REQUEST[calle]",
									$_REQUEST['numero'],
									"$_REQUEST[horarioApertura]",
									"$_REQUEST[horarioCierre]",
									$_REQUEST['cuota'],																						
									"$_REQUEST[descripcion]"
									
									);
			   
			   $museo->ingresarMuseo();
			
			}else {
				if($_REQUEST['nombreMuseo']==!null){
					
				$museo->modificarMuseo("$_REQUEST[nombreMuseo]");
				
			} if("$_REQUEST[opcion1]"=='Modificar'){

					$museo->modificarMuseo2($_REQUEST['nombreNuevo'],$_REQUEST['nombreViejo'],
											$_REQUEST['Cat_Delegaciones_claveDeleNuevo'],
											$_REQUEST['tipoNuevo'],$_REQUEST['tipoViejo'],
											$_REQUEST['numeroTelefonoNuevo'],$_REQUEST['numeroTelefonoViejo'],
											$_REQUEST['calleNuevo'],$_REQUEST['calleViejo'],
											$_REQUEST['numeroNuevo'],$_REQUEST['numeroViejo'],
											$_REQUEST['horarioAperturaNuevo'],$_REQUEST['horarioAperturaViejo'],
											$_REQUEST['horarioCierreNuevo'],$_REQUEST['horarioCierreViejo'],
											$_REQUEST['cuotaNuevo'],$_REQUEST['cuotaViejo'],
											$_REQUEST['descripcionNuevo'],$_REQUEST['descripcionViejo']
											
											);
					
				
			}
			}

			$museo->cerrarConexion();
			
?>