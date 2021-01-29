<?php
//Variable de Nombre
$varGral="-H";
$fecha=date("Y-m-d");
?>
<form action="../mHorarios/guardar.php" method="post" id="frmGuardar<?php echo $varGral?>">
    <input type="hidden" id="id<?php echo $varGral;?>">
    <input type="hidden" id="usuario<?php echo $varGral;?>">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="encabezado<?php echo $varGral;?>" id="encabezado<?php echo $varGral;?>">Placeholder:</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
            <div class="form-group">
                <label for="horaSalida<?php echo $varGral;?>" id="lblApPaterno<?php echo $varGral;?>">Selecciona los días para el horario:</label>
                <div class="form-control">
                    <div class="form-group">
                        <label for="turno<?php echo $varGral;?>">Turno</label>
                        <select name="turno<?php echo $varGral;?>" class="select2" id="turno<?php echo $varGral;?>">
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Mixto">Mixto</option>
                            <option value="Sabatino">Sabatino</option>
                            <option value="Especial">Especial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkDomingo<?php echo $varGral;?>">
                            <label class="form-check-label" for="checkDomingo<?php echo $varGral;?>">Domingo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkLunes<?php echo $varGral;?>">
                            <label class="form-check-label" for="checkLunes<?php echo $varGral;?>">Lunes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkMartes<?php echo $varGral;?>">
                            <label class="form-check-label" for="checkMartes<?php echo $varGral;?>">Martes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkMiercoles<?php echo $varGral;?>">
                            <label class="form-check-label" for="checkMiercoles<?php echo $varGral;?>">Miércoles</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkJueves<?php echo $varGral;?>">
                            <label class="form-check-label" for="checkJueves<?php echo $varGral;?>">Jueves</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkViernes<?php echo $varGral;?>">
                            <label class="form-check-label" for="checkViernes<?php echo $varGral;?>">Viernes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="checkSabado<?php echo $varGral;?>">
                            <label class="form-check-label" for="checkSabado<?php echo $varGral;?>">Sábado</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="form-group">
                <label for="horaEntrada<?php echo $varGral;?>">Hora de Entrada | Domingo:</label>
                <div class="form-control">
                    <div class="form-group">
                        <label for="horaEntrada<?php echo $varGral;?>">Horas</label>
                        <select name="horaEntrada<?php echo $varGral;?>" class="select2" id="horaEntrada<?php echo $varGral;?>">
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
                        <label for="minutoEntrada<?php echo $varGral;?>">Minutos</label>
                        <select name="minutoEntrada<?php echo $varGral;?>" class="select2" id="minutoEntrada<?php echo $varGral;?>">
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
                        <label for="periodoEntrada<?php echo $varGral;?>">Periódo</label>
                        <select name="periodoEntrada<?php echo $varGral;?>" class="select2" id="periodoEntrada<?php echo $varGral;?>">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="form-group">
                <label for="horaSalida<?php echo $varGral;?>">Hora de Salida | Domingo:</label>
                <div class="form-control">
                    <div class="form-group">
                        <label for="horaSalida<?php echo $varGral;?>">Horas</label>
                        <select name="horaSalida<?php echo $varGral;?>" class="select2" id="horaSalida<?php echo $varGral;?>">
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
                        <label for="minutoSalida<?php echo $varGral;?>">Minutos</label>
                        <select name="minutoSalida<?php echo $varGral;?>" class="select2" id="minutoSalida<?php echo $varGral;?>">
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
                        <label for="periodoSalida<?php echo $varGral;?>">Periódo</label>
                        <select name="periodoSalida<?php echo $varGral;?>" class="select2" id="periodoSalida<?php echo $varGral;?>">
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