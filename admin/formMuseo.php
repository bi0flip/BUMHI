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
                        <h1 class="blue-grey-text">Museo</h1>
                    </div>
                    <form class="col s12" action="../php/CtrlMuseos.php" method="post">
                        <div class="row">
                            <div class="input-field col s8 offset-s2">
                                <input id="nombre" type="text" class="validate" name="nombreMuseo">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="input-field col s4 offset-s2">
                                <input id="tipo" type="text" class="validate" name="tipo">
                                <label for="tipo">Tipo</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="telefono" type="number" class="validate" name="numeroTelefono">
                                <label for="telefono">Numero de telefono</label>
                            </div>
                            
                            <div class="input-field col s4 offset-s2">
                                <input id="calle" type="text" class="validate" name="calle">
                                <label for="calle">Calle</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="numero" type="text" class="validate" name="numero">
                                <label for="numero">Numero</label>
                            </div>
                            <div class="input-field col s8 offset-s2">
                                <label for="del">Delegacion</label>
                                <br><br>
                                <select class="browser-default" id="del" name="Cat_delegaciones_claveDele">
                                    <option disabled selected>-Seleccione-</option>
                                    <?php 
                                include('../php/MdlMuseos.php');
                                $museo = new MdlMuseos();
                                $museo->listarDelegaciones();
                                $museo->cerrarConexion();
                                ?>
                                </select>
                            </div>
                            <div class="input-field col s4 offset-s2">
                                <input id="apertura" type="text" class="validate" name="horarioApertura">
                                <label for="apertura">Horario apertura</label>
                            </div>
                            <div class="input-field col s4 ">
                                <input id="cierre" type="text" class="validate" name="horarioCierre">
                                <label for="cierre">Horario cierre</label>
                            </div>
                            <div class="input-field col s8 offset-s2">
                                <input id="cuota" type="number" class="validate" name="cuota">
                                <label for="cuota">Cuota</label>
                            </div>
                            <div class="input-field col s8 offset-s2">
                                <textarea id="descripcion" class="materialize-textarea" name="descripcion"></textarea>
                                <label for="descripcion">Descripción</label>
                            </div>
                            <div class="col offset-s5">
                               
                                <button class="btn waves-effect waves-light blue-grey" type="submit" name="action">Guardar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col offset-s5">
                        
                        <a class="btn waves-effect waves-light blue-grey" href="../admin/museos.php">Cancelar
                            <i class="material-icons right">close</i>
                        </a>
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
                            <li><a class="white-text"></a></li>
                            <li><a class="white-text"><i class="material-icons">call</i> 5567874350</a></li>
                            <li><a class="white-text"><i class="material-icons">email</i> leaal-5@gmail.com</a>
                            </li>
                            <li><a class="white-text"></a></li>
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

