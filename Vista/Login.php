<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
ini_set("session.cookie_lifetime", "1");
ini_set("session.gc_maxlifetime", "1");
session_start();
session_destroy();
?>
<html lang="ES">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS-->
        <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/menu.js" type="text/javascript"></script>
        <title>Login</title>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--if lt IE 9
            script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
            script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
        -->
    </head>

    <body>

        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <h1></h1>
            </div>
            <div class="login-box">
                <div id="mensaje"></div>
                <form class="login-form" id="frm">

                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Ingresar</h3>
                    <div class="form-group">
                        <label class="control-label">USUARIO</label>
                        <input class="form-control" id="correo" type="text" placeholder="USUARIO" autofocus>
                    </div>
                    <div class="form-group">
                        <label class="control-label">CLAVE</label>
                        <input class="form-control" id="pass" type="password" placeholder="Clave">
                    </div>
                    <div class="form-group">
                        <div class="utility">
                            <div class="animated-checkbox">
                                <label class="semibold-text">
                                    <!--                  <input type="checkbox"><span class="label-text">Stay Signed in</span>-->
                                </label>
                            </div>
                            <p class="semibold-text mb-0"><a data-toggle="flip">Olvidaste tu contraseña?</a></p>
                        </div>
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block" id="log">Ingresar<i class="fa fa-sign-in fa-lg"></i></button>
                    </div>
                </form>
                <script src="js/iniciosesion/iniciosesion.js" type="text/javascript"></script>
                <form id="frm2" class="forget-form">
                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste tu contraseña?</h3>
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input id="txtCorreo" class="form-control" type="text" placeholder="Email">
                    </div>
                    <div class="form-group btn-container">
                        <button id="btnValidar" class="btn btn-primary btn-block">Validar<i class="fa fa-unlock fa-lg"></i></button>
                    </div>
                    <div class="form-group mt-20">
                        <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar</a></p>
                    </div>
                </form>
            </div>
        </section>
    </body>
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>

</html>