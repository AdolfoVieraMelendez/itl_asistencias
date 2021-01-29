<!-- Modal -->
<div class="modal fade" id="modalHorarios-DYA" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="modalTitle-DYA-H">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../mDocentesAdministrativos/informes/generarpdfHorario.php" method="GET" target="_blank">
        <div class="modal-body" id="">
            <input type="hidden" id="mIdPersona" name="mIdPersona">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="dEntrada-DYA" id="lbldEntrada-DYA">Domingo Entrada:</label>
                        <input type="text" class="form-control" id="dEntrada-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="dSalida-DYA" id="lbldSalida-DYA">Domingo Salida:</label>
                        <input type="text" class="form-control" id="dSalida-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="lEntrada-DYA" id="lbllEntrada-DYA">Lunes Entrada:</label>
                        <input type="text" class="form-control" id="lEntrada-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="lSalida-DYA" id="lbllSalida-DYA">Lunes Salida:</label>
                        <input type="text" class="form-control" id="lSalida-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="mEntrada-DYA" id="lblmEntrada-DYA">Martes Entrada:</label>
                        <input type="text" class="form-control" id="mEntrada-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="mSalida-DYA" id="lblmSalida-DYA">Martes Salida:</label>
                        <input type="text" class="form-control" id="mSalida-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="miEntrada-DYA" id="lblmiEntrada-DYA">Miércoles Entrada:</label>
                        <input type="text" class="form-control" id="miEntrada-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="miSalida-DYA" id="lblmiSalida-DYA">Miércoles Salida:</label>
                        <input type="text" class="form-control" id="miSalida-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="jEntrada-DYA" id="lbljEntrada-DYA">Jueves Entrada:</label>
                        <input type="text" class="form-control" id="jEntrada-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="jSalida-DYA" id="lbljSalida-DYA">Jueves Salida:</label>
                        <input type="text" class="form-control" id="jSalida-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="vEntrada-DYA" id="lblvEntrada-DYA">Viernes Entrada:</label>
                        <input type="text" class="form-control" id="vEntrada-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="vSalida-DYA" id="lblvSalida-DYA">Viernes Salida:</label>
                        <input type="text" class="form-control" id="vSalida-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="sEntrada-DYA" id="lblsEntrada-DYA">Sábado Entrada:</label>
                        <input type="text" class="form-control" id="sEntrada-DYA" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="sSalida-DYA" id="lblsSalida-DYA">Sábado Salida:</label>
                        <input type="text" class="form-control" id="sSalida-DYA" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="create_pdf" id="btnImprimirHorario">Imprimir</button>
        </div>
      </form>
    </div>
  </div>
</div>