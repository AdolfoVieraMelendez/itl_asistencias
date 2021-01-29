<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
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
$imagen = 0;
$huella = 0;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "INSERT INTO usuarios
				(clave_us,
				apPaterno,
                apMaterno, 
				nom_us,
                dir_us,
				col_us,
				cd_us,
				cp_us,
				nacionalidad_us,
				tel_us,
				cel_us,
				sexo_us,
				fecNac_us,
				edad_us,
				edoCivil_us,
				email_us,
				tipo_us,
				rfc_us,
				curp_us,
				titulo_us,
				tiempo_us,
				activo,
				imagen_us,
				huella_us)
			VALUES
				('$clave',
				'$apPaterno',
				'$apMaterno',
				'$nombre',
				'$direccion',
				'$colonia',
				'$ciudad',
				'$cPostal',
				'$nacionalidad',
				'$telefono',
				'$celular',
				'$sexo',
				'$fNac',
				'$edad',
				'$edoCivil',
				'$email',
				'$tipo',
				'$rfc',
				'$curp',
				'$titulo',
				'$tiempo',
				$activo,
				$imagen,
				$huella)";
$insertar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>