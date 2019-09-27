<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>


<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:Login.php');
}
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--CSS-->
        <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script> 
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>   
        <script src="js/menu.js" type="text/javascript"></script>
        <title>ADMINISTRADOR</title>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--if lt IE 9
        script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
        script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
        -->
    </head>
    <style>
        body{
            background-color: #396bb4;
        }
    </style>
    <body class="sidebar-mini fixed">
        <div class="wrapper">
            <!-- Navbar-->
            <!-- Side-Nav-->
            <div class="content-wrapper" style="background-color: #396bb4;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-1" style="margin: 6%;" >
                                    <!--<div class="col-lg-4 col-lg-offset-1">-->
                                    <form class="bs-component" id="frm">
                                        <div class="form-group">
                                            <label class=" rol-label" >Nombre</label>
                                            <input class="form-control" id="nombre" type="text" autocomplete="off" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Usuario</label>
                                            <input class="form-control" id="usuario" type="text" autocomplete="off" placeholder="Username" />
                                        </div>
                                        <div class="form-group">
                                            <label class=" control-label">Clave</label>
                                            <input class="form-control" id="pass" type="password" autocomplete="off" placeholder="Clave" />
                                        </div>
                                        <div class="form-group">
                                            <label class=" control-label">Confirmar Clave</label>
                                            <input class="form-control" id="passC" type="password" autocomplete="off" placeholder="Clave" />
                                        </div>
                                        <div class="form-group">
                                            <label class=" control-label">Correo</label>
                                            <input class="form-control" id="correo" type="text" autocomplete="off" placeholder="Correo Personal" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Ciudad </label>
                                            <input class="form-control" id="ciudad" type="text" placeholder="Ciudad " />
                                        </div>
                                        <div class="form-group">
                                            <input  hidden="" value="1" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Pasatiempos </label>
                                            <input class="form-control" id="pasaT" type="text" placeholder="Pasatiempos " />
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-10 col-lg-offset-2">
                                                <!--                                                        <button class="btn btn-default" type="reset">Cancel</button>-->
                                                <button class="btn btn-primary" type="submit">Guardar</button>
                                            </div>
                                        </div>
                                        <!--</fieldset>-->
                                    </form>
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--=================================================================================================================================================================-->
        </div>
        <!-- Javascripts-->
        <script src="js/usuario/nuevoUsuario.js" type="text/javascript"></script>
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>//
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/pace.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="js/plugins/select2.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>
