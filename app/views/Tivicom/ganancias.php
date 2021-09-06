<?php 
    require_once RUTA_APP .'/views/inc/header_cp.php';
    date_default_timezone_set('America/Bogota');
    $fecha_venta = date('Y-m-d g:i');
    if(empty($datos['gt']) && empty($datos['gm']) && empty($datos['gv']) && empty($datos['gi']) && empty($datos['gr'] && empty($datos['gtm']))){

    }else {
            $gananciaTotal = $datos['gt'];
            $gananciaMaria = $datos['gm'];
            $gananciaVictor = $datos['gv'];
            $gananciaInternacional = $datos['gi'];
            $gananciaRecargas = $datos['gr'];
            $gananciaTeresa = $datos['gtm'];
    }
?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-12 text-center">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Ganancia Total</th>
                        <th>Ganancia Maria</th>
                        <th>Ganancia Victor</th>
                        <th>Ganancia Internacional</th>
                        <th>Ganancia Recargas</th>
                        <th>Ganancia Teresa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            echo '<tr>';
                            echo '<td>'.$gananciaTotal.'</td>';
                            echo '<td>'.$gananciaMaria.'</td>';
                            echo '<td>'.$gananciaVictor.'</td>';
                            echo '<td>'.$gananciaInternacional.'</td>';
                            echo '<td>'.ROUND($gananciaRecargas).'</td>';
                            echo '<td>'.$gananciaTeresa.'</td>';
                            echo '</tr>';
                            ?>
                </tbody>
            </table>
                <a href="<?php echo RUTA.'Tivicom/modeloNegocio'?>">Regresar</a>
        </div>
        </div> 
    </div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
</div>