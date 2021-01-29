<?php
// Conexion mysqli
include'../conexion/conexionli.php';

include'../funciones/diasTranscurridos.php';
//Variable de Nombre
$varGral="-H";
$fecha=date("Y-m-d");

$cadena = "SELECT
                u.id_usuario,
                u.apPaterno,
                u.apMaterno,
                u.nom_us,
                u.email_us,
                u.tipo_us,
                u.tiempo_us,
                u.titulo_us
            FROM
                horarios AS h
            RIGHT JOIN usuarios AS u ON h.id_usuario = u.id_usuario
            WHERE
                ISNULL(h.turno)
            AND u.activo = 1
            ORDER BY u.id_usuario DESC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
    <table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Asignar Horario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Título</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        while( $row = mysqli_fetch_array($consultar) ) {

            $id = $row[0];
            $apPaterno = $row[1];
            $apMaterno = $row[2];
            $nombre = $row[3];
            $email = $row[4];
            $tipo = $row[5];
            $tiempo = $row[6];
            $titulo = $row[7];
            $nombre_completo = $apPaterno.' '.$apMaterno.' '.$nombre;

            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <button type="button" class="seleccionar btn btn-outline-success btn-sm activo" id="btnNuevo<?php echo $varGral?><?php echo $n?>" onclick="nuevo_registro_H('<?php echo $id;?>', '<?php echo $nombre_completo;?>')">
                        <i class="fas fa-plus fa-lg"></i>
                    </button>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $nombre_completo?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $tipo?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $tiempo?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $titulo?> 
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $email?> 
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
                <th scope="col">Asignar Horario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Título</th>
                <th scope="col">Correo</th>
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
                            text: "<i class='fas fa-arrow-left fa-lg' aria-hidden='true'></i> &nbsp;Regresar al Menú",
                            className: 'btn btn-outline-danger btnEspacio',
                            id: 'btnRegresarMenu-N',
                            action : function(){
                                regresar_menu_H();
                            }
                        }
            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>
