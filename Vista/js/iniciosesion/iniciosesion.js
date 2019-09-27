var sesion = {
    listaSesion: [],
    pos: -1
};

var inicioSesion = {
    constructor: function () {
        $('#log').on('click', inicioSesion.validarInicio);
    },
    validarInicio: function (e) {
        e.preventDefault();
        e.stopPropagation();
        var formulario = $('#frm');
        var correo = formulario.find('#correo').val();
        var pass = formulario.find('#pass').val();
        if (correo == '') {
            app.mensaje({codigo: -1, mensaje: 'Debe ingresar un usuario'});
            return;
        }
        if (pass == '') {
            app.mensaje({codigo: -1, mensaje: 'Debe ingresar una clave'});
            return;
        }
        var data = {'correo': correo, 'pass': pass};
        app.ajax('../Controlador/UsuarioController.php?opcion=iniciarSesion', data, inicioSesion.respuestaInicio);
    },
    respuestaInicio: function (respuesta) {
        var datos = respuesta.datos;
        var cargo = datos.idCargo;
        if (respuesta.codigo < 0) {
            app.mensaje(respuesta);
            return;
        } else {
            if (cargo == 2) {
                location.href = "Perfil.php";
            } else {
                location.href = "gestionUsuario.php";
            }
        }

    }
};
inicioSesion.constructor();
