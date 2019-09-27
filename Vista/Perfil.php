<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:Login.php');
}
$usuario = $_SESSION['usuario'];
$algo = explode(" ", $usuario->nombre);
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS-->
        <style>
            .asd{
                height: 100px;
            }
        </style>
        <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>   
        <script src="js/menu.js" type="text/javascript"></script>
        <title></title>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--if lt IE 9
        script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
        script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
        -->
    </head>
    <body class="sidebar-mini fixed">
        <div class="wrapper">
            <!-- Navbar-->
            <header class="main-header hidden-print"><a class="logo" href=""></figure></a>
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
                    <!-- Navbar Right Menu-->
                    <div class="navbar-custom-menu">
                        <ul class="top-nav">
                            <!--Notification Menu-->
                            <!-- User Menu-->
                            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                                <ul class="dropdown-menu settings-menu">
                                    <li><a href="Perfil.php"><i class="fa fa-cog fa-lg"></i> Ajustes</a></li>
                                    <li><a href="Perfil.php"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                                    <li><a href="Login.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Side-Nav-->
            <aside class="main-sidebar hidden-print">
            </aside>
            <div class="content-wrapper">
                <div class="row user">
                    <div class="col-md-12">
                        <div class="profile">
                            <div class="info"><div><img class="asd" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn00ZxnRSo69rE4mwebSRHeq7xvKP-h0SDEirn_jN-g4pvJK3x"></div>
                                <h4><?= $usuario->nombre ?></h4>
                                <p><?= $usuario->cargo ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-0">
                            <ul class="nav nav-tabs nav-stacked user-tabs">
                                <li><a class="active" href="#user-Clave" data-toggle="tab">Agregar Pasatiempos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="user-timeline">
                                <div class="card user-settings">
                                    <h4 class="line-head">Actualizar datos personales</h4>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="user-Clave">
                                <div class="card user-settings">              
                                    <h4 class="line-head">Agregar Pasatiempos</h4>
                                    <form id="frmPasaT">
                                        <input type="hidden" id="idP" value="<?= $usuario->idUsuario ?>" />
                                        <div class="row mb-20">
                                            <div class="col-md-8 mb-20">
                                                <label>Pasatiempos</label>
                                                <input class="form-control" id="pasaT" type="text" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" id="btnpasaT" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre Pasatiempos</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cuerpo" >

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
        <script src="js/perfil/perfil.js" type="text/javascript"></script>z
        <!-- Javascripts-->
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>


