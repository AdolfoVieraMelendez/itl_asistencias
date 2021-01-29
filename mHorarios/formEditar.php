<?php
//Variable de Nombre
$varGral="-H";
$fecha=date("Y-m-d");
?>
<form action="../mHorarios/actualizar.php" method="post" id="frmActualizar<?php echo $varGral?>">
    <input type="hidden" id="eid<?php echo $varGral;?>">
    <input type="hidden" id="eusuario<?php echo $varGral;?>">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="eencabezado<?php echo $varGral;?>" id="eencabezado<?php echo $varGral;?>">Placeholder:</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
            <div class="form-group">
                <label for="" id="lblturno<?php echo $varGral;?>">Selecciona los días para el horario:</label>
                <div class="form-control">
                    <div class="form-group">
                        <label for="eturno<?php echo $varGral;?>">Turno</label>
                        <select name="eturno<?php echo $varGral;?>" class="select2" id="eturno<?php echo $varGral;?>">
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Mixto">Mixto</option>
                            <option value="Sabatino">Sabatino</option>
                            <option value="Especial">Especial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="echeckDomingo<?php echo $varGral;?>">
                            <label class="form-check-label" for="echeckDomingo<?php echo $varGral;?>">Domingo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="echeckLunes<?php echo $varGral;?>">
                            <label class="form-check-label" for="echeckLunes<?php echo $varGral;?>">Lunes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="echeckMartes<?php echo $varGral;?>">
                            <label class="form-check-label" for="echeckMartes<?php echo $varGral;?>">Martes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="echeckMiercoles<?php echo $varGral;?>">
                            <label class="form-check-label" for="echeckMiercoles<?php echo $varGral;?>">Miércoles</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="echeckJueves<?php echo $varGral;?>">
                            <label class="form-check-label" for="echeckJueves<?php echo $varGral;?>">Jueves</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="echeckViernes<?php echo $varGral;?>">
                            <label class="form-check-label" for="echeckViernes<?php echo $varGral;?>">Viernes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="echeckSabado<?php echo $varGral;?>">
                            <label class="form-check-label" for="echeckSabado<?php echo $varGral;?>">Sábado</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="hActuales<?php echo $varGral;?>">Horarios actuales placeholder</label>
                    </div>
                    <div class="form-control">
                        <div class="form-group">
                            <label id="dActuales<?php echo $varGral;?>">Domingo</label>
                        </div>
                        <div class="form-group">
                            <label id="lActuales<?php echo $varGral;?>">Lunes</label>
                        </div>
                        <div class="form-group">
                            <label id="mActuales<?php echo $varGral;?>">Martes</label>
                        </div>
                        <div class="form-group">
                            <label id="miActuales<?php echo $varGral;?>">Miércoles</label>
                        </div>
                        <div class="form-group">
                            <label id="jActuales<?php echo $varGral;?>">Jueves</label>
                        </div>
                        <div class="form-group">
                            <label id="vActuales<?php echo $varGral;?>">Viernes</label>
                        </div>
                        <div class="form-group">
                            <label id="sActuales<?php echo $varGral;?>">Sábado</label>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="form-group">
                <label for="ehoraEntrada<?php echo $varGral;?>">Hora de Entrada | Domingo:</label>
                <div class="form-control">
                    <div class="form-group">
                        <label for="ehoraEntrada<?php echo $varGral;?>">Horas</label>
                        <select name="ehoraEntrada<?php echo $varGral;?>" class="select2" id="ehoraEntrada<?php echo $varGral;?>">
                            <?php
                            $i = 0;
                            while ($i < 13){
                                $valor = strval($i);
                                if($valor < 10){
                                    $valor = '0'.$valor;
                                }
                            ?>
                            <option value="<?php echo $valor;?>"><?php echo $valor;?></option>
                            <?php 
                            $i++;
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="eminutoEntrada<?php echo $varGral;?>">Minutos</label>
                        <select name="eminutoEntrada<?php echo $varGral;?>" class="select2" id="eminutoEntrada<?php echo $varGral;?>">
                            <?php
                            $i = 0;
                            while ($i < 60){
                                $valor = strval($i);
                                if($valor < 10){
                                    $valor = '0'.$valor;
                                }
                            ?>
                            <option value="<?php echo $valor;?>"><?php echo $valor;?></option>
                            <?php 
                            $i++;
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="eperiodoEntrada<?php echo $varGral;?>">Periódo</label>
                        <select name="eperiodoEntrada<?php echo $varGral;?>" class="select2" id="eperiodoEntrada<?php echo $varGral;?>">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="form-group">
                <label for="ehoraSalida<?php echo $varGral;?>">Hora de Salida | Domingo:</label>
                <div class="form-control">
                    <div class="form-group">
                        <label for="ehoraSalida<?php echo $varGral;?>">Horas</label>
                        <select name="ehoraSalida<?php echo $varGral;?>" class="select2" id="ehoraSalida<?php echo $varGral;?>">
                            <?php
                            $i = 0;
                            while ($i < 13){
                                $valor = strval($i);
                                if($valor < 10){
                                    $valor = '0'.$valor;
                                }
                            ?>
                            <option value="<?php echo $valor;?>"><?php echo $valor;?></option>
                            <?php 
                            $i++;
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="eminutoSalida<?php echo $varGral;?>">Minutos</label>
                        <select name="eminutoSalida<?php echo $varGral;?>" class="select2" id="eminutoSalida<?php echo $varGral;?>">
                            <?php
                            $i = 0;
                            while ($i < 60){
                                $valor = strval($i);
                                if($valor < 10){
                                    $valor = '0'.$valor;
                                }
                            ?>
                            <option value="<?php echo $valor;?>"><?php echo $valor;?></option>
                            <?php 
                            $i++;
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="eperiodoSalida<?php echo $varGral;?>">Periódo</label>
                        <select name="eperiodoSalida<?php echo $varGral;?>" class="select2" id="eperiodoSalida<?php echo $varGral;?>">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                    
                </div>
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