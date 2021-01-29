const llenar_lista_I = (fecha_inicio, fecha_final) => {
    showLoading('Cargando lista de permisos e incapacidades');
    const nfecha_inicio = fecha_inicio,
        nfecha_final = fecha_final;
    //$('#frmGuardar-I')[0].reset();
    if (nfecha_inicio && nfecha_final) {
        $.ajax({
            url: '../mIncapacidades/lista1.php',
            type: 'POST',
            dataType: 'html',
            data: {nfecha_inicio, nfecha_final},
            success: function (respuesta) {
                $('#listado-I').html(respuesta);
                $('#listado-I').fadeIn('slow');
                $('#nuevo-I').hide();
                $('#lblTitulo').text('Permisos e Incapacidades | Lista');
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    } else {
        $.ajax({
            url: '../mIncapacidades/lista.php',
            type: 'POST',
            dataType: 'html',
            data: {},
            success: function (respuesta) {
                $('#listado-I').html(respuesta);
                $('#listado-I').fadeIn('slow');
                $('#nuevo-I').hide();
                $('#lblTitulo').text('Permisos e Incapacidades | Lista');
            },
            error: function (xhr, status) {
                alert('Error en método AJAX');
            }
        });
    }
}

const nuevo_registro_I = () => {
    $('#frmGuardar-I')[0].reset();
    $('#lblTitulo').text('Permisos e Incapacidades | Nuevo Registro');
    $('#listado-I').hide();
    $('#nuevo-I').fadeIn();
    combo_DocAdm_I();
}

const abrirModalBuscarFechas = () => {
    $('#modalBuscarFecha-I').modal('show');
    $('#modalTitle-I').text('Selecciona entre que fechas quieres buscar');
}

const combo_DocAdm_I = () => {
    $.ajax({
        url : '../mIncapacidades/comboDocAdm.php',
        data : {},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            
            $("#cmbDocAdm-I").empty();
            $("#cmbDocAdm-I").html(respuesta);    
            selectTwo();
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

$('#frmGuardar-I').submit(function (e) {
    let id = $('#cmbDocAdm-I').val();
    let nombre_incapacidad = $('#cmbIncapacidad-I').val();
    let fecha_incapacidad = $('#fechaIncapacidad-I').val();
    $.ajax({
        url:"../mIncapacidades/rIncapacidad.php",
        type:"POST",
        dataType:"html",
        data:{id, fecha_incapacidad},
        success:function(respuesta){
            let res = respuesta;
            if (res == 0) {
                $.ajax({
                    url:"../mIncapacidades/guardar.php",
                    type:"POST",
                    dataType:"html",
                    data:{id, nombre_incapacidad, fecha_incapacidad},
                    success: function (respuesta) {
                            $("#frmGuardar-I")[0].reset();
                            $('#nuevo-I').hide();
                            swal.fire({
                                title: `Has registrado un permiso con éxito`,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000,
                                didClose: () => {
                                    llenar_lista_I();
                                }
                            });
                        
                    },
                    error:function(xhr,status){
                        alert("Error en metodo AJAX"); 
                    },
                });
            } else {
                swal.fire({
                    title: `El trabajador ya tiene un permiso asignado en la fecha seleccionada`,
                    icon: 'info',
                    showConfirmButton: true,
                    confirmButtonText: 'Entendido'
                });
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
    

    e.preventDefault();
    return false;
});

$('#btnCancelarG-I').click(function () {
    $('#frmGuardar-I')[0].reset();
    $('#nuevo-I').hide();
    $('#listado-I').fadeIn();
    $('#lblTitulo').text('Permisos e Incapacidades | Lista');
});

$('#btnBuscarFecha').click(function () {
    let fecha_inicial = $('#fechaInicial-I').val();
    let fecha_final = $('#fechaFinal-I').val();
    $('#modalBuscarFecha-I').modal('hide');
    llenar_lista_I(fecha_inicial, fecha_final);
});

