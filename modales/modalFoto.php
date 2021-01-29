<!-- Modal -->
<?php
//Variable de Nombre
$varGral="-DYA";
?>
<div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="modalDatosCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="txtTitularFoto<?php echo $varGral;?>">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="#" method="post" id="formSubida<?php echo $varGral;?>">
          
            <input id="image<?php echo $varGral;?>" type="file"  class="file"  data-theme="fas">
           
            <input type="hidden" class="form-control-file" name="clave-imagen<?php echo $varGral;?>" id="clave-imagen<?php echo $varGral;?>" >
            <input type="hidden" class="form-control-file" name="tamanoKB<?php echo $varGral;?>" id="tamanoKB<?php echo $varGral;?>" value="5000">
            <input type="hidden" class="form-control-file" name="valor-imagen<?php echo $varGral;?>" id="valor-imagen<?php echo $varGral;?>" >
            <div class="col text-center">
              <button type="button" onclick="subirFoto();" class="btn btn-primary" style="margin-top:8px;">
              <i class="fas fa-check"></i> Subir Foto
              </button>
            </div>
          </form>

          <form action="#" method="post" id="formVista<?php echo $varGral;?>">
            <div class="col text-center">
              <img id="imgFoto<?php echo $varGral;?>" class="img-fluid img-thumbnail" src="" animated  flipInX>
            </div>
            <div class="col text-center">
              <button type="button" onclick="eliminarFoto();" class="btn btn-danger" style="margin-top:8px;">
              <i class="fas fa-times"></i> Eliminar Archivo
              </button>
            </div>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>