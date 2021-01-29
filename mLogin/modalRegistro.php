<!-- Modal -->
<div class="modal fade" id="modalRegistro-PR" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="modalTitle-PR">Primer Registro de Administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../mAdministradores/guardar.php" method="post" id="frmPrimerRegistro">
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                  <label for="nombreAdmin-PR">Nombre:</label>
                  <input type="text" class="form-control" id="nombreAdmin-PR" autofocus required>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="contra-PR">Contraseña:</label>
                    <input type="password" class="form-control" id="contra-PR" required>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" id="btnShowPass-PR" value="0"><i class="far fa-eye"></i> Mostrar Contraseña</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="btnRegistrar-PR">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>