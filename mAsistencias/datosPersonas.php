<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

$clave = $_POST['clave'];
$activo = 1;
$fecha=date("Y-m-d");

$cadena = "SELECT
				usuarios.id_usuario as id_usuario,
				usuarios.clave_us as clave,
				CONCAT(usuarios.nom_us,' ',usuarios.apPaterno,' ',usuarios.apMaterno) as nombre,
				imagen_us,
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
				usuarios
			INNER JOIN horarios ON usuarios.id_usuario = horarios.id_usuario
			WHERE
				usuarios.clave_us = '$clave'
			AND
				usuarios.activo = $activo";

$consultar = mysqli_query($conexionLi, $cadena);

	$arreglo = $consultar->fetch_assoc();
	$data['status'] = 'ok';
	$data['result'] = $arreglo ;
//returns data as JSON format
echo json_encode($data);


?>