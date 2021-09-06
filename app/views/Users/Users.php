<?php 
	require_once RUTA_APP .'/views/inc/header_cp.php';
	$Usuarios = $datos['Usuarios'];
    $rol = $datos['rol'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';
    } else {
        require_once RUTA_APP .'/views/inc/menuMod.php';
    }
?>
<div class="app-main__outer">
    <div class="app-main__inner">
		<div class="row">
			<div class="col-12">
				<table class="table table-dark">
  					<thead>
    				<tr>
				 		<th>Nombres</th>
						<th>Apellidos</th>
						<th>TI</th>
						<th>No. Identificacion</th>
						<th>Celular</th>
						<th>Status</th>
						<th>Correo</th>
						<th>Gestion</th>
    				</tr>
  				</thead>
  				<tbody>
					<?php 
						while($users = mysqli_fetch_array($Usuarios)){
							echo '<tr>';
							echo '<td>'.$users["nombres"].'</td>';
							echo '<td>'.$users["apellidos"].'</td>';
							echo '<td>'.$users["ti"].'</td>';
							echo '<td>'.$users["cedula"].'</td>';
							echo '<td>'.$users["celular"].'</td>';
							echo '<td>'.$users["status"].'</td>';
							echo '<td>'.$users["email"].'</td>';
							echo '<td><a href="'. RUTA.'Usuarios/modificar/'.$users['cedula'].'"><i class="fas fa-pen"></i></a> <a href="'. RUTA.'Usuarios/eliminar/'.$users['cedula'].'"><i class="far fa-trash-alt"></i></a></td>';
						}
							echo '</tr>';
					?>
  					</tbody>
				</table>
			</div>
		</div>
	</div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
   </div>