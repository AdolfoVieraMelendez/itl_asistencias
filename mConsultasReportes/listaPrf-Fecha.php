<?php
// Conexion mysqli
include'../conexion/conexionli.php';

include'../funciones/fechaEspanol.php';
//Variable de Nombre
$varGral="CR-PRF";

$fecha_inicio = $_POST['nfecha_inicio'];
$fecha_final = $_POST['nfecha_final'];
$incidencias = array('Puntual', 'Retardo 1', 'Retardo 2', 'Retardo 3');

$fecha=date("Y-m-d");

$cadena = "SELECT
                a.id_asistencia,
                a.id_usuario,
                CONCAT(u.apPaterno,' ',u.apMaterno,' ',u.nom_us) AS nombre,
                a.fecha,
                a.hora_entrada,
                a.incidencia,
                a.hora_salida,
                a.horas_trabajadas,
                DATE_FORMAT(a.hora_entrada, '%h:%i %p') AS hora_entrada_display,
                DATE_FORMAT(a.hora_salida, '%h:%i %p') AS hora_salida_display
            FROM
                asistencias AS a
            LEFT JOIN usuarios AS u ON a.id_usuario = u.id_usuario
            WHERE
                a.fecha 
            BETWEEN '$fecha_inicio' AND '$fecha_final' 
            ORDER BY a.id_asistencia DESC";
$consultar = mysqli_query($conexionLi, $cadena);

$queryPuntual = "SELECT
                    COUNT(a.incidencia) AS Cantidad_Puntual
                FROM
                    asistencias AS a
                LEFT JOIN usuarios AS u ON a.id_usuario = u.id_usuario
                WHERE
                    a.incidencia = '$incidencias[0]'
                AND 
                    a.fecha
                BETWEEN '$fecha_inicio' AND '$fecha_final'";
$contadorP = mysqli_query($conexionLi, $queryPuntual);
$rowP = mysqli_fetch_array($contadorP);

$queryRetardo = "SELECT
                    COUNT(a.incidencia) AS Cantidad_Retardo
                FROM
                    asistencias AS a
                LEFT JOIN usuarios AS u ON a.id_usuario = u.id_usuario
                WHERE
                    a.incidencia = '$incidencias[1]'
                AND 
                    a.fecha
                BETWEEN '$fecha_inicio' AND '$fecha_final'";
$contadorR = mysqli_query($conexionLi, $queryRetardo);
$rowR = mysqli_fetch_array($contadorR);

$queryRetardoII = "SELECT
                    COUNT(a.incidencia) AS Cantidad_RetardoII
                FROM
                    asistencias AS a
                LEFT JOIN usuarios AS u ON a.id_usuario = u.id_usuario
                WHERE
                    a.incidencia = '$incidencias[2]'
                AND 
                    a.fecha
                BETWEEN '$fecha_inicio' AND '$fecha_final'";
$contadorRII = mysqli_query($conexionLi, $queryRetardoII);
$rowRII = mysqli_fetch_array($contadorRII);

$queryRetardoIII = "SELECT
                    COUNT(a.incidencia) AS Cantidad_RetardoIII
                FROM
                    asistencias AS a
                LEFT JOIN usuarios AS u ON a.id_usuario = u.id_usuario
                WHERE
                    a.incidencia = '$incidencias[3]'
                AND 
                    a.fecha
                BETWEEN '$fecha_inicio' AND '$fecha_final'";
$contadorRIII = mysqli_query($conexionLi, $queryRetardoIII);
$rowRIII = mysqli_fetch_array($contadorRIII);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
    <table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Hora Entrada</th>
                <th scope="col">Incidencia</th>
                <th scope="col">Hora Salida</th>
                <th scope="col">Horas Trabajadas</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        while( $row = mysqli_fetch_array($consultar) ) {

            $id          = $row[0];
            $id_u = $row[1];

            $nombre = $row[2];
            $fecha_asistencia = $row[3];
            $fechaCastellano = fechaCastellano($fecha_asistencia);
            $hora_entrada = $row[4];
            $incidencia = $row[5];
            $hora_salida = $row[6];
            $horas_trabajadas = $row[7];
            $hora_entrada_display = $row[8];
            $hora_salida_display = $row[9];


            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <label class="textoBase">
                        <?php echo $nombre?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $hora_entrada_display?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $incidencia?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $hora_salida_display?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $horas_trabajadas?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $fechaCastellano?> 
                    </label>
                </td>
            </tr>
        <?php
        $n++;
        }
        ?>

        </tbody>
        <tfoot>
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Hora Entrada</th>
                <th scope="col">Incidencia Entrada</th>
                <th scope="col">Hora Salida</th>
                <th scope="col">Horas Trabajadas</th>
                <th scope="col">Fecha</th>
            </tr>
        </tfoot>
    </table>
