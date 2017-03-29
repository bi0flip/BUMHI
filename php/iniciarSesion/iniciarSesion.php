<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>BUMHI</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="grey lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="index.html" class="brand-logo" style="color: #fff">BUMHI</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.html">Inicio</a></li>
                </ul>   


                <ul id="nav-mobile" class="side-nav">
                    <li><a href="index.html">Inicio</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
            </div>
            <div class="parallax"><img src="../../imgs/museoantropologia.jpg" ></div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row center">
                    <h1 class="blue-grey-text">Iniciar sesion</h1>
                </div>
                <div class="row">
				
                    <form class="col s12" action="../iniciarSesion/procesoIniciarSesion.php" method="post">
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <input id="correo" type="email" class="validate" required name="correo" 
								value="" required="true" />
                                <label for="correo">Correo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 offset-s3">
                                <input id="contra" type="password" name="contrasena" class="validate"
								required value="" required="true" />
                                <label for="contra">Contraseña</label>
                            </div>
                        </div>
						
                        <button class="btn waves-effect waves-light col offset-s5" type="submit" name="action">Iniciar
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
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
        <script src="../../js/materialize.js"></script>
        <script src="../../js/init.js"></script>

    </body>
</html>

