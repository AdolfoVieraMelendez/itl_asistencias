$('#frmPrimerRegistro').submit(function (e) {
    let usuario_pr = $('#nombreAdmin-PR').val();
    let contra_pr = $('#contra-PR').val();

    if (contra_pr.length <= 3) {
        swal.fire({
            title: 'Contraseña muy corta',
            text: 'Elige una contraseña con más de 3 caracteres',
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
    } else {
        $.ajax({
            url:"../mLogin/guardar.php",
            type:"POST",
            dataType:"html",
            data:{usuario_pr,contra_pr},
            success:function(respuesta){
                $("#frmPrimerRegistro")[0].reset();
                $('#modalRegistro-PR').modal('hide');
                swal.fire({
                    title: 'Has registrado el primer usuario del sistema con éxito',
                    text: 'Vuelve a dar doble click en la hora para proceder a iniciar sesión',
                    icon: 'success',
                    confirmButtonText: 'Entendido'
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

$('#frmLogin').submit(function (e) {
    let usuario = $('#nombreAdmin-LG').val();
    let contra = $('#contra-LG').val();

    $.ajax({
        url: '../mLogin/validar_login.php',
        type: 'POST',
        dataType: 'json',
        data: {usuario, contra},
        success: function (respuesta) {
            let dataArray = respuesta;
            let registros = dataArray.cRegistros;
            if (registros == 0) {
                swal.fire({
                    title: 'Error',
                    text: 'El nombre de usuario o contraseña son incorrectos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                let usuario_logueado = dataArray.result.nombre_admin;
                $('#frmLogin')[0].reset();
                $('#modalLogin').modal('hide');
                showLoading('Entrando al sistema', 'Bienvenido/a');
                setTimeout(() => {
                    $('#asistencias-container').hide();
                    $('#sistema-container').show();
                    $('#lblLoggedUser').text(`Usuario: ${usuario_logueado}`);
                    $('#header-toggle').click();
                    verAdministradores();
                    let menus = document.getElementsByClassName('nav__link');
                    Array.from(menus).forEach((menu) => {
                        menu.classList.remove('itl_active');
                    });
                    menus[0].classList.add('itl_active');

                },1500);
            }
        },
        error: function (xhr, status) {
            alert('Error en método AJAX');
        },
    });
    e.preventDefault()
    return false;
});

//Funciona para el modal de primer registro
togglePassword('btnShowPass-PR', 'contra-PR');
//Funciona para el modal de Login
togglePassword('btnShowPass-LG', 'contra-LG');
