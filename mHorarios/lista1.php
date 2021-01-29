<?php
// Conexion mysqli
include'../conexion/conexionli.php';

include'../funciones/diasTranscurridos.php';
include"../funciones/fechaEspanol1.php";
//Variable de Nombre
$varGral="-H";
$fecha=date("Y-m-d");

$cadena = "SELECT
                h.id_horario,
                h.id_usuario,
                h.turno,
                DATE_FORMAT(h.d_entrada, '%h:%i %p') AS d_entrada,
                DATE_FORMAT(h.d_salida, '%h:%i %p') AS d_salida,
                DATE_FORMAT(h.l_entrada, '%h:%i %p') AS l_entrada,
                DATE_FORMAT(h.l_salida, '%h:%i %p') AS l_salida,
                DATE_FORMAT(h.m_entrada, '%h:%i %p') AS m_entrada,
                DATE_FORMAT(h.m_salida, '%h:%i %p') AS m_salida,
                DATE_FORMAT(h.mi_entrada, '%h:%i %p') AS mi_entrada,
                DATE_FORMAT(h.mi_salida, '%h:%i %p') AS mi_salida,
                DATE_FORMAT(h.j_entrada, '%h:%i %p') AS j_entrada,
                DATE_FORMAT(h.j_salida, '%h:%i %p') AS j_salida,
                DATE_FORMAT(h.v_entrada, '%h:%i %p') AS v_entrada,
                DATE_FORMAT(h.v_salida, '%h:%i %p') AS v_salida,
                DATE_FORMAT(h.s_entrada, '%h:%i %p') AS s_entrada,
                DATE_FORMAT(h.s_salida, '%h:%i %p') AS s_salida,
                CONCAT(u.apPaterno,' ',u.apMaterno,' ',u.nom_us) AS Nombre,
                u.clave_us,
                u.email_us,
                u.tipo_us,
                u.tiempo_us,
                u.titulo_us,
                h.fecha_registro
            FROM
                horarios AS h
            LEFT JOIN usuarios AS u ON h.id_usuario = u.id_usuario
            ORDER BY u.id_usuario DESC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
    <table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Quitar</th>
                <th scope="col">Nombre</th>
                <th scope="col">Turno</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Título</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha Registro</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        while( $row = mysqli_fetch_array($consultar) ) {

            $id = $row[0];
            $idd = $row[1];
            $turno = $row[2];
            $d_entrada = $row[3];
            $d_salida = $row[4];
            $l_entrada = $row[5];
            $l_salida = $row[6];
            $m_entrada = $row[7];
            $m_salida = $row[8];
            $mi_entrada = $row[9];
            $mi_salida = $row[10];
            $j_entrada = $row[11];
            $j_salida = $row[12];
            $v_entrada = $row[13];
            $v_salida = $row[14];
            $s_entrada = $row[15];
            $s_salida = $row[16];
            $nombre = $row[17];
            $clave = $row[18];
            $email = $row[19];
            $tipo = $row[20];
            $tiempo = $row[21];
            $titulo = $row[22];
            $fecha_registro = $row[23];
            $fCastellano = fechaCastellano1($fecha_registro);

            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <button type="button" class="editar btn btn-outline-success btn-sm activo" id="btnEditar<?php echo $varGral?><?php echo $n?>" onclick="llenar_formulario_H('<?php echo $idd;?>', '<?php echo $nombre;?>', '<?php echo $turno;?>', '<?php echo $d_entrada;?>', '<?php echo $d_salida;?>', '<?php echo $l_entrada;?>', '<?php echo $l_salida;?>', '<?php echo $m_entrada;?>', '<?php echo $m_salida;?>', '<?php echo $mi_entrada;?>', '<?php echo $mi_salida;?>', '<?php echo $j_entrada;?>', '<?php echo $j_salida;?>', '<?php echo $v_entrada;?>', '<?php echo $v_salida;?>', '<?php echo $s_entrada;?>', '<?php echo $s_salida;?>')">
                        <i class="fas fa-edit fa-lg"></i>
                    </button>
                </td>
                <td>
                    <button type="button" class="quitar btn btn-outline-danger btn-sm activo" id="btnQuitar<?php echo $varGral?><?php echo $n?>" onclick="llenar_quitar_H('<?php echo $idd;?>', '<?php echo $nombre;?>', '<?php echo $turno;?>', '<?php echo $d_entrada;?>', '<?php echo $d_salida;?>', '<?php echo $l_entrada;?>', '<?php echo $l_salida;?>', '<?php echo $m_entrada;?>', '<?php echo $m_salida;?>', '<?php echo $mi_entrada;?>', '<?php echo $mi_salida;?>', '<?php echo $j_entrada;?>', '<?php echo $j_salida;?>', '<?php echo $v_entrada;?>', '<?php echo $v_salida;?>', '<?php echo $s_entrada;?>', '<?php echo $s_salida;?>')">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $nombre?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $turno?>
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
                <td>
                    <label class="textoBase">
                        <?php echo $fCastellano?> 
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
                <th scope="col">Editar</th>
                <th scope="col">Quitar</th>
                <th scope="col">Nombre</th>
                <th scope="col">Turno</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Título</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha Registro</th>
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
