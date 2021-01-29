<?php

include"../../../conexion/conexionli.php";
include'../../../funciones/fechaEspanol.php';
require_once("../../../plugins/TCPDF/tcpdf.php");


if(isset($_GET['create_pdf'])) {
    $fecha_inicial = $_GET['txtFechaInicial-AS-F'];
    $fecha_final = $_GET['txtFechaFinal-AS-F'];
    $nombre = $_GET['txtNombre-AS-F'];

    $queryNombres = "SELECT
                        CONCAT(nom_us,' ',apPaterno,' ',apMaterno) AS nombre
                    FROM
                        usuarios
                    WHERE
                    nom_us = '$nombre'";
    $nombre_display = mysqli_query($conexionLi, $queryNombres);
    while ($rowNom = mysqli_fetch_array($nombre_display)){
        $nombre_completo = $rowNom[0];
    }


class PDF extends TCPDF
{
    public function Header(){
        $imageFile = K_PATH_IMAGES.'tecNM.png';
        $imageFile1 = K_PATH_IMAGES.'logotec.jpg';
        $this->Image($imageFile, 10, 10, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Image($imageFile1, 170, 10, 25, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(5);
        $this->SetFont('helvetica','',12);
        $this->Cell(189,5,'Horas Trabajadas por Docentes y Administrativos',0,1,'C');
    }

    public function Footer() {
        $fecha=date("Y-m-d");
        $this->SetY(-10);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(179, 10, 'Impreso el '.fechaCastellano($fecha), 0, false, 'L');
        $this->Cell(10, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C');
    }
}

$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TecNM Linares');
$pdf->SetTitle('Reporte de Puntualidades, retardos y faltas');
$pdf->SetSubject('Consultas y Reportes');
$pdf->SetKeywords('TecNM, PDF, Puntualidades, Retardos, Faltas');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'ASISTENCIAS'.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if(@file_exists(dirname(__FILE__).'/lang/eng.php')){
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 10, '', true);

$pdf->AddPage();

$pdf->Ln(18);
$pdf->SetFont('helvetica','B',8);
$pdf->Cell(189,1,$nombre_completo,0,0,'C',0);

$pdf->Ln(10);

$pdf->SetFont('helvetica','',8);
$pdf->SetFillColor(224, 235, 255);
$pdf->Cell(80,5,'Nombre',1,0,'C',1);
$pdf->Cell(25,5,'Hora Entrada',1,0,'C',1);
$pdf->Cell(25,5,'Hora Salida',1,0,'C',1);
$pdf->Cell(30,5,'Horas Trabajadas',1,0,'C',1);
$pdf->Cell(29,5,'Fecha',1,0,'C',1);

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
                u.nom_us = '$nombre'
            AND
                a.fecha 
            BETWEEN '$fecha_inicial' AND '$fecha_final' 
            ORDER BY a.id_asistencia DESC";
$consultar = mysqli_query($conexionLi, $cadena);

$i=1;
$max=27;

    while ($row = mysqli_fetch_array($consultar)){
        $id          = $row[0];
        $id_u = $row[1];
        $nombre = $row[2];
        $fecha_asistencia = $row[3];
        $hora_entrada = $row[4];
        $incidencia = $row[5];
        $hora_salida = $row[6];
        $horas_trabajadas = $row[7];
        $hora_entrada_display = $row[8];
        $hora_salida_display = $row[9];

        if(($i%$max) == 0){
            $pdf->AddPage();
            $pdf->Ln(18);
            $pdf->SetFont('helvetica','',8);
            $pdf->SetFillColor(224, 235, 255);
            $pdf->Cell(80,5,'Nombre',1,0,'C',1);
            $pdf->Cell(25,5,'Hora Entrada',1,0,'C',1);
            $pdf->Cell(25,5,'Hora Salida',1,0,'C',1);
            $pdf->Cell(30,5,'Horas Trabajadas',1,0,'C',1);
            $pdf->Cell(29,5,'Fecha',1,0,'C',1);
        }
        $pdf->Ln(7);
        $pdf->Cell(80,5,$nombre,0,0,'C',0);
        $pdf->Cell(25,5,$hora_entrada_display,0,0,'C',0);
        $pdf->Cell(25,5,$hora_salida_display,0,0,'C',0);
        $pdf->Cell(30,5,$horas_trabajadas,0,0,'C',0);
        $pdf->Cell(29,5,$fecha_asistencia,0,0,'C',0);
        $i++;
    }


}

$pdf->Output('prf_porFecha.pdf', 'I');

?>