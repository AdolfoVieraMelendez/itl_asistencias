<?php
// Conexion mysqli
include'../conexion/conexionli.php';

$cadena = "SELECT
                usuarios.id_usuario,
                CONCAT(usuarios.apPaterno,' ',usuarios.apMaterno,' ',usuarios.nom_us) AS nombre
            FROM
                usuarios
            LEFT JOIN horarios ON usuarios.id_usuario = horarios.id_usuario
            WHERE
                usuarios.activo = 1
            AND NOT ISNULL(horarios.turno)
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
