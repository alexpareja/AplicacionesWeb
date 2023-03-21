<?php
include_once ("CompraDAO.php");
include_once ("Usuario.php");
include_once ("Producto.php");

class Compra
{
    private $id;

    private $idUsuario;

    private $idProducto;

    private $fecha;

    private $cantidad;

    private $precio;

    public function __construct($id=null, $idUsuario, $idProducto, $fecha, $cantidad,$precio)
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
        $this->precio=$precio;
    }

    public static function buscaPorID($idCompra)
    {
        $compraDAO= new compraDAO();
        return $compraDAO->buscaPorUsuario($idCompra);
    }

    public static function crea($idUsuario, $idProducto, $cantidad,$precio)
    {
        $compraDAO= new CompraDAO();
        return $usuarioDAO->crea($idUsuario, $idProducto, date('Y-m-d H:i:s'),$cantidad,$precio);
    }

    //borra la compra
    public function borra($compra)
    {
        $compraDAO= new compraDAO();
        return $compraDAO->borra($compra->id);
    }
   
    //obtiene en un array todas las compras->se puede actualizar para obtener compras concretas (todas las compras del último mes por ej)
    public static function getAllCompras()
    {
        $compraDAO= new compraDAO();
        return $compraDAO->getAllCompras();
    }

    //obtiene en un array todas las compras de un usuario
    public static function getAllComprasUsuario($idUsuario)
    {
        $compraDAO= new compraDAO();
        return $compraDAO->getAllComprasUsuario($idUsuario);
    }
	
	public static function mostrarTablaCompras($compras){
		$html = '';
		$html .= <<<EOF
				<table class="compras">
					<tr>
						<th>Fecha</th>
						<th>Usuario</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Total</th>
					</tr>
		EOF;
		foreach($compras as $c){
			$fecha = $c->getFecha();
			
			$usuario = Usuario::buscaPorID($c->getIdUsuario());
			$nombreU = $usuario->getNombre();
			
			$producto = Producto::buscaPorID($c->getIdProducto());
			$nombreP = $producto->getNombre();
			
			$cantidad = $c->getCantidad();
			$precio = $c->getPrecio();
			$html .= <<<EOF
			<tr>
						<td>$fecha</td>
						<td>$nombreU</td>
						<td>$nombreP</td>
						<td>$cantidad</td>
						<td>$precio €</td>
					</tr>
			EOF;	
		}
		
		$html .= <<<EOF
			</table>
		EOF;
		return $html;
	}
	
   

    public function getId()
    {
        return $this->id;
    }

    public function setId($nuevaId)
    {
        $this->id=$nuevaId;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
}
?>