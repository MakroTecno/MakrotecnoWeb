<?php
class Panel extends Controller
{
    private $model;
    private $session;
    public function __construct()
    {
        $this->session = new Session;
        $this->model = $this->modelo('Usuario');
    }
    public function index()
    {
        $this->vista('Panel/Home');
    }
    public function login()
    {
        $this->vista('Panel/login');
    }
    public function recordar()
    {
        $this->vista('Panel/Recordar');
    }
    public function validar()
    {
        $excepcion = new Excepciones;
        $usuario = $_POST['user'];
        $contra = $_POST['pass'];
        if (empty($usuario) or empty($contra)) {
            $excepcion->datosObligatorios();
        } else {
            $resultado_entrar = $this->model->iniciarSesion($usuario, $contra);
            $resultado_entrar->bind_param("ss", $usuario, $contra);
            $resultado_entrar->execute();
            $resultados = $resultado_entrar;
            $resultados->store_result();
            $resultado = $resultados->num_rows;
            if ($resultado > 0) {
                $resultado_entrar->bind_result($cedula, $taride, $usuario, $pass, $celular, $nombres, $apellidos, $rol, $email);
                while ($resultado_entrar->fetch()) {
                    echo 'hola';
                    //$this->session->init();
                    $this->session->add('cedula', $cedula);
                    $this->session->add('ti', $taride);
                    $this->session->add('nick', $usuario);
                    $this->session->add('clave', $pass);
                    $this->session->add('celular', $celular);
                    $this->session->add('nombres', $nombres);
                    $this->session->add('apellidos', $apellidos);
                    $this->session->add('status', $rol);
                    $this->session->add('email', $email);
                    header("Location: ".RUTA."Inicio/index");
                }
            } else {
                $excepcion->datenoexits();
            }
        }
    }
}
?>
