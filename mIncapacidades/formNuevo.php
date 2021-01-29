<?php
//Variable de Nombre
$varGral="-I";
$fecha=date("Y-m-d");
?>
<form action="../mIncapacidades/guardar.php" method="post" id="frmGuardar<?php echo $varGral?>">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="cmbDocAdm<?php echo $varGral;?>" id="lblcmbDocAdm<?php echo $varGral;?>">Docente/Administrativo:</label>
                <select id="cmbDocAdm<?php echo $varGral;?>" class="form-control select2"></select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                <label for="cmbIncapacidad<?php echo $varGral;?>" id="lblcmbIncapacidad<?php echo $varGral;?>">Seleccione un permiso:</label>
                <select id="cmbIncapacidad<?php echo $varGral;?>" class="form-control select2">
                    <option value="Constancia Médica">Constancia Médica</option>
                    <option value="Licencia Médica">Licencia Médica</option>
                    <option value="Reposición de Tiempo">Reposición de Tiempo</option>
                    <option value="Comisión Oficial">Comisión Oficial</option>
                    <option value="Permiso Económico">Permiso Económico</option>
                    <option value="Asuetos, Permisos Especiales">Asuetos, Permisos Especiales</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="fechaIncapacidad<?php echo $varGral;?>" id="lblfechaIncapacidad<?php echo $varGral;?>">Fecha en que se otorgará el permiso:</label>
                <input type="date" class="form-control" id="fechaIncapacidad<?php echo $varGral;?>" value="<?php echo $fecha;?>" required>
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