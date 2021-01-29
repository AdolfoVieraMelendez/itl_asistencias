const llenar_modulo_CR = () => {
    showLoading('Cargando módulo de consultas y reportes');
    $('#listado-CR').hide();
    $('#menu-CR').fadeIn('slow');
}

const llenar_lista_CR_usuarios = () => {
    showLoading('Cargando lista de docentes y administrativos');
    $.ajax({
        url: '../mConsultasReportes/listaDYA.php',
        type: 'POST',
        dataType: 'html',
        data: {},
        success: function (respuesta) {
            $('#listado-CR').html(respuesta);
            $('#listado-CR').fadeIn('slow');
            $('#menu-CR').hide();
            $('#lblTitulo').text('Consultas y Reportes | Docentes y Administrativos | Todos');
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        }
    });
}

const llenar_lista_CR_prf = (fecha_inicio, fecha_final, nombre) => {
    showLoading('Cargando lista de puntualidad, retardos y faltas');
    const nfecha_inicio = fecha_inicio,
        nfecha_final = fecha_final,
        nNombre = nombre;
    if (nfecha_inicio && nfecha_final && !nNombre) {
        $.ajax({
            url: '../mConsultasReportes/listaPrf-Fecha.php',
            type: 'POST',
            dataType: 'html',
            data: {nfecha_inicio, nfecha_final},
            success: function (respuesta) {
                $('#listado-CR').html(respuesta);
                $('#listado-CR').fadeIn('slow');
                $('#menu-CR').hide();
                $('#lblTitulo').text('Consultas y Reportes | De ' + nfecha_inicio + ' a ' + nfecha_final);
                $('#txtFechaInicial-PRF-F').val(nfecha_inicio);
                $('#txtFechaFinal-PRF-F').val(nfecha_final);
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    } else if (!nfecha_inicio && !nfecha_final && !nNombre) {
        $.ajax({
            url: '../mConsultasReportes/listaPrf-Todos.php',
            type: 'POST',
            dataType: 'html',
            data: {},
            success: function (respuesta) {
                $('#listado-CR').html(respuesta);
                $('#listado-CR').fadeIn('slow');
                $('#menu-CR').hide();
                $('#lblTitulo').text('Consultas y Reportes | Puntualidad, Retardos y Faltas | Todos');
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    } else if (nfecha_inicio && nfecha_final && nNombre) {
        $.ajax({
            url: '../mConsultasReportes/listaPrf-Nombres.php',
            type: 'POST',
            dataType: 'html',
            data: {nfecha_inicio, nfecha_final, nNombre},
            success: function (respuesta) {
                $('#listado-CR').html(respuesta);
                $('#listado-CR').fadeIn('slow');
                $('#menu-CR').hide();
                $('#lblTitulo').text('Consultas y Reportes | De ' + nfecha_inicio + ' a ' + nfecha_final + ' | ' + nNombre);
                $('#txtFechaInicial-PRF-F').val(nfecha_inicio);
                $('#txtFechaFinal-PRF-F').val(nfecha_final);
                $('#txtNombre-PRF-F').val(nNombre);
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    }
}

const llenar_lista_CR_apellido = (apellido) => {
    let apPaterno = apellido;
    showLoading('Cargando lista de docentes y administrativos');
    $.ajax({
        url: '../mConsultasReportes/listaAP.php',
        type: 'POST',
        dataType: 'html',
        data: {apPaterno},
        success: function (respuesta) {
            $('#listado-CR').html(respuesta);
            $('#listado-CR').fadeIn('slow');
            $('#menu-CR').hide();
            $('#lblTitulo').text('Consultas y Reportes | Docentes y Administrativos | Por Apellido');
            $('#apellidoPaterno-CR').val(apPaterno);
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        }
    });
}

const llenar_lista_CR_AS = (fecha_inicio, fecha_final, nombre) => {
    showLoading('Cargando lista de asistencias');
    const nfecha_inicio = fecha_inicio,
        nfecha_final = fecha_final,
        nNombre = nombre;
    if (nfecha_inicio && nfecha_final && !nNombre) {
        $.ajax({
            url: '../mConsultasReportes/listaAS-Fecha.php',
            type: 'POST',
            dataType: 'html',
            data: {nfecha_inicio, nfecha_final},
            success: function (respuesta) {
                $('#listado-CR').html(respuesta);
                $('#listado-CR').fadeIn('slow');
                $('#menu-CR').hide();
                $('#lblTitulo').text('Consultas y Reportes | De ' + nfecha_inicio + ' a ' + nfecha_final);
                $('#txtFechaInicial-AS-F').val(nfecha_inicio);
                $('#txtFechaFinal-AS-F').val(nfecha_final);
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    } else if (!nfecha_inicio && !nfecha_final && !nNombre) {
        $.ajax({
            url: '../mConsultasReportes/listaAS-Todos.php',
            type: 'POST',
            dataType: 'html',
            data: {},
            success: function (respuesta) {
                $('#listado-CR').html(respuesta);
                $('#listado-CR').fadeIn('slow');
                $('#menu-CR').hide();
                $('#lblTitulo').text('Consultas y Reportes | Asistencias | Todos');
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    } else if (nfecha_inicio && nfecha_final && nNombre) {
        $.ajax({
            url: '../mConsultasReportes/listaAS-Nombres.php',
            type: 'POST',
            dataType: 'html',
            data: {nfecha_inicio, nfecha_final, nNombre},
            success: function (respuesta) {
                $('#listado-CR').html(respuesta);
                $('#listado-CR').fadeIn('slow');
                $('#menu-CR').hide();
                $('#lblTitulo').text('Consultas y Reportes | De ' + nfecha_inicio + ' a ' + nfecha_final + ' | ' + nNombre);
                $('#txtFechaInicial-AS-F').val(nfecha_inicio);
                $('#txtFechaFinal-AS-F').val(nfecha_final);
                $('#txtNombre-AS-F').val(nNombre);
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    } else if (nfecha_inicio && !nfecha_final && !nNombre) {
        $.ajax({
            url: '../mConsultasReportes/listaAS-Laborando.php',
            type: 'POST',
            dataType: 'html',
            data: {nfecha_inicio},
            success: function (respuesta) {
                $('#listado-CR').html(respuesta);
                $('#listado-CR').fadeIn('slow');
                $('#menu-CR').hide();
                $('#lblTitulo').text('Consultas y Reportes | Personal Laborando');
                $('#txtFechaInicial-AS-L').val(nfecha_inicio);
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    }
}

document.getElementById('conRep-item-usuarios').addEventListener('click', () => {
    llenar_lista_CR_usuarios();
});

document.getElementById('conRep-item-prf').addEventListener('click', () => {
    llenar_lista_CR_prf();
});

document.getElementById('conRep-item-asistencias').addEventListener('click', () => {
    llenar_lista_CR_AS();
});

const abrirModalBuscarApellidos = () => {
    $('#modalBuscarApellidos-CR').modal('show');
    $('#modalTitle-CR-AP').text('Tecleé el apellido parterno del docente o administrativo que desee buscar e imprimir');
}

const abrirModalBuscarFechasPRF = () => {
    $('#modalBuscarFecha-CR-PRF-F').modal('show');
    $('#modalTitle-CR-PRF-F').text('Seleccione entre que fechas desea buscar');
}

const abrirModalBuscarNombrePRF = () => {
    $('#modalBuscarNombre-CR-PRF').modal('show');
    combo_DocAdm_CR();
    selectTwo();
    $('#modalTitle-CR-PRF-N').text('Escriba el nombre del Docente/Administrador y seleccione entre que fechas desea buscar');
}

const abrirModalBuscarFechasAS = () => {
    $('#modalBuscarFecha-CR-AS-F').modal('show');
    $('#modalTitle-CR-AS-F').text('Seleccione entre que fechas desea buscar');
}

const abrirModalBuscarNombreAS = () => {
    $('#modalBuscarNombre-CR-AS').modal('show');
    combo_DocAdm_CR();
    selectTwo();
    $('#modalTitle-CR-AS-N').text('Escriba el nombre del Docente/Administrador y seleccione entre que fechas desea buscar');
}

const combo_DocAdm_CR = () => {
    $.ajax({
        url : '../mConsultasReportes/comboDocAdm.php',
        data : {},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            
            $("#cmbNombres-PRF, #cmbNombres-AS").empty();
            $("#cmbNombres-PRF, #cmbNombres-AS").html(respuesta);    
            selectTwo();
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

const regresar_menu_CR = () => {
    $('#listado-CR').hide();
    $('#menu-CR').fadeIn();
    $('#lblTitulo').text('Consultas y Reportes');
}

$('#btnBuscarApellidos').click(function () {
    let apellido = $('#buscarApellidos-CR').val();
    $('#buscarApellidos-CR').val('');
    $('#modalBuscarApellidos-CR').modal('hide');
    llenar_lista_CR_apellido(apellido);
});

$('#btnBuscarFecha-CR-PRF').click(function () {
    let fecha_inicial = $('#fechaInicial-CR-PRF-F').val();
    let fecha_final = $('#fechaFinal-CR-PRF-F').val();
    $('#modalBuscarFecha-CR-PRF-F').modal('hide');
    llenar_lista_CR_prf(fecha_inicial, fecha_final);
});

$('#btnBuscarNombre-CR-PRF').click(function () {
    let fecha_inicial = $('#fechaInicial-CR-PRF-N').val();
    let fecha_final = $('#fechaFinal-CR-PRF-N').val();
    let nombre = $('#cmbNombres-PRF').val();
    $('#modalBuscarNombre-CR-PRF').modal('hide');
    llenar_lista_CR_prf(fecha_inicial, fecha_final, nombre);
});

$('#btnBuscarFecha-CR-AS').click(function () {
    let fecha_inicial = $('#fechaInicial-CR-AS-F').val();
    let fecha_final = $('#fechaFinal-CR-AS-F').val();
    $('#modalBuscarFecha-CR-AS-F').modal('hide');
    llenar_lista_CR_AS(fecha_inicial, fecha_final);
});

$('#btnBuscarNombre-CR-AS').click(function () {
    let fecha_inicial = $('#fechaInicial-CR-AS-N').val();
    let fecha_final = $('#fechaFinal-CR-AS-N').val();
    let nombre = $('#cmbNombres-AS').val();
    $('#modalBuscarNombre-CR-AS').modal('hide');
    llenar_lista_CR_AS(fecha_inicial, fecha_final, nombre);
});

const buscarLaborando = () => {
    let d = new Date(),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    let hoy = [year, month, day].join('-');
    llenar_lista_CR_AS(hoy);
}

$('#btnFecha-Hoy').click(function () {
    let d = new Date(),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    let hoy = [year, month, day].join('-');
    console.log(hoy);
    $('#fechaInicial-CR-AS-F').val(hoy);
    $('#fechaFinal-CR-AS-F').val(hoy);
});

$('#btnNombre-Hoy').click(function () {
    let d = new Date(),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    let hoy = [year, month, day].join('-');
    console.log(hoy);
    $('#fechaInicial-CR-AS-N').val(hoy);
    $('#fechaFinal-CR-AS-N').val(hoy);
});
