<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$usuario_ADM_G     = trim($_POST['usuario_ADM_G']);
$contra_ADM_G    = trim($_POST['contra_ADM_G']);
$activo    = 1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "INSERT INTO administradores
				(nombre_admin,
                contra, 
				fecha_registro,
                hora_registro,
				activo)
			VALUES
				('$usuario_ADM_G',
				'$contra_ADM_G',
				'$fecha', 
				'$hora',
				$activo)";
$insertar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>