<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//seleccione registros tabla datos
$cadena = "SELECT
				id_admin,
				nombre_admin,
				contra,
				fecha_registro,
				hora_registro
			FROM
				administradores";

$consultar = mysqli_query($conexionLi, $cadena);
$row_cnt = $consultar->num_rows;

	$arreglo = $consultar->fetch_assoc();
	$data['cRegistros'] = $row_cnt;
	$data['result'] = $arreglo;

//returns data as JSON format
echo json_encode($data);
?>