<div class="container section_usuario">
  <div class="row">
    <div class="col-12 col-md-6 panel">
      <div id="panel">
        <a href="<?php echo RUTA?>" type="button" class="btn btn-outline-info">Inicio</a><br><br>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div id="section_login">
        <form  method="POST"  action="<?php echo RUTA . 'Panel/validar'?>">
          <div class="form-group">
            <label for="exampleInputEmail1"><i class="fas fa-user fa-2x"></i></label>
            <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"><i class="fas fa-key fa-2x"></i></label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
          </div>
          <button type="submit" class="btn btn-primary">Ingresar</button>
          <small id="emailHelp" class="form-text text-muted">Acceso autorizado solo para miembros de MakroTecno</small>
        </form> 
      </div>
  </div>
</div>
</div>