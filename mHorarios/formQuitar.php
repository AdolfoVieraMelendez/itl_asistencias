<?php
//Variable de Nombre
$varGral="-H";
$fecha=date("Y-m-d");
?>
<form action="../mHorarios/actualizar.php" method="post" id="frmQuitar<?php echo $varGral?>">
    <input type="hidden" id="qid<?php echo $varGral;?>">
    <input type="hidden" id="qusuario<?php echo $varGral;?>">
    <input type="hidden" id="qturno<?php echo $varGral;?>">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="qencabezado<?php echo $varGral;?>" id="qencabezado<?php echo $varGral;?>">Placeholder:</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
            <div class="form-group">
                <label for="" id="qlblturno<?php echo $varGral;?>">Selecciona los días en los que quieras remover el horario:</label>
                <div class="form-control">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="qcheckDomingo<?php echo $varGral;?>">
                            <label class="form-check-label" for="qcheckDomingo<?php echo $varGral;?>">Domingo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="qcheckLunes<?php echo $varGral;?>">
                            <label class="form-check-label" for="qcheckLunes<?php echo $varGral;?>">Lunes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="qcheckMartes<?php echo $varGral;?>">
                            <label class="form-check-label" for="qcheckMartes<?php echo $varGral;?>">Martes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="qcheckMiercoles<?php echo $varGral;?>">
                            <label class="form-check-label" for="qcheckMiercoles<?php echo $varGral;?>">Miércoles</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="qcheckJueves<?php echo $varGral;?>">
                            <label class="form-check-label" for="qcheckJueves<?php echo $varGral;?>">Jueves</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="qcheckViernes<?php echo $varGral;?>">
                            <label class="form-check-label" for="qcheckViernes<?php echo $varGral;?>">Viernes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="qcheckSabado<?php echo $varGral;?>">
                            <label class="form-check-label" for="qcheckSabado<?php echo $varGral;?>">Sábado</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="qhActuales<?php echo $varGral;?>">Horarios actuales placeholder</label>
                    </div>
                    <div class="form-control">
                        <div class="form-group centrar">
                            <label id="qdActuales<?php echo $varGral;?>">Domingo</label>
                        </div>
                        <div class="form-group centrar">
                            <label id="qlActuales<?php echo $varGral;?>">Lunes</label>
                        </div>
                        <div class="form-group centrar">
                            <label id="qmActuales<?php echo $varGral;?>">Martes</label>
                        </div>
                        <div class="form-group centrar">
                            <label id="qmiActuales<?php echo $varGral;?>">Miércoles</label>
                        </div>
                        <div class="form-group centrar">
                            <label id="qjActuales<?php echo $varGral;?>">Jueves</label>
                        </div>
                        <div class="form-group centrar">
                            <label id="qvActuales<?php echo $varGral;?>">Viernes</label>
                        </div>
                        <div class="form-group centrar">
                            <label id="qsActuales<?php echo $varGral;?>">Sábado</label>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <button  type="button" class="btn btn-outline-danger btn-block activo btnEspacio" id="btnCancelarQ<?php echo $varGral?>">
                        <i class='fa fa-ban fa-lg'></i>
                        Cancelar
                    </button>
                </div>
                <div class="col">
                    <button  type="submit" class="btn btn-outline-primary btn-block activo btnEspacio" id="btnQuitar<?php echo $varGral?>">
                        <i class='fa fa-save fa-lg'></i>
                        Actualizar Información
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>