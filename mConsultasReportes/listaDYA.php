<?php
// Conexion mysqli
include'../conexion/conexionli.php';

//Variable de Nombre
$varGral="-CR-DYA";
$fecha=date("Y-m-d");

$cadena = "SELECT
                id_usuario,
                activo,
                CONCAT(apPaterno,' ',apMaterno,' ',nom_us) as nombre,
                CONCAT(dir_us,' ',col_us) as direccion,
                cp_us,
                tel_us,
                cel_us,
                edad_us,
                email_us
            FROM
                usuarios
            ORDER BY id_usuario ASC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
    <table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Código Postal</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        while( $row = mysqli_fetch_array($consultar) ) {

            $id          = $row[0];

            $nombre_completo     = $row[2];
            $direccion = $row[3];
            $codPostal = $row[4];
            $telefono = $row[5];
            $celular = $row[6];
            $edad = $row[7];
            $email = $row[8];
            
            $numero_telefono = ($celular == 0)?$numero_telefono = $telefono:$numero_telefono = $celular;

            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <label class="textoBase">
                        <?php echo $nombre_completo?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $edad?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $direccion?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $numero_telefono?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $email?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $codPostal?> 
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
                <th scope="col">Edad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Código Postal</th>
            </tr>
        </tfoot>
    </table>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="../mConsultasReportes/reportes/DocentesAdministrativos/generarpdfTodos.php" method="GET" target="_blank">
                    <button type="submit" name="create_pdf" class="btn btn-outline-primary btn-block activo btnEspacio" id="btnReporteTodos-DYA"><i class='fas fa-file-pdf fa-lg'></i> &nbsp; Ver Reporte</button>
                </form>
            </div>
        </div>
    </div>
<div>

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
            "searching": false,
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
                            text: "<i class='fas fa-user fa-lg' aria-hidden='true'></i> &nbsp;Buscar por apellido",
                            className: 'btn btn-outline-danger btnEspacio',
                            id: 'btnBuscarApellido',
                            action : function(){
                                abrirModalBuscarApellidos();
                            }
                        },
                        {
                            text: "<i class='fas fa-globe fa-lg' aria-hidden='true'></i> &nbsp;Mostrar todos",
                            className: 'btn btn-outline-info btnEspacio',
                            id: 'btnTodos-DYA',
                            action : function(){
                                llenar_lista_CR_usuarios();
                            }
                        }                        
            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>