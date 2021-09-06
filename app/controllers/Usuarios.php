<?php
class Usuarios extends Controller
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
        if($this->session->get('status') !== 1 and $this->session->get('status') !== 3 and $this->session->get('status') !== 9){
            exit('Acceso denegado');   
        }
        $this->model = $this->modelo('Usuario');
    }
    public function index()
    {
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol);
        $this->vista('Users/Registro', $datos);
    }
    public function rol()
    {
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol);
        $this->vista('Users/Rol', $datos);
    }
    public function panelUser()
    {
        $consulta = "SELECT * FROM empleado order by cedula desc";
        $sentencia = $this->model->obtenerSentencia($consulta);
        $rol = $this->session->get('status');
        $datos = array('Usuarios' => $sentencia, 'rol' => $rol);
        $this->vista('Users/Users', $datos);
    }
    public function modify()
    {
        $cedula = $_POST['cedula'];
        $privilegio = $_POST['privilegio'];
        $acturol = $this->model->modifyRol($cedula, $privilegio);
        if ($acturol) {
            header("location:".RUTA."Usuarios/panelUser");
        } else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
    public function registrarempleado()
    {
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol);
        $this->vista('Users/Registro', $datos);
    }
    public function registro()
    {
        if(empty($_POST['usuario']) OR empty($_POST['contrasena']) OR empty($_POST['Nombres']) OR empty($_POST['Apellidos']) OR empty($_POST['TI']) OR empty($_POST['Cedula']) OR empty($_POST['Celular']) OR empty($_POST['Email']) OR empty($_POST['codigo_vendedor']) OR empty($_POST['dpto_trabajo'])){
            $Excepciones = new Excepciones;
                $Excepciones->datosObligatorios();
        }else {
            $usuario    = $_POST['usuario'];
            $pass       = $_POST['contrasena'];
            $nombres    = $_POST['Nombres'];
            $apellidos  = $_POST['Apellidos'];
            $taride     = $_POST['TI'];
            $cedula     = $_POST['Cedula'];
            $celular    = $_POST['Celular'];
            $email      = $_POST['Email'];
            $rol        = 2;
            $codvendedor  = $_POST['codigo_vendedor'];
            $dptotrabajo  = $_POST['dpto_trabajo'];
            $registro = $this->model->nuevoRegistro($usuario, $pass, $nombres, $apellidos, $taride, $cedula, $celular, $email, $rol);
            $sentenciaVen = $this->model->registroVendedor($cedula, $codvendedor, $dptotrabajo);
            if($registro && $sentenciaVen){
                header("location: Usuarios");
            }else {
                $Excepciones = new Excepciones;
                $Excepciones->system();
            }
        }
    }
    public function modificar($cedula)
    {
        $consulta = "SELECT * FROM empleado WHERE cedula = '$cedula'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        $datos = array('cedula' => $cedula, 'datos' => $sentencia);
        $this->vista('Users/ModificarUsuario', $datos);
    }
    public function modificarUsuario()
    {
            $usuario    = $_POST['usuario'];
            $pass       = $_POST['contrasena'];
            $celular    = $_POST['Celular'];
            $email      = $_POST['Email'];
            $cedula     = $_POST['cedula'];
            $consultaModificar = $this->model->modificarDatos($usuario, $pass, $celular, $email, $cedula);
            if($consultaModificar){
                header("location: panelUser");
            }else {
                $Excepciones = new Excepciones;
                $Excepciones->datesnoModify();
            }
    }
    public function eliminar($cedula)
    {
        $consulta = "DELETE FROM empleado WHERE cedula = '$cedula'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        if($sentencia){
                header("location:".RUTA."Usuarios/panelUser");
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
    public function vendedores()
    {
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol);
        $this->vista('Users/Vendedores', $datos);
    }
}
