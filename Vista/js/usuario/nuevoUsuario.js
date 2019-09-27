var nuevoModelo = {
    listaUsuariosN: [],
    pos: -1
};
var usuarioModelo = {
    listaUsuarios: [],
    pos: -1
};

var gestionUsuarioNuevo = {
    constructor: function () {
        $('#frm').on('submit', gestionUsuarioNuevo.guardarUsuario);
    },
    guardarUsuario: function (e) {
        e.preventDefault();
        e.stopPropagation();
        var formulario = $('#frm');
        var data = {};
        data.nombre = formulario.find('#nombre').val();
        data.usuario = formulario.find('#usuario').val();
        data.pass = formulario.find('#pass').val();
        data.passC = formulario.find('#passC').val();
        data.correo = formulario.find('#correo').val();
        data.ciudad = formulario.find('#ciudad').val();
        data.pasatiempos = formulario.find('#pasaT').val();
        app.ajax('../Controlador/UsuarioController.php?opcion=insertarUsuarioN', data, gestionUsuarioNuevo.respuestaUsuario);

    },
    respuestaUsuario: function (respuesta) {
        app.mensaje(respuesta);
        $('#frm input').val('');
    }



};
gestionUsuarioNuevo.constructor();



