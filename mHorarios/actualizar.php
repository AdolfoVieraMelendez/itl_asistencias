<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id = $_POST['id'];
$turno = trim($_POST['turno']);
$d_entrada = trim($_POST['d_entrada']);
$d_salida = trim($_POST['d_salida']);
$l_entrada = trim($_POST['l_entrada']);
$l_salida = trim($_POST['l_salida']);
$m_entrada = trim($_POST['m_entrada']);
$m_salida = trim($_POST['m_salida']);
$mi_entrada = trim($_POST['mi_entrada']);
$mi_salida = trim($_POST['mi_salida']);
$j_entrada = trim($_POST['j_entrada']);
$j_salida = trim($_POST['j_salida']);
$v_entrada = trim($_POST['v_entrada']);
$v_salida = trim($_POST['v_salida']);
$s_entrada = trim($_POST['s_entrada']);
$s_salida = trim($_POST['s_salida']);

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "UPDATE horarios
			SET
				turno = '$turno',
				d_entrada = '$d_entrada',
				d_salida = '$d_salida',
				l_entrada = '$l_entrada',
				l_salida = '$l_salida',
				m_entrada = '$m_entrada',
				m_salida = '$m_salida',
				mi_entrada = '$mi_entrada',
				mi_salida = '$mi_salida',
				j_entrada = '$j_entrada',
				j_salida = '$j_salida',
				v_entrada = '$v_entrada',
				v_salida = '$v_salida',
				s_entrada = '$s_entrada',
				s_salida = '$s_salida'
			WHERE 
				id_usuario = $id";
$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>