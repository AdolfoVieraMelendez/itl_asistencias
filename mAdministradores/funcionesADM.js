const llenar_lista_ADM = () => {
    showLoading('Cargando lista de administradores');
    $('#frmGuardar-ADM')[0].reset();
    $('#frmActualizar-ADM')[0].reset();
    $('#listado-ADM').hide();
    $.ajax({
        url: '../mAdministradores/lista.php',
        type: 'POST',
        dataType: 'html',
        data: {},
        success: function (respuesta) {
            $('#listado-ADM').html(respuesta);
            $('#listado-ADM').fadeIn('slow');
            $('#lblTitulo').text('Administradores | Lista');
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        }
    });
}

const cambiar_estatus_ADM = (id, consecutivo) => {
    let valor=$("#check"+consecutivo).val();
    let contravalor=(valor==1)?0:1;
    $("#check"+consecutivo).val(contravalor);

    $.ajax({
        url:"../mAdministradores/cEstatus.php",
        type:"POST",
        dataType:"html",
        data:{id,contravalor},
        success:function(respuesta){
            // console.log(respuesta);
            if(contravalor==1){
                alertify.success("<i class='fa fa-check fa-lg'></i>", 2);
                $("#btnEditar-ADM"+consecutivo).removeAttr('disabled');
                $("#btnR-Contra-ADM" + consecutivo).removeAttr('disabled');
                llenar_lista_ADM();
            }else{
                alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                $("#btnEditar-ADM"+consecutivo).attr('disabled', 'disabled');
                $("#btnR-Contra-ADM" + consecutivo).attr('disabled', 'disabled');
                llenar_lista_ADM();
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

const nuevo_registro_ADM = () => {
    $('#lblTitulo').text('Administradores | Nuevo Registro');
    $('#frmGuardar-ADM')[0].reset();
    $('#listado-ADM').hide();
    $('#nuevo-ADM').fadeIn();
}

const llenar_formulario_ADM = (id, nombre, contra) => {
    $('#lblTitulo').text('Administradores | Editar Registro');
    $('#admId').val(id);
    $('#nombre_admin_Actual').val(nombre);
    $('#enombreAdmin-ADM').val(nombre);
    $('#econtraAdmin-ADM').val(contra);
    $('#listado-ADM').hide();
    $('#nuevo-ADM').hide();
    $('#editar-ADM').fadeIn();
}

togglePassword('btnShowPass-ADM', 'contraAdmin-ADM');
togglePassword('btnShowPassA-ADM', 'econtraAdmin-ADM');

$("#btnCancelarG-ADM , #btnCancelarA-ADM").click(function(){
    $("#editar-ADM").hide();
    $('#frmGuardar-ADM')[0].reset();
    $("#nuevo-ADM").hide();
    $("#lblTitulo").text('Administradores | Lista');
    $("#listado-ADM").fadeIn();
});

$('#frmGuardar-ADM').submit(function (e) {
    let usuario_ADM_G = $('#nombreAdmin-ADM').val();
    let contra_ADM_G = $('#contraAdmin-ADM').val();

    if (contra_ADM_G.length <= 3) {
        swal.fire({
            title: 'Contraseña muy corta',
            text: 'Elige una contraseña con más de 3 caracteres',
            icon: 'error',
            confirmButtonText: 'Entendido',
            didOpen: () => {
                e.preventDefault();
            }
        });
    } else {
        $.ajax({
            url:"../mAdministradores/guardar.php",
            type:"POST",
            dataType:"html",
            data:{usuario_ADM_G,contra_ADM_G},
            success:function(respuesta){
                $("#frmGuardar-ADM")[0].reset();
                $('#nuevo-ADM').hide();
                swal.fire({
                    title: 'Has registrado a un usuario con éxito',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000,
                    didClose: () => {
                        llenar_lista_ADM();
                    }
                });
            },
            error:function(xhr,status){
                alert("Error en metodo AJAX"); 
            },
        });
    }
    e.preventDefault();
    return false;
});

$('#frmActualizar-ADM').submit(function (e) {
    let id = $('#admId').val();
    let usuario_ADM_E = $('#enombreAdmin-ADM').val();
    let usuario_ADM_Actual = $('#nombre_admin_Actual').val();
    let contra_ADM_E = $('#econtraAdmin-ADM').val();

    if (usuario_ADM_E == usuario_ADM_Actual) {
        if (contra_ADM_E.length <= 3) {
            swal.fire({
                title: 'Contraseña muy corta',
                text: 'Elige una contraseña con más de 3 caracteres',
                icon: 'error',
                confirmButtonText: 'Entendido',
                didOpen: () => {
                    $('#econtraAdmin-ADM').select();
                    e.preventDefault();
                }
            });
        } else {
            $.ajax({
                url:"../mAdministradores/actualizar.php",
                type:"POST",
                dataType:"html",
                data:{id,usuario_ADM_E,contra_ADM_E},
                success: function (respuesta) {
                    $("#frmActualizar-ADM")[0].reset();
                    $('#editar-ADM').hide();
                    swal.fire({
                        title: 'Has editado a un usuario con éxito',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000,
                        didClose: () => {
                            llenar_lista_ADM();
                        }
                    });
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX"); 
                },
            });
        }
    } else if (usuario_ADM_E != usuario_ADM_Actual) {
        if (contra_ADM_E.length <= 3) {
            swal.fire({
                title: 'Contraseña muy corta',
                text: 'Elige una contraseña con más de 3 caracteres',
                icon: 'error',
                confirmButtonText: 'Entendido',
                didOpen: () => {
                    $('#econtraAdmin-ADM').select();
                    e.preventDefault();
                }
            });
        } else {
            $.ajax({
                url:"../mAdministradores/rNombre1.php",
                type:"POST",
                dataType:"html",
                data:{usuario_ADM_E},
                success: function (respuesta) {
                    let res = parseInt(respuesta);
                    if (res == 0) {
                        console.log('Pasó por != y 0');
                        $("#frmActualizar-ADM")[0].reset();
                        $('#editar-ADM').hide();
                        $.ajax({
                            url:"../mAdministradores/actualizar.php",
                            type:"POST",
                            dataType:"html",
                            data:{id,usuario_ADM_E,contra_ADM_E},
                            success:function(respuesta){
                                $("#frmActualizar-ADM")[0].reset();
                                $('#editar-ADM').hide();
                                swal.fire({
                                    title: 'Has editado a un usuario con éxito',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000,
                                    didClose: () => {
                                        llenar_lista_ADM();
                                    }
                                });
                            },
                            error:function(xhr,status){
                                alert("Error en metodo AJAX"); 
                            },
                        });
                    } else {
                        swal.fire({
                            title: 'Ya existe un usuario con el mismo nombre',
                            text: 'Elige otro nombre de usuario',
                            icon: 'info',
                            confirmButtonText: 'Entendido',
                            didOpen: () => {
                                $('#enombreAdmin-ADM').select();
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
        
    }

    e.preventDefault();
    return false;
    
});

//Función para revisar si existe un usario con un mismo nombre
const revisar_nombre_ADM = (valor) => {
    $.ajax({
        url:"../mAdministradores/rNombre.php",
        type:"POST",
        dataType:"html",
        data:{valor},
        success:function(respuesta){
            let res = parseInt(respuesta);
            if (res == 0) {
                $('#lblusuario-ADM-G').text('Nombre de Usuario:');
                $('#nombreAdmin-ADM').css("color", "#000");
                $('#btnGuardar-ADM').removeAttr('disabled');
            }else{
                $('#lblusuario-ADM-G').text('Ya existe un usuario con este nombre:');
                $('#nombreAdmin-ADM').css("color", "#D9304B");
                $('#btnGuardar-ADM').attr('disabled', 'disabled');
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

$('#nombreAdmin-ADM').keyup(function() {
    let valor = $(this).val();
    revisar_nombre_ADM(valor);
});

const reset_passw = (id, usuario) => {
    let id_admin = id;
    let nombre_usuario = usuario;

    swal.fire({
        title: 'Restableciendo Contraseña',
        text: `La contraseña del usuario ${nombre_usuario} se restablecerá a 12345`,
        icon: 'warning',
        showDenyButton: true,
        denyButtonText: 'Cancelar',
        confirmButtonText: 'Restablecer Contraseña'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url : '../mAdministradores/resetContra.php',
                data : {id_admin},
                type : 'POST',
                dataType : 'html',
                success : function(respuesta) {
                    
                    llenar_lista_ADM();
                    alertify.success("<i class='fa fa-save fa-lg'></i>", 2);
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
        } else {
            return false;
        }
    });
}