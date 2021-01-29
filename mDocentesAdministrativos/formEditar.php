<?php
//Variable de Nombre
$varGral="-DYA";
$fecha=date("Y-m-d");
?>
<form action="../mDocentesAdministrativos/guardar.php" method="post" id="frmActualizar<?php echo $varGral?>">
<input type="hidden" id="dyaId">
<input type="hidden" id="clave_actual">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="eapPaterno<?php echo $varGral;?>" id="elblApPaterno<?php echo $varGral;?>">Apellido Paterno:</label>
                <input type="text" class="form-control" id="eapPaterno<?php echo $varGral;?>" autofocus required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="eapMaterno<?php echo $varGral;?>" id="elblApMaterno<?php echo $varGral;?>">Apellido Materno:</label>
                <input type="text" class="form-control" id="eapMaterno<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="enombre<?php echo $varGral;?>" id="elblNombre<?php echo $varGral;?>">Nombre(s):</label>
                <input type="text" class="form-control" id="enombre<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="edireccion<?php echo $varGral;?>" id="elbldireccion<?php echo $varGral;?>">Dirección:</label>
                <input type="text" class="form-control" id="edireccion<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="ecolonia<?php echo $varGral;?>" id="elblColonia<?php echo $varGral;?>">Colonia:</label>
                <input type="text" class="form-control" id="ecolonia<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="eciudad<?php echo $varGral;?>" id="elblCiudad<?php echo $varGral;?>">Ciudad:</label>
                <input type="text" class="form-control" id="eciudad<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="ecPostal<?php echo $varGral;?>" id="elblcPostal<?php echo $varGral;?>">Código Postal:</label>
                <input type="text" class="form-control" id="ecPostal<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="enacionalidad<?php echo $varGral;?>" id="elblNacionalidad<?php echo $varGral;?>">Nacionalidad:</label>
                <input type="text" class="form-control" id="enacionalidad<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="etelefono<?php echo $varGral;?>" id="elblTelefono<?php echo $varGral;?>">Teléfono:</label>
                <input type="number" class="form-control" id="etelefono<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="ecelular<?php echo $varGral;?>" id="elblCelular<?php echo $varGral;?>">Celular:</label>
                <input type="number" class="form-control" id="ecelular<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="esexo<?php echo $varGral;?>" id="elblSexo<?php echo $varGral;?>">Sexo:</label>
                <select name="sexo<?php echo $varGral;?>" class="select2" id="esexo<?php echo $varGral;?>">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="efNac<?php echo $varGral;?>" id="elblFNac<?php echo $varGral;?>">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="efNac<?php echo $varGral;?>" value="<?php echo $fecha;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="eedad<?php echo $varGral;?>" id="elblEdad<?php echo $varGral;?>">Edad:</label>
                <input type="text" class="form-control" id="eedad<?php echo $varGral;?>" readonly value=0>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="eedoCivil<?php echo $varGral;?>" id="elblEdoCivil<?php echo $varGral;?>">Estado Civíl:</label>
                <select name="eedoCivil<?php echo $varGral;?>" class="select2" id="eedoCivil<?php echo $varGral;?>">
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
                <label for="eemail<?php echo $varGral;?>" id="elblEmail<?php echo $varGral;?>">Correo:</label>
                <input type="text" class="form-control" id="eemail<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="etipo<?php echo $varGral;?>" id="elblTipo<?php echo $varGral;?>">Tipo:</label>
                <select name="eetipo<?php echo $varGral;?>" class="select2" id="etipo<?php echo $varGral;?>">
                    <option value="Docente">Docente</option>
                    <option value="Administrativo">Administrativo</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="eclave<?php echo $varGral;?>" id="elblClave<?php echo $varGral;?>">Clave:</label>
                <input type="number" class="form-control" id="eclave<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="erfc<?php echo $varGral;?>" id="elblRfc<?php echo $varGral;?>">RFC:</label>
                <input type="text" class="form-control" id="erfc<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="ecurp<?php echo $varGral;?>" id="elblCurp<?php echo $varGral;?>">CURP:</label>
                <input type="text" class="form-control" id="ecurp<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="etitulo<?php echo $varGral;?>" id="elblTitulo<?php echo $varGral;?>">Titulo:</label>
                <input type="text" class="form-control" id="etitulo<?php echo $varGral;?>" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="etiempo<?php echo $varGral;?>" id="elblTiempo<?php echo $varGral;?>">Tiempo:</label>
                <select name="etiempo<?php echo $varGral;?>" class="select2" id="etiempo<?php echo $varGral;?>">
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
                    <button  type="button" class="btn btn-outline-danger btn-block activo btnEspacio" id="btnCancelarA<?php echo $varGral?>">
                        <i class='fa fa-ban fa-lg'></i>
                        Cancelar
                    </button>
                </div>
                <div class="col">
                    <button  type="submit" class="btn btn-outline-primary btn-block activo btnEspacio" id="btnActualizar<?php echo $varGral?>">
                        <i class='fa fa-save fa-lg'></i>
                        Actualizar Información
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>