<!-- Modal -->
<div class="modal fade" id="modalDatos-DYA" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="modalTitle-DYA">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="areaImprimir">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mapPaterno<?php echo $varGral;?>" id="mlblApPaterno<?php echo $varGral;?>">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="mapPaterno<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mapMaterno<?php echo $varGral;?>" id="mlblApMaterno<?php echo $varGral;?>">Apellido Materno:</label>
                    <input type="text" class="form-control" id="mapMaterno<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mnombre<?php echo $varGral;?>" id="mlblNombre<?php echo $varGral;?>">Nombre(s):</label>
                    <input type="text" class="form-control" id="mnombre<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mdireccion<?php echo $varGral;?>" id="mlbldireccion<?php echo $varGral;?>">Dirección:</label>
                    <input type="text" class="form-control" id="mdireccion<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mcolonia<?php echo $varGral;?>" id="mlblColonia<?php echo $varGral;?>">Colonia:</label>
                    <input type="text" class="form-control" id="mcolonia<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mciudad<?php echo $varGral;?>" id="mlblCiudad<?php echo $varGral;?>">Ciudad:</label>
                    <input type="text" class="form-control" id="mciudad<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mcPostal<?php echo $varGral;?>" id="mlblcPostal<?php echo $varGral;?>">Código Postal:</label>
                    <input type="text" class="form-control" id="mcPostal<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mnacionalidad<?php echo $varGral;?>" id="mlblNacionalidad<?php echo $varGral;?>">Nacionalidad:</label>
                    <input type="text" class="form-control" id="mnacionalidad<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mtelefono<?php echo $varGral;?>" id="mlblTelefono<?php echo $varGral;?>">Teléfono:</label>
                    <input type="number" class="form-control" id="mtelefono<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mcelular<?php echo $varGral;?>" id="mlblCelular<?php echo $varGral;?>">Celular:</label>
                    <input type="number" class="form-control" id="mcelular<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="msexo<?php echo $varGral;?>" id="mlblSexo<?php echo $varGral;?>">Sexo:</label>
                    <select name="msexo<?php echo $varGral;?>" class="select2" id="msexo<?php echo $varGral;?>" disabled>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mfNac<?php echo $varGral;?>" id="mlblFNac<?php echo $varGral;?>">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="mfNac<?php echo $varGral;?>" value="<?php echo $fecha;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="medad<?php echo $varGral;?>" id="mlblEdad<?php echo $varGral;?>">Edad:</label>
                    <input type="text" class="form-control" id="medad<?php echo $varGral;?>" disabled value=0>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="medoCivil<?php echo $varGral;?>" id="mlblEdoCivil<?php echo $varGral;?>">Estado Civíl:</label>
                    <select name="medoCivil<?php echo $varGral;?>" class="select2" id="medoCivil<?php echo $varGral;?>" disabled>
                        <option value="Soltero/a">Soltero/a</option>
                        <option value="Casado/a">Casado/a</option>
                        <option value="Viudo/a">Viudo/a</option>
                        <option value="Divorciado/a">Divorciado/a</option>
                        <option value="Unión Libre">Unión Libre</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="memail<?php echo $varGral;?>" id="mlblEmail<?php echo $varGral;?>">Correo:</label>
                    <input type="text" class="form-control" id="memail<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mtipo<?php echo $varGral;?>" id="mlblTipo<?php echo $varGral;?>">Tipo:</label>
                    <select name="metipo<?php echo $varGral;?>" class="select2" id="mtipo<?php echo $varGral;?>" disabled>
                        <option value="Docente">Docente</option>
                        <option value="Administrativo">Administrativo</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mclave<?php echo $varGral;?>" id="mlblClave<?php echo $varGral;?>">Clave:</label>
                    <input type="number" class="form-control" id="mclave<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mrfc<?php echo $varGral;?>" id="mlblRfc<?php echo $varGral;?>">RFC:</label>
                    <input type="text" class="form-control" id="mrfc<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mcurp<?php echo $varGral;?>" id="mlblCurp<?php echo $varGral;?>">CURP:</label>
                    <input type="text" class="form-control" id="mcurp<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mtitulo<?php echo $varGral;?>" id="mlblTitulo<?php echo $varGral;?>">Titulo:</label>
                    <input type="text" class="form-control" id="mtitulo<?php echo $varGral;?>" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="mtiempo<?php echo $varGral;?>" id="mlblTiempo<?php echo $varGral;?>">Tiempo:</label>
                    <select name="mtiempo<?php echo $varGral;?>" class="select2" id="mtiempo<?php echo $varGral;?>" disabled>
                        <option value="Horas">Horas</option>
                        <option value="Tiempo Completo">Tiempo Completo</option>
                        <option value="1/2 Tiempo">1/2 Tiempo</option>
                        <option value="3/4 Tiempo">3/4 Tiempo</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>