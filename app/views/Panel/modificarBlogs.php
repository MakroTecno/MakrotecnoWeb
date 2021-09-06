<?php 
    require_once RUTA_APP .'/views/inc/header_cp.php';
    $rol = $datos['rol'];
    if ($rol == 1) {
        require_once RUTA_APP .'/views/inc/menuAdmin.php';    
    }
    
         if(isset($datos['datosBlog'])){
        $modificacion = $datos['datosBlog'];
    }

?>
<div class="app-main__outer">
    <div class="app-main__inner">
    <div id="posts">
                <div id="actualizarPost" >
                    <form method="POST" action="<?php echo RUTA . 'Inicio/modificarPost'?>">
                        <?php while($blogFormato = mysqli_fetch_array($modificacion)){?>
                        <hr><div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="titulos" placeholder="Titulo" value="<?php echo $blogFormato['titulo']?>">
                                        <input type="hidden" name="id" placeholder="Titulo" value="<?php echo $blogFormato['id']?>">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="parrafo" placeholder="Parrafo"><?php echo $blogFormato['post']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                      <button type="submit" class="btn btn-secondary agregar">Guardar</button>
                    </form>
                    
                </div>
    </div>
</div>
    <?php require_once RUTA_APP .'/views/inc/footer.php';?>
   </div>