const llenar_modulo_H = () => {
    showLoading('Cargando módulo de horarios');
    $('#frmGuardar-H')[0].reset();
    $('#frmActualizar-H')[0].reset();
    $('#frmQuitar-H')[0].reset();
    $('#listado-H').hide();
    $('#menu-H').fadeIn('slow');
}

const llenar_lista_H_nuevo = () => {
    showLoading('Cargando lista de horarios');
    $.ajax({
        url: '../mHorarios/lista.php',
        type: 'POST',
        dataType: 'html',
        data: {},
        success: function (respuesta) {
            $('#listado-H').html(respuesta);
            $('#listado-H').fadeIn('slow');
            $('#menu-H').hide();
            $('#lblTitulo').text('Horarios | Lista');
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        }
    });
}

const llenar_lista_H_editar = () => {
    showLoading('Cargando lista de horarios');
    $.ajax({
        url: '../mHorarios/lista1.php',
        type: 'POST',
        dataType: 'html',
        data: {},
        success: function (respuesta) {
            $('#listado-H').html(respuesta);
            $('#listado-H').fadeIn('slow');
            $('#menu-H').hide();
            $('#lblTitulo').text('Horarios | Lista');
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        }
    });
}

document.getElementById('horario-item-nuevo').addEventListener('click', () => {
    llenar_lista_H_nuevo();
})

document.getElementById('horario-item-editar').addEventListener('click', () => {
    llenar_lista_H_editar();
})

const regresar_menu_H = () => {
    $('#listado-H').hide();
    $('#menu-H').fadeIn();
    $('#lblTitulo').text('Horarios | Menú');
}

const nuevo_registro_H = (id, nombre) => {
    $('#frmGuardar-H')[0].reset();
    $('#lblTitulo').text('Horarios | Nuevo Registro');
    selectTwo();
    $('#id-H').val(id);
    $('#usuario-H').val(nombre);
    $('#encabezado-H').html('Asignando horario a <strong>' + nombre + '</strong>');
    $('#listado-H').hide();
    $('#nuevo-H').show();
    $('#checkLunes-H').prop('checked', true);
    $('#checkMartes-H').prop('checked', true);
    $('#checkMiercoles-H').prop('checked', true);
    $('#checkJueves-H').prop('checked', true);
    $('#checkViernes-H').prop('checked', true);
}

const llenar_formulario_H = (id, nombre, turno, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida) => {
    $('#frmActualizar-H')[0].reset();
    $('#lblTitulo').text('Horarios | Editar Registro');
    $('#eid-H').val(id);
    $('#eusuario-H').val(nombre);
    $('#eturno-H').val(turno);
    selectTwo();
    $('#eencabezado-H').html('Editando horario de <strong>' + nombre + '</strong>');
    $('#listado-H').hide();
    $('#editar-H').show();
    $('#echeckLunes-H').prop('checked', true);
    $('#echeckMartes-H').prop('checked', true);
    $('#echeckMiercoles-H').prop('checked', true);
    $('#echeckJueves-H').prop('checked', true);
    $('#echeckViernes-H').prop('checked', true);
    $('#hActuales-H').html('Horario actual de <strong>' + nombre + '</strong>:');

    (d_entrada == '12:00 AM' && d_salida == '12:00 AM') ? $('#dActuales-H').html('Domingo: <strong>Sin horario asignado</strong>') : $('#dActuales-H').html('Domingo: De <strong>' + d_entrada + '</strong> a <strong>' + d_salida + '</strong>');

    (l_entrada == '12:00 AM' && l_salida == '12:00 AM') ? $('#lActuales-H').html('Lunes: <strong>Sin horario asignado</strong>') : $('#lActuales-H').html('Lunes: De <strong>' + l_entrada + '</strong> a <strong>' + l_salida + '</strong>');

    (m_entrada == '12:00 AM' && m_salida == '12:00 AM') ? $('#mActuales-H').html('Martes: <strong>Sin horario asignado</strong>') : $('#mActuales-H').html('Martes: De <strong>' + m_entrada + '</strong> a <strong>' + m_salida + '</strong>');

    (mi_entrada == '12:00 AM' && mi_salida == '12:00 AM') ? $('#miActuales-H').html('Miércoles: <strong>Sin horario asignado</strong>') : $('#miActuales-H').html('Miércoles: De <strong>' + mi_entrada + '</strong> a <strong>' + mi_salida + '</strong>');

    (j_entrada == '12:00 AM' && j_salida == '12:00 AM') ? $('#jActuales-H').html('Jueves: <strong>Sin horario asignado</strong>') : $('#jActuales-H').html('Jueves: De <strong>' + j_entrada + '</strong> a <strong>' + j_salida + '</strong>');

    (v_entrada == '12:00 AM' && v_salida == '12:00 AM') ? $('#vActuales-H').html('Viernes: <strong>Sin horario asignado</strong>') : $('#vActuales-H').html('Viernes: De <strong>' + v_entrada + '</strong> a <strong>' + v_salida + '</strong>');

    (s_entrada == '12:00 AM' && s_salida == '12:00 AM') ? $('#sActuales-H').html('Sábado: <strong>Sin horario asignado</strong>') : $('#sActuales-H').html('Sábado: De <strong>' + s_entrada + '</strong> a <strong>' + s_salida + '</strong>');

}

