<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id = $_POST['id'];

$fecha=date("Y-m-d"); 

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
				fecha = '$fecha'";

$actualizar = mysqli_query($conexionLi, $cadena);
$row_cnt = $actualizar->num_rows;

echo $row_cnt;
//Cierro la conexion
mysqli_close($conexionLi);
?>