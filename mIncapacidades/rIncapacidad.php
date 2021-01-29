<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id = $_POST['id'];
$fecha = $_POST['fecha_incapacidad'];

//seleccione registros tabla datos
$cadena = "SELECT
				id_incapacidad,
				id_usuario,
				nombre_incapacidad,
				fecha_incapacidad
			FROM
				incapacidades
			WHERE
				id_usuario = $id
			AND fecha_incapacidad = '$fecha'";

$actualizar = mysqli_query($conexionLi, $cadena);
$row_cnt = $actualizar->num_rows;

echo $row_cnt;
//Cierro la conexion
mysqli_close($conexionLi);
?>