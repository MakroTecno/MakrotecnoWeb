<?php
class Tivicom_Model
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
    public function addproduct($cantidadEx, $codigos, $descripciones, $vnetos, $vunitarios)
    {
        foreach ($codigos as $key => $value) {
            $cantidad_Ex = $cantidadEx[$key];
            $descrip = $descripciones[$key];
            $vnetoo = $vnetos[$key];
            $vunitario = $vunitarios[$key];
            $dato[] = '("'.$value.'", "'.$descrip.'", "'.$vnetoo.'", "'.$vunitario.'", "'.$cantidad_Ex.'")';
        }
        $sql = "INSERT INTO productos (cod_producto, descripcion, valor_neto, valor_venta, cantidad_ex) VALUES " .implode(',', $dato);
        $productos = $this->conn->query($sql);
        return $productos;
    }
    public function crearFactura($nombreCliente, $cedulaCliente, $fv, $vendedor, $comentarioss)
    {
        $factura_venta = $this->conn->prepare("INSERT INTO factura (cod_vendedor, cedula_cliente, fecha_venta, nombre_cliente, comentarios) VALUES (?,?,?,?,?)");
        $factura_venta->bind_param("sssss", $vendedor, $cedulaCliente, $fv, $nombreCliente, $comentarioss);
        $factura_venta->execute();
        return $factura_venta;
    }
    public function addFact($codFactura, $fechaVenta, $codProducto, $cantidadProducto, $vn, $vv)
    {
        $insertar = $this->conn->prepare("INSERT INTO pedido (cod_factura, cod_producto, cantidad, fecha_venta, valor_venta, valor_neto) VALUES (?,?,?,?,?,?)");
        $insertar->bind_param("isisii", $codFactura, $codProducto, $cantidadProducto, $fechaVenta, $vv, $vn);
        $insertar->execute();
        return $insertar;
    }
    public function modifyEntrada($codigo, $cantidad)
    {
        $sentenciaEntrada = $this->conn->query("UPDATE productos SET cantidad_ex = '$cantidad' WHERE cod_producto = '$codigo'");
        return $sentenciaEntrada;

    }
    public function addGananciaMN($codFactura, $vTienda, $vventa, $vneto, $vrecargas, $vinternacional)
    {
        $sentencia  = $this->conn->prepare("INSERT INTO modelonegocio (cod_factura, venta_tienda, valor_venta_producto, valor_venta_neto, valor_recargas, valor_internacional) VALUES (?,?,?,?,?,?)");
        var_dump($sentencia);
        $sentencia->bind_param("iiiiii", $codFactura, $vTienda, $vventa, $vneto, $vrecargas, $vinternacional);
        $sentencia->execute();
        return $sentencia;
    }
}
