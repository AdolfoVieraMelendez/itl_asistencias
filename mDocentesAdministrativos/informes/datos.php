<?php 
// Conexion mysqli
include'../conexion/conexionli.php';

include ("../funciones/calcularEdad.php");
include ("../funciones/fechaEspanol.php");

$Id=$_REQUEST["id"];

                
$cadena = "SELECT
                id_usuario,
                activo,
                clave_us,
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
                IF(sexo_us='M', 'Masculino', 'Femenino'),
                fecNac_us,
                edad_us,
                edoCivil_us,
                email_us,
                tipo_us,
                rfc_us,
                curp_us,
                tiempo_us,
                titulo_us
            FROM
                usuarios
            WHERE
                id_usuario = $Id";
$consultar = mysqli_query($conexionLi, $cadena);


//Descargamos el arreglo que arroja la consulta
$n=1;
$row = mysqli_fetch_array($consultar);
// arreglo de variables
$clave = $row[2];
$apPaterno = $row[3];
$apMaterno = $row[4];
$nombre = $row[5];
$direccion = $row[6];
$colonia = $row[7];
$ciudad = $row[8];
$codPostal = $row[9];
$nacionalidad = $row[10];
$telefono = ($row[11]==0)?'Sin teléfono de casa':$row[11];
$celular = ($row[12]==0)?'Sin número de celular':$row[12];
$sexo = $row[13];
$nacimiento = date("d-m-Y", strtotime($row[14]));
$edad = $row[15];
$edoCivil = $row[16];
$email = $row[17];
$tipo = $row[18];
$rfc = $row[19];
$curp = $row[20];
$tiempo = $row[21];
$titulo = $row[22];
$domicilio = $direccion.' '.$colonia.', '.$ciudad;

$fecha=date("Y-m-d"); 

$fCastellano=fechaCastellano($fecha);

$foto       = '../mDocentesAdministrativos/fotos/'.$clave.'.jpg';

if (file_exists($foto)){
    $foto  = '../mDocentesAdministrativos/fotos/'.$clave.'.jpg';
}else{
    if ($sexo=="Masculino") {
        $foto  = '../fotos/hombre.jpg';
    }else{
        $foto  = '../fotos/mujer.jpg';
    }
}

 ?>

<style type="text/css">

    table
    {
        width:  90%;
        border: solid 0px #5544DD;
        margin:auto;
    }

    .barras{
        width:40mm;
        height:7mm;
        color#000;
        font-size:3mm
    }

    hr{
    border: solid 1px #34495e;
    }

    table.borde
    {
        width:  90%;
        border: solid 1px #D8D8D8;
        margin:auto;
    }

    table.tarjeta {
        border-style: dashed; 
        border-top-width: 1px; 
        border-right-width: 1px; 
        border-bottom-width: 1px; 
        border-left-width: 1px
    }

    .TituloTarjeta{
        text-align : center;
        font-weight: bold;
        font-size  : 15px;
        margin:5px;
    }

    th
    {
        text-align: center;
        border: solid 0px #113300;
        background: #EEFFEE;
    }
    th.borde
    {
        text-align: center;
        border: solid 1px #D8D8D8;
        background: #EEFFEE;
    }

    td.borde
    {
        text-align: left;
        border: solid 1px #D8D8D8;
        padding: 10px;
        text-align: center;
    }
    td.col1
    {
        border: solid 0px red;
        text-align: right;
    }

    td.titular
    {
        text-align: center;
        border: solid 1px #34495e;
        background: #ecf0f1;
        color:#34495e;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 10px;

    }

    td.titular2
    {
        text-align: center;
        border: solid 0px #34495e;
        background: #fff;
        color:#000;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 15px;
        font-size:20px;

    }

    label.enfa{
        text-decoration: underline;
    }

    td.subtitular
    {
        text-align: center;
        border: solid 1px #34495e;
        background: #ffffff;
        color:#34495e;
        letter-spacing: 3px;
        padding: 15px;

    }

    td.fecha
    {
        text-align: right;
        border: solid 0px #34495e;
        background: #ffffff;
        color:#34495e;
        letter-spacing: 3px;
        padding: 18px;

    }
    /*hojas de estilo propia*/
    img{
        width: 100%;
    }

    /*letras*/
    .chico{font-size: 11px;}  .mediano{font-size: 15px;}  .grande{font-size:18px;}
    .subrayado{text-decoration: underline;} .firma {font-size: 13px;font-style: italic;}

    .ancho{width:20px; };

    .bajo{
        display: block;
        margin: 15px 0px 0px 0px;
        background: #ccc;
    }
    /**/

</style>

<table border="0">
    <col style="width: 100%" class="col1">

    <tr>
        <td>
            <img src="../fotos/encabezado.jpg" alt="">
        </td>
    </tr>

</table>


<table border="0">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <!-- defino el ancho de la tabla -->
    <tr border="0">
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>

    <tr >
        <td  colspan="10" class="titular2">
            DATOS GENERALES DEL <?php echo strtoupper($tipo);?>
        </td>
    </tr> 

    <tr >
        <td  colspan="10" class="titular">
            Información General
        </td>
    </tr>   

    <tr >
        <td rowspan="4" colspan="2" class="borde">
            <img src="<?php echo $foto; ?>" alt="">
        </td>
        <td  colspan="5" class="borde">
            <strong>Nombre: </strong> <?php echo $nombre.' '.$apPaterno.' '.$apMaterno; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>Edad: </strong> <?php echo $edad; ?>
        </td>
    </tr>   

    <tr >
        <td  colspan="5" class="borde">
            <strong>Correo: </strong> <?php echo $email; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>Sexo: </strong> <?php echo "$sexo"; ?>
        </td>
    </tr> 

    <tr>
        <td  colspan="5" class="borde">
            <strong>Fecha de Nacimiento: </strong> <?php echo $nacimiento; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>Estado Civil: </strong> <?php echo $edoCivil; ?>
        </td>
    </tr> 

    <tr>
        <td  colspan="5" class="borde">
            <strong>CURP: </strong> <?php echo $curp; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>RFC: </strong> <?php echo $rfc; ?>
        </td>
    </tr> 

    <tr >
        <td  colspan="5" class="borde">
            <strong>Domicilio: </strong> <?php echo $domicilio; ?>
        </td>
        <td  colspan="2" class="borde">
            <strong>Cod. Postal: </strong> <?php echo $codPostal; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>Nacionalidad: </strong> <?php echo $nacionalidad; ?>
        </td>
    </tr> 

    <tr>
        <td  colspan="5" class="borde">
            <strong>Título: </strong> <?php echo $titulo; ?>
        </td>
        <td  colspan="5" class="borde">
            <strong>Clave del <?php echo $tipo;?>: </strong> <?php echo $clave; ?>
        </td>
    </tr> 
    <tr>
        <td  colspan="3" class="borde">
            <strong>Teléfono: </strong> <?php echo $telefono; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>Celular: </strong> <?php echo $celular; ?>
        </td>
        <td  colspan="4" class="borde">
            <strong>Tiempo: </strong> <?php echo $tiempo; ?>
        </td>
    </tr> 

    <tr>
        <td  colspan="10" align="center">
            <hr style="border:.5px dashed">
        </td>
    </tr>
    
    <tr >
        <td  colspan="10" class="fecha">
            <strong>Fecha de impresión:</strong> <?php echo $fCastellano; ?>
        </td>
    </tr> 

</table>