const llenar_quitar_H = (id, nombre, turno, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida) => {
    $('#frmQuitar-H')[0].reset();
    $('#lblTitulo').text('Horarios | Editar Registro');
    $('#qid-H').val(id);
    $('#qusuario-H').val(nombre);
    $('#qturno-H').val(turno);
    $('#qencabezado-H').html('Editando horario de <strong>' + nombre + '</strong>');
    $('#listado-H').hide();
    $('#quitar-H').show();
    $('#qcheckLunes-H').prop('checked', true);
    $('#qcheckMartes-H').prop('checked', true);
    $('#qcheckMiercoles-H').prop('checked', true);
    $('#qcheckJueves-H').prop('checked', true);
    $('#qcheckViernes-H').prop('checked', true);
    $('#qhActuales-H').html('Horario actual de <strong>' + nombre + '</strong>:');

    (d_entrada == '12:00 AM' && d_salida == '12:00 AM') ? $('#qdActuales-H').html('Domingo: <strong>Sin horario asignado</strong>') : $('#qdActuales-H').html('Domingo: De <strong>' + d_entrada + '</strong> a <strong>' + d_salida + '</strong>');

    (l_entrada == '12:00 AM' && l_salida == '12:00 AM') ? $('#qlActuales-H').html('Lunes: <strong>Sin horario asignado</strong>') : $('#qlActuales-H').html('Lunes: De <strong>' + l_entrada + '</strong> a <strong>' + l_salida + '</strong>');

    (m_entrada == '12:00 AM' && m_salida == '12:00 AM') ? $('#qmActuales-H').html('Martes: <strong>Sin horario asignado</strong>') : $('#qmActuales-H').html('Martes: De <strong>' + m_entrada + '</strong> a <strong>' + m_salida + '</strong>');

    (mi_entrada == '12:00 AM' && mi_salida == '12:00 AM') ? $('#qmiActuales-H').html('Miércoles: <strong>Sin horario asignado</strong>') : $('#qmiActuales-H').html('Miércoles: De <strong>' + mi_entrada + '</strong> a <strong>' + mi_salida + '</strong>');

    (j_entrada == '12:00 AM' && j_salida == '12:00 AM') ? $('#qjActuales-H').html('Jueves: <strong>Sin horario asignado</strong>') : $('#qjActuales-H').html('Jueves: De <strong>' + j_entrada + '</strong> a <strong>' + j_salida + '</strong>');

    (v_entrada == '12:00 AM' && v_salida == '12:00 AM') ? $('#qvActuales-H').html('Viernes: <strong>Sin horario asignado</strong>') : $('#qvActuales-H').html('Viernes: De <strong>' + v_entrada + '</strong> a <strong>' + v_salida + '</strong>');

    (s_entrada == '12:00 AM' && s_salida == '12:00 AM') ? $('#qsActuales-H').html('Sábado: <strong>Sin horario asignado</strong>') : $('#qsActuales-H').html('Sábado: De <strong>' + s_entrada + '</strong> a <strong>' + s_salida + '</strong>');

}

