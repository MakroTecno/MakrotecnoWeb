<?php 
    require_once RUTA_APP .'/views/inc/header_cp.php';
    $rol = $datos['rol'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';    
    }
    
         if(isset($datosBlog['blog'])){
        $modificacion = $datosBlog['blog'];
    }

?>
<div class="app-main__outer">
    <div class="app-main__inner">

    <div id="blogg">
                <div id="formPost" >
                    <form id="parrafos" method="POST">
                        <hr><div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="titulos" placeholder="Titulo">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="parrafo" placeholder="Parrafo"></textarea>
                                    </div>
                                </div>
                            </div>
                      <input type="submit" name="" value="Guardar" class="btn btn-secondary agregar">
                    </form>
                    <div id="mensaje"></div><hr>
                </div>
    </div>
</div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>
   </div>