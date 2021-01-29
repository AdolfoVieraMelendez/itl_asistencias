<?php

function fetch_data()
{
    include'../../../conexion/conexionli.php';

    $output = '';
    $query = "SELECT
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
    $resultado = mysqli_query($conexionLi, $query);

    $n=1;
    while($row = mysqli_fetch_array($resultado))
    {
        $id = $row[0];
        $nombre = $row[2];
        $dir = $row[3];
        $codigoPos = $row[4];
        $tel = $row[5];
        $cel = $row[6];
        $age = $row[7];
        $correo = $row[8];
        $num_tel = ($cel == 0)?$num_tel = $tel:$num_tel = $cel;
        $output .= '
            <tbody>
                <tr>
                    <td width="5%">'.$n.'</td>
                    <td width="30%">'.$nombre.'</td>
                    <td width="7%">'.$age.'</td>
                    <td width="15%">'.$dir.'</td>
                    <td width="10%">'.$num_tel.'</td>
                    <td width="25%">'.$correo.'</td>
                    <td width="8%">'.$codigoPos.'</td>
                </tr>
            </tbody>
        ';
        $n++;
    }
    
    return $output;
}


if(isset($_GET["create_pdf"]))
{
    require_once("../../../plugins/TCPDF/tcpdf.php");
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf -> SetCreator(PDF_CREATOR);
    $pdf -> SetTitle("Lista de Docentes y Administradores");
    $pdf -> SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf -> SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf -> SetFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf -> SetDefaultMonospacedFont('helvetica');
    $pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf -> SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $pdf -> setPrintHeader(false);
    $pdf -> setPrintFooter(false);
    $pdf -> SetAutoPageBreak(TRUE, 10);
    $pdf -> SetFont('helvetica', '', 7);

    $contenido = '';

    $contenido .= '
        <h3 align="center">Lista de Docentes y Administrativos</h3>
        <table border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th width="5%" scope="col">#</th>
                    <th width="30%" scope="col">Nombre</th>
                    <th width="7%" scope="col">Edad</th>
                    <th width="15%" scope="col">Dirección</th>
                    <th width="10%" scope="col">Teléfono</th>
                    <th width="25%" scope="col">Correo</th>
                    <th width="8%" scope="col">Código Postal</th>
                </tr>
            </thead>
    ';

    $contenido .= fetch_data();
    $contenido .= '</table>';
    $pdf -> AddPage();
    $pdf -> writeHTML($contenido);
    $pdf -> Output("reporte_docentes_administrativos" , "I");
}

?>