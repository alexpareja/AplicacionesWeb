<?php
require_once __DIR__.'/configuracion.php';

class Aplicacion
{
	private static $instancia;
	
	public static function getInstance() {
		if (  !self::$instancia instanceof self) {
			self::$instancia = new static();
		}
		return self::$instancia; //Patron Singleton
	}
    private function __construct()
	{
	}
	//datos de la conexion a la BBDD
	private $bdDatosConexion;
	
	
	private $inicializada = false;
	
	//conexion a la bbdd
	private $conn;
	
	public function init($bdDatosConexion)
	{
        if ( ! $this->inicializada ) {
    	    $this->bdDatosConexion = $bdDatosConexion;
    		$this->inicializada = true;
    		session_start();
        }
	}
	
	//cerrar aplicacion
	public function shutdown()
	{
	    $this->compruebaInstanciaInicializada();
	    if ($this->conn !== null && ! $this->conn->connect_errno) {
	        $this->conn->close();
	    }
	}
	
	/**
	 * Comprueba si la aplicación está inicializada. Si no lo está muestra un mensaje y termina la ejecución.
	 */
	private function compruebaInstanciaInicializada()
	{
	    if (! $this->inicializada ) {
	        echo "Aplicacion no inicializa";
	        exit();
	    }
	}
	
	//devuelve conexion a la bbdd
	public function getConexionBd()
	{
	    $this->compruebaInstanciaInicializada();
		if (! $this->conn ) {
			$bdHost = $this->bdDatosConexion['host'];
			$bdUser = $this->bdDatosConexion['user'];
			$bdPass = $this->bdDatosConexion['pass'];
			$bd = $this->bdDatosConexion['bd'];
			
			$conn = new mysqli($bdHost, $bdUser, $bdPass, $bd);
			if ( $conn->connect_errno ) {
				echo "Error de conexión a la BD ({$conn->connect_errno}):  {$conn->connect_error}";
				exit();
			}
			if ( ! $conn->set_charset("utf8mb4")) {
				echo "Error al configurar la BD ({$conn->errno}):  {$conn->error}";
				exit();
			}
			$this->conn = $conn;
		}
		return $this->conn;
	}
}
?>