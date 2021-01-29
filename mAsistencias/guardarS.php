<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id     = $_POST['id'];
$hora = $_POST['hora'];
$horas_trabajadas = $_POST['horas_trabajadas'];
$activo    = 1;

$fecha=date("Y-m-d"); 

//Inserto registro en tabla pacientes 
$cadena = "UPDATE asistencias
			SET hora_salida = '$hora',
				horas_trabajadas = '$horas_trabajadas'
			WHERE
				id_usuario = $id
			AND fecha = '$fecha'";
$insertar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>