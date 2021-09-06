<?php
class Usuario
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Db;
    }
    public function obtenerSentencia($consulta)
    {
        $sentencia = $this->conn->query($consulta);
        return $sentencia;
    }
    public function obtenerSentenciaVendedor($consultaVendedor)
    {
        $sentenciaVendedor = $this->conn->query($consultaVendedor);
        return $sentenciaVendedor;
    }
    public function nuevoRegistro($usuario, $pass, $nombres, $apellidos, $taride, $cedula, $celular, $email, $rol)
    {
        $registro   = $this->conn->prepare("INSERT INTO empleado (cedula, ti, nick, clave, celular, nombres, apellidos, status, email) VALUES (?,?,?,?,?,?,?,?,?)");
        $registro->bind_param("issssssis", $cedula, $taride, $usuario, $pass, $celular, $nombres, $apellidos, $rol, $email);
        $registro->execute();
        return $registro;
    }
    public function iniciarSesion($usuario, $contra)
    {
        $resultado_entrar = $this->conn->prepare("SELECT cedula, ti, nick, clave, celular, nombres, apellidos, status, email FROM empleado WHERE nick = ? AND clave = ?");
        return $resultado_entrar;
    }
    public function modifyRol($cedula, $privilegio)
    {
        $acturol = $this->conn->query("UPDATE empleado SET status = '$privilegio' WHERE cedula = '$cedula'");
        return $acturol;
    }
    public function modificarDatos($usuario, $pass, $celular, $email, $cedula)
    {
        $consultaModificar = $this->conn->query("UPDATE empleado SET nick = '$usuario', clave = '$pass', celular = '$celular', email = '$email' WHERE cedula = '$cedula'");
        return $consultaModificar;
    }
    public function registroVendedor($cedula, $codvendedor, $dptotrabajo)
    {
        $sentenciaVen = $this->conn->prepare("INSERT INTO vendedor (cod_vendedor, cedula, dpto_trabajo) VALUES (?,?,?)");
        $sentenciaVen->bind_param("sss", $codvendedor, $cedula, $dptotrabajo);
        $sentenciaVen->execute();
        return $sentenciaVen;
    }
    public function modeloNewMarca($namecompany, $addresscompany, $nitcompany)
    {
        $insertarMarca = $this->conn->prepare("INSERT INTO referencia_empresa (nit, nombre, direccion) VALUES (?,?,?)");
        $insertarMarca->bind_param("sss", $nitcompany, $namecompany, $addresscompany);
        $insertarMarca->execute();
        return $insertarMarca;
    }
    public function agregarParrafo($titulo, $parrafos)
    {
        $agregar = $this->conn->prepare("INSERT INTO blog (titulo, post) VALUES (?,?)");
        $agregar->bind_param("ss", $titulo, $parrafos);
        $agregar->execute();
        return $agregar;
    }
    public function actualizarPost($titulo, $post, $id)
    {
        $consultaPost = $this->conn->query("UPDATE blog SET titulo = '$titulo', post = '$post' WHERE id = '$id'");
        return $consultaPost;
    }
}
