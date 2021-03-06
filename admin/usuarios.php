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
        <nav class="grey lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" class="brand-logo" style="color: #fff" href="indexAdmin.php">BUMHI</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="museos.php">Museos</a></li>
                    <li><a href="../php/iniciarSesion/cerrar_sesion.php">Cerrar sesion</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="museos.html">Museos</a></li>
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
                    <h1 class="blue-grey-text">Usuarios</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="right-align">
                        <a class="btn-floating btn-large waves-effect waves-light blue-grey " title="Agregar" href="formUsuario.php"><i class="material-icons">add</i></a>
                    </div>
                    <br>
                    <?php
					include('../php/MdlUsuarios.php');
					
					$usuario = new Usuario();
					$usuario->listarDatos();
					$usuario->cerrarConexion();
					?>	
                </div>
            </div>
        </div>
        <footer class="page-footer grey lighten-1">
            <div class="container">
                <div class="row">

                    <div class="col l3 s12">
                        <h5 class="white-text">Contacto</h5>
                        <ul>
                            <li><a class="white-text" href="#!"></a></li>
                            <li><a class="white-text" href="#!"><i class="material-icons">call</i> 5567874350</a></li>
                            <li><a class="white-text" href="#!"><i class="material-icons">email</i> leaal-5@gmail.com</a></li>
                            <li><a class="white-text" href="#!"></a></li>
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
    </body>
</html>