<?php
class Metodos
{
    function __construct($conexion) {
        $this->conn = $conexion;
    }
	public function precioProductoCard($cantidad, $precio)
	{
		return $cantidad * $precio;
	}
	public function deleteCarritoCompras($id)
	{
		$sql = "DELETE FROM card AS c WHERE c.id = '$id'";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
	public function insertCompra($producto, $cliente)
	{
		$sql = "INSERT INTO venta (persona, producto) VALUES ('$cliente','$producto')";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
	public function insertCarritoCompras($producto, $cantidad)
	{
		$sql = "INSERT INTO card (producto, cantidad) VALUES ('$producto','$cantidad')";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
	public function carritoCompras()
	{
		$sql = "SELECT c.id AS id, p.nombre AS nombreProducto, p.precio AS precio, p.thumb AS thumb, c.cantidad AS cantidad FROM card AS c
		JOIN producto AS p ON p.id = c.producto";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
	public function compras($id)
	{
		$sql = "SELECT p.id AS id, p.nombre AS nombreProducto, p.precio AS precio, p.thumb AS thumb FROM venta AS v JOIN producto AS p ON p.id = v.producto
		WHERE v.persona = '$id'";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
    public function obtenerPersonas()
	{
		$sql = "SELECT p.nombre AS nombre FROM persona AS p";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
    public function IniciarSesion($email, $password)
	{
		$sql = "SELECT p.id AS id, p.nombre AS nombre, p.apellido AS apellido, p.email AS email, p.rol AS rol FROM persona AS p
                WHERE p.email = '$email' AND p.password = '$password'";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
	public function Registar($nombre, $apellido, $email, $password)
	{
		$sql = "INSERT INTO persona (nombre, apellido, email, password, rol) VALUES ('$nombre', '$apellido', '$email','$password', '2')";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
    public function obtenerProductos()
	{
		$sql = "SELECT 
        p.id AS id, p.nombre AS nombre, p.descripcion AS descripcion,
        m.nombre AS marca, c.nombre AS categoria, p.cantidad AS cantidad,
        p.precio AS precio, p.thumb AS thumb FROM producto AS p
        JOIN categoria AS c ON c.id = p.categoria
        JOIN marcas AS m ON m.id = p.marca";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
	public function obtenerProductosPorId($id)
	{
		$sql = "SELECT 
        p.id AS id, p.nombre AS nombre, p.descripcion AS descripcion,
        m.nombre AS marca, c.nombre AS categoria, p.cantidad AS cantidad,
        p.precio AS precio, p.thumb AS thumb FROM producto AS p
        JOIN categoria AS c ON c.id = p.categoria
        JOIN marcas AS m ON m.id = p.marca
		WHERE p.id = '$id'";
		$sqlPreparada = mysqli_query($this->conn,$sql);
		return $sqlPreparada;
	}
}
