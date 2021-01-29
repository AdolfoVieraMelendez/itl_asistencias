<?php
    $fecha=date("Y-m-d");
?>

<!-- Modal -->
<div class="modal fade" id="modalBuscarNombre-CR-PRF" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="modalTitle-CR-PRF-N">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="cmbNombres-PRF" id="lblcmbNombres-PRF">Buscar por nombre:</label>
                    <select id="cmbNombres-PRF" class="select2">

                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="fechaInicial-CR-PRF-N" id="lblfechaInicial-CR-PRF-N">Fecha Inicial:</label>
                    <input type="date" class="form-control" id="fechaInicial-CR-PRF-N" value="<?php echo $fecha;?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="fechaFinal-CR-PRF-N" id="lblfechaFinal-CR-PRF-N">Fecha Final:</label>
                    <input type="date" class="form-control" id="fechaFinal-CR-PRF-N" value="<?php echo $fecha;?>">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnBuscarNombre-CR-PRF">Buscar</button>
      </div>
    </div>
  </div>
</div>