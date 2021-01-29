<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$clave = $_POST['clave'];
$activo = 1;


//seleccione registros tabla datos
$cadena = "SELECT
				usuarios.clave_us
			FROM
				usuarios
			INNER JOIN horarios ON usuarios.id_usuario = horarios.id_usuario
			WHERE
				usuarios.clave_us = '$clave'
			AND
				usuarios.activo = $activo";

$actualizar = mysqli_query($conexionLi, $cadena);
$row_cnt = $actualizar->num_rows;

echo $row_cnt;
//Cierro la conexion
mysqli_close($conexionLi);
?>