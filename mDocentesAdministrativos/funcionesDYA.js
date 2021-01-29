const llenar_lista_DYA = () => {
    showLoading('Cargando lista de docentes y administrativos');
    $('#frmGuardar-DYA')[0].reset();
    // $('#frmActualizar-ADM')[0].reset();
    $('#listado-DYA').hide();
    $.ajax({
        url: '../mDocentesAdministrativos/lista.php',
        type: 'POST',
        dataType: 'html',
        data: {},
        success: function (respuesta) {
            $('#listado-DYA').html(respuesta);
            $('#listado-DYA').fadeIn('slow');
            $('#lblTitulo').text('Docentes y Administrativos | Lista');
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        }
    });
}

const cambiar_estatus_DYA = (id, consecutivo) => {
    let valor=$("#check"+consecutivo).val();
    let contravalor=(valor==1)?0:1;
    $("#check"+consecutivo).val(contravalor);

    $.ajax({
        url:"../mDocentesAdministrativos/cEstatus.php",
        type:"POST",
        dataType:"html",
        data:{id,contravalor},
        success:function(respuesta){
            // console.log(respuesta);
            if(contravalor==1){
                alertify.success("<i class='fa fa-check fa-lg'></i>", 2);
                $("#btnEditar-ADM"+consecutivo).removeAttr('disabled');
                $("#btnImprimir-ADM"+consecutivo).removeAttr('disabled');
                $("#btnDatos-ADM"+consecutivo).removeAttr('disabled');
                $("#btnImagen-ADM"+consecutivo).removeAttr('disabled');
                $("#btnHuella-ADM"+consecutivo).removeAttr('disabled');
                $("#btnHorario-ADM"+consecutivo).removeAttr('disabled');
                llenar_lista_DYA();
            }else{
                alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                $("#btnEditar-ADM"+consecutivo).attr('disabled', 'disabled');
                $("#btnImprimir-ADM"+consecutivo).attr('disabled', 'disabled');
                $("#btnDatos-ADM"+consecutivo).attr('disabled', 'disabled');
                $("#btnImagen-ADM"+consecutivo).attr('disabled', 'disabled');
                $("#btnHuella-ADM"+consecutivo).attr('disabled', 'disabled');
                $("#btnHorario-ADM"+consecutivo).attr('disabled', 'disabled');
                llenar_lista_DYA();
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

const nuevo_registro_DYA = () => {
    $('#lblTitulo').text('Docentes y Administrativos | Nuevo Registro');
    $('#frmGuardar-DYA')[0].reset();
    $('#listado-DYA').hide();
    $('#nuevo-DYA').fadeIn();
}

const llenar_formulario_DYA = (id, clave, apPaterno, apMaterno, nombre, direccion, colonia, ciudad, codPostal, nacionalidad, telefono, celular, sexo, fecNac, edad, edoCivil, email, tipo, rfc, curp, titulo, tiempo) => {
    $('#lblTitulo').text('Docentes y Administrativos | Editar Registro');
    $('#dyaId').val(id);
    $('#clave_actual').val(clave);

    $('#eclave-DYA').val(clave);
    $('#eapPaterno-DYA').val(apPaterno);
    $('#eapMaterno-DYA').val(apMaterno);
    $('#enombre-DYA').val(nombre);
    $('#edireccion-DYA').val(direccion);
    $('#ecolonia-DYA').val(colonia);
    $('#eciudad-DYA').val(ciudad);
    $('#ecPostal-DYA').val(codPostal);
    $('#enacionalidad-DYA').val(nacionalidad);
    $('#etelefono-DYA').val(telefono);
    $('#ecelular-DYA').val(celular);
    $('#esexo-DYA').val(sexo);
    $('#efNac-DYA').val(fecNac);
    $('#eedad-DYA').val(edad);
    $('#eedoCivil-DYA').val(edoCivil);
    $('#eemail-DYA').val(email);
    $('#etipo-DYA').val(tipo);
    $('#erfc-DYA').val(rfc);
    $('#ecurp-DYA').val(curp);
    $('#etitulo-DYA').val(titulo);
    $('#etiempo-DYA').val(tiempo);
    selectTwo();
    $('#listado-DYA').hide();
    $('#nuevo-DYA').hide();
    $('#editar-DYA').fadeIn();
}

$("#btnCancelarG-DYA , #btnCancelarA-DYA").click(function(){
    $("#editar-DYA").hide();
    $('#frmGuardar-DYA')[0].reset();
    $("#nuevo-DYA").hide();
    $("#lblTitulo").text('Docentes y Administrativos | Lista');
    $("#listado-DYA").fadeIn();
});

$('#frmGuardar-DYA').submit(function (e) {
    let clave = $('#clave-DYA').val();
    let apPaterno = $('#apPaterno-DYA').val();
    let apMaterno = $('#apMaterno-DYA').val();
    let nombre = $('#nombre-DYA').val();
    let direccion = $('#direccion-DYA').val();
    let colonia = $('#colonia-DYA').val();
    let ciudad = $('#ciudad-DYA').val();
    let cPostal = $('#cPostal-DYA').val();
    let nacionalidad = $('#nacionalidad-DYA').val();
    let telefono = $('#telefono-DYA').val();
    let celular = $('#celular-DYA').val();
    let sexo = $('#sexo-DYA').val();
    let fNac = $('#fNac-DYA').val();
    let edad = $('#edad-DYA').val();
    let edoCivil = $('#edoCivil-DYA').val();
    let email = $('#email-DYA').val();
    let tipo = $('#tipo-DYA').val();
    let rfc = $('#rfc-DYA').val();
    let curp = $('#curp-DYA').val();
    let titulo = $('#titulo-DYA').val();
    let tiempo = $('#tiempo-DYA').val();

    $.ajax({
        url:"../mDocentesAdministrativos/guardar.php",
        type:"POST",
        dataType:"html",
        data:{clave,apPaterno,apMaterno,nombre,direccion,colonia,ciudad,cPostal,nacionalidad,telefono,celular,sexo,fNac,edad,edoCivil,email,tipo,rfc,curp,titulo,tiempo},
        success:function(respuesta){
            $("#frmGuardar-DYA")[0].reset();
            $('#nuevo-DYA').hide();
            swal.fire({
                title: `Has registrado a un ${tipo.toLowerCase()}  con éxito`,
                icon: 'success',
                showConfirmButton: false,
                timer: 1000,
                didClose: () => {
                    llenar_lista_DYA();
                }
            });
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });

    e.preventDefault();
    return false;
});

$('#frmActualizar-DYA').submit(function (e) {
    let id = $('#dyaId').val();
    let clave = $('#eclave-DYA').val();
    let clave_actual = $('#clave_actual').val();
    let apPaterno = $('#eapPaterno-DYA').val();
    let apMaterno = $('#eapMaterno-DYA').val();
    let nombre = $('#enombre-DYA').val();
    let direccion = $('#edireccion-DYA').val();
    let colonia = $('#ecolonia-DYA').val();
    let ciudad = $('#eciudad-DYA').val();
    let cPostal = $('#ecPostal-DYA').val();
    let nacionalidad = $('#enacionalidad-DYA').val();
    let telefono = $('#etelefono-DYA').val();
    let celular = $('#ecelular-DYA').val();
    let sexo = $('#esexo-DYA').val();
    let fNac = $('#efNac-DYA').val();
    let edad = $('#eedad-DYA').val();
    let edoCivil = $('#eedoCivil-DYA').val();
    let email = $('#eemail-DYA').val();
    let tipo = $('#etipo-DYA').val();
    let rfc = $('#erfc-DYA').val();
    let curp = $('#ecurp-DYA').val();
    let titulo = $('#etitulo-DYA').val();
    let tiempo = $('#etiempo-DYA').val();

    if (clave == clave_actual) {
        $.ajax({
            url:"../mDocentesAdministrativos/actualizar.php",
            type:"POST",
            dataType:"html",
            data:{id,clave,apPaterno,apMaterno,nombre,direccion,colonia,ciudad,cPostal,nacionalidad,telefono,celular,sexo,fNac,edad,edoCivil,email,tipo,rfc,curp,titulo,tiempo},
            success: function (respuesta) {
                $("#frmActualizar-DYA")[0].reset();
                $('#editar-DYA').hide();
                swal.fire({
                    title: `Has editado a un ${tipo.toLowerCase()} con éxito`,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000,
                    didClose: () => {
                        llenar_lista_DYA();
                    }
                });
            },
            error:function(xhr,status){
                alert("Error en metodo AJAX"); 
            },
        });
    } else if (clave != clave_actual) {
        $.ajax({
            url:"../mDocentesAdministrativos/rClave1.php",
            type:"POST",
            dataType:"html",
            data:{clave},
            success: function (respuesta) {
                let res = parseInt(respuesta);
                if (res == 0) {
                    console.log('Pasó por != y 0');
                    $("#frmActualizar-DYA")[0].reset();
                    $('#editar-DYA').hide();
                    $.ajax({
                        url:"../mDocentesAdministrativos/actualizar.php",
                        type:"POST",
                        dataType:"html",
                        data:{id,clave,apPaterno,apMaterno,nombre,direccion,colonia,ciudad,cPostal,nacionalidad,telefono,celular,sexo,fNac,edad,edoCivil,email,tipo,rfc,curp,titulo,tiempo},
                        success:function(respuesta){
                            $("#frmActualizar-DYA")[0].reset();
                            $('#editar-DYA').hide();
                            swal.fire({
                                title: `Has editado a un ${tipo.toLowerCase()} con éxito`,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000,
                                didClose: () => {
                                    llenar_lista_DYA();
                                }
                            });
                        },
                        error:function(xhr,status){
                            alert("Error en metodo AJAX"); 
                        },
                    });
                } else {
                    swal.fire({
                        title: `Ya existe un ${tipo.toLowerCase()} con la misma clave`,
                        text: `Elige otra clave para el ${tipo.toLowerCase()}`,
                        icon: 'info',
                        confirmButtonText: 'Entendido',
                        didOpen: () => {
                            $('#eclave-DYA').select();
                            e.preventDefault();
                        }
                    });
                }
            },
            error:function(xhr,status){
                alert("Error en metodo AJAX"); 
            },
        });
        
    }

    e.preventDefault();
    return false;
    
});

//Función para revisar si existe un usario con una misma clave
const revisar_nombre_DYA = (valor) => {
    $.ajax({
        url:"../mDocentesAdministrativos/rClave.php",
        type:"POST",
        dataType:"html",
        data:{valor},
        success:function(respuesta){
            let res = parseInt(respuesta);
            if (res == 0) {
                $('#lblClave-DYA').text('Clave:');
                $('#clave-DYA').css("color", "#000");
                $('#btnGuardar-DYA').removeAttr('disabled');
            } else {
                let docAdm = $('#tipo-DYA').val();
                $('#lblClave-DYA').text('Ya existe un '+docAdm.toLowerCase()+' con esta clave:');
                $('#clave-DYA').css("color", "#D9304B");
                $('#btnGuardar-DYA').attr('disabled', 'disabled');
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

const abrirModalFoto = (clave, nombre, valorFoto) => {
    $('#txtTitularFoto-DYA').text(nombre);
    $('#clave-imagen-DYA').val(clave);
    $('#valor-imagen-DYA').val(valorFoto);

    if (valorFoto == '0') {
        $('#formVista-DYA').hide();
        $('#formSubida-DYA').fadeIn();
        $('#formSubida-DYA')[0].reset();
    } else {
        $('#formSubida-DYA').hide();
        $('#formVista-DYA').fadeIn();
        let archivo='../mDocentesAdministrativos/fotos/'+clave+'.jpg';
        $("#imgFoto-DYA").attr("src",archivo);
    }

    console.log(typeof (valorFoto));
    $("#modalFoto").modal("show");
}

const subirFoto = () => {
    let formData = new FormData();

    let files = $('#image-DYA')[0].files[0];

    let clave=$('#clave-imagen-DYA').val();
    let tam = $('#tamanoKB-DYA').val();
    
    let valor = $('#valor-imagen-DYA').val();
    let contravalor = (valor == 1)?0:1;

    formData.append('file',files);
    formData.append('clave',clave);
    formData.append('tam',tam);

    $.ajax({
        url: '../mDocentesAdministrativos/fotoSubir.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          var res=parseInt(response);
          switch(res){
            case 0 :
                alertify.success("<i class='fas fa-file-upload'></i>",1);
                  $("#modalFoto").modal("hide");
                  $.ajax({
                    url:"../mDocentesAdministrativos/actualizarFoto.php",
                    type:"POST",
                    dataType:"html",
                    data:{clave,contravalor},
                    success:function(respuesta){
                        llenar_lista_DYA();
                    },
                    error:function(xhr,status){
                        alert("Error en metodo AJAX"); 
                    },
                });
              break;
            case 1 :
                swal.fire({
                    title: "Error",
                    text: "No ha sido posible cargar el archivo debido a que este debe de tener extención jpg y no debe de sobrepasar los 5 megabytes",
                    icon: "error",
                    confirmButtonText: "Enterado"
                });
              break;
            default:
                  alertify.error("<i class='fa fa-times fa-lg'></i>",1);
          }

        },
        error:function(xhr,status){
            alertify.error('Error en proceso');
        },
    });
}

const eliminarFoto = () => {
    let formData = new FormData();
    let clave = $('#clave-imagen-DYA').val();
    let valor = $('#valor-imagen-DYA').val();
    let contravalor = (valor == 1)?0:1;
    formData.append('clave', clave);
    
    swal.fire({
        title: 'Eliminar Foto',
        text: '¿Deseas eliminar la foto?',
        icon: 'question',
        showDenyButton: true,
        denyButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../mDocentesAdministrativos/fotoBorrar.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    var res = parseInt(response);
                    switch (res) {
                        case 0:
                            alertify.error("<i class='fa fa-times fa-lg'></i> No se encuentra el archivo", 1);
                            $("#modalFoto").modal("hide");
                            llenar_lista_DYA();
                            break;
                        case 1:
                            alertify.warning("<i class='fa fa-check fa-lg'></i> Foto Eliminada", 1);
                            $("#modalFoto").modal("hide");
                            $.ajax({
                                url:"../mDocentesAdministrativos/actualizarFoto.php",
                                type:"POST",
                                dataType:"html",
                                data:{clave,contravalor},
                                success:function(respuesta){
                                    llenar_lista_DYA();
                                },
                                error:function(xhr,status){
                                    alert("Error en metodo AJAX"); 
                                },
                            });
                            break;
                    }
        
                },
                error: function (xhr, status) {
                    alertify.error('Error en proceso');
                },
            });
        } else if (result.isDenied) {
            return false;
        }
        
    });
}

const abrirModalPDF = (id, ruta, modulo) => {
    $('#txtTitularPDF').text(modulo);
    let link = ruta+'/pdfDatos.php?id='+id;
    PDFObject.embed(link, '#visualizador');
    $('#modalPDF').modal('show');
}

const abrirModalDatos_DYA = (clave, apPaterno, apMaterno, nombre, direccion, colonia, ciudad, codPostal, nacionalidad, telefono, celular, sexo, fecNac, edad, edoCivil, email, tipo, rfc, curp, titulo, tiempo) => {
    $('#modalTitle-DYA').text('Datos del '+tipo+' - '+nombre+' '+apPaterno);

    $('#mclave-DYA').val(clave);
    $('#mapPaterno-DYA').val(apPaterno);
    $('#mapMaterno-DYA').val(apMaterno);
    $('#mnombre-DYA').val(nombre);
    $('#mdireccion-DYA').val(direccion);
    $('#mcolonia-DYA').val(colonia);
    $('#mciudad-DYA').val(ciudad);
    $('#mcPostal-DYA').val(codPostal);
    $('#mnacionalidad-DYA').val(nacionalidad);
    $('#mtelefono-DYA').val(telefono);
    $('#mcelular-DYA').val(celular);
    $('#msexo-DYA').val(sexo);
    $('#mfNac-DYA').val(fecNac);
    $('#medad-DYA').val(edad);
    $('#medoCivil-DYA').val(edoCivil);
    $('#memail-DYA').val(email);
    $('#mtipo-DYA').val(tipo);
    $('#mrfc-DYA').val(rfc);
    $('#mcurp-DYA').val(curp);
    $('#mtitulo-DYA').val(titulo);
    $('#mtiempo-DYA').val(tiempo);
    selectTwo();
    $('#modalDatos-DYA').modal('show');
}

const abrirModalHorario = (id, nombre, turno, d_entrada, d_salida, l_entrada, l_salida, m_entrada, m_salida, mi_entrada, mi_salida, j_entrada, j_salida, v_entrada, v_salida, s_entrada, s_salida, valorHorario) => {
    $('#mIdPersona').val(id);
    $('#modalTitle-DYA-H').text(nombre + ' - Turno ' + turno);
    let n_d_entrada, n_d_salida, n_l_entrada, n_l_salida, n_m_entrada, n_m_salida, n_mi_entrada, n_mi_salida, n_j_entrada, n_j_salida, n_v_entrada, n_v_salida, n_s_entrada, n_s_salida;

    if (valorHorario == 'Si') {
        if (d_entrada == '12:00 AM' && d_salida == '12:00 AM'){
            n_d_entrada = 'Sin horario asignado';
            n_d_salida = 'Sin horario asignado';
        } else {
            n_d_entrada = d_entrada;
            n_d_salida = d_salida;
        }
        if (l_entrada == '12:00 AM' && l_salida == '12:00 AM'){
            n_l_entrada = 'Sin horario asignado';
            n_l_salida = 'Sin horario asignado';
        } else {
            n_l_entrada = l_entrada;
            n_l_salida = l_salida;
        }
        if (m_entrada == '12:00 AM' && m_salida == '12:00 AM'){
            n_m_entrada = 'Sin horario asignado';
            n_m_salida = 'Sin horario asignado';
        } else {
            n_m_entrada = m_entrada;
            n_m_salida = m_salida;
        }
        if (mi_entrada == '12:00 AM' && mi_salida == '12:00 AM'){
            n_mi_entrada = 'Sin horario asignado';
            n_mi_salida = 'Sin horario asignado';
        } else {
            n_mi_entrada = mi_entrada;
            n_mi_salida = mi_salida;
        }
        if (j_entrada == '12:00 AM' && j_salida == '12:00 AM'){
            n_j_entrada = 'Sin horario asignado';
            n_j_salida = 'Sin horario asignado';
        } else {
            n_j_entrada = j_entrada;
            n_j_salida = j_salida;
        }
        if (v_entrada == '12:00 AM' && v_salida == '12:00 AM'){
            n_v_entrada = 'Sin horario asignado';
            n_v_salida = 'Sin horario asignado';
        } else {
            n_v_entrada = v_entrada;
            n_v_salida = v_salida;
        }
        if (s_entrada == '12:00 AM' && s_salida == '12:00 AM'){
            n_s_entrada = 'Sin horario asignado';
            n_s_salida = 'Sin horario asignado';
        } else {
            n_s_entrada = s_entrada;
            n_s_salida = s_salida;
        }
    
        $('#dEntrada-DYA').val(n_d_entrada);
        $('#dSalida-DYA').val(n_d_salida);
        $('#lEntrada-DYA').val(n_l_entrada);
        $('#lSalida-DYA').val(n_l_salida);
        $('#mEntrada-DYA').val(n_m_entrada);
        $('#mSalida-DYA').val(n_m_salida);
        $('#miEntrada-DYA').val(n_mi_entrada);
        $('#miSalida-DYA').val(n_mi_salida);
        $('#jEntrada-DYA').val(n_j_entrada);
        $('#jSalida-DYA').val(n_j_salida);
        $('#vEntrada-DYA').val(n_v_entrada);
        $('#vSalida-DYA').val(n_v_salida);
        $('#sEntrada-DYA').val(n_s_entrada);
        $('#sSalida-DYA').val(n_s_salida);
    } else {
        $('#dEntrada-DYA').val('Sin horario asignado');
        $('#dSalida-DYA').val('Sin horario asignado');
        $('#lEntrada-DYA').val('Sin horario asignado');
        $('#lSalida-DYA').val('Sin horario asignado');
        $('#mEntrada-DYA').val('Sin horario asignado');
        $('#mSalida-DYA').val('Sin horario asignado');
        $('#miEntrada-DYA').val('Sin horario asignado');
        $('#miSalida-DYA').val('Sin horario asignado');
        $('#jEntrada-DYA').val('Sin horario asignado');
        $('#jSalida-DYA').val('Sin horario asignado');
        $('#vEntrada-DYA').val('Sin horario asignado');
        $('#vSalida-DYA').val('Sin horario asignado');
        $('#sEntrada-DYA').val('Sin horario asignado');
        $('#sSalida-DYA').val('Sin horario asignado');
    }

    

    $('#modalHorarios-DYA').modal('show');
}

$('#clave-DYA').keyup(function() {
    let valor = $(this).val();
    revisar_nombre_DYA(valor);
});

$('#clave-DYA').keydown(function () {
    let valor = $(this).val();
    soloNumeros(valor);
});

$('#telefono-DYA').keydown(function () {
    let valor = $(this).val();
    soloNumeros(valor);
});

$('#celular-DYA').keydown(function () {
    let valor = $(this).val();
    soloNumeros(valor);
});

$('#cPostal-DYA').keydown(function () {
    let valor = $(this).val();
    soloNumeros(valor);
});

$("#curp-DYA").keyup(function() {

    let valor=$(this);
    // Convierte en mayuscula
    valor.val(valor.val().toUpperCase());
    
    //validar curp + expresion regular
    if (curpValida(valor.val())=="Si") {
        $(valor).css("color", "#000");
        $('#lblCurp-DYA').text('CURP:');
        $('#btnGuardar-DYA').removeAttr('disabled');
        
    }else{
        $(valor).css("color", "#D9304B");
        $('#lblCurp-DYA').text('Escribe una CURP válida:');
        $('#btnGuardar-DYA').attr('disabled', 'disabled');
    }

});

$("#rfc-DYA").keyup(function() {

    let valor=$(this);
    // Convierte en mayuscula
    valor.val(valor.val().toUpperCase());
    
    //validar curp + expresion regular
    if (rfcValida(valor.val())=="Si") {
        $(valor).css("color", "#000");
        $('#lblRfc-DYA').text('RFC:');
        $('#btnGuardar-DYA').removeAttr('disabled');
        
    }else{
        $(valor).css("color", "#D9304B");
        $('#lblRfc-DYA').text('Escribe un RFC válido:');
        $('#btnGuardar-DYA').attr('disabled', 'disabled');
    }
});

$('#fNac-DYA').change(function () {
    let fecha = $(this).val();
    let inputId = 'edad-DYA';
    fecha_edad(fecha, inputId);
});

$('#efNac-DYA').change(function () {
    let fecha = $(this).val();
    let inputId = 'eedad-DYA';
    fecha_edad(fecha, inputId);
});