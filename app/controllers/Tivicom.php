<?php
class Tivicom extends Controller
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
        if($this->session->get('status') !== 1 and $this->session->get('status') !== 2 and $this->session->get('status') !== 4 and $this->session->get('status') !== 9){
            exit('Acceso denegado');   
        }
        $this->model = $this->modelo('Tivicom_Model');
        
    }
    public function index()
    {
        $this->vista('Tivicom/index');
    }
    //Method para ir a la seccion donde se agregan los productos.
    public function productos()
    {
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol);
        $this->vista('Tivicom/products', $datos);
    }
    //Method para cuando se agrega productos nuevos.
    public function addproducts() 
    {
        $cantidadEx  = array_map("htmlspecialchars", $_POST['cantidad_Ex']);
        $codigos  = array_map("htmlspecialchars", $_POST['codigo']);
        $descripciones   = array_map("htmlspecialchars", $_POST['descripcion']);
        $vnetos   = array_map("htmlspecialchars", $_POST['vneto']);
        $vunitarios = array_map("htmlspecialchars", $_POST['vunitario']);
        var_dump($cantidadEx);
        $productos = $this->model->addproduct($cantidadEx, $codigos, $descripciones, $vnetos, $vunitarios);
        if ($productos) {
            header("Location: productos");
        } else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
    //Method para ver los productos agregados.
    public function verproductos()
    {
        $consulta = "SELECT * FROM productos";
        $sentencia = $this->model->obtenerSentencia($consulta);
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol, 'productos' => $sentencia);
        $this->vista('Tivicom/productosView', $datos);
    }
    //Method para ir a la seccion donde se agregan facturas y pedidos.
    public function addventas()
    {
        $cedula = $this->session->get('cedula');
        $rol = $this->session->get('status');
        $consulta = "SELECT cod_vendedor FROM vendedor WHERE cedula = '$cedula'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        while($codigovendedor = mysqli_fetch_array($sentencia)){
            $vendedor = $codigovendedor['cod_vendedor'];
        }
        $consulta = "SELECT cod_factura FROM factura WHERE cod_vendedor = '$vendedor'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        while($row_sentencia = mysqli_fetch_array($sentencia)){
            $id_factura = $row_sentencia['cod_factura'];
        }if(isset($id_factura)){
            $datos = array('id_factura' => $id_factura, 'rol' => $rol);
        $this->vista('Tivicom/agregarventa', $datos);    
        }else {
            $datos = array('rol' => $rol);
            $this->vista('Tivicom/agregarventa', $datos);
        }      
    }
    //Method que se utiliza para crear una factura de venta
    public function registrodatos()
    {
        $cedula = $this->session->get('cedula');
        $consulta = "SELECT cod_vendedor FROM vendedor WHERE cedula = '$cedula'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        while($codigovendedor = mysqli_fetch_array($sentencia)){
            $vendedor = $codigovendedor['cod_vendedor'];
        }
        $nombreCliente = $_POST['nombres'];
        $cedulaCliente = $_POST['cedula'];
        $fv = date('Y-m-d');
        $comentarioss = $_POST['comentarios'];
        //Verificamos si hay informacion en los campos y si no se agregan unos automaticamente.
        if(empty($nombreCliente) & empty($cedulaCliente) & empty($comentarioss)){
            $nombreCliente = 'Makrotecno';
            $cedulaCliente = '1234193470';
            $comentarioss = 'N/A';
                    $factura_venta = $this->model->crearFactura($nombreCliente, $cedulaCliente, $fv, $vendedor, $comentarioss);
        }else {
            $factura_venta = $this->model->crearFactura($nombreCliente, $cedulaCliente, $fv, $vendedor, $comentarioss);
        }
        if($factura_venta){
            header("Location: addventas");
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
    //Method que se utiliza para agregar productos a un pedido
    public function addFact()
    {
        $codFactura = $_POST['cod_factura'];
        $fechaVenta = $_POST['fecha_venta'];
        $codProducto = $_POST['codigo'];
        $cantidadProducto = $_POST['cantidad'];
        $consulta = "SELECT valor_neto, valor_venta FROM productos WHERE cod_producto = '$codProducto'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        while($valoresProducto = mysqli_fetch_array($sentencia)){
            $vn = $valoresProducto['valor_neto'];
            $vv = $valoresProducto['valor_venta'];
        }
        $facturas   = $this->model->addFact($codFactura, $fechaVenta, $codProducto, $cantidadProducto, $vn, $vv);
        var_dump($facturas);
        if($facturas){
            header("Location: addventas");
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
    //Method que se utiliza para salir de la session
    public function logout()
    {
        $this->session->close();
        header("Location: ".RUTA);
    }
    public function bodega()
    {
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol);
        $this->vista('Tivicom/EntradaSalida', $datos);
    }
    public function addEntrada()
    {
        $codigo = $_POST['codigo'];
        $cantidad = $_POST['cantidad'];
        if(empty($codigo) OR empty($cantidad)){
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }else {
            $sentenciaEntrada = $this->model->modifyEntrada($codigo, $cantidad);
            if($sentenciaEntrada){
                header("Location: bodega");
            }else {
               $Excepciones = new Excepciones;
               $Excepciones->system(); 
            }
        }
    }
    public function modeloNegocio()
    {
        $rol = $this->session->get('status');
        $datos = array('rol' => $rol);
        $this->vista('Tivicom/pmnegocios', $datos);
    }
    public function visualizarGanancia($codfact)
    {
        $consulta = "SELECT (valor_venta_producto-valor_venta_neto) as gananciaTotal, ((valor_venta_producto-valor_venta_neto)*0.20) as GananciaMaria, ((valor_venta_producto-valor_venta_neto)-((valor_venta_producto-valor_venta_neto)*0.20)) as gananciaVictor, (valor_internacional*0.06) as gananciaInternacional, ((valor_recargas*0.056)) as gananciaRecargas, (venta_tienda*0.15) as gananciaTeresa FROM modelonegocio WHERE cod_factura = '$codfact'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        while($totalGanancias = mysqli_fetch_array($sentencia)){
            $gananciatotal = $totalGanancias['gananciaTotal'];
            $gananciamaria = $totalGanancias['GananciaMaria'];
            $gananciavictor = $totalGanancias['gananciaVictor'];
            $gananciainternacional = $totalGanancias['gananciaInternacional'];
            $gananciarecargas = $totalGanancias['gananciaRecargas'];
            $gananciateresa = $totalGanancias['gananciaTeresa'];
        }
        if($sentencia){
            $rol = $this->session->get('status');
            $datos = array('rol' => $rol, 'gt' => $gananciatotal, 'gm' => $gananciamaria, 'gv' => $gananciavictor, 'gi' => $gananciainternacional, 'gr' => $gananciarecargas, 'gtm' => $gananciateresa);
            $this->vista('Tivicom/ganancias', $datos);
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
    public function ganancias()
    {
        $codFactura = $_POST['codfact'];
        $vTienda = $_POST['vTotal'];
        $vventa = $_POST['vVenta'];
        $vneto = $_POST['vNeto'];
        $vrecargas = $_POST['vRecargas'];
        $vinternacional = $_POST['vInternacional'];
        $sentencia = $this->model->addGananciaMN($codFactura, $vTienda, $vventa, $vneto, $vrecargas, $vinternacional);
        if($sentencia){
            header("Location: modeloNegocio");
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }
    }
    public function visualFactura()
    {
        $codFact = $_POST['codFactura'];
        $consulta = "SELECT SUM(valor_neto) as vn, SUM(valor_venta) as vv FROM pedido WHERE cod_factura = '$codFact'";
        $sentencia = $this->model->obtenerSentencia($consulta);
        while($totalVentas = mysqli_fetch_array($sentencia)){
            $valorNeto = $totalVentas['vn'];
            $valorVenta = $totalVentas['vv'];
        }
        if($sentencia){
            $rol = $this->session->get('status');
            $datos = array('rol' => $rol);
            $datos = array('valorneto' => $valorNeto, 'valorventa' => $valorVenta, 'rol' => $rol, 'codFactura' => $codFact);
            $this->vista('Tivicom/pmnegocios', $datos);
        }else {
            $Excepciones = new Excepciones;
            $Excepciones->system();
        }

    }
}