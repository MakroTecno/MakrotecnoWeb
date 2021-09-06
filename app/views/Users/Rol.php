<?php 
    require_once RUTA_APP .'/views/inc/header_cp.php';
    $rol = $datos['rol'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';
    } else {
        require_once RUTA_APP .'/views/inc/menuTIVICOM.php';
    }
?>
<div class="app-main__outer">
	<div class="app-main__inner">
	<div class="row justify-content-center">
			<form method="POST" action="<?php echo RUTA . 'Usuarios/modify'?>">
				<div class="col-12">
					<div class="form-group">
						<input type="number" name="cedula" placeholder="Numero de Cedula" class="form-control">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<select name="privilegio" class="form-control rol">
							<option>Escoja el rol deseado</option>
							<option value="1">SuperAdmin</option>
							<option value="2">Moderador</option>
							<option value="3">Usuario</option>
						</select>
					</div>
				</div>
				<div class="col-12 text-center">
				<input type="submit" class="btn btn-secondary btn_actualizar" name="Registrar" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
   </div>