<div>
<form action="../mConsultasReportes/reportes/prf/generarpdfFechas.php" method="GET" target="_blank">
    <div class="row">
        <input type="hidden" name="txtFechaInicial-PRF-F" id="txtFechaInicial-PRF-F">
        <input type="hidden" name="txtFechaFinal-PRF-F" id="txtFechaFinal-PRF-F">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="txtPuntual-PRF" id="lblPuntual-PRF">Puntualidades:</label>
                <input id="txtPuntual-PRF" name="txtPuntual-PRF" class="form-control" value="<?php echo $rowP[0];?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="txtRetardo-PRF" id="lblRetardo-PRF">Retardo 1:</label>
                <input id="txtRetardo-PRF" name="txtRetardo-PRF" class="form-control" value="<?php echo $rowR[0];?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="txtRetardoII-PRF" id="lblRetardoII-PRF">Retardo 2:</label>
                <input id="txtRetardoII-PRF" name="txtRetardoII-PRF" class="form-control" value="<?php echo $rowRII[0];?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="txtFaltas-PRF" id="lblFaltas-PRF">Retardo 3/Faltas:</label>
                <input id="txtFaltas-PRF" name="txtFaltas-PRF" class="form-control" value="<?php echo $rowRIII[0];?>" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <button type="submit" name="create_pdf" class="btn btn-outline-primary btn-block activo btnEspacio" id="btnReporteTodos-PRF"><i class='fas fa-file-pdf fa-lg'></i> &nbsp; Ver Reporte</button>
        </div>
    </div>
</form>


<?php
//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexionLi
mysqli_close($conexionLi);
?>

<script type="text/javascript">
  var varGral='<?php echo $varGral?>';
  $(document).ready(function() {
        $('#example'+varGral).DataTable( {
            "language": {
                    // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    "url": "../plugins/dataTablesB4/langauge/Spanish.json"
                },
            "order": [[ 0, "asc" ]],
            "paging":   true,
            "ordering": true,
            "info":     true,
            "responsive": true,
            "searching": true,
            stateSave: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
            ],
            columnDefs: [ {
                // targets: 0,
                // visible: false
            }],
            buttons: [
                        {
                            text: "<i class='fas fa-arrow-left fa-lg' aria-hidden='true'></i> &nbsp;Regresar al Menú",
                            className: 'btn btn-outline-warning btnEspacio',
                            id: 'btnRegresarMenu-CR',
                            action : function(){
                                regresar_menu_CR();
                            }
                        },
                        {
                            text: "<i class='fas fa-user fa-lg' aria-hidden='true'></i> &nbsp;Buscar por Nombre",
                            className: 'btn btn-outline-primary btnEspacio',
                            id: 'btnBuscarNombre-CR-PRF',
                            action : function(){
                                abrirModalBuscarNombrePRF();
                            }
                        },
                        {
                            text: "<i class='fas fa-calendar-day fa-lg' aria-hidden='true'></i> &nbsp;Buscar por Fechas",
                            className: 'btn btn-outline-danger btnEspacio',
                            id: 'btnBuscarFecha-CR-PRF',
                            action : function(){
                                abrirModalBuscarFechasPRF();
                            }
                        },
                        {
                            text: "<i class='fas fa-globe fa-lg' aria-hidden='true'></i> &nbsp;Mostrar todos",
                            className: 'btn btn-outline-info btnEspacio',
                            id: 'btnTodos-DYA',
                            action : function(){
                                llenar_lista_CR_prf();
                            }
                        }         
            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>