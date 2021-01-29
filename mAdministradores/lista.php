<?php
// Conexion mysqli
include'../conexion/conexionli.php';

include'../funciones/diasTranscurridos.php';
//Variable de Nombre
$varGral="-ADM";
$fecha=date("Y-m-d");

$cadena = "SELECT
                id_admin,
                activo,
                nombre_admin,
                fecha_registro,
                contra
            FROM
                administradores
            ORDER BY id_admin DESC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
    <table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Restablecer Contraseña</th>
                <th scope="col">Usuario</th>
                <th scope="col">Registro</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        while( $row = mysqli_fetch_array($consultar) ) {

            $id          = $row[0];

            if ($row[1] == 1) {
                $chkChecado    = "checked";
                $dtnDesabilita = "";
                $chkValor      = "1";
            }else{
                $chkChecado    = "";
                $dtnDesabilita = "disabled";
                $chkValor      = "0";
            }

            $nombre_admin     = $row[2];
            $fecha_registro    = $row[3];
            $contra = $row[4];
            $creacion = dias_transcurridos($fecha, $fecha_registro);
            $tiempoC = ($creacion > 1)?'Creado hace '.$creacion.' días.':'Creado hace '.$creacion.' día. ';

            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="editar btn btn-outline-success btn-sm activo" id="btnEditar<?php echo $varGral?><?php echo $n?>" onclick="llenar_formulario_ADM('<?php echo $id?>','<?php echo $nombre_admin?>', '<?php echo $contra?>')">
                        <i class="far fa-edit fa-lg"></i>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="res-contra btn btn-outline-danger btn-sm activo" id="btnR-Contra<?php echo $varGral?><?php echo $n?>" onclick="reset_passw('<?php echo $id?>', '<?php echo $nombre_admin?>')">
                        <i class="fas fa-undo fa-lg"></i>
                    </button>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $nombre_admin?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $tiempoC?> 
                    </label>
                </td>
                <td>
                    <input value="<?php echo $chkValor?>" onchange="cambiar_estatus_ADM(<?php echo $id?>,<?php echo $n?>)" class="toggle-two" type="checkbox" <?php echo $chkChecado?> data-toggle="toggle" data-onstyle="outline-success" data-width="60" data-size="sm" data-offstyle="outline-danger" data-on="<i class='fa fa-check'></i> Si" data-off="<i class='fa fa-times'></i> No" id="check<?php echo $n?>">
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
                <th scope="col">Editar</th>
                <th scope="col">Restablecer Contraseña</th>
                <th scope="col">Usuario</th>
                <th scope="col">Registro</th>
                <th scope="col">Status</th>
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
                                nuevo_registro_ADM();
                            }
                        },
                        {
                          extend: 'excel',
                          text: "<i class='far fa-file-excel fa-lg' aria-hidden='true'></i> &nbsp;Exportar a Excel",
                          className: 'btn btn-outline-secondary btnEspacio',
                          title:'Lista_administradores_creados',
                          id: 'btnExportar',
                          exportOptions: {
                            columns:  [0,3,4],
                          }
                        }
            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>