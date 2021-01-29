//Variable para tomar el contenedor que muestra la hora actual
var horaContainer_IDX = document.querySelector('#lblHora-IDX');
var ssTO;

$('#clave-IDX').on('keydown', function () {
    let clave = $(this).val();
    if (event.keyCode == 13) {
        if (clave == '') {
            swal.fire({
                icon: 'info',
                toast: true,
                showConfirmButton: false,
                timer: 3000,
                title: 'Ingresa una clave',
                position: 'bottom-end',
                width: '400'
            });
        } else {
            revisar_clave_activo(clave);
        }
    }
});

const revisar_clave_activo = (clave) => {
    $.ajax({
        url: '../mAsistencias/rClave.php',
        type: 'POST',
        dataType: 'html',
        data: { clave },
        success: function (respuesta) {
            let res = parseInt(respuesta);
            if (res == 1) {
                console.log(` Registro: ${res}`);
                if ($("#nombreIncidencia-IDX").is(":visible") || $("#statusIncidencia-IDX").is(":visible")) {
                    stopSixSeconds_TO();
                    $('#nombreIncidencia-IDX').fadeOut();
                    $('#statusIncidencia-IDX').fadeOut();
                    setTimeout(() => {
                        llenar_datos_asistencias(clave);
                        sixSeconds_TO();
                    }, 1000);
                } else {
                    llenar_datos_asistencias(clave);
                    sixSeconds_TO();
                }
            } else {
                console.log(` Registro: ${res}`);
                stopSixSeconds_TO();
                $('#nombreIncidencia-IDX').fadeOut();
                $('#statusIncidencia-IDX').fadeOut();
                resetGrid();
                swal_toastRight('La clave no coincide con ningún trabajador', 'error');
            }
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        }
    });
}