const get24hFormat = (hora) => {
    let hours = Number(hora.match(/^(\d+)/)[1]);
    let minutes = Number(hora.match(/:(\d+)/)[1]);
    let AMPM = hora.match(/\s(.*)$/)[1];
    if(AMPM == "PM" && hours<12) hours = hours+12;
    if(AMPM == "AM" && hours==12) hours = hours-12;
    let sHours = hours.toString();
    let sMinutes = minutes.toString();
    if(hours<10) sHours = "0" + sHours;
    if(minutes<10) sMinutes = "0" + sMinutes;
    let full_hour = sHours + ":" + sMinutes + ':00';
    return full_hour;
}

const get12hFormat = (hora) => {
    let timeString = hora;
    let H = +timeString.substr(0, 2);
    let h = (H % 12) || 12;
    let ampm = H < 12 ? " AM" : " PM";
    if(h < 10){
         return timeString = '0'+ h + timeString.substr(2, 3) + ampm;
    }else{
         return timeString = h + timeString.substr(2, 3) + ampm;
    }
}

$('#frmGuardar-H').submit(function (e) {
    let id = $('#id-H').val();
    let nombre_usuario = $('#usuario-H').val();
    let turno = $('#turno-H').val();
    let hora_entrada = $('#horaEntrada-H').val();
    let minuto_entrada = $('#minutoEntrada-H').val();
    let periodo_entrada = $('#periodoEntrada-H').val();
    let hora_salida = $('#horaSalida-H').val();
    let minuto_salida = $('#minutoSalida-H').val();
    let periodo_salida = $('#periodoSalida-H').val();
    let hora_entrada_completa = hora_entrada + ':' + minuto_entrada + ' ' + periodo_entrada;
    let hora_salida_completa = hora_salida + ':' + minuto_salida + ' ' + periodo_salida;
    let nueva_entrada_completa = get24hFormat(hora_entrada_completa);
    let nueva_salida_completa = get24hFormat(hora_salida_completa);
    let d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida;

    if (document.getElementById('checkDomingo-H').checked == true) {
        d_entrada = nueva_entrada_completa;
        d_salida = nueva_salida_completa;
    } else {
        d_entrada = '00:00:00';
        d_salida = '00:00:00';
    }

    if (document.getElementById('checkLunes-H').checked == true) {
        l_entrada = nueva_entrada_completa;
        l_salida = nueva_salida_completa;
    } else {
        l_entrada = '00:00:00';
        l_salida = '00:00:00';
    }

    if (document.getElementById('checkMartes-H').checked == true) {
        m_entrada = nueva_entrada_completa;
        m_salida = nueva_salida_completa;
    } else {
        m_entrada = '00:00:00';
        m_salida = '00:00:00';
    }

    if (document.getElementById('checkMiercoles-H').checked == true) {
        mi_entrada = nueva_entrada_completa;
        mi_salida = nueva_salida_completa;
    } else {
        mi_entrada = '00:00:00';
        mi_salida = '00:00:00';
    }

    if (document.getElementById('checkJueves-H').checked == true) {
        j_entrada = nueva_entrada_completa;
        j_salida = nueva_salida_completa;
    } else {
        j_entrada = '00:00:00';
        j_salida = '00:00:00';
    }

    if (document.getElementById('checkViernes-H').checked == true) {
        v_entrada = nueva_entrada_completa;
        v_salida = nueva_salida_completa;
    } else {
        v_entrada = '00:00:00';
        v_salida = '00:00:00';
    }

    if (document.getElementById('checkSabado-H').checked == true) {
        s_entrada = nueva_entrada_completa;
        s_salida = nueva_salida_completa;
    } else {
        s_entrada = '00:00:00';
        s_salida = '00:00:00';
    }

    if (nueva_entrada_completa == nueva_salida_completa) {
        swal.fire({
            title: 'Error',
            text: 'La hora de entrada y salida no pueden ser iguales',
            icon: 'warning',
            confirmButtonText: 'Entendido'
        })
    } else if (nueva_entrada_completa > nueva_salida_completa){
        swal.fire({
            title: 'Error',
            text: 'La hora de salida no puede ser una antes de la hora de entrada',
            icon: 'warning',
            confirmButtonText: 'Entendido'
        })
    } else {
        $.ajax({
            url:"../mHorarios/revisarHorarios.php",
            type:"POST",
            dataType:"json",
            data:{id},
            success:function(respuesta){
                let dataArray = respuesta;
                console.log(dataArray);
                let registros = dataArray.cRegistros;
                console.log(registros);  
                let datos = dataArray.result;
                if (registros == 0) {
                    $.ajax({
                        url:"../mHorarios/guardar.php",
                        type:"POST",
                        dataType:"html",
                        data:{id, turno, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida},
                        success:function(respuesta){
                            swal.fire({
                                title: 'Has registrado el horario con éxito',
                                text: `¿Deseas seguir con el mismo Docente/Administrativo? (${nombre_usuario})`,
                                icon: 'success',
                                confirmButtonText: 'Sí, seguir',
                                showDenyButton: true,
                                denyButtonText: 'No, salir'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    return false;
                                } else if (result.isDenied) {
                                    $('#frmGuardar-H')[0].reset();
                                    $('#nuevo-H').hide();
                                    llenar_lista_H_nuevo();
                                }
                            });
                        },
                        error:function(xhr,status){
                            alert("Error en metodo AJAX"); 
                        },
                    });
                } else {
                    console.log('Hay registro');
                    console.log(l_entrada);
                    let db_d_entrada = datos.d_entrada;
                    let db_d_salida = datos.d_salida;
                    let db_l_entrada = datos.l_entrada;
                    let db_l_salida = datos.l_salida;
                    let db_m_entrada = datos.m_entrada;
                    let db_m_salida = datos.m_salida;
                    let db_mi_entrada = datos.mi_entrada;
                    let db_mi_salida = datos.mi_salida;
                    let db_j_entrada = datos.j_entrada;
                    let db_j_salida = datos.j_salida;
                    let db_v_entrada = datos.v_entrada;
                    let db_v_salida = datos.v_salida;
                    let db_s_entrada = datos.s_entrada;
                    let db_s_salida = datos.s_salida;

                    if (d_entrada == '00:00:00') d_entrada = db_d_entrada;
                    if (d_salida == '00:00:00') d_salida = db_d_salida;

                    if (l_entrada == '00:00:00') l_entrada = db_l_entrada;
                    if (l_salida == '00:00:00') l_salida = db_l_salida;
                    
                    if (m_entrada == '00:00:00') m_entrada = db_m_entrada;
                    if (m_salida == '00:00:00') m_salida = db_m_salida;
                    
                    if (mi_entrada == '00:00:00') mi_entrada = db_mi_entrada;
                    if (mi_salida == '00:00:00') mi_salida = db_mi_salida;
                    
                    if (j_entrada == '00:00:00') j_entrada = db_j_entrada;
                    if (j_salida == '00:00:00') j_salida = db_j_salida;
                    
                    if (v_entrada == '00:00:00') v_entrada = db_v_entrada;
                    if (v_salida == '00:00:00') v_salida = db_v_salida;
                    
                    if (s_entrada == '00:00:00') s_entrada = db_s_entrada;
                    if (s_salida == '00:00:00') s_salida = db_s_salida;
                    console.log('--');
                    console.log(l_entrada);
                    
                    $.ajax({
                        url:"../mHorarios/actualizar.php",
                        type:"POST",
                        dataType:"html",
                        data:{id, turno, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida},
                        success:function(respuesta){
                            swal.fire({
                                title: 'Has registrado el horario con éxito',
                                text: `¿Deseas seguir con el mismo Docente/Administrativo? (${nombre_usuario})`,
                                icon: 'success',
                                confirmButtonText: 'Sí, seguir',
                                showDenyButton: true,
                                denyButtonText: 'No, salir'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    return false;
                                } else if (result.isDenied) {
                                    $('#frmGuardar-H')[0].reset();
                                    $('#nuevo-H').hide();
                                    llenar_lista_H_nuevo();
                                }
                            });
                        },
                        error:function(xhr,status){
                            alert("Error en metodo AJAX"); 
                        },
                    });

                }
            },
            error:function(xhr,status){
                alert("Error en metodo AJAX"); 
            },
        });
    }
    
    e.preventDefault(e);
    return false;
    
});

