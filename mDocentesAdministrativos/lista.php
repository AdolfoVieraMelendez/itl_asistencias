<?php
// Conexion mysqli
include'../conexion/conexionli.php';

//Variable de Nombre
$varGral="-DYA";
$fecha=date("Y-m-d");

$cadena = "SELECT
                u.id_usuario,
                u.activo,
                u.apPaterno,
                u.apMaterno,
                u.nom_us,
                u.dir_us,
                u.col_us,
                u.cd_us,
                u.cp_us,
                u.nacionalidad_us,
                u.tel_us,
                u.cel_us,
                u.sexo_us,
                u.fecNac_us,
                u.edad_us,
                u.edoCivil_us,
                u.email_us,
                u.imagen_us,
                u.huella_us,
                u.tipo_us,
                u.rfc_us,
                u.curp_us,
                u.tiempo_us,
                u.titulo_us,
                u.clave_us,
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
                DATE_FORMAT(h.s_salida, '%h:%i %p') AS s_salida
            FROM
                usuarios as u
            LEFT JOIN horarios as h ON u.id_usuario = h.id_usuario 
            ORDER BY id_usuario DESC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
    <table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Imprimir</th>
                <th scope="col">Datos</th>
                <th scope="col">Foto</th>
                <th scope="col">Huella Digital</th>
                <th scope="col">Horario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Correo</th>
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

            $apPaterno     = $row[2];
            $apMaterno    = $row[3];
            $nombre_persona = $row[4];
            $nombre_completo = $apPaterno.' '.$apMaterno.' '.$nombre_persona;
            $direccion = $row[5];
            $colonia = $row[6];
            $ciudad = $row[7];
            $direccion_completa = $direccion.' '.$colonia.', '.$ciudad;
            $codPostal = $row[8];
            $nacionalidad = $row[9];
            $telefono = $row[10];
            $celular = $row[11];
            $sexo = $row[12];
            $fecNac = $row[13];
            $edad = $row[14];
            $edoCivil = $row[15];
            $email = $row[16];
            $imagen = $row[17];
            $huella = $row[18];
            $tipo = $row[19];
            $rfc = $row[20];
            $curp = $row[21];
            $tiempo = $row[22];
            $titulo = $row[23];
            $clave = $row[24];
            $turno = $row[25];
            $d_entrada = $row[26];
            $d_salida = $row[27];
            $l_entrada = $row[28];
            $l_salida = $row[29];
            $m_entrada = $row[30];
            $m_salida = $row[31];
            $mi_entrada = $row[32];
            $mi_salida = $row[33];
            $j_entrada = $row[34];
            $j_salida = $row[35];
            $v_entrada = $row[36];
            $v_salida = $row[37];
            $s_entrada = $row[38];
            $s_salida = $row[39];
            
            $numero_telefono = ($celular == 0)?$numero_telefono = $telefono:$numero_telefono = $celular;

            $imagen_ruta = '../mDocentesAdministrativos/fotos/'.$clave.'.jpg';
            $huella_ruta = '../mDocentesAdministrativos/huellas/'.$clave.'.jpg';

            if (file_exists($imagen_ruta)){
                $icoImagen="<i class='fas fa-camera fa-lg'></i>";
                $tImagen="Si";
            }else{
                $icoImagen="<i class='fas fa-times fa-lg'></i>";
                $tImagen="No";
            }

            if (file_exists($huella_ruta)){
                $icoHuella="<i class='fas fa-fingerprint fa-lg'></i>";
                $tHuella="Si";
            }else{
                $icoHuella="<i class='fas fa-times fa-lg'></i>";
                $tHuella="No";
            }

            if($turno != NULL){
                $icoTurno="<i class='fas fa-calendar-check fa-lg'></i>";
                $tTurno="Si";
            }else{
                $icoTurno="<i class='fas fa-calendar-times fa-lg'></i>";
                $tTurno="No";
            }

            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="editar btn btn-outline-success btn-sm activo" id="btnEditar<?php echo $varGral?><?php echo $n?>" onclick="llenar_formulario_DYA('<?php echo $id?>','<?php echo $clave?>', '<?php echo $apPaterno?>', '<?php echo $apMaterno?>', '<?php echo $nombre_persona?>', '<?php echo $direccion?>', '<?php echo $colonia?>', '<?php echo $ciudad?>', '<?php echo $codPostal?>', '<?php echo $nacionalidad?>', '<?php echo $telefono?>', '<?php echo $celular?>', '<?php echo $sexo?>', '<?php echo $fecNac?>', '<?php echo $edad?>', '<?php echo $edoCivil?>', '<?php echo $email?>', '<?php echo $tipo?>', '<?php echo $rfc?>', '<?php echo $curp?>', '<?php echo $titulo?>', '<?php echo $tiempo?>')">
                        <i class="far fa-edit fa-lg"></i>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="imprimir btn btn-outline-warning btn-sm activo" id="btnImprimir<?php echo $varGral?><?php echo $n?>" onclick="abrirModalPDF('<?php echo $id?>','../mDocentesAdministrativos','Docentes y Administrativos')">
                        <i class="fas fa-print fa-lg"></i>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="ventana btn btn-outline-info btn-sm activo" id="btnDatos<?php echo $varGral?><?php echo $n?>" onclick="abrirModalDatos_DYA('<?php echo $clave?>', '<?php echo $apPaterno?>', '<?php echo $apMaterno?>', '<?php echo $nombre_persona?>', '<?php echo $direccion?>', '<?php echo $colonia?>', '<?php echo $ciudad?>', '<?php echo $codPostal?>', '<?php echo $nacionalidad?>', '<?php echo $telefono?>', '<?php echo $celular?>', '<?php echo $sexo?>', '<?php echo $fecNac?>', '<?php echo $edad?>', '<?php echo $edoCivil?>', '<?php echo $email?>', '<?php echo $tipo?>', '<?php echo $rfc?>', '<?php echo $curp?>', '<?php echo $titulo?>', '<?php echo $tiempo?>')">
                        <i class="far fa-window-maximize fa-lg"></i>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="foto btn btn-outline-secondary btn-sm activo" id="btnImagen<?php echo $varGral?><?php echo $n?>" onclick="abrirModalFoto('<?php echo $clave?>', '<?php echo $nombre_completo?>', '<?php echo $imagen?>')">
                        <?php echo $icoImagen?>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="huella btn btn-outline-secondary btn-sm activo" id="btnHuella<?php echo $varGral?><?php echo $n?>" onclick="reset_passw('<?php echo $id?>', '<?php echo $nombre_admin?>')">
                        <?php echo $icoHuella?>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="horario btn btn-outline-primary btn-sm activo" id="btnHorario<?php echo $varGral?><?php echo $n?>" onclick="abrirModalHorario('<?php echo $id?>', '<?php echo $nombre_completo?>', '<?php echo $turno?>', '<?php echo $d_entrada?>', '<?php echo $d_salida?>', '<?php echo $l_entrada?>', '<?php echo $l_salida?>', '<?php echo $m_entrada?>', '<?php echo $m_salida?>', '<?php echo $mi_entrada?>', '<?php echo $mi_salida?>', '<?php echo $j_entrada?>', '<?php echo $j_salida?>', '<?php echo $v_entrada?>', '<?php echo $v_salida?>', '<?php echo $s_entrada?>', '<?php echo $s_salida?>', '<?php echo $tTurno?>')">
                        <?php echo $icoTurno?>
                    </button>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $nombre_completo?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $numero_telefono?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $direccion_completa?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $email?> 
                    </label>
                </td>
                <td>
                    <input value="<?php echo $chkValor?>" onchange="cambiar_estatus_DYA(<?php echo $id?>,<?php echo $n?>)" class="toggle-two" type="checkbox" <?php echo $chkChecado?> data-toggle="toggle" data-onstyle="outline-success" data-width="60" data-size="sm" data-offstyle="outline-danger" data-on="<i class='fa fa-check'></i> Si" data-off="<i class='fa fa-times'></i> No" id="check<?php echo $n?>">
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
                <th scope="col">Imprimir</th>
                <th scope="col">Datos</th>
                <th scope="col">Foto</th>
                <th scope="col">Huella Digital</th>
                <th scope="col">Horario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Correo</th>
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
                                nuevo_registro_DYA();
                            }
                        },
                        {
                          extend: 'excel',
                          text: "<i class='far fa-file-excel fa-lg' aria-hidden='true'></i> &nbsp;Exportar a Excel",
                          className: 'btn btn-outline-secondary btnEspacio',
                          title:'Lista_Docentes_Administrativos_creados',
                          id: 'btnExportar',
                          exportOptions: {
                            columns:  [0,7,8,9,10],
                          }
                        }
            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>