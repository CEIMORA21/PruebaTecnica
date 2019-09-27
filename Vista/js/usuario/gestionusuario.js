var usuarioModelo = {
    listaUsuarios: [],
    pos: -1
};

var gestionUsuario = {
    constructor: function () {
        $('#frm').on('submit', gestionUsuario.guardarUsuario);//
        $('#btnEliminar').on('click', gestionUsuario.eliminarUsuario);//
        $('#btnActualizar').on('click', gestionUsuario.actualizar);//
        gestionUsuario.consultarCargo();//
        gestionUsuario.consultarUsuarios();//

    },
    guardarUsuario: function (e) {//
        debugger;
        e.preventDefault();
        e.stopPropagation();
        var formulario = $('#frm');
        var data = {};
        data.idCargo = formulario.find('#cargo').val();
        data.nombre = formulario.find('#nombre').val();
        data.usuario = formulario.find('#usuario').val();
        data.pass = formulario.find('#pass').val();
        data.correo = formulario.find('#correo').val();
        data.ciudad = formulario.find('#ciudad').val();
        app.ajax('../Controlador/UsuarioController.php?opcion=insertar', data, gestionUsuario.respuestaUsuario);

    },
    respuestaUsuario: function (respuesta) {
        app.mensaje(respuesta);
        $('#frm input').val('');
        gestionUsuario.consultarUsuarios();
    },
    consultarUsuarios: function () {//
        var data = {};
        app.ajax('../Controlador/UsuarioController.php?opcion=consultar', data, gestionUsuario.respuestaConsultaUsuario);
    },
    respuestaConsultaUsuario: function (respuesta) {
        var cuerpo = $('#cuerpo');
        cuerpo.empty();
        var datos = respuesta.datos;
        usuarioModelo.listaUsuarios = datos;
        for (var i = 0; i < datos.length; i++) {
            var registro = datos[i];
            var fila = "<tr>" +
                    "<td>" + registro.nombre + "</td>" +
                    "<td>" + registro.usuario + "</td>" +
                    "<td>" + registro.correo + "</td>" +
                    "<td>" + registro.ciudad + "</td>" +
                    "<td>" + registro.cargo + "</td>" +
                    "<td><button class='btn btn-info' pos=" + i + "><i class='fa fa-lg fa-refresh'></i></button></td>" +
                    "<td><button class='btn btn-danger' pos=" + i + "><i class='fa fa-lg fa-trash'></i></button></td>" +
                    "</tr>";
            cuerpo.append(fila);

        }

        $('#cuerpo button.btn-danger').on('click', function () {
            var pos = $(this).attr('pos');
            usuarioModelo.pos = pos;
            var usuario = usuarioModelo.listaUsuarios[pos];
            $('#texto3').text(usuario.nombre);
            $('#confirmacion').modal('show');
        });

        $('#cuerpo button.btn-info').on('click', function () {
            var pos = $(this).attr('pos');
            usuarioModelo.pos = pos;
            var usuario = usuarioModelo.listaUsuarios[pos];
            $('#txtpasaT').val(usuario.pasatiempos);
            $('#id').val(usuario.idUsuario);
            $('#txtnombre').val(usuario.nombre);
            $('#txtusuario').val(usuario.usuario);
            $('#txtcorreo').val(usuario.correo);
            $('#cargoModal').val(usuario.idCargo);
            $('#txtestado').val(usuario.estado);
            $('#texto').text(usuario.nombre);
            $('#actualizar').modal('show');
        });

        $('#cuerpo button.btn-primary').on('click', function () {
            var pos = $(this).attr('pos');
            usuarioModelo.pos = pos;
            var usuario = usuarioModelo.listaUsuarios[pos];
            $('#texto4').text(usuario.nombre);
            $('#novedad').modal('show');
        });

        $('#cuerpo button.btn-warning').on('click', function () {
            var pos = $(this).attr('pos');
            usuarioModelo.pos = pos;
            var usuario = usuarioModelo.listaUsuarios[pos];
            $('#nombre').text(usuario.nombre);
            $('#tablero').modal('show');
        });

    },
    eliminarUsuario: function () {//
        var pos = usuarioModelo.pos;
        if (pos < 0) {
            app.mensaje({'codigo': -1, 'mensaje': 'Debe seleccionar un usuario'});
            return;
        }
        var data = {'idUsuario': usuarioModelo.listaUsuarios[pos].idUsuario};
        app.ajax('../Controlador/UsuarioController.php?opcion=desactivar', data, gestionUsuario.respuestaEliminarUsuario);
    },
    respuestaEliminarUsuario: function (respuesta) {
        app.mensaje(respuesta);
        $('#confirmacion').modal('hide');
        gestionUsuario.consultarUsuarios();
    },
    consultarCargo: function () {//
        var data = {};
        app.ajax('../Controlador/CargoController.php?opcion=consultarCargo', data, gestionUsuario.respuestaConsultarCargo);

    },
    respuestaConsultarCargo: function (respuesta) {
        var juego = $('#cargo');
        if (respuesta.codigo <= 0) {
            app.mensaje(respuesta);
            return;
        }
        for (var i = 0; i < respuesta.datos.length; i++) {
            var datos = respuesta.datos[i];
            var opcion = "<option value='" + datos.idCargo + "'>" + datos.cargo + "</option>";
            juego.append(opcion);
        }

        var modal = $('#cargoModal');
        if (respuesta.codigo <= 0) {
            app.mensaje(respuesta);
            return;
        }
        for (var i = 0; i < respuesta.datos.length; i++) {
            var datos = respuesta.datos[i];
            var opcion = "<option value='" + datos.idCargo + "'>" + datos.cargo + "</option>";
            modal.append(opcion);
        }

    },
    actualizar: function (e) {//
        e.preventDefault();
        e.stopPropagation();
        var data = {};
        var formulario = $('#actualizar');
        data.idUsuario = formulario.find('#id').val();
        data.idCargo = formulario.find('#cargoModal').val();
        data.nombre = formulario.find('#txtnombre').val();
        data.usuario = formulario.find('#txtusuario').val();
        data.pass = formulario.find('#txtpass').val();
        data.correo = formulario.find('#txtcorreo').val();
        data.pasatiempos = formulario.find('#txtpasaT').val();
        app.ajax('../Controlador/UsuarioController.php?opcion=actualizar', data, gestionUsuario.respuestaActualizar);
    },
    respuestaActualizar: function (respuesta) {
        app.mensaje(respuesta);
        $('#actualizar').modal('hide');
        gestionUsuario.consultarUsuarios();
    }


};
gestionUsuario.constructor();