$('#frmActualizar-H').submit(function (e) {
    let id = $('#eid-H').val();
    let nombre_usuario = $('#eusuario-H').val();
    let turno = $('#eturno-H').val();
    let hora_entrada = $('#ehoraEntrada-H').val();
    let minuto_entrada = $('#eminutoEntrada-H').val();
    let periodo_entrada = $('#eperiodoEntrada-H').val();
    let hora_salida = $('#ehoraSalida-H').val();
    let minuto_salida = $('#eminutoSalida-H').val();
    let periodo_salida = $('#eperiodoSalida-H').val();
    let hora_entrada_completa = hora_entrada + ':' + minuto_entrada + ' ' + periodo_entrada;
    let hora_salida_completa = hora_salida + ':' + minuto_salida + ' ' + periodo_salida;
    let nueva_entrada_completa = get24hFormat(hora_entrada_completa);
    let nueva_salida_completa = get24hFormat(hora_salida_completa);
    let d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida;

    if (document.getElementById('echeckDomingo-H').checked == true) {
        d_entrada = nueva_entrada_completa;
        d_salida = nueva_salida_completa;
    } else {
        d_entrada = '00:00:00';
        d_salida = '00:00:00';
    }

    if (document.getElementById('echeckLunes-H').checked == true) {
        l_entrada = nueva_entrada_completa;
        l_salida = nueva_salida_completa;
    } else {
        l_entrada = '00:00:00';
        l_salida = '00:00:00';
    }

    if (document.getElementById('echeckMartes-H').checked == true) {
        m_entrada = nueva_entrada_completa;
        m_salida = nueva_salida_completa;
    } else {
        m_entrada = '00:00:00';
        m_salida = '00:00:00';
    }

    if (document.getElementById('echeckMiercoles-H').checked == true) {
        mi_entrada = nueva_entrada_completa;
        mi_salida = nueva_salida_completa;
    } else {
        mi_entrada = '00:00:00';
        mi_salida = '00:00:00';
    }

    if (document.getElementById('echeckJueves-H').checked == true) {
        j_entrada = nueva_entrada_completa;
        j_salida = nueva_salida_completa;
    } else {
        j_entrada = '00:00:00';
        j_salida = '00:00:00';
    }

    if (document.getElementById('echeckViernes-H').checked == true) {
        v_entrada = nueva_entrada_completa;
        v_salida = nueva_salida_completa;
    } else {
        v_entrada = '00:00:00';
        v_salida = '00:00:00';
    }

    if (document.getElementById('echeckSabado-H').checked == true) {
        s_entrada = nueva_entrada_completa;
        s_salida = nueva_salida_completa;
    } else {
        s_entrada = '00:00:00';
        s_salida = '00:00:00';
    }

    if (nueva_entrada_completa == nueva_salida_completa) {
        swal.fire({
            title: 'Error',
            text: 'La hora de entrada y salida no pueden ser iguales',
            icon: 'warning',
            confirmButtonText: 'Entendido'
        })
    } else if (nueva_entrada_completa > nueva_salida_completa){
        swal.fire({
            title: 'Error',
            text: 'La hora de salida no puede ser una antes de la hora de entrada',
            icon: 'warning',
            confirmButtonText: 'Entendido'
        })
    }else {
        $.ajax({
            url:"../mHorarios/revisarHorarios.php",
            type:"POST",
            dataType:"json",
            data:{id},
            success:function(respuesta){
                let dataArray = respuesta;
                console.log(dataArray);
                let registros = dataArray.cRegistros;
                console.log(registros);  
                let datos = dataArray.result;

                let db_d_entrada = datos.d_entrada;
                let db_d_salida = datos.d_salida;
                let db_l_entrada = datos.l_entrada;
                let db_l_salida = datos.l_salida;
                let db_m_entrada = datos.m_entrada;
                let db_m_salida = datos.m_salida;
                let db_mi_entrada = datos.mi_entrada;
                let db_mi_salida = datos.mi_salida;
                let db_j_entrada = datos.j_entrada;
                let db_j_salida = datos.j_salida;
                let db_v_entrada = datos.v_entrada;
                let db_v_salida = datos.v_salida;
                let db_s_entrada = datos.s_entrada;
                let db_s_salida = datos.s_salida;

                if (d_entrada == '00:00:00') d_entrada = db_d_entrada;
                if (d_salida == '00:00:00') d_salida = db_d_salida;

                if (l_entrada == '00:00:00') l_entrada = db_l_entrada;
                if (l_salida == '00:00:00') l_salida = db_l_salida;
                
                if (m_entrada == '00:00:00') m_entrada = db_m_entrada;
                if (m_salida == '00:00:00') m_salida = db_m_salida;
                
                if (mi_entrada == '00:00:00') mi_entrada = db_mi_entrada;
                if (mi_salida == '00:00:00') mi_salida = db_mi_salida;
                
                if (j_entrada == '00:00:00') j_entrada = db_j_entrada;
                if (j_salida == '00:00:00') j_salida = db_j_salida;
                
                if (v_entrada == '00:00:00') v_entrada = db_v_entrada;
                if (v_salida == '00:00:00') v_salida = db_v_salida;
                
                if (s_entrada == '00:00:00') s_entrada = db_s_entrada;
                if (s_salida == '00:00:00') s_salida = db_s_salida;
                console.log('--');
                console.log(l_entrada);
                    
                $.ajax({
                    url:"../mHorarios/actualizar.php",
                    type:"POST",
                    dataType:"html",
                    data:{id, turno, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida},
                    success:function(respuesta){
                        swal.fire({
                            title: 'Has modificado el horario con éxito',
                            text: `¿Deseas seguir con el mismo Docente/Administrativo? (${nombre_usuario})`,
                            icon: 'success',
                            confirmButtonText: 'Sí, seguir',
                            showDenyButton: true,
                            denyButtonText: 'No, salir'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                d_entrada = get12hFormat(d_entrada);
                                d_salida = get12hFormat(d_salida);
                                l_entrada = get12hFormat(l_entrada);
                                l_salida = get12hFormat(l_salida);
                                m_entrada = get12hFormat(m_entrada);
                                m_salida = get12hFormat(m_salida);
                                mi_entrada = get12hFormat(mi_entrada);
                                mi_salida = get12hFormat(mi_salida);
                                j_entrada = get12hFormat(j_entrada);
                                j_salida = get12hFormat(j_salida);
                                v_entrada = get12hFormat(v_entrada);
                                v_salida = get12hFormat(v_salida);
                                s_entrada = get12hFormat(s_entrada);
                                s_salida = get12hFormat(s_salida);

                                (d_entrada == '12:00 AM' && d_salida == '12:00 AM') ? $('#dActuales-H').html('Domingo: <strong>Sin horario asignado</strong>') : $('#dActuales-H').html('Domingo: De <strong>' + d_entrada + '</strong> a <strong>' + d_salida + '</strong>');

                                (l_entrada == '12:00 AM' && l_salida == '12:00 AM') ? $('#lActuales-H').html('Lunes: <strong>Sin horario asignado</strong>') : $('#lActuales-H').html('Lunes: De <strong>' + l_entrada + '</strong> a <strong>' + l_salida + '</strong>');

                                (m_entrada == '12:00 AM' && m_salida == '12:00 AM') ? $('#mActuales-H').html('Martes: <strong>Sin horario asignado</strong>') : $('#mActuales-H').html('Martes: De <strong>' + m_entrada + '</strong> a <strong>' + m_salida + '</strong>');

                                (mi_entrada == '12:00 AM' && mi_salida == '12:00 AM') ? $('#miActuales-H').html('Miércoles: <strong>Sin horario asignado</strong>') : $('#miActuales-H').html('Miércoles: De <strong>' + mi_entrada + '</strong> a <strong>' + mi_salida + '</strong>');

                                (j_entrada == '12:00 AM' && j_salida == '12:00 AM') ? $('#jActuales-H').html('Jueves: <strong>Sin horario asignado</strong>') : $('#jActuales-H').html('Jueves: De <strong>' + j_entrada + '</strong> a <strong>' + j_salida + '</strong>');

                                (v_entrada == '12:00 AM' && v_salida == '12:00 AM') ? $('#vActuales-H').html('Viernes: <strong>Sin horario asignado</strong>') : $('#vActuales-H').html('Viernes: De <strong>' + v_entrada + '</strong> a <strong>' + v_salida + '</strong>');

                                (s_entrada == '12:00 AM' && s_salida == '12:00 AM') ? $('#sActuales-H').html('Sábado: <strong>Sin horario asignado</strong>') : $('#sActuales-H').html('Sábado: De <strong>' + s_entrada + '</strong> a <strong>' + s_salida + '</strong>');
                            } else if (result.isDenied) {
                                $('#frmActualizar-H')[0].reset();
                                $('#editar-H').hide();
                                llenar_lista_H_editar();
                            }
                        });
                    },
                    error:function(xhr,status){
                        alert("Error en metodo AJAX"); 
                    },
                });
            },
            error:function(xhr,status){
                alert("Error en metodo AJAX"); 
            },
        });
    }
    
    e.preventDefault(e);
    return false;
});

