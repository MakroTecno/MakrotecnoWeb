<?php
require_once RUTA_APP .'/views/inc/header_cp.php';
    $rol = $datos['rol'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';
    } else {
        require_once RUTA_APP .'/views/inc/menuMod.php';
    }
?>
<div class="app-main__outer">
  <div class="app-main__inner">
          <div id="section_register">
        <form method="POST" enctype="multipart/form-data" action="<?php echo RUTA . 'Usuarios/registro'?>">
          <div class="row">
            <div class="col-sm-12 imgicon">
              <img src="<?php echo RUTA . 'public/img/nuevo.png';?>" width="100px" height="100px">
            </div>
            <div class="col-sm-12 col-md-6">
               <div class="form-group">
                <label for="User">*Usuario</label>
                <input type="text" class="form-control" id="User" name="usuario" maxlength="10" required="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="contra">*Contraseña</label>
                <input type="password" class="form-control" id="contra" name="contrasena" maxlength="20" required="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
               <div class="form-group">
                <label for="Nombres">*Nombres</label>
                <input type="text" class="form-control" id="Nombres" name="Nombres" maxlength="30" required="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="Apellidos">*Apellidos</label>
                <input type="text" class="form-control" id="Apellidos" name="Apellidos" maxlength="30" required="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="sel1">Tipo de Identificacion</label>
                <select class="form-control" id="sel1" name="TI" required="">
                  <option value="CC">Cedula de Ciudadania</option>
                  <option value="IT">Tarjeta de Identidad</option>
                  <option value="PP">Pasaporte</option>
                  <option value="CE">Cedula de Extranjeria</option>
                </select>
              </div>
            </div> 
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="Cedula">*Cedula</label>
                <input type="number" class="form-control" id="Cedula" name="Cedula" maxlength="12" required="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="Celular">*Indicativo+Celular</label>
                <input type="text" class="form-control" id="Celular" name="Celular" maxlength="14" required="" pattern="[0-9]+" required="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="Email">*Correo Electronico</label>
                <input type="email" class="form-control" id="Email" name="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" title="No se permite caracteres especiales en el Correo Electronico!" required="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
          <div class="form-group">
            <label for="codven">*Codigo Vendedor</label>
            <input id="codven" type="text" name="codigo_vendedor" class="form-control">
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="form-group">
            <label for="dpto">*Departamento de Trabajo</label>
            <input id="dpto" type="text" name="dpto_trabajo" class="form-control">
          </div>
        </div>
          </div>
            <button type="submit" class="btn btn-secondary registrarme" name="Datos">Registrar Empleado</button>
        </form>
      </div>
    </div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
   </div>