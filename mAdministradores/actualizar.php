<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id    	   = $_POST['id'];
$usuario_ADM_E     = trim($_POST['usuario_ADM_E']);
$contra_ADM_E     = trim($_POST['contra_ADM_E']);
$activo    = 1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "UPDATE administradores
			SET
				nombre_admin = '$usuario_ADM_E',
				contra = '$contra_ADM_E',
				fecha_registro = '$fecha',
				hora_registro = '$hora'
			WHERE 
				id_admin = $id";
$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>