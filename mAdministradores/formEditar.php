<?php
//Variable de Nombre
$varGral="-ADM";
$fecha=date("Y-m-d");
?>
<form action="../mAdministradores/actualizar.php" method="post" id="frmActualizar<?php echo $varGral?>">
    <input type="hidden"  id="admId">
    <input type="hidden"  id="nombre_admin_Actual">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="enombreAdmin<?php echo $varGral;?>" id="elblusuario-ADM-G">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="enombreAdmin<?php echo $varGral;?>" autofocus required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="econtraAdmin<?php echo $varGral;?>" id="elblcontra-ADM-G">Contraseña:</label>
                <input type="password" class="form-control" id="econtraAdmin<?php echo $varGral;?>" autofocus required>
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
                    <button  type="button" class="btn btn-outline-success btn-block activo btnEspacio" id="btnShowPassA<?php echo $varGral?>">
                        <i class="far fa-eye"></i> Mostrar Contraseña
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