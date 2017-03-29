<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>BUMHI</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php 
            include('../php/MdlMuseos.php');
            $museo = new MdlMuseos();
            $clave=$_REQUEST['clave'];    
            $con=$museo->conectarBD();
            $registros=mysqli_query($con, "select * from museos 
            where claveMuseo='$clave'");
            $reg=mysqli_fetch_array($registros);
        ?>
        <nav class="grey lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" class="brand-logo" style="color: #fff">BUMHI</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="usuarios.php">Usuarios</a></li>
                    <li><a href="museos.php">Museos</a></li>
                    <li><a href="../php/iniciarSesion/cerrar_sesion.php">Cerrar sesion</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="usuarios.php">Usuarios</a></li>
                    <li><a href="museos.php">Museos</a></li>
                    <li><a href="../php/iniciarSesion/cerrar_sesion.php">Cerrar sesion</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
            </div>
            <div class="parallax"><img src="../imgs/caracol.jpg" ></div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row center">
                    <h1 class="blue-grey-text">Museo de <?php echo $reg['nombreMuseo'];  ?></h1>

                     <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn blue-grey" data-target="modal1">Agregar servicio</a>
                    <a class="waves-effect waves-light btn blue-grey" data-target="modal2">Agregar sala</a>
                  <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                      <form action="../php/CtrlServicios.php" method="post">
                        <?php 
                            echo'<input type="hidden" name="claveMuseo" value="'.$clave.'">';
                            $registro = mysqli_query($con,"SELECT * FROM servicios")
                            or die(mysql_error($con));
                            
                            echo '<select class="browser-default" id="serv" name="serv" required>
                            <option value="" disabled selected>-Seleccione-</option>';

                            while($reg2=mysqli_fetch_array($registro)){

                                echo "<option value=".$reg2['claveServicios'].">".$reg2['nombreServicio']."</option>";
                            }
                            echo '</select>';
                        ?>
                         <div class="input-field col s12 ">
                            <textarea id="descripcion" class="materialize-textarea" name="descripcion" required="true"></textarea>
                            <label for="descripcion">Descripción</label>
                         </div>
                        <div class="input-field col s12 ">
                            <input id="costo" type="number" class="validate" name="costo" required="true">
                            <label for="costo">Costo</label>
                        </div>
                        <div class="col">
                        <button class="btn waves-effect waves-light blue-grey" type="submit">
                            Agregar
                            <i class="material-icons right">send</i>
                        </button>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat blue-grey white-text">Cerrar</a>
                    </div>
                </div>
                <!-- Modal Structure -->
                <div id="modal2" class="modal">
                    <div class="modal-content">
                      <form action="../php/CtrlSalas.php" method="post">
                        <?php 
                            echo'<input type="hidden" name="claveMuseo" value="'.$clave.'">';
                        ?>
                            <div class="input-field">
                                <input id="nombre" type="text" class="validate" name="nombre">
                                <label for="nombre">Nombre de la sala</label>
                            </div>
                            <div class="col s12">
                                <label>Temporal</label>
                                <select class="browser-default" name="temporal">
                                    <option value="" disabled selected>-Seleccione-</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="input-field col s12">
                                <h5 class="blue-grey-text">Fecha inicio</h5>
                                <input type="date" id="inicio" name="fechaInicio">
                            </div>
                            <div class="input-field">
                                <h5 class="blue-grey-text">Fecha final</h5>
                                <input type="date" id="fin" name="fechaFin">
                            </div>
                            <div class="input-field">
                                <textarea id="descripcion" class="materialize-textarea" name="descripcion"></textarea>
                                <label for="descripcion">Descripción</label>
                            </div>
                            <div class="col">
                            <br>
                                <button class="btn waves-effect waves-light blue-grey" type="submit" name="action">Guardar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat blue-grey white-text">Cerrar</a>
                    </div>
                </div>
                <br><br><br>
                <div class="row center">
                    <h4 class="blue-grey-text">Servicios del museo</h4>
                
                    <?php
                        include('../php/MdlServicios.php');
                        include('../php/MdlSalas.php');
                        include ('../php/MdlExposiciones.php');
                        $servicios = new MdlServicios();
                        $salas = new MdlSalas();
                        $exposicion = new MdlExposiciones();
                        echo $servicios->listarDetalleServicios($clave);
                        echo '<br><br><h4 class="blue-grey-text">'.'Salas del museo'.'</h4>';
                        echo $salas->listarSalas($clave);
                        echo '<br><br><h4 class="blue-grey-text">'.'Exposiciones'.'</h4>';
                        echo $exposicion->listarExposicion($clave);
                    ?>
                </div>
                </div>
            </div>
        </div>
        



        <footer class="page-footer grey lighten-1">
            <div class="container">
                <div class="row">

                    <div class="col l3 s12">
                        <h5 class="white-text">Contacto</h5>
                        <ul>
                            <li><a class="white-text"><i class="material-icons">call</i> 5567874350</a></li>
                            <li><a class="white-text"><i class="material-icons">email</i> leaal-5@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Derechos reservados Soluciones LEAAL &copy
                </div>
            </div>
        </footer>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../js/materialize.js"></script>
        <script src="../js/init.js"></script>
        <script>
            $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
        </script>
    </body>
</html>

