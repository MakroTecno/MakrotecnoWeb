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
        <form method="POST" action="addEntrada" class="factura_repetida" id="productos">           
            <div class="row justify-content-center add_productos">
                <div class="col-md-12 text-center">
                    <h2 class="alert alert-dark" role="alert">Entrada de Productos</h2>
                </div>
                <div class="col-12 text-center input_productos">
                    <input type="text" name="codigo" placeholder="Codigo del Producto">
                </div>
                <div class="col-12 text-center input_productos">
                    <input type="number" name="cantidad" placeholder="Cantidad">
                </div>
            </div>
                <div class="col-sm-12 text-center addproducto">
                    <button type="submit" class="btn btn-primary">Agregar Entrada</button>
                </div>
        </form>
    </div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
   </div>