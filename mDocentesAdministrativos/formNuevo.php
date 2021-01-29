<?php
//Variable de Nombre
$varGral="-DYA";
$fecha=date("Y-m-d");
?>
<form action="../mDocentesAdministrativos/guardar.php" method="post" id="frmGuardar<?php echo $varGral?>">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="apPaterno<?php echo $varGral;?>" id="lblApPaterno<?php echo $varGral;?>">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apPaterno<?php echo $varGral;?>" autofocus required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="apMaterno<?php echo $varGral;?>" id="lblApMaterno<?php echo $varGral;?>">Apellido Materno:</label>
                <input type="text" class="form-control" id="apMaterno<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="nombre<?php echo $varGral;?>" id="lblNombre<?php echo $varGral;?>">Nombre(s):</label>
                <input type="text" class="form-control" id="nombre<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="direccion<?php echo $varGral;?>" id="lbldireccion<?php echo $varGral;?>">Dirección:</label>
                <input type="text" class="form-control" id="direccion<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="colonia<?php echo $varGral;?>" id="lblColonia<?php echo $varGral;?>">Colonia:</label>
                <input type="text" class="form-control" id="colonia<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="ciudad<?php echo $varGral;?>" id="lblCiudad<?php echo $varGral;?>">Ciudad:</label>
                <input type="text" class="form-control" id="ciudad<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="cPostal<?php echo $varGral;?>" id="lblcPostal<?php echo $varGral;?>">Código Postal:</label>
                <input type="text" class="form-control" id="cPostal<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="nacionalidad<?php echo $varGral;?>" id="lblNacionalidad<?php echo $varGral;?>">Nacionalidad:</label>
                <input type="text" class="form-control" id="nacionalidad<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="telefono<?php echo $varGral;?>" id="lblTelefono<?php echo $varGral;?>">Teléfono:</label>
                <input type="number" class="form-control" id="telefono<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="celular<?php echo $varGral;?>" id="lblCelular<?php echo $varGral;?>">Celular:</label>
                <input type="number" class="form-control" id="celular<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="sexo<?php echo $varGral;?>" id="lblSexo<?php echo $varGral;?>">Sexo:</label>
                <select name="sexo<?php echo $varGral;?>" class="select2" id="sexo<?php echo $varGral;?>">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="fNac<?php echo $varGral;?>" id="lblFNac<?php echo $varGral;?>">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fNac<?php echo $varGral;?>" value="<?php echo $fecha;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="edad<?php echo $varGral;?>" id="lblEdad<?php echo $varGral;?>">Edad:</label>
                <input type="text" class="form-control" id="edad<?php echo $varGral;?>" readonly value=0>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="edoCivil<?php echo $varGral;?>" id="lblEdoCivil<?php echo $varGral;?>">Estado Civíl:</label>
                <select name="edoCivil<?php echo $varGral;?>" class="select2" id="edoCivil<?php echo $varGral;?>">
                    <option value="Soltero/a">Soltero/a</option>
                    <option value="Casado/a">Casado/a</option>
                    <option value="Viudo/a">Viudo/a</option>
                    <option value="Divorciado/a">Divorciado/a</option>
                    <option value="Unión Libre">Unión Libre</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="email<?php echo $varGral;?>" id="lblEmail<?php echo $varGral;?>">Correo:</label>
                <input type="text" class="form-control" id="email<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="tipo<?php echo $varGral;?>" id="lblTipo<?php echo $varGral;?>">Tipo:</label>
                <select name="tipo<?php echo $varGral;?>" class="select2" id="tipo<?php echo $varGral;?>">
                    <option value="Docente">Docente</option>
                    <option value="Administrativo">Administrativo</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="clave<?php echo $varGral;?>" id="lblClave<?php echo $varGral;?>">Clave:</label>
                <input type="number" class="form-control" id="clave<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="rfc<?php echo $varGral;?>" id="lblRfc<?php echo $varGral;?>">RFC:</label>
                <input type="text" class="form-control" id="rfc<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="curp<?php echo $varGral;?>" id="lblCurp<?php echo $varGral;?>">CURP:</label>
                <input type="text" class="form-control" id="curp<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="titulo<?php echo $varGral;?>" id="lblTitulo<?php echo $varGral;?>">Titulo:</label>
                <input type="text" class="form-control" id="titulo<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="tiempo<?php echo $varGral;?>" id="lblTiempo<?php echo $varGral;?>">Tiempo:</label>
                <select name="tiempo<?php echo $varGral;?>" class="select2" id="tiempo<?php echo $varGral;?>">
                    <option value="Horas">Horas</option>
                    <option value="Tiempo Completo">Tiempo Completo</option>
                    <option value="1/2 Tiempo">1/2 Tiempo</option>
                    <option value="3/4 Tiempo">3/4 Tiempo</option>
                </select>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <button  type="button" class="btn btn-outline-danger btn-block activo btnEspacio" id="btnCancelarG<?php echo $varGral?>">
                        <i class='fa fa-ban fa-lg'></i>
                        Cancelar
                    </button>
                </div>
                <div class="col">
                    <button  type="submit" class="btn btn-outline-primary btn-block activo btnEspacio" id="btnGuardar<?php echo $varGral?>">
                        <i class='fa fa-save fa-lg'></i>
                        Guardar Información
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>