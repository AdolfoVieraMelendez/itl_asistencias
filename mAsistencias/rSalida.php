<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id = $_POST['id'];

$fecha=date("Y-m-d"); 
$hora_salida = '00:00:00';
//seleccione registros tabla datos
$cadena = "SELECT
				id_asistencia,
				id_usuario,
				fecha,
				hora_entrada,
				incidencia,
				hora_salida
			FROM
				asistencias
			WHERE
				id_usuario = $id
			AND 
				fecha = '$fecha'
			AND
				ISNULL(hora_salida)";

$actualizar = mysqli_query($conexionLi, $cadena);
$row_cnt = $actualizar->num_rows;

$arreglo = $actualizar->fetch_assoc();
$data['cRegistros'] = $row_cnt;
$data['result'] = $arreglo;

echo json_encode($data);
//Cierro la conexion
mysqli_close($conexionLi);
?>