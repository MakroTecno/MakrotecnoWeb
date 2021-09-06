<?php
class Excepciones
{
    public function accesdenied()
    {
        echo '<p class="alert alert-danger" role="alert">Acceso denegado</p>';
        echo '<button id="boton" class="btn btn-warning"><a href="">Regresar</a></button>';
    }
    public function requiredate()
    {
        echo '<p class="alert alert-danger" role="alert">Todos los datos con (*), son obligatorios!</p>';
        echo '<button id="boton" class="btn btn-warning"><a>Regresar</a></button>';
    }
    public function exitsdate()
    {
        echo '<p class="alert alert-danger" role="alert">Usuario o contraseña, existen!</p>';
        echo '<button id="boton" class="btn btn-warning"><a>Regresar</a></button>';
    }
    public function system()
    {
        echo '<p class="alert alert-danger" role="alert">Problemas en el sistema, intente nuevamente!</p>';
        echo '<button id="boton" class="btn btn-warning"><a>Regresar</a></button>';
    }
    public function datenoexits()
    {
        echo '<p class="alert alert-danger" role="alert">Usuario o contraseña, no existen!, comuniquese con su red de Proveedores</p>';
        echo '<button id="boton" class="btn btn-warning"><a>Regresar</a></button>';
    }
    public function datosObligatorios()
    {
        echo '<p class="alert alert-danger" role="alert">Los campos mencionados son obligatorios!</p>';
        echo '<button id="boton" class="btn btn-warning">Regresar</button>';
    }
    public function datesnoModify()
    {
        echo '<p class="alert alert-danger" role="alert">Los datos no fueron modificados, porque no hay contenido!</p>';
        echo '<button id="boton" class="btn btn-warning">Regresar</button>'; 
    }
}
?>
<script type="text/javascript">
    $(document).ready(function(){
    $('#boton').click(function(){
        //alert('hola');
        window.history.back();
        //console.log(boton);
    })
})
</script>
</body>
</html>
