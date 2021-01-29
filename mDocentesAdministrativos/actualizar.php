<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id    	   = $_POST['id'];
$clave = trim($_POST['clave']);
$apPaterno = trim($_POST['apPaterno']);
$apMaterno = trim($_POST['apMaterno']);
$nombre = trim($_POST['nombre']);
$direccion = trim($_POST['direccion']);
$colonia = trim($_POST['colonia']);
$ciudad = trim($_POST['ciudad']);
$cPostal = trim($_POST['cPostal']);
$nacionalidad = trim($_POST['nacionalidad']);
$telefono = trim($_POST['telefono']);
$celular = trim($_POST['celular']);
$sexo = trim($_POST['sexo']);
$fNac = trim($_POST['fNac']);
$edad = trim($_POST['edad']);
$edoCivil = trim($_POST['edoCivil']);
$email = trim($_POST['email']);
$tipo = trim($_POST['tipo']);
$rfc = trim($_POST['rfc']);
$curp = trim($_POST['curp']);
$titulo = trim($_POST['titulo']);
$tiempo = trim($_POST['tiempo']);
$activo    = 1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "UPDATE usuarios
			SET
				clave_us = '$clave',
				apPaterno = '$apPaterno',
				apMaterno = '$apMaterno',
				nom_us = '$nombre',
				dir_us = '$direccion',
				col_us = '$colonia',
				cd_us = '$ciudad',
				cp_us = '$cPostal',
				nacionalidad_us = '$nacionalidad',
				tel_us = '$telefono',
				cel_us = '$celular',
				sexo_us = '$sexo',
				fecNac_us = '$fNac',
				edad_us = '$edad',
				edoCivil_us = '$edoCivil',
				email_us = '$email',
				tipo_us = '$tipo',
				rfc_us = '$rfc',
				curp_us = '$curp',
				titulo_us = '$titulo',
				tiempo_us = '$tiempo'
			WHERE 
				id_usuario = $id";
$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>