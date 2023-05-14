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
	
	private $idCupon;

    public function __construct($id=null, $idUsuario, $idProducto, $talla, $fecha, $cantidad, $precio,$idCupon)
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->talla = $talla;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
        $this->precio=$precio;
		$this->idCupon=$idCupon;
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

    public static function buscaPorProductoYUsuario($idProducto,$idUsuario)
    {
        $compraDAO= new CompraDAO();
        return $compraDAO->buscaPorProductoYUsuario($idProducto,$idUsuario);
    }


    public static function crea($idUsuario, $idProducto, $talla, $cantidad, $precio, $idCupon)
    {
        $compraDAO= new CompraDAO();
        $producto = Producto::borraCantidad($idProducto, $talla, $cantidad);
        return $compraDAO->crea($idUsuario, $idProducto,$talla, date('Y-m-d H:i:s'),$cantidad,$precio, $idCupon);
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
				<table class="compras" id="tabla-compras">
					<tr>
						<th>Fecha</th>
						<th>Usuario</th>
						<th>Productos</th>
						<th>Tallas</th>
						<th>Cantidad</th>
						<th>Total</th>
						<th>Codigo descuento</th>
						<th>Total con descuento</th>
					</tr>
		EOF;
		
		    // Agrupar compras por fecha
    $comprasPorFecha = [];
    foreach($compras as $c) {
        $fecha = $c->getFecha();
        if(!isset($comprasPorFecha[$fecha])) {
            $comprasPorFecha[$fecha] = [];
        }
        $comprasPorFecha[$fecha][] = $c;
    }

    foreach($comprasPorFecha as $fecha => $comprasAgrupadas) {
        $nombrePs = [];
		$srcArray = [];
		$altArray = [];
        $tallas = [];
        $cantidades = [];
        $precios = [];
        $descuentos = 0;
		$totalCompra = 0;
        $totalesConDescuento = 0;

        foreach($comprasAgrupadas as $c){
            $producto = Producto::buscaPorID($c->getIdProducto());
            $nombrePs[] = $producto->getNombre();
			$srcArray[] = 'img/producto_'.$producto->getId().'.png';
			$altArray[] = 'Imagen de Producto '.$producto->getId();

			$usuario = Usuario::buscaPorID($c->getIdUsuario());
			$nombreU = $usuario->getNombre();

            $tallas[] = strtoupper($c->getTalla());

            $cantidades[] = $c->getCantidad();
            $precios[] = $c->getPrecio().'€';
			$totalCompra += $c->getPrecio();


            if($c->getIdCupon() !== null){
                $cupon = Cupon::buscaPorId($c->getIdCupon());
                $nombreC = $cupon->getDescuento();
                $totalConDesc= (100 - floatval($nombreC)) * floatval($totalCompra) /100;
                $totalConDescRed= round($totalConDesc, 2);
            }
            else{
                $nombreC = 0;
                $totalConDescRed = $c->getPrecio();
            }

            $descuentos = $nombreC . '%';
            $totalesConDescuento = $totalConDescRed . ' €';
        }

        $nombrePsStr = implode('<br>', $nombrePs);
		
		$imagenes = [];
		
		for ($i = 0; $i < count($srcArray); $i++) {
			$imagen = "<img class='imgProducto-compras' src='$srcArray[$i]' alt='$altArray[$i]'><a> $nombrePs[$i]</a>";
			$imagenes[] = $imagen;
		}
		
		$prodStr = implode('<br>', $imagenes);
        $tallasStr = implode('<br>', $tallas);
        $cantidadesStr = implode('<br>', $cantidades);
        $preciosStr = implode('<br>', $precios);

		
        $html .= <<<EOF
                <tr data-fecha=$fecha data-user='$nombreU' data-nombre='$nombrePsStr' data-talla='$tallasStr' data-cantidad='$cantidadesStr' data-precio='$totalesConDescuento'>
                    <td>$fecha</td>
                    <td>$nombreU</td>
                    <td>$prodStr</td>
                    <td>$tallasStr</td>
                    <td>$cantidadesStr</td>
                    <td>$preciosStr</td>
                    <td>$descuentos</td>
                    <td>$totalesConDescuento</td>
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
                <table class="compras" id="tabla-compras">
                    <tr>
                        <th>Fecha</th>
                        <th>Productos</th>
                        <th>Tallas</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Descuento</th>
                        <th>Total con descuento</th>
                    </tr>
        EOF;

    // Agrupar compras por fecha
    $comprasPorFecha = [];
    foreach($compras as $c) {
        $fecha = $c->getFecha();
        if(!isset($comprasPorFecha[$fecha])) {
            $comprasPorFecha[$fecha] = [];
        }
        $comprasPorFecha[$fecha][] = $c;
    }

    foreach($comprasPorFecha as $fecha => $comprasAgrupadas) {
        $nombrePs = [];
		$srcArray = [];
		$altArray = [];
        $tallas = [];
        $cantidades = [];
        $precios = [];
        $descuentos = 0;
		$totalCompra = 0;
        $totalesConDescuento = 0;

        foreach($comprasAgrupadas as $c){
            $producto = Producto::buscaPorID($c->getIdProducto());
            $nombrePs[] = $producto->getNombre();
			$srcArray[] = 'img/producto_'.$producto->getId().'.png';
			$altArray[] = 'Imagen de Producto '.$producto->getId();

            $tallas[] = strtoupper($c->getTalla());

            $cantidades[] = $c->getCantidad();
            $precios[] = $c->getPrecio();
			$totalCompra += $c->getPrecio();


            if($c->getIdCupon() !== null){
                $cupon = Cupon::buscaPorId($c->getIdCupon());
                $nombreC = $cupon->getDescuento();
                $totalConDesc= (100 - floatval($nombreC)) * floatval($totalCompra) /100;
                $totalConDescRed= round($totalConDesc, 2);
            }
            else{
                $nombreC = 0;
                $totalConDescRed = $c->getPrecio();
            }

            $descuentos = $nombreC . '%';
            $totalesConDescuento = $totalConDescRed . ' €';
        }

        $nombrePsStr = implode('<br>', $nombrePs);
		
		$imagenes = [];
		
		for ($i = 0; $i < count($srcArray); $i++) {
			$imagen = "<img class='imgProducto-compras' src='$srcArray[$i]' alt='$altArray[$i]'><a> $nombrePs[$i]</a>";
			$imagenes[] = $imagen;
		}
		
		$prodStr = implode('<br>', $imagenes);
		
        $tallasStr = implode('<br>', $tallas);
        $cantidadesStr = implode('<br>', $cantidades);
        $preciosStr = implode(' € <br>', $precios);

        $html .= <<<EOF
                <tr data-fecha=$fecha data-nombre='$nombrePsStr' data-talla='$tallasStr' data-cantidad='$cantidadesStr' data-precio='$totalesConDescuento'>
                    <td>$fecha</td>
                    <td>$prodStr</td>
                    <td>$tallasStr</td>
                    <td>$cantidadesStr</td>
                    <td>$preciosStr €</td>
                    <td>$descuentos</td>
                    <td>$totalesConDescuento</td>
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
	public function getIdCupon()
    {
        return $this->idCupon;
    }
}
?>