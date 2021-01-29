<?php

include"../../conexion/conexionli.php";
include'../../funciones/fechaEspanol.php';
require_once("../../plugins/TCPDF/tcpdf.php");


if(isset($_GET['create_pdf'])) {
    $id = $_GET["mIdPersona"];

    class PDF extends TCPDF
    {
        public function Header(){
            $imageFile = K_PATH_IMAGES.'tecNM.png';
            $imageFile1 = K_PATH_IMAGES.'logotec.jpg';
            $this->Image($imageFile, 10, 10, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Image($imageFile1, 170, 10, 25, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Ln(5);
            $this->SetFont('helvetica','B',12);
            $this->Cell(189,5,'Horario',0,1,'C');
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
    $pdf->SetTitle('Horario');
    $pdf->SetSubject('Docentes y Administrativos');
    $pdf->SetKeywords('TecNM, PDF, Horarios');

    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Horario'.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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

    $pdf->SetFont('dejavusans', '', 14, '', true);

    $pdf->AddPage();

    $pdf->Ln(18);


    $cadena = "SELECT
                    u.id_usuario,
                    u.activo,
                    CONCAT(u.nom_us,' ',u.apPaterno,' ',u.apMaterno) as nombre,
                    h.turno as turno,
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
                WHERE u.id_usuario = $id";
    $consultar = mysqli_query($conexionLi, $cadena);

    while ($row = mysqli_fetch_assoc($consultar)){
        // $id_u = $row[0];
        $nombre = $row['nombre'];
        $turno = $row['turno'];
        $d_entrada = $row['d_entrada'];
        $d_salida = $row['d_salida'];
        $l_entrada = $row['l_entrada'];
        $l_salida = $row['l_salida'];
        $m_entrada = $row['m_entrada'];
        $m_salida = $row['m_salida'];
        $mi_entrada = $row['mi_entrada'];
        $mi_salida = $row['mi_salida'];
        $j_entrada = $row['j_entrada'];
        $j_salida = $row['j_salida'];
        $v_entrada = $row['v_entrada'];
        $v_salida = $row['v_salida'];
        $s_entrada = $row['s_entrada'];
        $s_salida = $row['s_salida'];

        if ($d_entrada == '12:00 AM' && $d_salida == '12:00 AM'){
            $d_entrada = 'Sin horario asignado';
            $d_salida = 'Sin horario asignado';
        } else {
            $d_entrada = $d_entrada;
            $d_salida = $d_salida;
        }
        if ($l_entrada == '12:00 AM' && $l_salida == '12:00 AM'){
            $l_entrada = 'Sin horario asignado';
            $l_salida = 'Sin horario asignado';
        } else {
            $l_entrada = $l_entrada;
            $l_salida = $l_salida;
        }
        if ($m_entrada == '12:00 AM' && $m_salida == '12:00 AM'){
            $m_entrada = 'Sin horario asignado';
            $m_salida = 'Sin horario asignado';
        } else {
            $m_entrada = $m_entrada;
            $m_salida = $m_salida;
        }
        if ($mi_entrada == '12:00 AM' && $mi_salida == '12:00 AM'){
            $mi_entrada = 'Sin horario asignado';
            $mi_salida = 'Sin horario asignado';
        } else {
            $mi_entrada = $mi_entrada;
            $mi_salida = $mi_salida;
        }
        if ($j_entrada == '12:00 AM' && $j_salida == '12:00 AM'){
            $j_entrada = 'Sin horario asignado';
            $j_salida = 'Sin horario asignado';
        } else {
            $j_entrada = $j_entrada;
            $j_salida = $j_salida;
        }
        if ($v_entrada == '12:00 AM' && $v_salida == '12:00 AM'){
            $v_entrada = 'Sin horario asignado';
            $v_salida = 'Sin horario asignado';
        } else {
            $v_entrada = $v_entrada;
            $v_salida = $v_salida;
        }
        if ($s_entrada == '12:00 AM' && $s_salida == '12:00 AM'){
            $s_entrada = 'Sin horario asignado';
            $s_salida = 'Sin horario asignado';
        } else {
            $s_entrada = $s_entrada;
            $s_salida = $s_salida;
        }

        $pdf->SetFont('helvetica','',12);
        $pdf->SetFillColor(224, 235, 255);
        $pdf->Cell(189,5, $nombre,0,0,'C',0);
    
        $pdf->Ln(10);
    
        $pdf->SetFont('helvetica','',12);
        $pdf->SetFillColor(224, 235, 255);
        $pdf->Cell(63,7,'Turno '.$turno,1,0,'C',1);
        $pdf->Cell(63,7,'Hora Entrada',1,0,'C',1);
        $pdf->Cell(63,7,'Hora Salida',1,0,'C',1);

        $pdf->Ln(7);
        $pdf->Cell(63,7,'Domingo',1,0,'C',1);
        $pdf->Cell(63,7,$d_entrada,0,0,'C',0);
        $pdf->Cell(63,7,$d_salida,0,0,'C',0);

        $pdf->Ln(7);
        $pdf->Cell(63,7,'Lunes',1,0,'C',1);
        $pdf->Cell(63,7,$l_entrada,0,0,'C',0);
        $pdf->Cell(63,7,$l_salida,0,0,'C',0);
        
        $pdf->Ln(7);
        $pdf->Cell(63,7,'Martes',1,0,'C',1);
        $pdf->Cell(63,7,$m_entrada,0,0,'C',0);
        $pdf->Cell(63,7,$m_salida,0,0,'C',0);

        $pdf->Ln(7);
        $pdf->Cell(63,7,'Miércoles',1,0,'C',1);
        $pdf->Cell(63,7,$mi_entrada,0,0,'C',0);
        $pdf->Cell(63,7,$mi_salida,0,0,'C',0);

        $pdf->Ln(7);
        $pdf->Cell(63,7,'Jueves',1,0,'C',1);
        $pdf->Cell(63,7,$j_entrada,0,0,'C',0);
        $pdf->Cell(63,7,$j_salida,0,0,'C',0);

        $pdf->Ln(7);
        $pdf->Cell(63,7,'Viernes',1,0,'C',1);
        $pdf->Cell(63,7,$v_entrada,0,0,'C',0);
        $pdf->Cell(63,7,$v_salida,0,0,'C',0);

        $pdf->Ln(7);
        $pdf->Cell(63,7,'Sábado',1,0,'C',1);
        $pdf->Cell(63,7,$s_entrada,0,0,'C',0);
        $pdf->Cell(63,7,$s_salida,0,0,'C',0);

        
    }


    $imageFile = K_PATH_IMAGES.'timeline2.png';
    $pdf->Image($imageFile, 15, 125, 180, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
}


$pdf->Output('horario.pdf', 'I');

?>