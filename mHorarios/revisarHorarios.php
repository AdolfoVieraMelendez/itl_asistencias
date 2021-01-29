<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

$id = $_POST['id'];

//seleccione registros tabla datos
$cadena = "SELECT 
				id_horario,
				id_usuario,
				turno,
				d_entrada,
				d_salida,
				l_entrada,
				l_salida,
				m_entrada,
				m_salida,
				mi_entrada,
				mi_salida,
				j_entrada,
				j_salida,
				v_entrada,
				v_salida,
				s_entrada,
				s_salida
			FROM
				horarios
			WHERE
				id_usuario = $id";

$consultar = mysqli_query($conexionLi, $cadena);
$row_cnt = $consultar->num_rows;

	$arreglo = $consultar->fetch_assoc();
	$data['cRegistros'] = $row_cnt;
	$data['result'] = $arreglo;

//returns data as JSON format
echo json_encode($data);
?>