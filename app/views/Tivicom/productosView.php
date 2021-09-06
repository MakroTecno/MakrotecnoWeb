<?php 
require_once RUTA_APP .'/views/inc/header_cp.php';
$rol = $datos['rol'];
$productos = $datos['productos'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';
    } else {
        require_once RUTA_APP .'/views/inc/menuTIVICOM.php';
    }
?>
<div class="app-main__outer">
    <div class="app-main__inner">
     <div class="row">
        <div class="col-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Valor Neto</th>
                        <th>Valor Venta</th>
                        <th>Slots</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($productos)) {
                            echo '<tr>';
                            echo '<td>'.$row["cod_producto"].'</td>';
                            echo '<td>'.$row["descripcion"].'</td>';
                            echo '<td>'.$row["valor_neto"].'</td>';
                            echo '<td>'.$row["valor_venta"].'</td>';
                            echo '<td>'.$row["cantidad_ex"].'</td>';
                            echo '</tr>';
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>   
   </div>