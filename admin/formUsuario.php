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
                <a id="logo-container" class="brand-logo" style="color: #fff">BUMHI</a>
                <ul class="right hide-on-med-and-down">

                </ul>

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
                <div class="row">
                    <div class="row center">
                        <h1 class="blue-grey-text">Usuario</h1>
                    </div>
                    <form class="col s12" action="../php/CtrlUsuarios.php" method="post">
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <input id="nombre" type="text" class="validate" name="nombre">
                                <label for="nombre">Nombre</label>
                            </div>
                            
                            <div class="input-field col s6 offset-s3">
                                <input id="contrasena" type="password" class="validate" name="contrasena">
                                <label for="contrasena">Contraseña</label>
                            </div>
							<div class="input-field col s6 offset-s3">
                                <input id="correo" type="email" class="validate" name="correo">
                                <label for="correo">Correo</label>
                            </div>
                           
                            <div class="col s6 offset-s3">
                                <h5 class="blue-grey-text">Rol de usuario</h5>
                                <input class="with-gap" name="rol" value="Administrador" type="radio" id="opc1">
                                <label for="opc1">Administrador</label>
                                <br>
                                <input class="with-gap" name="rol" type="radio" value="Moderador id="opc2">
                                <label for="opc2">Moderador</label>
                            </div>
                            <div class="col s7 offset-s2">
                                <div class="col offset-s5">
                                    <button class="btn waves-effect waves-light blue-grey" type="submit">Registrar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col s7 offset-s2">
                        <div class="col offset-s5">
                            <a href="usuarios.php"><button class="btn waves-effect waves-light blue-grey">Cancelar
                                <i class="material-icons right">close</i>
                            </button></a>
                        </div>
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