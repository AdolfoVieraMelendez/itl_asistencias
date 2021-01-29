<?php
// Conexion mysqli
include'../conexion/conexionli.php';

$cadena = "SELECT
                nom_us,
                CONCAT(nom_us,' ',apPaterno,' ',apMaterno) as nombre
            FROM
                usuarios
            WHERE
                activo = 1
            ORDER BY id_usuario ASC";
$consultar = mysqli_query($conexionLi, $cadena);

while($row = mysqli_fetch_array($consultar))
{  
	if ($rowl[0]!=$row[0]) {
    ?>
    <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
    <?php
	}
}
?>
