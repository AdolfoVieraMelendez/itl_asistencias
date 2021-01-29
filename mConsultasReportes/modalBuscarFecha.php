<?php
    $fecha=date("Y-m-d");
?>

<!-- Modal -->
<div class="modal fade" id="modalBuscarFecha-CR-PRF-F" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="modalTitle-CR-PRF-F">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="fechaInicial-CR-PRF-F" id="lblfechaInicial-CR-PRF-F">Fecha Inicial:</label>
                    <input type="date" class="form-control" id="fechaInicial-CR-PRF-F" value="<?php echo $fecha;?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="fechaFinal-CR-PRF-F" id="lblfechaFinal-CR-PRF-F">Fecha Final:</label>
                    <input type="date" class="form-control" id="fechaFinal-CR-PRF-F" value="<?php echo $fecha;?>">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnBuscarFecha-CR-PRF">Buscar</button>
      </div>
    </div>
  </div>
</div>