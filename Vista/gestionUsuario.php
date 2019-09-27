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
    <body class="sidebar-mini fixed">
        <div class="wrapper">
            <!-- Navbar-->
            <header class="main-header hidden-print"><a class="logo" href=""><figure><?= $usuario->cargo ?></figure></a>
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
                    <!-- Navbar Right Menu-->
                    <div class="navbar-custom-menu">
                        <ul class="top-nav">
                            <!--Notification Menu-->
                            <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="not-head">NOTIFICACIONES</li>
                                    <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                            <div class="media-body"><span class="block">###</span><span class="text-muted block">##</span></div></a></li>
                                    <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                            <div class="media-body"><span class="block">###</span><span class="text-muted block">##</span></div></a></li>
                                    <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                            <div class="media-body"><span class="block">###</span><span class="text-muted block">##</span></div></a></li>
                                    <li class="not-footer"><a href="#">###</a></li>
                                </ul>
                            </li>
                            <!-- User Menu-->
                            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                                <ul class="dropdown-menu settings-menu">
                                    <li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Ajustes</a></li>
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
                <section class="sidebar">
                </section>
            </aside>
            <div class="content-wrapper">
                <div class="page-title">
                    <div>
                        <h1><i class=""></i></h1>
                        <p></p>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-1" style="margin: 5%;" >
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
                                            <label class=" control-label">Correo</label>
                                            <input class="form-control" id="correo" type="text" autocomplete="off" placeholder="Correo Personal" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Ciudad </label>
                                            <input class="form-control" id="ciudad" type="text" placeholder="Ciudad " />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Cargo </label>
                                            <select class="form-control" id="cargo" >
                                                <option value="0" >Seleccione una opcion</option>
                                            </select>  
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
                                <div class="card  col-lg-5 col-lg-offset-1" style="margin: 5%;">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Usuario</th>
                                                    <th>Correo</th>
                                                    <th>Ciudad</th>
                                                    <th>Cargo</th>
                                                    <th>Editar </th>
                                                    <th>Desactivar</th>
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
<!--=================================================================================================================================================================-->
            <div id='confirmacion' class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirmación</h4>
                        </div>
                        <div class="modal-body">
                            <label>Desactivar los datos de <strong id="texto3"></strong></label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button id="btnEliminar" class="btn btn-primary">Desactivar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
<!--=================================================================================================================================================================-->
        <div id='actualizar' class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"Actualizar</h4>
                    </div>
                    <div class="modal-body">
                        <p>Actualizar </p>
                        <label>Actualizar los datos para <strong id="texto"></strong> </label>
                        <input  class="form-control" id="id" type="hidden" value="" ><br>
                        <label>Nombre</label>
                        <input class="form-control"  id="txtnombre" type="text" value="" >
                        <label>Usuario</label>
                        <input class="form-control"  id="txtusuario" type="text" value="" >
                        <label>Correo</label>
                        <input class="form-control"  id="txtcorreo" type="text" value="" >
                        <label>Cargo</label>
                        <select id="cargoModal" class="form-control">
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="btnActualizar" type="button" class="btn btn-info">Guardar Cambios</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal --> 
<!--=================================================================================================================================================================-->
        </div>
        <!-- Javascripts-->
        <script src="js/usuario/gestionusuario.js" type="text/javascript"></script>
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
