<?php 
    require_once RUTA_APP .'/views/inc/header_cp.php';
    $rol = $datos['rol'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';
    } else {
        require_once RUTA_APP .'/views/inc/menuTIVICOM.php';
    }
    date_default_timezone_set('America/Bogota');
    $fecha_venta = date('Y-m-d g:i');
    if(empty($datos['valorventa']) && empty($datos['valorneto'])){

    }else {
            $valor_venta = $datos['valorventa'];
            $valor_neto = $datos['valorneto'];
            $codfact = $datos['codFactura'];
    }
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="alert alert-dark" role="alert">Informacion Contable y Financiera</h2>
            </div>
            <div class="col-md-12">
                <form method="POST" action="visualFactura">
                    <input type="number" name="codFactura" placeholder="Codigo de la Factura">
                    <button>Visualizar Factura</button>
                </form>
            </div>
            <div class="col-12">
                <form method="POST" action="ganancias">
                    <input type="number" name="codfact" style="display:none" value="<?php echo isset($codfact) ? $codfact : "";?>">
                    <label>Venta Total Tienda</label>
                    <input type="number" name="vTotal">
                    <label>Venta Total Makrotecno</label>
                    <input type="number" name="vVenta" value="<?php echo $valor_venta?>">
                    <label>Venta Neto Makrotecno</label>
                    <input type="number" name="vNeto" value="<?php echo $valor_neto?>">
                    <label>Venta Total en Recargas</label>
                    <input type="number" name="vRecargas">
                    <label>Venta Total Llamadas Internacionales</label>
                    <input type="number" name="vInternacional">
                    <button>Registrar Ventas</button>
                </form>

                <?php 
                if(empty($codfact)){
                }else {
                    echo '<a href="'. RUTA.'Tivicom/visualizarGanancia/'.$codfact.'"><i class="far fa-eye">Visualizar Ganancias</i></a>';
                }
                ?>
            </div>
        </div> 
    </div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
</div>