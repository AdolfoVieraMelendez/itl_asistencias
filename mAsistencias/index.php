<?php 
    $varGral = '-IDX';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencias</title>
    <!-- Bootstrap-4 -->
    <link rel="stylesheet" href="../plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <!-- Alertifyjs -->
    <link rel="stylesheet" href="../plugins/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="../plugins/alertifyjs/css/themes/default.min.css">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Fontawesome 5-->
     <link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
     <!-- DataTables -->
     <link rel="stylesheet" href="../plugins/dataTablesB4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="../plugins/dataTablesB4/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="../plugins/dataTablesB4/css/responsive.dataTables.min.css">
     <!-- Animate -->
     <link rel="stylesheet" href="../plugins/animate/animate.css">
     <!-- Bootstrap Switch Button -->
     <link rel="stylesheet" href="../plugins/bootstrap4-toggle-master/css/bootstrap4-toggle.min.css">
     <!-- Select 2 -->
     <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2.min.css">
     <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2-bootstrap4.min.css">
     <!-- fileinput -->
     <link href="../plugins/bootstrap-fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
     <link href="../plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../plugins/sweetalert2-master/dist/sweetalert2.min.css">
</head>
<body>
    <main id="asistencias-container">
        <!-- IDX == Index -->
        <div class="form-group" id="vistaGeneral<?php echo $varGral;?>">
            <div class="pfp-container">
                <div class="item-asistencia<?php echo $varGral;?>" id="fotoEmpleado<?php echo $varGral;?>">
                    <img src="" class="pfp" id="imgEmpleado<?php echo $varGral;?>" alt="Imagen de Empleado" onerror="this.src='../fotos/default-profile-pic.png'" draggable="false">                           
                </div>
            </div>
            <div class="item-asistencia<?php echo $varGral;?>" id="claveEmpleado<?php echo $varGral;?>">
                <input id="clave<?php echo $varGral;?>" type="number">
                <span id="clavePH<?php echo $varGral;?>">Clave de Trabajador</span>
            </div>
            <div class="item-asistencia<?php echo $varGral;?>" id="statusIncidencia<?php echo $varGral;?>">
                <i class="fas fa-circle"></i>
            </div>
            <div class="item-asistencia<?php echo $varGral;?>" id="turnoActual<?php echo $varGral;?>">
                <span id="lblTurno<?php echo $varGral;?>">Turno</span>
            </div>
            <div class="item-asistencia<?php echo $varGral;?>" id="nombreEmpleado<?php echo $varGral;?>">
                <span id="lblnombreEmpleado<?php echo $varGral;?>">Nombre Empleado</span>
            </div>
            <div class="item-asistencia<?php echo $varGral;?>" id="nombreIncidencia<?php echo $varGral;?>">
                <span id="lblnombreIncidencia<?php echo $varGral;?>">Incidencia</span>
            </div>
            <div class="item-asistencia<?php echo $varGral;?>" id="fechaActual<?php echo $varGral;?>">
                <i class="fas fa-calendar-week"></i> <span id="lblFecha<?php echo $varGral;?>">Fecha Actual</span>
            </div>
            <div class="item-asistencia<?php echo $varGral;?>" id="horaActual<?php echo $varGral;?>">
                <a id="horaActual-aTag"><i class="far fa-clock"></i> <span id="lblHora<?php echo $varGral;?>">Hora Actual</span></a>
            </div>
            <div class="fingerprint-container">
                <div class="item-asistencia<?php echo $varGral;?>" id="huellaDactil<?php echo $varGral;?>">
                    <img src="" class="pfp" id="imgEmpleado<?php echo $varGral;?>" alt="Huella Digital de Empleado" onerror="this.src='../fotos/default-fingerprint.png'" draggable="false">   
                </div>
            </div>
        </div>
    </main>

    <!-- En este contenedor aparecerá todo el sistema que verá el administrativo -->
    <div id="sistema-container">
        <div class="wrapper" id="body-pd">
            <header class="itl_header" id="header">
                <?php
                    include'../mSistema/header.php';
                ?>
            </header>

            <div class="l-navbar" id="nav-bar">
                <?php 
                    include'../mSistema/nav-sidebar.php';
                ?>
            </div>

            <div class="contenedor-titular">
                <div class="contenedor-titular-item" id="contenedor-modulo-actual">
                    <label id="lblTitulo">Módulo Actual</label>
                </div>
                <div class="contenedor-titular-item" id="contenedor-usuario-logueado">
                    <label id="lblLoggedUser">Usuario Logueado</label>
                </div>
            </div>

            <div class="container-principal" id="container-principal">
                <div class="container-fluid" id="administradores">
                    <section id="nuevo-ADM" style="display:none;">
                        <?php
                            include'../mAdministradores/formNuevo.php';
                        ?> 
                    </section>

                    <section id="editar-ADM" style="display:none;">
                        <?php
                            include'../mAdministradores/formEditar.php';
                        ?>
                    </section>

                    <section id="listado-ADM" style="display:none;">
                    </section>
                </div>
                <div class="container-fluid" id="docentesAdministrativos">
                    <section id="nuevo-DYA" style="display:none;">
                        <?php
                            include'../mDocentesAdministrativos/formNuevo.php';
                        ?>
                    </section>

                    <section id="editar-DYA" style="display:none;">
                        <?php
                            include'../mDocentesAdministrativos/formEditar.php';
                        ?>
                    </section>

                    <section id="listado-DYA" style="display:none;">
                    </section>
                    
                </div>
                <div class="container-fluid" id="horariosModulo">
                    <section id="nuevo-H" style="display:none;">
                        <?php
                            include'../mHorarios/formNuevo.php';
                        ?>
                    </section>
                    <section id="editar-H" style="display:none;">
                        <?php
                            include'../mHorarios/formEditar.php';
                        ?>
                    </section>
                    <section id="quitar-H" style="display:none;">
                        <?php
                            include'../mHorarios/formQuitar.php';
                        ?>
                    </section>
                    <section id="menu-H" style="display:none;">
                        <?php
                            include'../mHorarios/menu.php';
                        ?>
                    </section>
                    <section id="listado-H" style="display:none;">
                    </section>
                </div>
                <div class="container-fluid" id="incapacidades">
                    <section id="nuevo-I" style="display:none;">
                        <?php
                            include'../mIncapacidades/formNuevo.php';
                        ?>
                    </section>
                    <section id="listado-I" style="display:none;">
                    </section>
                </div>
                <div class="container-fluid" id="consultasReportes">
                    <section id="menu-CR" style="display:none;">
                        <?php
                            include'../mConsultasReportes/menu.php';
                        ?>
                    </section>
                    <section id="listado-CR" style="display:none;">
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Primer Registro -->
    <?php include'../mLogin/modalRegistro.php';?>
    <!-- Modal de Login -->
    <?php include'../mLogin/modalLogin.php';?>
    <!-- Modal de Fotos -->
    <?php include'../modales/modalFoto.php';?>
    <!-- Modal de PDF -->
    <?php include'../modales/modalPDF.php';?>
    <!-- Modal de Datos Docentes y Administrativos -->
    <?php include'../mDocentesAdministrativos/modalDatos.php';?>
    <!-- Modal de Horarios Docentes y Administrativos -->
    <?php include'../mDocentesAdministrativos/modalHorarios.php';?>
    <!-- Modal de Incapacidades Buscar por Fecha -->
    <?php include'../mIncapacidades/modalBuscarFecha.php';?>
    <!-- Modal de Consultas y Reportes Buscar por Apellidos -->
    <?php include'../mConsultasReportes/modalBuscarApellidos.php';?>
    <!-- Modal de Consultas y Reportes Buscar por Fecha - Puntualidad Retardos Faltas -->
    <?php include'../mConsultasReportes/modalBuscarFecha.php';?>
    <!-- Modal de Consultas y Reportes Buscar por Nombre - Puntualidad Retardos Faltas -->
    <?php include'../mConsultasReportes/modalBuscarNombre-PRF.php';?>
    <!-- Modal de Consultas y Reportes Buscar por Fecha - Asistencias -->
    <?php include'../mConsultasReportes/modalBuscarFechaAS.php';?>
     <!-- Modal de Consultas y Reportes Buscar por Nombre - Asistencias -->
     <?php include'../mConsultasReportes/modalBuscarNombre-AS.php';?>

    <!-- jQuery -->
    <script src="../plugins/jQuery/jquery-3.3.1.js"></script>
    <!-- MomentJS -->
    <script src="../plugins/momentjs/moment-with-locales/moment-with-locales.min.js"></script>
    <!-- Bootstrap-4 -->
    <script src="../plugins/bootstrap-4.0.0/dist/js/bootstrap.js"></script> 
    <!-- Alertifyjs -->  
    <script src="../plugins/alertifyjs/alertify.min.js"></script> 
    <!-- Funciones Propias -->
    <script src="./funcionesIDX.js"></script> <!--Inicio/Asistencias -->
    <script src="../mSistema/funcionesSIS.js"></script> <!-- Funciones generales del sistema-->
    <script src="../mLogin/funcionesLG.js"></script> <!-- Funciones Login -->
    <script src="../mAdministradores/funcionesADM.js"></script> <!-- Funciones Administradores -->
    <script src="../mDocentesAdministrativos/funcionesDYA.js"></script> <!-- Funciones Administradores -->
    <script src="../mHorarios/funcionesH.js"></script> <!-- Funciones Horarios -->
    <script src="../mIncapacidades/funcionesI.js"></script> <!-- Funciones Incapacidades -->
    <script src="../mConsultasReportes/funcionesCR.js"></script> <!-- Funciones Consultas Reportes -->
    <!-- Sweet Alert -->
    <script src="../plugins/sweetalert2-master/dist/sweetalert2.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/dataTablesB4/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/dataTablesB4/js/dataTables.bootstrap4.min.js"></script>
    <!-- dataTableButtons -->
    <script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>
    <!-- Bootstrap Switch Button -->
    <script type="text/javascript" src="../plugins/bootstrap4-toggle-master/js/bootstrap4-toggle.min.js"></script>
    <!-- pdfObject -->
    <script type="text/javascript" src="../plugins/PDFObject-master/pdfobject.min.js"></script>
    <!-- Select 2 -->
    <script type="text/javascript" src="../plugins/select2-master/dist/js/select2.full.min.js"></script>
    <!-- PrintArea -->
    <script src="../plugins/PrintArea-master/js/jquery.printarea.js" type="text/javascript"></script>
    <!-- fileinput -->
    <script src="../plugins/bootstrap-fileinput-master/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/fileinput.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/locales/es.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/themes/fas/theme.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.js" type="text/javascript"></script>
    <!-- popper -->
    <script src="../plugins/popper/popper.min.js" type="text/javascript"></script>


    <script>
        reloj_IDX();
        fecha_IDX();
        selectTwo();
    </script>
</body>
</html>