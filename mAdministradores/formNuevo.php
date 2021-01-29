<?php
//Variable de Nombre
$varGral="-ADM";
$fecha=date("Y-m-d");
?>
<form action="../mAdministradores/guardar.php" method="post" id="frmGuardar<?php echo $varGral?>">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="nombreAdmin<?php echo $varGral;?>" id="lblusuario-ADM-G">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="nombreAdmin<?php echo $varGral;?>" autofocus required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="contraAdmin<?php echo $varGral;?>" id="lblcontra-ADM-G">Contraseña:</label>
                <input type="password" class="form-control" id="contraAdmin<?php echo $varGral;?>" autofocus required>
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
                    <button  type="button" class="btn btn-outline-success btn-block activo btnEspacio" id="btnShowPass<?php echo $varGral?>">
                        <i class="far fa-eye"></i> Mostrar Contraseña
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