$('#frmQuitar-H').submit(function (e) {
    let id = $('#qid-H').val();
    let nombre_usuario = $('#qusuario-H').val();
    let turno = $('#qturno-H').val();
    let d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida;
    $.ajax({
        url:"../mHorarios/revisarHorarios.php",
        type:"POST",
        dataType:"json",
        data:{id},
        success:function(respuesta){
            let dataArray = respuesta;
            console.log(dataArray);
            let registros = dataArray.cRegistros;
            console.log(registros);  
            let datos = dataArray.result;
            if (document.getElementById('qcheckDomingo-H').checked == true) {
                d_entrada = '00:00:00';
                d_salida = '00:00:00';
            } else {
                d_entrada = datos.d_entrada;
                d_salida = datos.d_salida;
            }
        
            if (document.getElementById('qcheckLunes-H').checked == true) {
                l_entrada = '00:00:00';
                l_salida = '00:00:00';
            } else {
                l_entrada = datos.l_entrada;
                l_salida = datos.l_salida;
            }
        
            if (document.getElementById('qcheckMartes-H').checked == true) {
                m_entrada = '00:00:00';
                m_salida = '00:00:00';
            } else {
                m_entrada = datos.m_entrada;
                m_salida = datos.m_salida;
            }
        
            if (document.getElementById('qcheckMiercoles-H').checked == true) {
                mi_entrada = '00:00:00';
                mi_salida = '00:00:00';
            } else {
                mi_entrada = datos.mi_entrada;
                mi_salida = datos.mi_salida;
            }
        
            if (document.getElementById('qcheckJueves-H').checked == true) {
                j_entrada = '00:00:00';
                j_salida = '00:00:00';
            } else {
                j_entrada = datos.j_entrada;
                j_salida = datos.j_salida;
            }
        
            if (document.getElementById('qcheckViernes-H').checked == true) {
                v_entrada = '00:00:00';
                v_salida = '00:00:00';
            } else {
                v_entrada = datos.v_entrada;
                v_salida = datos.v_salida;
            }
        
            if (document.getElementById('qcheckSabado-H').checked == true || turno == 'Eliminar') {
                s_entrada = '00:00:00';
                s_salida = '00:00:00';
            } else {
                s_entrada = datos.s_entrada;
                s_salida = datos.s_salida;
            }

            $.ajax({
                url:"../mHorarios/actualizar.php",
                type:"POST",
                dataType:"html",
                data:{id, turno, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida},
                success:function(respuesta){
                    swal.fire({
                        title: 'Has modificado el horario con éxito',
                        text: `¿Deseas seguir con el mismo Docente/Administrativo? (${nombre_usuario})`,
                        icon: 'success',
                        confirmButtonText: 'Sí, seguir',
                        showDenyButton: true,
                        denyButtonText: 'No, salir'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            d_entrada = get12hFormat(d_entrada);
                            d_salida = get12hFormat(d_salida);
                            l_entrada = get12hFormat(l_entrada);
                            l_salida = get12hFormat(l_salida);
                            m_entrada = get12hFormat(m_entrada);
                            m_salida = get12hFormat(m_salida);
                            mi_entrada = get12hFormat(mi_entrada);
                            mi_salida = get12hFormat(mi_salida);
                            j_entrada = get12hFormat(j_entrada);
                            j_salida = get12hFormat(j_salida);
                            v_entrada = get12hFormat(v_entrada);
                            v_salida = get12hFormat(v_salida);
                            s_entrada = get12hFormat(s_entrada);
                            s_salida = get12hFormat(s_salida);

                            (d_entrada == '12:00 AM' && d_salida == '12:00 AM') ? $('#qdActuales-H').html('Domingo: <strong>Sin horario asignado</strong>') : $('#qdActuales-H').html('Domingo: De <strong>' + d_entrada + '</strong> a <strong>' + d_salida + '</strong>');

                            (l_entrada == '12:00 AM' && l_salida == '12:00 AM') ? $('#qlActuales-H').html('Lunes: <strong>Sin horario asignado</strong>') : $('#qlActuales-H').html('Lunes: De <strong>' + l_entrada + '</strong> a <strong>' + l_salida + '</strong>');

                            (m_entrada == '12:00 AM' && m_salida == '12:00 AM') ? $('#qmActuales-H').html('Martes: <strong>Sin horario asignado</strong>') : $('#qmActuales-H').html('Martes: De <strong>' + m_entrada + '</strong> a <strong>' + m_salida + '</strong>');

                            (mi_entrada == '12:00 AM' && mi_salida == '12:00 AM') ? $('#qmiActuales-H').html('Miércoles: <strong>Sin horario asignado</strong>') : $('#qmiActuales-H').html('Miércoles: De <strong>' + mi_entrada + '</strong> a <strong>' + mi_salida + '</strong>');

                            (j_entrada == '12:00 AM' && j_salida == '12:00 AM') ? $('#qjActuales-H').html('Jueves: <strong>Sin horario asignado</strong>') : $('#qjActuales-H').html('Jueves: De <strong>' + j_entrada + '</strong> a <strong>' + j_salida + '</strong>');

                            (v_entrada == '12:00 AM' && v_salida == '12:00 AM') ? $('#qvActuales-H').html('Viernes: <strong>Sin horario asignado</strong>') : $('#qvActuales-H').html('Viernes: De <strong>' + v_entrada + '</strong> a <strong>' + v_salida + '</strong>');

                            (s_entrada == '12:00 AM' && s_salida == '12:00 AM') ? $('#qsActuales-H').html('Sábado: <strong>Sin horario asignado</strong>') : $('#qsActuales-H').html('Sábado: De <strong>' + s_entrada + '</strong> a <strong>' + s_salida + '</strong>');
                        } else if (result.isDenied) {
                            $('#frmQuitar-H')[0].reset();
                            $('#quitar-H').hide();
                            llenar_lista_H_editar();
                        }
                    });
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX"); 
                },
            });
            
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });

    e.preventDefault(e);
    return false;
});


$('#btnCancelarG-H').click(function () {
    llenar_lista_H_nuevo();
    $('#nuevo-H').hide();
});
$('#btnCancelarA-H , #btnCancelarQ-H').click(function () {
    llenar_lista_H_editar();
    $('#editar-H').hide();
    $('#quitar-H').hide();
});