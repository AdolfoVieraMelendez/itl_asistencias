<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id     = $_POST['id'];
$nombre_incapacidad    = trim($_POST['nombre_incapacidad']);
$fecha_incapacidad    = trim($_POST['fecha_incapacidad']);
$activo    = 1;
$horas_trabajadas = 0;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "INSERT INTO incapacidades
				(id_usuario,
                nombre_incapacidad, 
				fecha_incapacidad)
			VALUES
				('$id',
				'$nombre_incapacidad',
				'$fecha_incapacidad')";
$insertar = mysqli_query($conexionLi, $cadena);

$query = "INSERT INTO asistencias
				(id_usuario,
				fecha,
				hora_entrada,
				incidencia,
				hora_salida,
				horas_trabajadas)
			VALUES
				('$id',
				'$fecha_incapacidad',
				'$hora',
				'$nombre_incapacidad',
				'$hora',
				$horas_trabajadas)";
$insert = mysqli_query($conexionLi, $query);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>