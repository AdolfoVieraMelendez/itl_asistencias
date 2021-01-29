<?php
// Conexion mysqli
include'../conexion/conexionli.php';
include'../funciones/fechaEspanol.php';

//Variable de Nombre
$varGral="-I";
$fecha=date("Y-m-d");

$cadena = "SELECT
                i.id_incapacidad,
                u.id_usuario,
                u.activo,
                CONCAT(u.apPaterno,' ',u.apMaterno,' ',u.nom_us) AS nombre,
                u.tel_us,
                u.cel_us,
                u.email_us,
                u.titulo_us,
                u.clave_us,
                h.turno,
                i.nombre_incapacidad,
                i.fecha_incapacidad
            FROM
                usuarios as u
            LEFT JOIN horarios as h ON u.id_usuario = h.id_usuario 
            RIGHT JOIN incapacidades as i ON u.id_usuario = i.id_usuario
            WHERE u.activo = 1
            ORDER BY i.id_incapacidad DESC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
    <table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Clave</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Turno</th>
                <th scope="col">Incapacidad</th>
                <th scope="col">Fecha Incapacidad</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        while( $row = mysqli_fetch_array($consultar) ) {

            $id          = $row[0];
            $iid = $row[1];

            $nombre     = $row[3];
            $telefono = $row[4];
            $celular = $row[5];
            $email = $row[6];
            $titulo = $row[7];
            $clave = $row[8];
            $turno = $row[9];
            $incapacidad = $row[10];
            $fecha_incapacidad = fechaCastellano($row[11]);
            
            $numero_telefono = ($celular == 0)?$numero_telefono = $telefono:$numero_telefono = $celular;

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
                        <?php echo $clave?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $email?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $numero_telefono?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $turno?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $incapacidad?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $fecha_incapacidad?> 
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
                <th scope="col">Clave</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Turno</th>
                <th scope="col">Incapacidad</th>
                <th scope="col">Fecha Incapacidad</th>
            </tr>
        </tfoot>
    </table>
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
                            text: "<i class='fas fa-plus fa-lg' aria-hidden='true'></i> &nbsp;Nuevo Registro",
                            className: 'btn btn-outline-primary btnEspacio',
                            id: 'btnNuevo',
                            action : function(){
                                nuevo_registro_I();
                            }
                        },
                        {
                            text: "<i class='fas fa-calendar-day fa-lg' aria-hidden='true'></i> &nbsp;Buscar por Fechas",
                            className: 'btn btn-outline-danger btnEspacio',
                            id: 'btnBuscarFecha',
                            action : function(){
                                abrirModalBuscarFechas();
                            }
                        },
                        {
                            text: "<i class='fas fa-globe fa-lg' aria-hidden='true'></i> &nbsp;Mostrar todos",
                            className: 'btn btn-outline-info btnEspacio',
                            id: 'btnBuscarTodos',
                            action : function(){
                                llenar_lista_I();
                            }
                        },
                        {
                          extend: 'excel',
                          text: "<i class='far fa-file-excel fa-lg' aria-hidden='true'></i> &nbsp;Exportar a Excel",
                          className: 'btn btn-outline-secondary btnEspacio',
                          title:'Lista_Permisos_Incapacidades_creados',
                          id: 'btnExportar',
                          exportOptions: {
                            columns:  [0,1,2,3,4,5,6,7],
                          }
                        }
            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>