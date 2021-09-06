<?php
class Inicio extends Controller
{
    private $model;
    private $session;
    public function __construct()
    {
        $this->session = new Session;
        $this->session->init();
        if ($this->session->getStatus() === 1 || empty($this->session->get('nick')) and empty($this->session->get('clave'))) {
            exit('Acceso denegado');
        }
        $this->model = $this->modelo('Usuario');
    }
    public function index()
    {
    $nombre = $this->session->get('nombres');
    $apellido = $this->session->get('apellidos');
    $cedula = $this->session->get('cedula');
    $consulta = "SELECT cod_vendedor FROM vendedor WHERE cedula = '$cedula'";
    $sentencia = $this->model->obtenerSentencia($consulta);
    while($codigovendedor = mysqli_fetch_array($sentencia)){
            $vendedor = $codigovendedor['cod_vendedor'];
        }
     $rol = $this->session->get('status');
     $datos = array('rol' => $rol, 'codven' => $vendedor, 'nombre' => $nombre, 'apellido' => $apellido);
     $this->vista('Panel/CPANEL', $datos);
    }
    public function logout()
    {
        $this->session->close();
        header("Location: ".RUTA);
    }
    public function agregarParrafos()
    {
        $titulo = $_POST['titulos'];
        $parrafos = $_POST['parrafo'];
        $agregar = $this->model->agregarParrafo($titulo, $parrafos);
    }
        public function blog()
    {
        $consulta = "SELECT * FROM blog";
        $sentencia = $this->model->obtenerSentencia($consulta);

        $rol = $this->session->get('status');
        $datos = array('rol' => $rol, 'parrafos' => $sentencia);
        $this->vista('Panel/CPANEL', $datos);   
    }
    public function verBlog()
    {
        $consulta = "SELECT * FROM blog";
        $sentencia = $this->model->obtenerSentencia($consulta);
        while($obtenerParrafos = mysqli_fetch_array($sentencia)){
        echo "<div class='row'> <div class='col-md-6'>";
                echo "<div id='parrafo'><p>".$obtenerParrafos['titulo']."</p></div>";
                echo "<div id='parrafo'><p>".$obtenerParrafos['post']."</p></div>";
            echo "</div> <div class='col-md-6 opciones'>";
                echo "<div><a href='". RUTA.'Inicio/modificarBlog/'.$obtenerParrafos['id']."'><i class='far fa-edit fa-2x'></i></a> <a href='". RUTA.'Inicio/BorrarBlog/'.$obtenerParrafos['id']."'><i class='far fa-trash-alt fa-2x'></i></a></div>";
        echo "</div></div>";
        }
    }
    public function modificarBlog($id)
    {
        $rol = $this->session->get('status');
        $consulta = "SELECT * FROM blog WHERE id = '$id'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        $datos = array('rol' => $rol, 'datosBlog' => $sentencia);
        $this->vista('Panel/modificarBlogs', $datos); 
    }
    public function modificarPost()
    {
        $titulo = $_POST['titulos'];
        $post = $_POST['parrafo'];
        $id = $_POST['id'];
        $consultaPost = $this->model->actualizarPost($titulo, $post, $id);
        if($consultaPost)
        {
            header("location: ".RUTA."Inicio/blog");
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
        
    }
    public function borrarBlog($id)
    {
        $consulta = "DELETE FROM blog WHERE id = '$id'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        if($sentencia){
                header("location: ".RUTA."Inicio/blog");
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
}
?>
