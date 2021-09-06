<?php 
    require_once RUTA_APP .'/views/inc/header_cp.php';
    $datosUsuario = $datos['datos'];
    $cedula = $datos['cedula'];
    $row = $datosUsuario->fetch_array(MYSQLI_ASSOC);
?>
<div class="container">
          <div id="section_register">
        <form method="POST" enctype="multipart/form-data" action="<?php echo RUTA . 'Usuarios/modificarUsuario'?>">
          <div class="row">
            <div class="col-sm-12 imgicon">
              <img src="<?php echo RUTA . 'public/img/nuevo.png';?>" width="100px" height="100px">
            </div>
            <div class="col-sm-12 col-md-6">
               <div class="form-group">
                <label for="User">*Usuario</label>
                <input type="text" class="form-control" id="User" name="usuario" maxlength="10" value="<?php echo $row['nick']?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="contra">*Contraseña</label>
                <input type="password" class="form-control" id="contra" name="contrasena" maxlength="20" value="<?php echo $row['clave']?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="Celular">*Indicativo+Celular</label>
                <input type="text" class="form-control" id="Celular" name="Celular" maxlength="14" pattern="[0-9]+" value="<?php echo $row['celular']?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label for="Email">Correo Electronico</label>
                <input type="email" class="form-control" id="Email" name="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" title="No se permite caracteres especiales en el Correo Electronico!" value="<?php echo $row['email']?>">
              </div>
            </div>
              <input type="hidden" name="cedula" value="<?php echo $cedula ?>">
            
          </div>
            <button type="submit" class="btn btn-secondary registrarme" name="Datos">Actualizar</button>
        </form>
      </div>
</div>