const llenar_datos_asistencias = (clave) => {
    $.ajax({
        url:"../mAsistencias/datosPersonas.php",
        type:"POST",
        dataType:"json",
        data:{clave},
        success: function (respuesta) {
            let dataArray = respuesta;
            console.log(dataArray)

            let id_U = dataArray.result.id_usuario;
            let nombre_U = dataArray.result.nombre;
            let valor_imagen = dataArray.result.imagen_us;
            let turno_U = dataArray.result.turno;
            let d_entrada_U = dataArray.result.d_entrada;
            let d_salida_U = dataArray.result.d_salida;
            let l_entrada_U = dataArray.result.l_entrada;
            let l_salida_U = dataArray.result.l_salida;
            let m_entrada_U = dataArray.result.m_entrada;
            let m_salida_U = dataArray.result.m_salida;
            let mi_entrada_U = dataArray.result.mi_entrada;
            let mi_salida_U = dataArray.result.mi_salida;
            let j_entrada_U = dataArray.result.j_entrada;
            let j_salida_U = dataArray.result.j_salida;
            let v_entrada_U = dataArray.result.v_entrada;
            let v_salida_U = dataArray.result.v_salida;
            let s_entrada_U = dataArray.result.s_entrada;
            let s_salida_U = dataArray.result.s_salida;

            let foto_U = new Image();

            if (valor_imagen == 1) {
                foto_U.src = '../mDocentesAdministrativos/fotos/' + clave + '.jpg';
            } else {
                foto_U.src = '../fotos/default-profile-pic.png';
            }

            $("#imgEmpleado-IDX").attr('src', foto_U.src);
            

            console.log(`id: ${id_U}`);
            console.log(`Nombre: ${nombre_U}`);
            console.log(`Turno: ${turno_U}`);
            console.log(`Domingo: ${d_entrada_U} - ${d_salida_U}`);
            console.log(`Lunes: ${l_entrada_U} - ${l_salida_U}`);
            console.log(`Martes: ${m_entrada_U} - ${m_salida_U}`);
            console.log(`Miércoles: ${mi_entrada_U} - ${mi_salida_U}`);
            console.log(`Jueves: ${j_entrada_U} - ${j_salida_U}`);
            console.log(`Viernes: ${v_entrada_U} - ${v_salida_U}`);
            console.log(`Sábado: ${s_entrada_U} - ${s_salida_U}`);

            $('#lblnombreEmpleado-IDX').text(nombre_U);
            $('#lblTurno-IDX').text(turno_U);

            $('#nombreIncidencia-IDX').fadeIn();
            $('#statusIncidencia-IDX').fadeIn();

            checar_dia(id_U, d_entrada_U, d_salida_U, l_entrada_U, l_salida_U, m_entrada_U, m_salida_U, mi_entrada_U, mi_salida_U, j_entrada_U, j_salida_U, v_entrada_U, v_salida_U, s_entrada_U, s_salida_U);
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

const checar_dia = (id, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida) => {
    let fecha_U = new Date();
    let dias = fecha_U.getDay();
    if (dias == 0) { // Domingo
        console.log("Domingo");
        checar_entrada_salida(id, d_entrada, d_salida);
    } else {
        if (dias == 1) { // Lunes
            console.log("Lunes");
            checar_entrada_salida(id, l_entrada, l_salida);
        } else {
            if (dias == 2) { // Martes
                console.log("Martes");
                checar_entrada_salida(id, m_entrada, m_salida);
            } else {
                if (dias == 3) { // Miercoles
                    console.log("Miércoles");
                    checar_entrada_salida(id, mi_entrada, mi_salida);
                } else {
                    if (dias == 4) { // Jueves
                        console.log("Jueves");
                        checar_entrada_salida(id, j_entrada, j_salida);
                    } else {
                        if (dias == 5) { // Viernes
                            console.log("Viernes");
                            checar_entrada_salida(id, v_entrada, v_salida);
                        } else {
                            if (dias == 6) { //Sabado
                                console.log("Sábado");
                                checar_entrada_salida(id, s_entrada, s_salida);
                            }
                        }
                    }
                }
            }
        }
    }
}

const checar_entrada_salida = (id, hora_entrada, hora_salida) => {
    let incidencia;
    let horas_trabajadas;
    let status_incidencia;
    let hora_actual = moment().format('HH:mm:ss');
    let inicio_puntual = '00:20:00'; // Entrada puntual puede ser 20 mins antes
    let inicio_puntual_mjs = moment.duration(inicio_puntual);
    let final_puntual = '00:10:59'; // Entrada puntual puede ser 10 minutos después
    let final_puntual_mjs = moment.duration(final_puntual);
    let a_puntual = moment.duration('1 ' + hora_entrada).subtract(inicio_puntual_mjs);
    let b_puntual = moment.duration('1 ' + hora_entrada).add(final_puntual_mjs);
    let c_puntual = a_puntual._data.hours + ':' + a_puntual._data.minutes + ':' + a_puntual._data.seconds;
    let d_puntual = b_puntual._data.hours + ':' + b_puntual._data.minutes + ':' + b_puntual._data.seconds;
    let x_puntual = corregir_hora(c_puntual); //hora_entrada - 20 minutos
    let y_puntual = corregir_hora(d_puntual); //hora_entrada + 10:59 minutos

    let inicio_retardo = '00:11:00'; // Retardo 1 puede ser 11 mins después
    let inicio_retardo_mjs = moment.duration(inicio_retardo);
    let final_retardo = '00:20:59'; // Retardo 1 puede ser 20 minutos después
    let final_retardo_mjs = moment.duration(final_retardo);
    let a_retardo = moment.duration('1 ' + hora_entrada).add(inicio_retardo_mjs);
    let b_retardo = moment.duration('1 ' + hora_entrada).add(final_retardo_mjs);
    let c_retardo = a_retardo._data.hours + ':' + a_retardo._data.minutes + ':' + a_retardo._data.seconds;
    let d_retardo = b_retardo._data.hours + ':' + b_retardo._data.minutes + ':' + b_retardo._data.seconds;
    let x_retardo = corregir_hora(c_retardo); //hora_entrada + 11 minutos
    let y_retardo = corregir_hora(d_retardo); //hora_entrada + 20:59 minutos

    let inicio_retardoII = '00:21:00'; // Retardo 2 puede ser 21 mins después
    let inicio_retardoII_mjs = moment.duration(inicio_retardoII);
    let final_retardoII = '00:30:59'; // Retardo 2 puede ser 30 minutos después
    let final_retardoII_mjs = moment.duration(final_retardoII);
    let a_retardoII = moment.duration('1 ' + hora_entrada).add(inicio_retardoII_mjs);
    let b_retardoII = moment.duration('1 ' + hora_entrada).add(final_retardoII_mjs);
    let c_retardoII = a_retardoII._data.hours + ':' + a_retardoII._data.minutes + ':' + a_retardoII._data.seconds;
    let d_retardoII = b_retardoII._data.hours + ':' + b_retardoII._data.minutes + ':' + b_retardoII._data.seconds;
    let x_retardoII = corregir_hora(c_retardoII); //hora_entrada + 21 minutos
    let y_retardoII = corregir_hora(d_retardoII); //hora_entrada + 30:59 minutos

    let inicio_falta = '00:31:00'; // Retardo 3 puede ser 31 mins después
    let inicio_falta_mjs = moment.duration(inicio_falta);
    let a_falta = moment.duration('1 ' + hora_entrada).add(inicio_falta_mjs);
    let c_falta = a_falta._data.hours + ':' + a_falta._data.minutes + ':' + a_falta._data.seconds;
    let x_falta = corregir_hora(c_falta); //hora_entrada + 31 minutos
    let y_falta = hora_salida; //Retardo 3 termina en la hora de salida

    $.ajax({
        url: "../mAsistencias/rEntrada.php",
        type: "POST",
        dataType: "html",
        data: { id },
        success: function (respuesta) {
            res = respuesta;
            console.log(res);
            if (res == 0) { //Entradas
                if (hora_entrada == '00:00:00' && hora_salida == '00:00:00') {
                    swal_toastRight('Hoy no es un día laboral para tí', 'error');
                    status_incidencia = '#eb2f06';
                    $('#statusIncidencia-IDX').css('color', status_incidencia);
                    incidencia = 'Hoy no trabaja';
                    $('#lblnombreIncidencia-IDX').text(incidencia);
                } else {
                    if (hora_actual <= x_puntual || hora_actual >= hora_salida) {
                        swal_toastRight('Tu asistencia se encuentra fuera del rango de tu horario', 'warning');
                        status_incidencia = '#eb2f06';
                        $('#statusIncidencia-IDX').css('color', status_incidencia);
                        incidencia = 'Fuera de Rango';
                        $('#lblnombreIncidencia-IDX').text(incidencia);
                    } else {
                        if (hora_actual >= x_puntual && hora_actual <= y_puntual) {
                            incidencia = 'Puntual';
                            registrar_entrada(id, incidencia, hora_actual);
                            swal_toastRight('Gracias por registrar su entrada', 'success');
                            status_incidencia = '#4cd137';
                            $('#statusIncidencia-IDX').css('color', status_incidencia);
                            $('#lblnombreIncidencia-IDX').text(incidencia);

                        } else {
                            if (hora_actual >= x_retardo && hora_actual <= y_retardo) {
                                incidencia = 'Retardo 1';
                                registrar_entrada(id, incidencia, hora_actual);
                                swal_toastRight('Gracias por registrar su entrada', 'success');
                                status_incidencia = '#4cd137';
                                $('#statusIncidencia-IDX').css('color', status_incidencia);
                                $('#lblnombreIncidencia-IDX').text(incidencia);
                            } else {
                                if (hora_actual >= x_retardoII && hora_actual <= y_retardoII) {
                                    incidencia = 'Retardo 2';
                                    registrar_entrada(id, incidencia, hora_actual);
                                    swal_toastRight('Gracias por registrar su entrada', 'success');
                                    status_incidencia = '#4cd137';
                                    $('#statusIncidencia-IDX').css('color', status_incidencia);
                                    $('#lblnombreIncidencia-IDX').text(incidencia);
                                } else {
                                    if (hora_actual >= x_falta && hora_actual <= y_falta) {
                                        incidencia = 'Retardo 3';
                                        registrar_entrada(id, incidencia, hora_actual);
                                        swal_toastRight('Gracias por registrar su entrada', 'success');
                                        status_incidencia = '#4cd137';
                                        $('#statusIncidencia-IDX').css('color', status_incidencia);
                                        $('#lblnombreIncidencia-IDX').text(incidencia);
                                    }
                                }
                            }
                        }
                    }
                }
            } else { // Salidas
                $.ajax({
                    url:"../mAsistencias/rSalida.php",
                    type:"POST",
                    dataType:"json",
                    data:{id},
                    success:function(respuesta){
                        let arreglo_salida = respuesta;
                        console.log(arreglo_salida);
                        let res = parseInt(arreglo_salida.cRegistros);
                        console.log(res);
                        if (res == 1) { //Guarda Salida
                            incidencia = 'Salida';
                            let db_hora_entrada = arreglo_salida.result.hora_entrada;
                            horas_trabajadas = calcular_horas_trabajadas(db_hora_entrada, hora_actual);
                            console.log(`Horas Trabajadas: ${horas_trabajadas}`);
                            registrar_salida(id, hora_actual, horas_trabajadas);
                            swal_toastRight('Gracias por registrar su salida', 'success');
                            status_incidencia = '#4cd137';
                            $('#statusIncidencia-IDX').css('color', status_incidencia);
                            $('#lblnombreIncidencia-IDX').text(incidencia);

                        } else { // Ya hay hora de entrada y salida por ende ya no se puede
                            swal_toastRight('Ya has registrado tus asistencias de hoy', 'info');
                            status_incidencia = '#feca57';
                            $('#statusIncidencia-IDX').css('color', status_incidencia);
                            incidencia = 'Ya trabajaste hoy'
                            $('#lblnombreIncidencia-IDX').text(incidencia);
                        }
            
                    },
                    error:function(xhr,status){
                        alert("Error en metodo AJAX (salidas)"); 
                    },
                });
            }
        },
        error: function (xhr, status) {
            alert('Error en método AJAX (entradas)');
        },
    });
}

function calcular_horas_trabajadas(entrada, salida) {
    let time1 = entrada.split(':'), time2 = salida.split(':');
    let hours1 = parseInt(time1[0], 10), 
        hours2 = parseInt(time2[0], 10),
        mins1 = parseInt(time1[1], 10),
        mins2 = parseInt(time2[1], 10);
    let hours = hours2 - hours1, mins = 0;
    if(hours < 0) hours = 24 + hours;
    if(mins2 >= mins1) {
        mins = mins2 - mins1;
    }
    else {
        mins = (mins2 + 60) - mins1;
        hours--;
    }
    mins = mins / 60; // take percentage in 60
    hours += mins;
    hours = hours.toFixed(2);
    return hours;
}

const registrar_entrada = (id, incidencia, hora) => {
    $.ajax({
        url:"../mAsistencias/guardarE.php",
        type:"POST",
        dataType:"html",
        data:{id, incidencia, hora},
        success:function(respuesta){
            console.log("Entrada registrada");
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

const registrar_salida = (id, hora, horas_trabajadas) => {
    $.ajax({
        url:"../mAsistencias/guardarS.php",
        type:"POST",
        dataType:"html",
        data:{id, hora, horas_trabajadas},
        success:function(respuesta){
            console.log("Salida registrada");
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

const swal_toastRight = (msg, icono) => {
    if (icono == 'success' || icono == 'error' || icono == 'warning' || icono == 'info' || icono == 'question') {
        swal.fire({
            icon: `${icono}`,
            toast: true,
            showConfirmButton: false,
            timer: 6000,
            title: `${msg}`,
            position: 'bottom-end',
            width: '400'
        });
    } else {
        swal.fire({
            icon: 'info',
            toast: true,
            showConfirmButton: false,
            timer: 6000,
            title: `${msg}`,
            position: 'bottom-end',
            width: '400'
        });
        console.log('El ícono que eligió no existe, se ha asignado por default a info');
    }
    
}

const sixSeconds_TO = () => {
    ssTO = setTimeout(function () {
                $("#nombreIncidencia-IDX").fadeOut();
                $("#statusIncidencia-IDX").fadeOut();
                $("#clave-IDX").focus();
                resetGrid();
            },6000);
}

const stopSixSeconds_TO = () => {
    clearTimeout(ssTO);
    resetGrid();
}

const corregir_hora = (hora) => {
    let byte = hora.split(':');
    if (byte[0] < 10) {
        byte[0] = '0' + byte[0];
    }
    if (byte[1] < 10) {
        byte[1] = '0' + byte[1];
    }
    if (byte[2] < 10) {
        byte[2] = '0' + byte[2];
    }
    let hora_corregida = byte[0] + ':' + byte[1] + ':' + byte[2];
    return hora_corregida;
}

const resetGrid = () => {
    $('#lblnombreEmpleado-IDX').text('Nombre Empleado');
    $('#lblTurno-IDX').text('Turno Actual');
    let Default = new Image();
    Default.src = '../fotos/default-profile-pic.png';
    $("#imgEmpleado-IDX").attr('src', Default.src);
    $('#statusIncidencia-IDX').css('color', '#6e6d6d');
    $('#lblnombreIncidencia-IDX').text('Incidencia');
}

// Función para reloj -IDX
function reloj_IDX() {
    var tiempo_IDX = new Date();
    var hora_IDX = tiempo_IDX.getHours();
    var minutos_IDX = tiempo_IDX.getMinutes();
    var segundos_IDX = tiempo_IDX.getSeconds();

    if (hora_IDX < 10) {
        hora_IDX = '0' + hora_IDX;
    }
    if (minutos_IDX < 10) {
        minutos_IDX = '0' + minutos_IDX;
    }
    if (segundos_IDX < 10) {
        segundos_IDX = '0' + segundos_IDX;
    }

    var tiempoActual = hora_IDX + ':' + minutos_IDX + ':' + segundos_IDX;
    document.getElementById('lblHora-IDX').textContent = tiempoActual;

    setTimeout(reloj_IDX, 1000);
};

function fecha_IDX() {
    var hoy_IDX = new Date();
    var meses_IDX = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var dias_IDX = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var fechaActual_IDX = dias_IDX[hoy_IDX.getDay()] + ', ' + hoy_IDX.getDate() + ' de ' + meses_IDX[hoy_IDX.getMonth()] + ' de ' + hoy_IDX.getFullYear();

    document.getElementById('lblFecha-IDX').textContent = fechaActual_IDX;

    setTimeout(fecha_IDX, 1000);
}

// Función que checa si hay algun admin registrado
function revisar__admins() {
    $.ajax({
        url:"../mAsistencias/revisarAdmins.php",
        type:"POST",
        dataType:"json",
        data:{},
        success:function(respuesta){
            var dataArray = respuesta;
            console.log(dataArray);
            var registros = dataArray.cRegistros;
            console.log(registros);
            if (registros != 0) {
                console.log("Hay registros");
                $("#modalLogin").modal("show");
            } else {
                console.log("Noy hay registros");
                swal.fire({
                    title: 'Aun no hay algún administrador registrado',
                    icon: 'info',
                    confirmButtonText: 'Registro',
                    timer: '3000',
                    timerProgressBar: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalRegistro-PR').modal('show');
                    }
                });
            }

        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

$("#horaActual-aTag").dblclick(function () {
    // $("#modalRegistro-PR").modal("show"); 
    revisar__admins();
});

//Funciòn para ocultar fotas las secciones
const ocultarSecciones = () => {
    //ADMINISTRADORES
    $('#administradores').hide();
    $('#nuevo-ADM').hide();
    $('#editar-ADM').hide();
    $('#listado-ADM').hide();
    //DOCENTES Y ADMINISTRATIVOS
    $('#docentesAdministrativos').hide();
    $('#nuevo-DYA').hide();
    $('#editar-DYA').hide();
    $('#listado-DYA').hide();
    //HORARIOS
    $('#horariosModulo').hide();
    $('#nuevo-H').hide();
    $('#editar-H').hide();
    $('#quitar-H').hide();
    $('#listado-H').hide();
    $('#menu-H').hide();
    //INCAPACIDADES
    $('#incapacidades').hide();
    $('#nuevo-I').hide();
    $('#listado-I').hide();
    //Consultas y reportes
    $('#consultasReportes').hide();
    $('#listado-CR').hide();
}

const verAdministradores = () => {
    ocultarSecciones();
    $('#lblTitulo').text('Administradores');
    $('#nuevo-ADM').hide();
    $('#editar-ADM').hide();
    $('#listado-ADM').fadeIn();
    $('#administradores').show();
    llenar_lista_ADM();
}

const verDocentesAdministrativos = () => {
    ocultarSecciones();
    $('#lblTitulo').text('Docentes y Administrativos');
    $('#nuevo-DYA').hide();
    $('#editar-DYA').hide();
    $('#listado-DYA').fadeIn();
    $('#docentesAdministrativos').show();
    llenar_lista_DYA();
}

const verHorarios  = () => {
    ocultarSecciones();
    $('#lblTitulo').text('Horarios | Menú');
    $('#nuevo-H').hide();
    $('#editar-H').hide();
    $('#listado-H').fadeIn();
    $('#horariosModulo').show();
    llenar_modulo_H();
}

const verIncapacidades = () => {
    ocultarSecciones();
    $('#lblTitulo').text('Permisos e Incapacidades');
    $('#nuevo-I').hide();
    $('#listado-I').hide();
    $('#incapacidades').show();
    llenar_lista_I();
}

const verConsultasReportes = () => {
    ocultarSecciones();
    $('#lblTitulo').text('Consultas y Reportes');
    $('#listado-CR').fadeIn();
    $('#consultasReportes').show();
    llenar_modulo_CR();
}

