<?php
    require_once RUTA_APP .'/views/inc/header.php';
    $perfil = $datos['perfil'];
    if(isset($datos['vendedor'])){
        $vendedor = $datos['vendedor'];    
    }
    $row = $perfil->fetch_array(MYSQLI_ASSOC);
?>
<div class="container">
    <div class="row perfil">
                <div class="col-12">
                            <h1 class="display-4">Informacion Personal</h1>
                </div>
                <div class="col-12 hola">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-tag"></i></label>
                        </div>
                         <input type="text" id="inputGroupSelect01" readonly="" value="<?php echo $row['nombres']?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-tag"></i></label>
                        </div>
                         <input type="text" id="inputGroupSelect01" readonly="" value="<?php echo $row['apellidos']?>">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                        </div>
                         <input type="text" id="inputGroupSelect01" readonly="" value="<?php echo $row['cedula']?>">
                    </div>
                </div>
                <div class="col-12">
                            <h2 class="display-4">Informacion Secundaria</h2>
                </div>
                <div class="col-12 text-center">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-envelope"></i></label>
                        </div>
                         <input type="email" id="inputGroupSelect01" readonly="" value="<?php echo $row['email']?>">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-phone-alt"></i></label>
                        </div>
                         <input type="text" id="inputGroupSelect01" readonly="" value="<?php echo $row['celular']?>">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-barcode"></i></label>
                        </div>
                         <input type="text" id="inputGroupSelect01" readonly="" value="<?php echo isset($vendedor) ? $vendedor : "";?>">
                    </div>
                </div>
    </div>
</div>
<?php
require_once RUTA_APP .'/views/inc/footer_scripts.php';