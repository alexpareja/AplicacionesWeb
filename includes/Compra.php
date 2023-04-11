<?php
namespace es\ucm\fdi\aw;

class Compra
{
    private $id;

    private $idUsuario;

    private $idProducto;

    private $talla;

    private $fecha;

    private $cantidad;

    private $precio;

    public function __construct($id=null, $idUsuario, $idProducto, $talla, $fecha, $cantidad,$precio)
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->talla = $talla;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
        $this->precio=$precio;
    }

    public static function buscaPorId($idCompra)
    {
        $compraDAO= new CompraDAO();
        return $compraDAO->buscaPorId($idCompra);
    }
	
	public static function buscaPorProducto($idProducto)
    {
        $compraDAO= new CompraDAO();
        return $compraDAO->buscaPorProducto($idProducto);
    }


    public static function crea($idUsuario, $idProducto, $talla,$cantidad,$precio)
    {
        $compraDAO= new CompraDAO();
        $producto = Producto::borraCantidad($idProducto, $talla, $cantidad);
        return $compraDAO->crea($idUsuario, $idProducto,$talla, date('Y-m-d H:i:s'),$cantidad,$precio);
    }

    //borra la compra
    public function borra($compra)
    {
        $compraDAO= new CompraDAO();
        return $compraDAO->borra($compra->id);
    }
   
    //obtiene en un array todas las compras->se puede actualizar para obtener compras concretas (todas las compras del último mes por ej)
    public static function getAllCompras()
    {
        $compraDAO= new CompraDAO();
        return $compraDAO->getAllCompras();
    }

    //obtiene en un array todas las compras de un usuario
    public static function getAllComprasUsuario($idUsuario)
    {
        $compraDAO= new CompraDAO();
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
						<th>Talla</th>
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
			
			$talla = strtoupper($c->getTalla());
			
			$cantidad = $c->getCantidad();
			$precio = $c->getPrecio();
			$html .= <<<EOF
			<tr>
						<td>$fecha</td>
						<td>$nombreU</td>
						<td>$nombreP</td>
						<td>$talla</td>
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
	
    public static function mostrarTablaComprasUsuario($compras){
        $html = '';
        $html .= <<<EOF
                <table class="compras">
                    <tr>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Talla</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
        EOF;
        foreach($compras as $c){
            $fecha = $c->getFecha();
            
            $producto = Producto::buscaPorID($c->getIdProducto());
            $nombreP = $producto->getNombre();
            
            $talla = strtoupper($c->getTalla());
            
            $cantidad = $c->getCantidad();
            $precio = $c->getPrecio();
            $html .= <<<EOF
            <tr>
                        <td>$fecha</td>
                        <td>$nombreP</td>
                        <td>$talla</td>
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
    public function getTalla()
    {
        return $this->talla;
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