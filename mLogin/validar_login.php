<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$usuario = trim($_POST['usuario']);
$contra  = trim($_POST['contra']);

//seleccione registros tabla datos
$cadena = "SELECT
				id_admin,
				nombre_admin
			FROM
				administradores
			WHERE
				nombre_admin = '$usuario'
			AND
				contra='$contra'
			AND
				activo=1";

$consultar = mysqli_query($conexionLi, $cadena);

//Numero de registros obtenidos
$row_cnt = $consultar->num_rows;

	$arreglo = $consultar->fetch_assoc();
	$data['cRegistros'] = $row_cnt;
	$data['result'] = $arreglo;

//returns data as JSON format
echo json_encode($data);
?>