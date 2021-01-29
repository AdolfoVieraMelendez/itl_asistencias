const showNavbar = (toggleId, navId, bodyId, headerId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)

    if (toggle && nav && bodypd && headerpd) {
        toggle.addEventListener('click', () => {
            nav.classList.toggle('itl_show');
            toggle.classList.toggle('fa-times');
            bodypd.classList.toggle('body-pd');
            headerpd.classList.toggle('body-pd');
        })
    }
}

showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

const linkColor = document.querySelectorAll('.nav__link');

function colorLink() {
    if (linkColor) {
        linkColor.forEach(l => l.classList.remove('itl_active'));
        this.classList.add('itl_active');
    }
}

linkColor.forEach(l => l.addEventListener('click', colorLink));

// aparece un modal para confirmar tu salida del sistema
document.querySelector('.header__exit').addEventListener('click', () => {
    swal.fire({
        title: 'Saliendo del Sistema',
        text: '¿Está seguro/a?',
        icon: 'question',
        showDenyButton: true,
        confirmButtonText: 'Salir',
        denyButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.querySelector('#sistema-container').style.display = 'none';
            document.querySelector('#asistencias-container').style.display = 'block';
        } else if (result.isDenied) {
            return false;
        }
    });
});

// Modal para activar o no la pantalla completa
function modalFullScreenRequst() {
    setTimeout(() => {
        swal.fire({
            title: "Pantalla Completa",
            text: "¿Desea entrar en pantalla completa?",
            icon: "question",
            showDenyButton: true,
            confirmButtonText: "Sí",
            denyButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                document.documentElement.requestFullscreen().catch(console.log);
                swal.fire({
                    title: 'Pantalla Completa Activada',
                    icon: 'success',
                    text: 'Presiona la tecla ESC para salir',
                    showConfirmButton: false,
                    timer: '2500'
                });
            } else if (result.isDenied) {
                return false;
            }
        }); 
    }, 500);
}

// Función para mostrar/esconder contraseñas al presionar boton
const togglePassword = (buttonId, inputId, input2Id) => {
    const button = document.getElementById(buttonId),
        input = document.getElementById(inputId),
        input2 = document.getElementById(input2Id)
    
    if (button && input) {
        button.addEventListener('click', () => {
            let valor = button.value;
            if (valor == 0) {
                button.value = 1;
                button.innerHTML = '<i class="far fa-eye-slash"></i> Ocultar Contraseña';
                input.setAttribute('type', 'text');
                if (input2) {
                    input2.setAttribute('type', 'text');
                }
            } else {
                button.value = 0;
                button.innerHTML = '<i class="far fa-eye"></i> Mostrar Contraseña';
                input.setAttribute('type', 'password');
                if (input2) {
                    input2.setAttribute('type', 'password');
                }
            }
        });
    }
}

//solo numeros
const soloNumeros = (e)=>{
    if(e.shiftKey)
    {
         e.preDefault();
    }
 
    if (e.keyCode == 46 || e.keyCode == 9 || e.keyCode == 8 )    {
    }
    else {
        if (e.keyCode < 95) {
            if (e.keyCode < 45 || e.keyCode > 57) {
                e.preventDefault();
            }
        } 
        else {
            if (e.keyCode < 96 || e.keyCode > 105) {
                e.preventDefault();
            }
        }
    }
}

//validar curp
const curpValida = (valor) => {

    let validador;
    let curp=valor;

    // Expresion regular para curp
    let re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);
    
    if (!validado){  //Coincide con el formato general?
        validador = "No";
    }else{
        validador = "Si";
    }
    return validador;
}

//validar curp
const rfcValida = (valor) => {

    let validador;
    let curp=valor;

    // Expresion regular para curp
    let re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/,
        validado = curp.match(re);
    
    if (!validado){  //Coincide con el formato general?
        validador = "No";
    }else{
        validador = "Si";
    }
    return validador;
}

const fecha_edad = (fecha, inputId) => {
    $.ajax({
        url:"../mDocentesAdministrativos/calcularEdad.php",
        type:"POST",
        dataType:"html",
        data:{fecha},
        success:function(respuesta){

            document.getElementById(inputId).value = respuesta;

            let xedad= parseInt(respuesta);
            if (xedad < 0) {
                document.getElementById(inputId).style.color = '#D9304B';
            } else {
                document.getElementById(inputId).style.color = '#000';
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

const showLoading = function(msj, msj2) {
    swal.fire({
      title: msj,
      allowEscapeKey: false,
      allowOutsideClick: false,
      timer: 1000,
      didOpen: () => {
        swal.showLoading();
        },
      didClose: () => {
          if (msj2) {
            swal.fire({
                title: msj2,
                icon: 'success',
                timer: 1000,
                showConfirmButton: false
            });
          } else {
              return false;
          }
      }
    })
};
  
const selectTwo = () => {
    $( ".select2" ).select2({
        theme: "bootstrap4",
        placeholder: 'Seleccione...'
    });
}

// Ejecutar funciones al momento en que la página es cargada
window.onload = () => {
    modalFullScreenRequst();
}

