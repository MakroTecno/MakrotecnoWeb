<?php
	require_once RUTA_APP .'/views/inc/header_cp.php';
	if(isset($datos['id_factura'])){
		$cod_factura = $datos['id_factura'];
	}
    $rol = $datos['rol'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';
    } else {
        require_once RUTA_APP .'/views/inc/menuTIVICOM.php';
    }
    date_default_timezone_set('America/Bogota');
    $fecha_venta = date('Y-m-d g:i');
?>
	<div class="app-main__outer">
		<div class="app-main__inner">
			<form action="registrodatos" method="POST">
				<div class="row justify-content-center">
					<div class="col-md-12 text-center">
                    	<h2 class="alert alert-dark" role="alert">Facturacion de Productos</h2>
                	</div>
					<div class="col-12 col-md-6 text-center input_producto">
						<label for="nombres">Nombres:</label><br>
						<input  id="nombres" type="text" name="nombres"><br>
						<label for="cedula">Cedula:</label><br>
						<input  id="cedula" type="number" name="cedula"><br>
					</div>
					<div class="col-12 col-md-6 text-center">
						<label>Comentarios:</label><br>
						<textarea name="comentarios"></textarea><br>
					</div>
					<div class="col-12 text-center">
						<input type="submit" value="Crear Registro" class="btn btn-primary">	
					</div>	
				</div>
			</form>
			<hr>
		<form method="POST" action="addFact" id="form_productos_tecnologia">
		<div class="row justify-content-center productos_tecnologia">
			
			<input type="hidden" name="valorfact[]" value="<?php echo isset($cod_factura) ? $cod_factura : "";?>" id="valorfact">
			<input type="hidden" name="fecha_venta[]" value="<?php echo $fecha_venta?>" id="fecha_venta">
			<div class="col-sm-12 col-md-4 text-center input_producto">
				<input id="code" type="text" name="codigo[]" placeholder="Codigo Producto">
			</div>
			<div class="col-sm-12 col-md-4 text-center input_producto">
				<input type="number" id="cantidad" name="cantidad[]" placeholder="Cantidad">
			</div>
			<div class="col-sm-12 col-md-4 text-center repetido">
				<a type="button" name="remove" class="btn btn-danger" style="color:white;">X</a>
			</div>
		</div>
		<div class="col-12 button_tecnologia text-center" style="margin:5px;">
			<button type="submit" class="btn btn-primary submit">Crear Factura</button>
			<a type="button" id="agregarmas" class="btn btn-light">+</a>
		</div>
		</form>
		</div>
        <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
       </div>


   <?php 


   		//Controlador
       public function addFact()
    {
        $valorfact  = array_map("htmlspecialchars", $_POST['valorfact']);
        $fechaventas  = array_map("htmlspecialchars", $_POST['fecha_venta']);
        $codigo     = array_map("htmlspecialchars", $_POST['codigo']);
        $cantidad   = array_map("htmlspecialchars", $_POST['cantidad']);
        $facturas   = $this->model->addFact($valorfact, $fechaventas, $codigo, $cantidad);
        var_dump($facturas);
        if($facturas){
            header("Location: addventas");
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }





    // Model

    public function addFact($valorfact, $fechaventas, $codigo, $cantidad)
    {
        foreach ($valorfact as $key => $value) {
            $fecha_ventas = $fechaventas[$key];
            $codigofact = $codigo[$key];
            $cantidads = $cantidad[$key];
            $dato[] = '("'.$value.'", "'.$codigofact.'", "'.$cantidads.'", "'.$fecha_ventas.'")';
        }
        $sql = "INSERT INTO pedido (cod_factura, cod_producto, cantidad, fecha_venta) VALUES " .implode(',', $dato);
        $consultaModificacion = $this->conn->query("SELECT valor_neto, valor_venta FROM productos INNER JOIN pedido WHERE cod_factura = '$value'");
        var_dump($consultaModificacion);
                while($obtenerParrafos = mysqli_fetch_array($consultaModificacion)){
        echo "<div class='row'> <div class='col-md-6'>";
                echo "<div id='parrafo'><p>".$obtenerParrafos['valor_neto']."</p></div>";
                echo "<div id='parrafo'><p>".$obtenerParrafos['valor_venta']."</p></div>";
        }
        /*$facturas = $this->conn->query($sql);
        return $facturas;*/
    }


   ?>