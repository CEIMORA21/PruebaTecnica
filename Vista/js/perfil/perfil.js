var perfilModelo = {
    listaPerfil: [],
    pos: -1
};


var pasaT = {
    constructor: function () {
        $('#btnpasaT').on('click', pasaT.guardarPasaT);
        pasaT.concultarPasaT();
    },
    guardarPasaT: function (e) {
        e.preventDefault();
        e.stopPropagation();
        var data = {};
        var fomulario = $('#frmPasaT');
        data.idUsuario = fomulario.find('#idP').val();
        data.nombrePasaT = fomulario.find('#pasaT').val();
        app.ajax('../Controlador/UsuarioController.php?opcion=insertarPasaT', data, pasaT.repuestaGuardarPasaT);
    },
    repuestaGuardarPasaT: function (respuesta) {
        app.mensaje(respuesta);
        pasaT.concultarPasaT();
    },
    concultarPasaT: function () {
        var formulario = $('#frmPasaT');
        var data = {};
        data.idUsuario = formulario.find('#idP').val();
        app.ajax('../Controlador/UsuarioController.php?opcion=consultarpasaT', data, pasaT.repuestaConsultarGuardarPasaT);
    },
    repuestaConsultarGuardarPasaT: function (respuesta) {
        var cuerpo = $('#cuerpo');
        cuerpo.empty();
        var datos = respuesta.datos;
        for (var i = 0; i < datos.length; i++) {
            var registro = datos[i];
            var fila = "<tr>" +
                    "<td>" + registro.nombrePasaT + "</td>" +
                    "</tr>";
            cuerpo.append(fila);

        }
    }
};



pasaT.constructor();

